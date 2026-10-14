<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\InspectionAgreement;
use App\Services\CustomerMailService;
use Illuminate\Http\Request;

class InspectionAgreementController extends Controller
{
    /**
     * Show the Inspection Agreement page.
     */
    public function index()
    {
        return view('inspection-agreement.index');
    }

    /**
     * Store the accepted inspection agreement.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email', 'max:255'],
            'property_address' => ['required', 'string', 'max:500'],
            'agent_mobile' => ['nullable', 'string', 'max:50'],
        ]);

        $fullName = trim($validated['first_name'] . ' ' . $validated['last_name']);

        $notes = "Client accepted the Pre-Engagement Inspection Agreement (AS 4349.1-2007 & AS 4349.3-2010).";
        if (!empty($validated['agent_mobile'])) {
            $notes .= "\nAgent Mobile Number: " . $validated['agent_mobile'];
        }

        $booking = Booking::create([
            'name' => $fullName,
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'property_address' => $validated['property_address'],
            'service_type' => 'Pre-Purchase Inspection Agreement Accepted',
            'inspection_date' => now()->toDateString(),
            'message' => $notes,
            'status' => 'confirmed',
        ]);

        InspectionAgreement::create([
            'booking_id' => $booking->id,
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'name' => $fullName,
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'property_address' => $validated['property_address'],
            'agent_mobile' => $validated['agent_mobile'] ?? null,
            'service_type' => 'Pre-Purchase Inspection Agreement (AS 4349.1-2007 & AS 4349.3-2010)',
            'agreement_version' => 'AS 4349.1-2007 & AS 4349.3-2010',
            'status' => 'accepted',
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'accepted_at' => now(),
            'notes' => $notes,
        ]);

        if (!empty($booking->email)) {
            CustomerMailService::sendBookingConfirmation($booking);
        }

        return redirect()
            ->route('inspection.agreement')
            ->with(
                'success',
                'Thank you! Your inspection agreement has been accepted and submitted successfully.'
            );
    }
}
