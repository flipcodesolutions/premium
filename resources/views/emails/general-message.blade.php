@extends('emails.layouts.default', ['title' => $subjectLine ?? 'Message from Premium Building & Pest Inspections'])

@section('content')
    @if(!str_starts_with(ltrim($messageContent ?? ''), 'Hello') && !str_starts_with(ltrim($messageContent ?? ''), 'Hi'))
        <div class="email-greeting">
            Hello {{ trim($recipientName ?? 'Valued Customer') }},
        </div>

        @if(!empty($introMessage))
            <p style="margin-top: 0; margin-bottom: 16px;">{{ $introMessage }}</p>
        @endif
    @endif

    <div class="message-box" style="white-space: pre-line; line-height: 1.65; color: #334155; font-size: 14px;">
{!! nl2br(e($messageContent)) !!}
    </div>

    @if(!empty($referenceDetails))
        <div class="info-card">
            <div class="info-card-header">Reference Information</div>
            <table>
                @foreach($referenceDetails as $lbl => $val)
                    <tr>
                        <td class="label">{{ $lbl }}:</td>
                        <td class="val">{{ $val }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    @endif

    <div class="highlight-callout">
        <p style="margin: 0; font-size: 13px; color: #05213F; line-height: 1.6;">
            If you have any further questions or require immediate inspection assistance, please contact our team directly at <a href="tel:0466001551" style="color: #48A900; font-weight: 700; text-decoration: none;">0466 001 551</a> or reply directly to this email.
        </p>
    </div>

    <div class="email-cta-bar">
        <a href="tel:0466001551" class="email-btn-secondary">Call 0466 001 551</a>
        <a href="https://premiumbuildinginspections.com.au/" class="email-btn">Visit Our Website</a>
    </div>
@endsection
