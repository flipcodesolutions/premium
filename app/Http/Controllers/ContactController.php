<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Services\CustomerMailService;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Store contact form message.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
            ],

            'phone' => [
                'nullable',
                'string',
                'max:30',
            ],

            'subject' => [
                'required',
                'string',
                'max:255',
            ],

            'message' => [
                'required',
                'string',
                'max:3000',
            ],
        ]);

        $contactMessage = ContactMessage::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'subject' => $validated['subject'],
            'message' => $validated['message'],
            'is_read' => false,
        ]);

        if (!empty($contactMessage->email)) {
            CustomerMailService::sendContactConfirmation($contactMessage);
        }

        return redirect()
            ->back()
            ->with(
                'success',
                'Thank you! Your message has been sent successfully. We will contact you shortly.'
            );
    }
}