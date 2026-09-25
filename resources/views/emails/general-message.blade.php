@extends('emails.layouts.default', ['title' => $subjectLine ?? 'Message from Premium Building & Pest Inspections'])

@section('content')
    <div class="email-greeting">
        Hello {{ $recipientName ?? 'Valued Customer' }},
    </div>

    @if(!empty($introMessage))
        <p>{{ $introMessage }}</p>
    @endif

    <div class="message-box">
{{ $messageContent }}
    </div>

    @if(!empty($referenceDetails))
        <div class="info-card">
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

    <p style="margin-top: 20px;">
        If you have any further questions, please do not hesitate to contact our friendly team at <strong>0468 444 786</strong> or reply directly to this email.
    </p>

    <div class="email-cta-bar">
        <a href="{{ url('/') }}" class="email-btn">Visit Our Website</a>
    </div>
@endsection
