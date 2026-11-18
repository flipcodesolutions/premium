@extends('emails.layouts.default', ['title' => $subjectLine ?? 'Inspection Booking Update'])

@section('content')
    <div class="email-greeting">
        Hello {{ trim($booking->name ?? 'Valued Client') }},
    </div>

    <p style="margin-top: 0; margin-bottom: 16px;">
        {{ $introMessage ?? 'Thank you for choosing Premium Building & Pest Inspections. Here are the details regarding your inspection booking request.' }}
    </p>

    <!-- Booking Summary Card -->
    <div class="info-card">
        <div class="info-card-header">
            Inspection Booking Details
        </div>
        <table>
            <tr>
                <td class="label">Reference:</td>
                <td class="val">#PBI-B{{ str_pad($booking->id, 4, '0', STR_PAD_LEFT) }}</td>
            </tr>
            <tr>
                <td class="label">Service Type:</td>
                <td class="val">{{ $booking->service_type }}</td>
            </tr>
            <tr>
                <td class="label">Property Address:</td>
                <td class="val">{{ $booking->property_address }}</td>
            </tr>
            @if($booking->inspection_date)
            <tr>
                <td class="label">Inspection Date:</td>
                <td class="val">{{ \Carbon\Carbon::parse($booking->inspection_date)->format('l, d F Y') }}</td>
            </tr>
            @endif
            @if($booking->inspection_time)
            <tr>
                <td class="label">Preferred Time:</td>
                <td class="val">{{ $booking->inspection_time }}</td>
            </tr>
            @endif
            <tr>
                <td class="label">Contact Phone:</td>
                <td class="val">{{ $booking->phone }}</td>
            </tr>
            @if($booking->email)
            <tr>
                <td class="label">Email Address:</td>
                <td class="val">{{ $booking->email }}</td>
            </tr>
            @endif
            @if(!empty($booking->message))
            <tr>
                <td class="label">Special Instructions:</td>
                <td class="val">{{ $booking->message }}</td>
            </tr>
            @endif
            <tr>
                <td class="label">Booking Status:</td>
                <td class="val">
                    @php
                        $statusLabels = [
                            'pending' => 'Received & Awaiting Confirmation',
                            'confirmed' => 'Confirmed & Scheduled',
                            'completed' => 'Inspection Completed',
                            'cancelled' => 'Cancelled',
                        ];
                        $displayStatus = $statusLabels[strtolower($booking->status)] ?? ucfirst($booking->status);
                    @endphp
                    <span class="status-badge badge-{{ strtolower($booking->status) }}">
                        {{ $displayStatus }}
                    </span>
                </td>
            </tr>
        </table>
    </div>

    @if(!empty($customMessage))
        <div style="margin-top: 20px;">
            <strong style="color: #05213F; font-size: 13.5px;">Message from Inspector / Admin:</strong>
            <div class="message-box">
                {{ $customMessage }}
            </div>
        </div>
    @endif

    <!-- What to Expect -->
    <div class="steps-box">
        <div class="steps-box-title">What to Expect:</div>
        <ul class="steps-list">
            <li><strong>Access Arrangement:</strong> We coordinate directly with the real estate agent or vendor for property key access.</li>
            <li><strong>Thorough On-Site Inspection:</strong> Licensed inspector checks structural elements, dampness, moisture, roofing, subfloor, and timber pests.</li>
            <li><strong>Fast Report Delivery:</strong> Detailed digital report with high-resolution photos sent directly to your email within 24 hours.</li>
        </ul>
    </div>

    <!-- Trust Badges -->
    <div class="trust-box">
        <strong style="color: #05213F;">Our Quality Guarantee:</strong><br>
        &bull; <strong>VBA Licensed Professional:</strong> Inspected by Ronak Gami (VBA Licence: IN-PS 74654, Builder: DB-L 100200)<br>
        &bull; <strong>Australian Standards:</strong> 100% compliant with AS 4349.1 &amp; AS 4349.3<br>
        &bull; <strong>Post-Inspection Phone Consultation:</strong> Personal call to discuss all findings in plain English
    </div>

    <!-- Urgent Support Callout -->
    <div class="highlight-callout">
        <p style="margin: 0; font-size: 13px; color: #05213F; line-height: 1.6;">
            <strong>Need to Reschedule or Have Questions?</strong><br>
            Please call Licensed Inspector <strong>Ronak Gami</strong> directly on <a href="tel:0466001551" style="color: #48A900; font-weight: 700; text-decoration: none;">0466 001 551</a> or reply to this email.
        </p>
    </div>

    <!-- Action Buttons -->
    <div class="email-cta-bar">
        <a href="tel:0466001551" class="email-btn-secondary">Call 0466 001 551</a>
        <a href="https://premiumbuildinginspections.com.au/" class="email-btn">Visit Our Website</a>
    </div>
@endsection
