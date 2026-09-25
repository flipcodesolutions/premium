<?php

namespace App\Http\Controllers;

use App\Models\QuoteRequest;
use App\Services\CustomerMailService;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    /**
     * Store a new quote request.
     */
    public function store(Request $request)
    {
        // Support field aliases across different service forms
        if (!$request->filled('property_address')) {
            $request->merge([
                'property_address' => $request->input('address') ?? $request->input('suburb'),
            ]);
        }

        if (!$request->filled('service_type')) {
            $request->merge([
                'service_type' => $request->input('service'),
            ]);
        }

        if ($request->filled('inspection_date')) {
            $dateNote = "Preferred Inspection Date: " . $request->input('inspection_date');
            $existingMsg = $request->input('message');
            $request->merge([
                'message' => $existingMsg ? ($existingMsg . "\n\n" . $dateNote) : $dateNote,
            ]);
        }

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
                'required',
                'string',
                'max:30',
            ],

            'property_address' => [
                'nullable',
                'string',
                'max:500',
            ],

            'service_type' => [
                'nullable',
                'string',
                'max:255',
            ],

            'message' => [
                'nullable',
                'string',
                'max:2000',
            ],
        ]);

        $quote = QuoteRequest::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'property_address' => $validated['property_address'] ?? 'Not specified',
            'service_type' => $validated['service_type'] ?? 'General Inspection',
            'message' => $validated['message'] ?? null,
            'status' => 'pending',
        ]);

        if (!empty($quote->email)) {
            CustomerMailService::sendQuoteConfirmation($quote);
        }

        return redirect()
            ->back()
            ->with(
                'success',
                'Thank you! Your inspection request has been submitted successfully. Our team will contact you shortly.'
            );
    }
}