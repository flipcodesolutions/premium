@extends('emails.layouts.default', ['title' => 'Reset Your Password - Premium Building & Pest Inspections'])

@section('content')
    <div class="email-greeting">
        Hello {{ $user->name }},
    </div>

    <p>
        You are receiving this email because we received a password reset request for your administrator account on the <strong>Premium Building &amp; Pest Inspections</strong> portal.
    </p>

    <div class="info-card">
        <table>
            <tr>
                <td class="label">Admin Account:</td>
                <td class="val"><strong>{{ $user->email }}</strong></td>
            </tr>
            <tr>
                <td class="label">Link Validity:</td>
                <td class="val"><span style="color: #d97706; font-weight: 600;">60 Minutes</span></td>
            </tr>
            <tr>
                <td class="label">Request Status:</td>
                <td class="val"><span style="color: #16a34a; font-weight: 600;">Active &amp; Ready</span></td>
            </tr>
        </table>
    </div>

    <p style="text-align: center; margin: 30px 0;">
        <a href="{{ $resetUrl }}" style="display: inline-block; background: #499B08; color: #ffffff; text-decoration: none; padding: 13px 32px; border-radius: 6px; font-weight: 700; font-size: 14px; letter-spacing: 0.5px; text-transform: uppercase; box-shadow: 0 4px 12px rgba(73, 155, 8, 0.3);">
            Reset My Password
        </a>
    </p>

    <p style="font-size: 13px; color: #64748b; line-height: 1.5;">
        If you are having trouble clicking the "Reset My Password" button, copy and paste the URL below into your web browser:
    </p>

    <p style="word-break: break-all; font-size: 12px; background: #f1f5f9; padding: 10px 14px; border-radius: 4px; color: #063464;">
        <a href="{{ $resetUrl }}" style="color: #063464; text-decoration: underline;">{{ $resetUrl }}</a>
    </p>

    <hr style="border: none; border-top: 1px solid #e2e8f0; margin: 26px 0;">

    <p style="font-size: 12px; color: #94a3b8; line-height: 1.4; margin: 0;">
        🔒 <strong>Security Notice:</strong> If you did not request a password reset, no further action is required. Your account credentials remain completely secure.
    </p>
@endsection
