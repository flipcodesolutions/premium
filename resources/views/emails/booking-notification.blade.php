@extends('emails.layouts.default', ['title' => $subjectLine ?? 'Inspection Booking Update'])

@section('content')
    <div class="email-greeting">
        Hello {{ $booking->name }},
    </div>

    <p>{{ $introMessage ?? 'Thank you for choosing Premium Building & Pest Inspections. Here are the details regarding your inspection booking request.' }}</p>

    <div class="info-card">
        <table>
            <tr>
                <td class="label">Booking Ref:</td>
                <td class="val">#{{ $booking->id }}</td>
            </tr>
            <tr>
                <td class="label">Current Status:</td>
                <td class="val">
                    <span class="status-badge badge-{{ $booking->status }}">
                        {{ strtoupper($booking->status) }}
                    </span>
                </td>
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
                <td class="val">{{ \Carbon\Carbon::parse($booking->inspection_date)->format('l, d M Y') }}</td>
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
                <td class="label">Customer Email:</td>
                <td class="val">{{ $booking->email }}</td>
            </tr>
            @endif
            @if(!empty($booking->message))
            <tr>
                <td class="label">Special Instructions:</td>
                <td class="val">{{ $booking->message }}</td>
            </tr>
            @endif
        </table>
    </div>

    @if(!empty($customMessage))
        <div style="margin-top: 20px;">
            <strong style="color: #0B1F3A; font-size: 13px;">Message from Inspector / Admin:</strong>
            <div class="message-box">
                {{ $customMessage }}
            </div>
        </div>
    @endif

    <p style="margin-top: 20px;">
        If you have any questions or need to make adjustments to your inspection schedule, please call our team directly at <strong>0466 001 551</strong> or reply to this email.
    </p>

    <div class="email-cta-bar">
        <a href="{{ url('/') }}" class="email-btn">Visit Our Website</a>
    </div>
@endsection
