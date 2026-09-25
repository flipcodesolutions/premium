<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Services\CustomerMailService;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    /**
     * Display all contact messages with filtering and pagination.
     */
    public function index(Request $request)
    {
        $query = ContactMessage::latest();

        // Filter by read status
        if ($request->filled('status')) {
            if ($request->status === 'unread') {
                $query->where('is_read', false);
            } elseif ($request->status === 'read') {
                $query->where('is_read', true);
            }
        }

        // Search by keyword
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('subject', 'like', "%{$search}%")
                  ->orWhere('message', 'like', "%{$search}%");
            });
        }

        $messages = $query->paginate(12)->withQueryString();

        // Counts for tabs
        $counts = [
            'all'    => ContactMessage::count(),
            'unread' => ContactMessage::where('is_read', false)->count(),
            'read'   => ContactMessage::where('is_read', true)->count(),
        ];

        return view('admin.messages.index', compact('messages', 'counts'));
    }

    /**
     * View contact message details and mark as read.
     */
    public function show(ContactMessage $message)
    {
        if (!$message->is_read) {
            $message->update(['is_read' => true]);
        }

        return view('admin.messages.show', compact('message'));
    }

    /**
     * Toggle read/unread status.
     */
    public function toggleRead(ContactMessage $message)
    {
        $message->update([
            'is_read' => !$message->is_read,
        ]);

        $statusText = $message->is_read ? 'marked as read' : 'marked as unread';

        return redirect()
            ->back()
            ->with('success', "Message {$statusText}.");
    }

    /**
     * Send email reply directly to the customer.
     */
    public function reply(Request $request, ContactMessage $message)
    {
        if (empty($message->email)) {
            return redirect()
                ->back()
                ->withErrors(['email' => 'This inquiry does not have a customer email address.']);
        }

        $validated = $request->validate([
            'subject' => 'required|string|max:255',
            'reply' => 'required|string|max:5000',
        ]);

        $sent = CustomerMailService::sendContactReply(
            $message,
            $validated['subject'],
            $validated['reply']
        );

        if (!$message->is_read) {
            $message->update(['is_read' => true]);
        }

        if ($sent) {
            return redirect()
                ->back()
                ->with('success', 'Email reply sent successfully to ' . $message->email . '.');
        }

        return redirect()
            ->back()
            ->with('warning', 'Email dispatched for ' . $message->email . '. Please check system mail logs.');
    }

    /**
     * Delete contact message.
     */
    public function destroy(ContactMessage $message)
    {
        $message->delete();

        return redirect()
            ->route('admin.messages.index')
            ->with('success', 'Message deleted successfully.');
    }
}
