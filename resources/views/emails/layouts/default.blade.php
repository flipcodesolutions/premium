<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Premium Building & Pest Inspections' }}</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f4f7fa;
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            color: #334155;
            -webkit-text-size-adjust: 100%;
        }
        .email-wrapper {
            width: 100%;
            background-color: #f4f7fa;
            padding: 30px 15px;
            box-sizing: border-box;
        }
        .email-container {
            max-width: 620px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.06);
            border: 1px solid #e2e8f0;
        }
        .email-header {
            background-color: #0B1F3A;
            padding: 28px 30px;
            text-align: center;
        }
        .email-header h1 {
            color: #ffffff;
            font-size: 20px;
            margin: 0;
            letter-spacing: 1px;
            font-weight: 700;
        }
        .email-header p {
            color: #48A900;
            font-size: 11px;
            margin: 5px 0 0;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            font-weight: 700;
        }
        .email-body {
            padding: 32px 30px;
            font-size: 14px;
            line-height: 1.65;
            color: #334155;
        }
        .email-greeting {
            font-size: 16px;
            font-weight: 700;
            color: #0B1F3A;
            margin-bottom: 16px;
        }
        .info-card {
            background-color: #f8fafc;
            border-left: 4px solid #48A900;
            padding: 16px 20px;
            margin: 20px 0;
            border-radius: 4px;
        }
        .info-card table {
            width: 100%;
            border-collapse: collapse;
        }
        .info-card td {
            padding: 6px 0;
            font-size: 13px;
            vertical-align: top;
        }
        .info-card td.label {
            width: 38%;
            color: #64748b;
            font-weight: 600;
        }
        .info-card td.val {
            color: #0B1F3A;
            font-weight: 700;
        }
        .status-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .badge-pending { background-color: #fef3c7; color: #b45309; }
        .badge-confirmed { background-color: #d1fae5; color: #047857; }
        .badge-completed { background-color: #dbeafe; color: #1d4ed8; }
        .badge-cancelled { background-color: #fee2e2; color: #b91c1c; }
        .badge-contacted { background-color: #e0e7ff; color: #4338ca; }
        .badge-quoted { background-color: #dcfce7; color: #15803d; }
        .badge-closed { background-color: #f3f4f6; color: #4b5563; }

        .message-box {
            background-color: #ffffff;
            border: 1px solid #e2e8f0;
            padding: 18px;
            margin: 20px 0;
            border-radius: 6px;
            font-size: 13.5px;
            line-height: 1.7;
            white-space: pre-line;
            color: #1e293b;
        }
        .email-cta-bar {
            margin-top: 28px;
            padding-top: 20px;
            border-top: 1px solid #e2e8f0;
            text-align: center;
        }
        .email-btn {
            display: inline-block;
            background-color: #48A900;
            color: #ffffff !important;
            padding: 12px 28px;
            font-size: 13px;
            font-weight: 700;
            text-decoration: none;
            border-radius: 4px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .email-footer {
            background-color: #0B1F3A;
            padding: 24px 30px;
            text-align: center;
            font-size: 12px;
            color: #94a3b8;
            line-height: 1.6;
        }
        .email-footer a {
            color: #48A900;
            text-decoration: none;
        }
        .email-footer p {
            margin: 4px 0;
        }
    </style>
</head>
<body>
    <div class="email-wrapper">
        <div class="email-container">
            <!-- Header -->
            <div class="email-header">
                <h1>PREMIUM BUILDING & PEST INSPECTIONS</h1>
                <p>Licensed & Certified Inspection Experts</p>
            </div>

            <!-- Body -->
            <div class="email-body">
                @yield('content')
            </div>

            <!-- Footer -->
            <div class="email-footer">
                <p style="color: #ffffff; font-weight: 700;">Premium Building & Pest Inspections</p>
                <p>Phone: <a href="tel:0466001551">0466 001 551</a> &bull; Email: <a href="mailto:info@premiumbuildinginspections.com.au">info@premiumbuildinginspections.com.au</a></p>
                <p>Website: <a href="{{ url('/') }}">{{ url('/') }}</a></p>
                <p style="margin-top: 12px; font-size: 11px; color: #64748b;">
                    &copy; {{ date('Y') }} Premium Building & Pest Inspections. All rights reserved.
                </p>
            </div>
        </div>
    </div>
</body>
</html>
