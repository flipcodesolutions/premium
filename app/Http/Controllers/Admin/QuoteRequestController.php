<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QuoteRequest;
use App\Services\CustomerMailService;
use Illuminate\Http\Request;

class QuoteRequestController extends Controller
{
    /**
     * Display all quote requests with filtering and pagination.
     */
    public function index(Request $request)
    {
        $query = QuoteRequest::latest();

        // Filter by status
        if ($request->filled('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        // Search by keyword
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('property_address', 'like', "%{$search}%")
                  ->orWhere('service_type', 'like', "%{$search}%");
            });
        }

        $quotes = $query->paginate(12)->withQueryString();

        // Status counts for filtering pills
        $counts = [
            'all'       => QuoteRequest::count(),
            'pending'   => QuoteRequest::where('status', 'pending')->count(),
            'contacted' => QuoteRequest::where('status', 'contacted')->count(),
            'quoted'    => QuoteRequest::where('status', 'quoted')->count(),
            'closed'    => QuoteRequest::where('status', 'closed')->count(),
        ];

        return view('admin.quotes.index', compact('quotes', 'counts'));
    }

    /**
     * Show quote request details.
     */
    public function show(QuoteRequest $quote)
    {
        return view('admin.quotes.show', compact('quote'));
    }

    /**
     * Update quote request status.
     */
    public function updateStatus(Request $request, QuoteRequest $quote)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,contacted,quoted,closed',
            'notify_customer' => 'nullable|boolean',
            'note' => 'nullable|string|max:1000',
        ]);

        $quote->update([
            'status' => $validated['status'],
        ]);

        $msg = 'Quote status updated successfully to ' . ucfirst($quote->status) . '.';

        if ($request->boolean('notify_customer') && !empty($quote->email)) {
            $sent = CustomerMailService::sendQuoteStatusUpdate($quote, $request->input('note'));
            if ($sent) {
                $msg .= ' A status update email was sent to ' . $quote->email . '.';
            }
        }

        return redirect()
            ->back()
            ->with('success', $msg);
    }

    /**
     * Send a custom email or quote directly to the client.
     */
    public function sendEmail(Request $request, QuoteRequest $quote)
    {
        if (empty($quote->email)) {
            return redirect()
                ->back()
                ->withErrors(['email' => 'This quote request does not have a client email address.']);
        }

        $validated = $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:5000',
        ]);

        $sent = CustomerMailService::sendQuoteCustomEmail(
            $quote,
            $validated['subject'],
            $validated['message']
        );

        if ($sent) {
            return redirect()
                ->back()
                ->with('success', 'Email sent successfully to ' . $quote->email . '.');
        }

        return redirect()
            ->back()
            ->with('warning', 'Email dispatched for ' . $quote->email . '. Please check system mail logs.');
    }

    /**
     * Delete quote request.
     */
    public function destroy(QuoteRequest $quote)
    {
        $quote->delete();

        return redirect()
            ->route('admin.quotes.index')
            ->with('success', 'Quote request deleted successfully.');
    }
}
