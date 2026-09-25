@extends('emails.layouts.default', ['title' => $subjectLine ?? 'Quote Request Update'])

@section('content')
    <div class="email-greeting">
        Hello {{ $quote->name }},
    </div>

    <p>{{ $introMessage ?? 'Thank you for reaching out to Premium Building & Pest Inspections. Here is the latest update regarding your quote request.' }}</p>

    <div class="info-card">
        <table>
            <tr>
                <td class="label">Quote Ref:</td>
                <td class="val">#{{ $quote->id }}</td>
            </tr>
            <tr>
                <td class="label">Status:</td>
                <td class="val">
                    <span class="status-badge badge-{{ $quote->status }}">
                        {{ strtoupper($quote->status) }}
                    </span>
                </td>
            </tr>
            <tr>
                <td class="label">Requested Service:</td>
                <td class="val">{{ $quote->service_type ?? 'General Inspection' }}</td>
            </tr>
            @if($quote->property_address)
            <tr>
                <td class="label">Property Address:</td>
                <td class="val">{{ $quote->property_address }}</td>
            </tr>
            @endif
            <tr>
                <td class="label">Contact Phone:</td>
                <td class="val">{{ $quote->phone }}</td>
            </tr>
        </table>
    </div>

    @if(!empty($customMessage))
        <div style="margin-top: 20px;">
            <strong style="color: #0B1F3A; font-size: 13px;">Quote / Message from Inspector:</strong>
            <div class="message-box">
                {{ $customMessage }}
            </div>
        </div>
    @endif

    <p style="margin-top: 20px;">
        Our licensed building and pest inspectors are ready to assist you. To confirm your booking or request further details, please reach out to us at <strong>0468 444 786</strong>.
    </p>

    <div class="email-cta-bar">
        <a href="{{ url('/') }}" class="email-btn">View Services & Pricing</a>
    </div>
@endsection
