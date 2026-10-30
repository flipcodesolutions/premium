<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InspectionAgreement;
use App\Services\CustomerMailService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class InspectionAgreementController extends Controller
{
    /**
     * Display all inspection agreements with filtering and pagination.
     */
    public function index(Request $request)
    {
        $query = InspectionAgreement::latest();

        // Filter by status if provided and not 'all'
        if ($request->filled('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        // Search by keyword
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('first_name', 'like', "%{$search}%")
                  ->orWhere('last_name', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('property_address', 'like', "%{$search}%")
                  ->orWhere('agent_mobile', 'like', "%{$search}%");
            });
        }

        $perPage = (int) $request->input('per_page', 10);
        $perPage = in_array($perPage, [5, 10, 25, 50]) ? $perPage : 10;

        $agreements = $query->paginate($perPage)->withQueryString();

        // Status counts for filtering pills
        $counts = [
            'all'       => InspectionAgreement::count(),
            'accepted'  => InspectionAgreement::where('status', 'accepted')->count(),
            'confirmed' => InspectionAgreement::where('status', 'confirmed')->count(),
            'completed' => InspectionAgreement::where('status', 'completed')->count(),
            'cancelled' => InspectionAgreement::where('status', 'cancelled')->count(),
        ];

        // Summary metrics
        $metrics = [
            'total'      => $counts['all'],
            'today'      => InspectionAgreement::whereDate('created_at', Carbon::today())->count(),
            'this_month' => InspectionAgreement::whereMonth('created_at', Carbon::now()->month)
                                               ->whereYear('created_at', Carbon::now()->year)
                                               ->count(),
        ];

        return view('admin.agreements.index', compact('agreements', 'counts', 'metrics'));
    }

    /**
     * Show inspection agreement details.
     */
    public function show(InspectionAgreement $agreement)
    {
        return view('admin.agreements.show', compact('agreement'));
    }

    /**
     * Print-friendly view of the signed inspection agreement.
     */
    public function print(InspectionAgreement $agreement)
    {
        return view('admin.agreements.print', compact('agreement'));
    }

    /**
     * Update agreement status and notes.
     */
    public function updateStatus(Request $request, InspectionAgreement $agreement)
    {
        $validated = $request->validate([
            'status'          => 'required|in:accepted,confirmed,completed,cancelled',
            'notes'           => 'nullable|string|max:2000',
            'notify_customer' => 'nullable|boolean',
        ]);

        $agreement->update([
            'status' => $validated['status'],
            'notes'  => $validated['notes'] ?? $agreement->notes,
        ]);

        // Sync with linked booking if present
        if ($agreement->booking_id && $agreement->booking) {
            $bookingStatusMap = [
                'accepted'  => 'confirmed',
                'confirmed' => 'confirmed',
                'completed' => 'completed',
                'cancelled' => 'cancelled',
            ];
            $targetBookingStatus = $bookingStatusMap[$validated['status']] ?? 'confirmed';
            $agreement->booking->update(['status' => $targetBookingStatus]);
        }

        // Notify customer via email if requested
        if ($request->boolean('notify_customer') && !empty($agreement->email)) {
            try {
                $subject = 'Inspection Agreement Status Update: ' . ucfirst($agreement->status) . ' - Ref #' . $agreement->reference_code;
                $fromAddress = CustomerMailService::getFromAddress();
                $fromName = CustomerMailService::getFromName();

                Mail::send('emails.booking-notification', [
                    'booking' => (object)[
                        'id'               => $agreement->id,
                        'name'             => $agreement->name,
                        'email'            => $agreement->email,
                        'phone'            => $agreement->phone,
                        'property_address' => $agreement->property_address,
                        'service_type'     => $agreement->service_type,
                        'inspection_date'  => $agreement->accepted_at ? $agreement->accepted_at->toDateString() : now()->toDateString(),
                        'inspection_time'  => null,
                        'status'           => $agreement->status,
                        'message'          => $agreement->notes,
                    ],
                    'subjectLine'   => $subject,
                    'introMessage'  => 'Your Pre-Engagement Inspection Agreement (Ref #' . $agreement->reference_code . ') status has been updated to: ' . strtoupper($agreement->status) . '.',
                    'customMessage' => $request->input('notes'),
                ], function ($message) use ($agreement, $subject, $fromAddress, $fromName) {
                    $message->to($agreement->email, $agreement->name)
                            ->from($fromAddress, $fromName)
                            ->replyTo($fromAddress, $fromName)
                            ->subject($subject);
                });
            } catch (\Throwable $e) {
                Log::error("Failed sending agreement status email to {$agreement->email}: " . $e->getMessage());
            }
        }

        return redirect()
            ->back()
            ->with('success', 'Inspection agreement status updated successfully to ' . ucfirst($agreement->status) . '.');
    }

    /**
     * Send a custom email directly to the agreement client.
     */
    public function sendEmail(Request $request, InspectionAgreement $agreement)
    {
        if (empty($agreement->email)) {
            return redirect()
                ->back()
                ->withErrors(['email' => 'This agreement record does not have a customer email address.']);
        }

        $validated = $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:5000',
        ]);

        try {
            $fromAddress = CustomerMailService::getFromAddress();
            $fromName = CustomerMailService::getFromName();

            Mail::send('emails.booking-notification', [
                'booking' => (object)[
                    'id'               => $agreement->id,
                    'name'             => $agreement->name,
                    'email'            => $agreement->email,
                    'phone'            => $agreement->phone,
                    'property_address' => $agreement->property_address,
                    'service_type'     => $agreement->service_type,
                    'inspection_date'  => $agreement->accepted_at ? $agreement->accepted_at->toDateString() : now()->toDateString(),
                    'inspection_time'  => null,
                    'status'           => $agreement->status,
                    'message'          => $agreement->notes,
                ],
                'subjectLine'   => $validated['subject'],
                'introMessage'  => 'Message from Premium Building & Pest Inspections regarding your Inspection Agreement:',
                'customMessage' => $validated['message'],
            ], function ($msg) use ($agreement, $validated, $fromAddress, $fromName) {
                $msg->to($agreement->email, $agreement->name)
                    ->from($fromAddress, $fromName)
                    ->replyTo($fromAddress, $fromName)
                    ->subject($validated['subject']);
            });

            return redirect()
                ->back()
                ->with('success', 'Email sent successfully to ' . $agreement->email . '.');
        } catch (\Throwable $e) {
            Log::error("Failed sending custom agreement email: " . $e->getMessage());
            return redirect()
                ->back()
                ->with('warning', 'Email dispatch error: ' . $e->getMessage());
        }
    }

    /**
     * Delete an inspection agreement record.
     */
    public function destroy(InspectionAgreement $agreement)
    {
        $agreement->delete();

        return redirect()
            ->route('admin.agreements.index')
            ->with('success', 'Inspection agreement record deleted successfully.');
    }
}
