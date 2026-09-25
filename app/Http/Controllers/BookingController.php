<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Service;
use App\Services\CustomerMailService;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Show the inspection booking page.
     */
    public function create()
    {
        $services = Service::where('status', true)->orderBy('name')->get();

        return view('booking.index', compact('services'));
    }

    /**
     * Store a new inspection booking.
     */
    public function store(Request $request)
    {
        // Support address aliases
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

        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'nullable',
                'email',
                'max:255',
            ],

            'phone' => [
                'required',
                'string',
                'max:30',
            ],

            'property_address' => [
                'required',
                'string',
                'max:500',
            ],

            'service_type' => [
                'required',
                'string',
                'max:255',
            ],

            'inspection_date' => [
                'nullable',
                'date',
            ],

            'inspection_time' => [
                'nullable',
                'date_format:H:i',
            ],

            'message' => [
                'nullable',
                'string',
                'max:2000',
            ],
        ]);

        $booking = Booking::create([
            'name' => $validated['name'],
            'email' => $validated['email'] ?? null,
            'phone' => $validated['phone'],
            'property_address' => $validated['property_address'],
            'service_type' => $validated['service_type'],
            'inspection_date' => $validated['inspection_date'] ?? null,
            'inspection_time' => $validated['inspection_time'] ?? null,
            'message' => $validated['message'] ?? null,
            'status' => 'pending',
        ]);

        if (!empty($booking->email)) {
            CustomerMailService::sendBookingConfirmation($booking);
        }

        return redirect()
            ->back()
            ->with(
                'success',
                'Your inspection booking request has been submitted successfully! Our team will contact you shortly to confirm your appointment.'
            );
    }
}