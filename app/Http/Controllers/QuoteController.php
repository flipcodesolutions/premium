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
        if ($request->filled('last_name') && $request->filled('name')) {
            $request->merge([
                'name' => trim($request->input('name') . ' ' . $request->input('last_name')),
            ]);
        }

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

        $serviceType = $request->input('service_type');
        $knownServices = [
            'pre-purchase-building-and-pest-inspection' => 'Pre-Purchase Building & Pest Inspection',
            'building-stage-by-stage-inspection' => 'Building Stage By Stage Inspection',
            'apartment-building-inspection' => 'Apartment Building Inspection',
            'rising-damp-inspection' => 'Rising Damp Inspection',
            'pool-barrier-inspection' => 'Pool Barrier Inspection',
            'dilapidation-report' => 'Dilapidation Inspection',
            'dilapidation-inspection' => 'Dilapidation Inspection',
            'new-build-handover-inspection' => 'New Build Handover Inspection',
            'vendor-inspection' => 'Vendor Inspection',
            'builders-warranty-inspection' => 'Builders Warranty Inspection',
        ];
        if ($serviceType && isset($knownServices[$serviceType])) {
            $request->merge(['service_type' => $knownServices[$serviceType]]);
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