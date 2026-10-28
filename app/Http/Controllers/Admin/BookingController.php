<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Services\CustomerMailService;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display all inspection bookings with filtering and pagination.
     */
    public function index(Request $request)
    {
        $query = Booking::latest();

        // Filter by status if provided and not 'all'
        if ($request->filled('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        // Search by keyword
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('property_address', 'like', "%{$search}%")
                  ->orWhere('service_type', 'like', "%{$search}%");
            });
        }

        $bookings = $query->paginate(12)->withQueryString();

        // Status counts for filtering pills
        $counts = [
            'all'       => Booking::count(),
            'pending'   => Booking::where('status', 'pending')->count(),
            'confirmed' => Booking::where('status', 'confirmed')->count(),
            'completed' => Booking::where('status', 'completed')->count(),
            'cancelled' => Booking::where('status', 'cancelled')->count(),
        ];

        return view('admin.bookings.index', compact('bookings', 'counts'));
    }

    /**
     * Show booking details.
     */
    public function show(Booking $booking)
    {
        $booking->load('agreement');

        return view('admin.bookings.show', compact('booking'));
    }

    /**
     * Generate and view inspection completion report for a booking.
     */
    public function report(Booking $booking)
    {
        $booking->load('agreement');

        return view('admin.bookings.report', compact('booking'));
    }

    /**
     * Send official inspection report notification to client.
     */
    public function emailReport(Request $request, Booking $booking)
    {
        if (empty($booking->email)) {
            return redirect()
                ->back()
                ->withErrors(['email' => 'This booking does not have a client email address on file.']);
        }

        $validated = $request->validate([
            'notes' => 'nullable|string|max:2000',
        ]);

        $sent = CustomerMailService::sendBookingInspectionReport($booking, $validated['notes'] ?? null);

        if ($sent) {
            return redirect()
                ->back()
                ->with('success', 'Inspection completion report sent successfully to ' . $booking->email . '.');
        }

        return redirect()
            ->back()
            ->with('warning', 'Report email dispatched for ' . $booking->email . '. Please check system mail logs.');
    }

    /**
     * Update the booking status.
     */
    public function updateStatus(Request $request, Booking $booking)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,confirmed,completed,cancelled',
            'notify_customer' => 'nullable|boolean',
            'note' => 'nullable|string|max:1000',
        ]);

        $booking->update([
            'status' => $validated['status'],
        ]);

        if ($request->boolean('notify_customer')) {
            if (empty(trim($booking->email ?? ''))) {
                return redirect()
                    ->back()
                    ->with('warning', 'Booking status updated to ' . ucfirst($booking->status) . ', but client has no email address on file.');
            }

            $sent = CustomerMailService::sendBookingStatusUpdate($booking, $request->input('note'));
            if ($sent) {
                return redirect()
                    ->back()
                    ->with('success', 'Booking status updated to ' . ucfirst($booking->status) . ' and notification email sent to ' . $booking->email . '.');
            }

            return redirect()
                ->back()
                ->with('warning', 'Booking status updated to ' . ucfirst($booking->status) . ', but the notification email could not be delivered to ' . $booking->email . '. Please check system mail logs.');
        }

        return redirect()
            ->back()
            ->with('success', 'Booking status updated successfully to ' . ucfirst($booking->status) . '.');
    }

    /**
     * Send a custom email directly to the booking customer.
     */
    public function sendEmail(Request $request, Booking $booking)
    {
        if (empty($booking->email)) {
            return redirect()
                ->back()
                ->withErrors(['email' => 'This booking does not have a customer email address.']);
        }

        $validated = $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:5000',
        ]);

        $sent = CustomerMailService::sendBookingCustomEmail(
            $booking,
            $validated['subject'],
            $validated['message']
        );

        if ($sent) {
            return redirect()
                ->back()
                ->with('success', 'Email sent successfully to ' . $booking->email . '.');
        }

        return redirect()
            ->back()
            ->with('warning', 'Email dispatched for ' . $booking->email . '. Please check system mail logs.');
    }

    /**
     * Show form to manually create a new booking.
     */
    public function create()
    {
        $services = \App\Models\Service::where('status', true)->orderBy('name')->get();

        return view('admin.bookings.create', compact('services'));
    }

    /**
     * Store a new booking created from admin.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'required|string|max:30',
            'property_address' => 'required|string|max:500',
            'service_type' => 'required|string|max:255',
            'inspection_date' => 'nullable|date',
            'inspection_time' => 'nullable|date_format:H:i',
            'status' => 'required|in:pending,confirmed,completed,cancelled',
            'message' => 'nullable|string|max:2000',
        ]);

        $booking = Booking::create($validated);

        return redirect()
            ->route('admin.bookings.index')
            ->with('success', 'New inspection booking #' . $booking->id . ' has been created successfully.');
    }

    /**
     * Delete the booking record.
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()
            ->route('admin.bookings.index')
            ->with('success', 'Booking deleted successfully.');
    }
}
