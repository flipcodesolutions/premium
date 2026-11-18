@extends('emails.layouts.default', ['title' => $subjectLine ?? 'Quotation Details - Premium Building & Pest Inspections'])

@section('content')
    <div class="email-greeting" style="font-size: 17px; font-weight: 700; color: #05213F; margin-bottom: 14px;">
        Hello {{ $quote->name }},
    </div>

    <p style="margin-top: 0; margin-bottom: 12px; font-size: 14.5px; line-height: 1.65; color: #334155;">
        Thank you for contacting <strong>Premium Building &amp; Pest Inspections</strong> and for your interest in our inspection services.
    </p>

    <p style="margin-top: 0; margin-bottom: 12px; font-size: 14.5px; line-height: 1.65; color: #334155;">
        We have received your quote request and reviewed the details provided. We appreciate the opportunity to assist you with your property inspection requirements.
    </p>

    <p style="margin-top: 0; margin-bottom: 20px; font-size: 14.5px; line-height: 1.65; color: #334155;">
        Based on your enquiry, please find the quotation details below:
    </p>

    <!-- Inspection Details Card -->
    <div class="info-card" style="background-color: #f8fafc; border-left: 4px solid #48A900; border-radius: 6px; padding: 18px 20px; margin: 20px 0; border-top: 1px solid #e2edf6; border-right: 1px solid #e2edf6; border-bottom: 1px solid #e2edf6;">
        <div class="info-card-header" style="font-size: 13px; font-weight: 800; color: #05213F; text-transform: uppercase; letter-spacing: 0.8px; margin-bottom: 12px; padding-bottom: 8px; border-bottom: 1px solid #e2e8f0;">
            Inspection Details
        </div>
        <table style="width: 100%; border-collapse: collapse;">
            <tr>
                <td class="label" style="padding: 7px 0; width: 38%; color: #64748b; font-weight: 700; font-size: 13.5px; border-bottom: 1px dashed #edf2f7;">
                    Customer Name:
                </td>
                <td class="val" style="padding: 7px 0; color: #05213F; font-weight: 700; font-size: 14px; border-bottom: 1px dashed #edf2f7;">
                    {{ $quote->name }}
                </td>
            </tr>
            <tr>
                <td class="label" style="padding: 7px 0; color: #64748b; font-weight: 700; font-size: 13.5px; border-bottom: 1px dashed #edf2f7;">
                    Property Address:
                </td>
                <td class="val" style="padding: 7px 0; color: #05213F; font-weight: 600; font-size: 14px; border-bottom: 1px dashed #edf2f7;">
                    {{ $quote->property_address ?? 'Not specified' }}
                </td>
            </tr>
            <tr>
                <td class="label" style="padding: 7px 0; color: #64748b; font-weight: 700; font-size: 13.5px;">
                    Inspection Service:
                </td>
                <td class="val" style="padding: 7px 0; color: #05213F; font-weight: 700; font-size: 14px;">
                    {{ $quote->service_type ?? 'Pre-Purchase Building & Pest Inspection' }}
                </td>
            </tr>
        </table>
    </div>

    <!-- Quotation Details Card -->
    <div class="info-card" style="background-color: #ffffff; border-left: 4px solid #05213F; border-radius: 6px; padding: 18px 20px; margin: 20px 0; border-top: 1px solid #e2e8f0; border-right: 1px solid #e2e8f0; border-bottom: 1px solid #e2e8f0; box-shadow: 0 2px 6px rgba(0,0,0,0.02);">
        <div class="info-card-header" style="font-size: 13px; font-weight: 800; color: #05213F; text-transform: uppercase; letter-spacing: 0.8px; margin-bottom: 12px; padding-bottom: 8px; border-bottom: 1px solid #e2e8f0;">
            Quotation Details
        </div>
        <table style="width: 100%; border-collapse: collapse;">
            <tr>
                <td class="label" style="padding: 8px 0; width: 38%; color: #64748b; font-weight: 700; font-size: 13.5px; border-bottom: 1px dashed #edf2f7;">
                    Quote Amount:
                </td>
                <td class="val" style="padding: 8px 0; color: #48A900; font-weight: 800; font-size: 16px; border-bottom: 1px dashed #edf2f7;">
                    {{ $quoteAmount ?? ($quote->quote_amount ?: 'Provided upon consultation / As discussed') }}
                </td>
            </tr>
            <tr>
                <td class="label" style="padding: 8px 0; color: #64748b; font-weight: 700; font-size: 13.5px; vertical-align: top;">
                    Additional Information:
                </td>
                <td class="val" style="padding: 8px 0; color: #05213F; font-size: 14px; line-height: 1.6; font-weight: normal; white-space: pre-line;">
                    {{ $quoteDescription ?? ($quote->quote_description ?: ($customMessage ?: 'Comprehensive Building & Pest Inspection report compliant with Australian Standards AS 4349.1 & AS 4349.3, delivered within 24 hours of inspection.')) }}
                </td>
            </tr>
        </table>
    </div>

    <p style="margin-top: 20px; margin-bottom: 12px; font-size: 14.5px; line-height: 1.65; color: #334155;">
        Please review the quotation and let us know if you would like to proceed with the inspection. If you have any questions or require further clarification, please feel free to contact our team.
    </p>

    <p style="margin-top: 14px; margin-bottom: 24px; font-size: 14.5px; line-height: 1.65; color: #334155;">
        Thank you for considering Premium Building &amp; Pest Inspections. We look forward to assisting you.
    </p>

    <!-- Sign-off Block -->
    <div style="border-top: 1px solid #e2e8f0; padding-top: 18px; margin-top: 24px; font-size: 13.5px; color: #475569; line-height: 1.6;">
        <strong style="color: #05213F; font-size: 14px;">Kind Regards,</strong><br>
        <span style="font-weight: 700; color: #05213F;">Premium Building &amp; Pest Inspections Team</span><br>
        Phone: <a href="tel:0466001551" style="color: #48A900; font-weight: 700; text-decoration: none;">0466 001 551</a><br>
        Email: <a href="mailto:info@premiumbuildinginspections.com.au" style="color: #05213F; text-decoration: underline;">info@premiumbuildinginspections.com.au</a><br>
        Website: <a href="https://premiumbuildinginspections.com.au/" style="color: #48A900; text-decoration: none; font-weight: 600;">https://premiumbuildinginspections.com.au/</a>
    </div>

    <!-- Direct Action Buttons -->
    <div class="email-cta-bar" style="margin-top: 24px; padding-top: 20px; border-top: 1px solid #e2e8f0; text-align: center;">
        <a href="tel:0466001551" class="email-btn-secondary" style="background-color: #05213F; color: #ffffff; padding: 11px 24px; font-size: 13px; font-weight: 700; text-decoration: none; border-radius: 4px; display: inline-block; margin: 4px 6px;">
            Call 0466 001 551
        </a>
        <a href="mailto:info@premiumbuildinginspections.com.au?subject={{ rawurlencode('Proceed with Quote #PBI-Q' . str_pad($quote->id, 4, '0', STR_PAD_LEFT) . ' - ' . $quote->name) }}" class="email-btn" style="background-color: #48A900; color: #ffffff; padding: 11px 24px; font-size: 13px; font-weight: 700; text-decoration: none; border-radius: 4px; display: inline-block; margin: 4px 6px;">
            Reply to Proceed
        </a>
    </div>
@endsection
