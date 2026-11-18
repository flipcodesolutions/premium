@extends('emails.layouts.default', ['title' => $subjectLine ?? 'New Quote Request Received'])

@section('content')
    <div class="email-greeting" style="font-size: 17px; font-weight: 700; color: #05213F; margin-bottom: 14px;">
        Hello Admin Team,
    </div>

    <p style="margin-top: 0; margin-bottom: 14px; font-size: 14.5px; line-height: 1.6; color: #334155;">
        A new quote request has been submitted through the <strong>Premium Building &amp; Pest Inspections</strong> website.
    </p>

    <p style="margin-top: 0; margin-bottom: 20px; font-size: 14.5px; line-height: 1.6; color: #334155;">
        The customer is interested in our inspection services. Please find the submitted details below:
    </p>

    <!-- Customer Information Card -->
    <div class="info-card" style="background-color: #f8fafc; border-left: 4px solid #48A900; border-radius: 6px; padding: 20px 22px; margin: 22px 0; border-top: 1px solid #e2edf6; border-right: 1px solid #e2edf6; border-bottom: 1px solid #e2edf6;">
        <div class="info-card-header" style="font-size: 13px; font-weight: 800; color: #05213F; text-transform: uppercase; letter-spacing: 0.8px; margin-bottom: 14px; padding-bottom: 8px; border-bottom: 1px solid #e2e8f0;">
            Customer Information
        </div>

        <table style="width: 100%; border-collapse: collapse;">
            <tr>
                <td class="label" style="padding: 8px 0; width: 38%; color: #64748b; font-weight: 700; font-size: 13.5px; border-bottom: 1px dashed #edf2f7;">
                    Name:
                </td>
                <td class="val" style="padding: 8px 0; color: #05213F; font-weight: 700; font-size: 14px; border-bottom: 1px dashed #edf2f7;">
                    {{ $quote->name }}
                </td>
            </tr>
            <tr>
                <td class="label" style="padding: 8px 0; color: #64748b; font-weight: 700; font-size: 13.5px; border-bottom: 1px dashed #edf2f7;">
                    Email:
                </td>
                <td class="val" style="padding: 8px 0; color: #05213F; font-size: 14px; border-bottom: 1px dashed #edf2f7;">
                    <a href="mailto:{{ $quote->email }}" style="color: #05213F; text-decoration: underline; font-weight: 600;">{{ $quote->email }}</a>
                </td>
            </tr>
            <tr>
                <td class="label" style="padding: 8px 0; color: #64748b; font-weight: 700; font-size: 13.5px; border-bottom: 1px dashed #edf2f7;">
                    Phone:
                </td>
                <td class="val" style="padding: 8px 0; color: #05213F; font-weight: 700; font-size: 14px; border-bottom: 1px dashed #edf2f7;">
                    <a href="tel:{{ preg_replace('/[^0-9+]/', '', $quote->phone) }}" style="color: #48A900; text-decoration: none; font-weight: 700;">{{ $quote->phone }}</a>
                </td>
            </tr>
            <tr>
                <td class="label" style="padding: 8px 0; color: #64748b; font-weight: 700; font-size: 13.5px; border-bottom: 1px dashed #edf2f7;">
                    Property Address:
                </td>
                <td class="val" style="padding: 8px 0; color: #05213F; font-weight: 600; font-size: 14px; border-bottom: 1px dashed #edf2f7;">
                    {{ $quote->property_address ?? 'Not specified' }}
                </td>
            </tr>
            <tr>
                <td class="label" style="padding: 8px 0; color: #64748b; font-weight: 700; font-size: 13.5px; border-bottom: 1px dashed #edf2f7;">
                    Inspection Service:
                </td>
                <td class="val" style="padding: 8px 0; color: #05213F; font-weight: 700; font-size: 14px; border-bottom: 1px dashed #edf2f7;">
                    {{ $quote->service_type ?? 'General Inspection' }}
                </td>
            </tr>
            <tr>
                <td class="label" style="padding: 8px 0; color: #64748b; font-weight: 700; font-size: 13.5px;">
                    Message:
                </td>
                <td class="val" style="padding: 8px 0; color: #05213F; font-size: 14px; line-height: 1.6;">
                    {{ $quote->message ?: 'N/A' }}
                </td>
            </tr>
        </table>
    </div>

    <p style="margin-top: 20px; margin-bottom: 12px; font-size: 14px; line-height: 1.65; color: #334155;">
        Please review the customer's enquiry and get in touch with them to discuss their inspection requirements. Kindly follow up with the customer and provide the relevant quotation.
    </p>

    <p style="margin-top: 14px; margin-bottom: 0; font-size: 14px; font-weight: 600; color: #05213F;">
        Thank you for your attention.
    </p>

    <!-- Quick Action Buttons for Admin -->
    <div class="email-cta-bar" style="margin-top: 26px; padding-top: 20px; border-top: 1px solid #e2e8f0; text-align: center;">
        @if(!empty($quote->phone))
            <a href="tel:{{ preg_replace('/[^0-9+]/', '', $quote->phone) }}" class="email-btn-secondary" style="background-color: #05213F; color: #ffffff; padding: 11px 22px; font-size: 13px; font-weight: 700; text-decoration: none; border-radius: 4px; display: inline-block; margin: 4px 6px;">
                Call Customer
            </a>
        @endif
        @if(!empty($quote->email))
            <a href="mailto:{{ $quote->email }}?subject={{ rawurlencode('Quote for ' . ($quote->service_type ?? 'Inspection') . ' - Premium Building & Pest Inspections') }}" class="email-btn" style="background-color: #48A900; color: #ffffff; padding: 11px 22px; font-size: 13px; font-weight: 700; text-decoration: none; border-radius: 4px; display: inline-block; margin: 4px 6px;">
                Email Customer
            </a>
        @endif
    </div>
@endsection
