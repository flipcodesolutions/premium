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
            background-color: #f1f5f9;
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            color: #334155;
            -webkit-text-size-adjust: 100%;
        }
        .email-wrapper {
            width: 100%;
            background-color: #f1f5f9;
            padding: 30px 15px;
            box-sizing: border-box;
        }
        .email-container {
            max-width: 620px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 16px rgba(5, 33, 63, 0.08);
            border: 1px solid #e2e8f0;
        }
        .email-header {
            background-color: #05213F;
            padding: 26px 30px;
            text-align: center;
        }
        .email-header h1 {
            color: #ffffff;
            font-size: 20px;
            margin: 0;
            letter-spacing: 0.8px;
            font-weight: 800;
            text-transform: uppercase;
        }
        .email-header p {
            color: #48A900;
            font-size: 11.5px;
            margin: 6px 0 0;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            font-weight: 700;
        }
        .email-body {
            padding: 32px 30px;
            font-size: 14.5px;
            line-height: 1.7;
            color: #334155;
        }
        .email-greeting {
            font-size: 17px;
            font-weight: 700;
            color: #05213F;
            margin-bottom: 14px;
        }
        .info-card {
            background-color: #f8fafc;
            border-left: 4px solid #48A900;
            border-radius: 6px;
            padding: 18px 20px;
            margin: 22px 0;
            border-top: 1px solid #e2edf6;
            border-right: 1px solid #e2edf6;
            border-bottom: 1px solid #e2edf6;
        }
        .info-card-header {
            font-size: 12px;
            font-weight: 800;
            color: #05213F;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            margin-bottom: 12px;
            padding-bottom: 8px;
            border-bottom: 1px solid #e2e8f0;
        }
        .info-card table {
            width: 100%;
            border-collapse: collapse;
        }
        .info-card td {
            padding: 7px 0;
            font-size: 13.5px;
            vertical-align: top;
            border-bottom: 1px dashed #edf2f7;
        }
        .info-card tr:last-child td {
            border-bottom: none;
        }
        .info-card td.label {
            width: 38%;
            color: #64748b;
            font-weight: 600;
        }
        .info-card td.val {
            color: #05213F;
            font-weight: 700;
        }
        .status-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.3px;
        }
        .badge-pending { background-color: #fef3c7; color: #92400e; }
        .badge-confirmed { background-color: #dcfce7; color: #15803d; }
        .badge-completed { background-color: #dbeafe; color: #1e40af; }
        .badge-cancelled { background-color: #fee2e2; color: #991b1b; }
        .badge-contacted { background-color: #e0e7ff; color: #3730a3; }
        .badge-quoted { background-color: #dcfce7; color: #166534; }
        .badge-closed { background-color: #f1f5f9; color: #475569; }

        .steps-box {
            background-color: #f8fafc;
            border-radius: 6px;
            padding: 18px 20px;
            margin: 22px 0;
            border: 1px solid #e2e8f0;
        }
        .steps-box-title {
            margin: 0 0 10px 0;
            color: #05213F;
            font-size: 13.5px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .steps-list {
            margin: 0;
            padding-left: 20px;
            font-size: 13px;
            color: #475569;
            line-height: 1.7;
        }
        .steps-list li {
            margin-bottom: 6px;
        }
        .steps-list li:last-child {
            margin-bottom: 0;
        }

        .highlight-callout {
            background: #ffffff;
            border-left: 4px solid #05213F;
            padding: 14px 18px;
            margin: 20px 0;
            border-top: 1px solid #e2e8f0;
            border-right: 1px solid #e2e8f0;
            border-bottom: 1px solid #e2e8f0;
            border-radius: 0 6px 6px 0;
        }

        .trust-box {
            background: #fafbfc;
            border: 1px dashed #cbd5e1;
            border-radius: 6px;
            padding: 14px 18px;
            margin: 22px 0;
            font-size: 12.5px;
            color: #334155;
            line-height: 1.6;
        }

        .message-box {
            background-color: #ffffff;
            border: 1px solid #e2e8f0;
            padding: 16px 18px;
            margin: 18px 0;
            border-radius: 6px;
            font-size: 13.5px;
            line-height: 1.7;
            white-space: pre-line;
            color: #1e293b;
        }

        .email-cta-bar {
            margin-top: 28px;
            padding-top: 22px;
            border-top: 1px solid #e2e8f0;
            text-align: center;
        }
        .email-btn {
            display: inline-block;
            background-color: #48A900;
            color: #ffffff !important;
            padding: 12px 26px;
            font-size: 13px;
            font-weight: 700;
            text-decoration: none;
            border-radius: 4px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin: 4px 6px;
        }
        .email-btn-secondary {
            display: inline-block;
            background-color: #05213F;
            color: #ffffff !important;
            padding: 12px 26px;
            font-size: 13px;
            font-weight: 700;
            text-decoration: none;
            border-radius: 4px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin: 4px 6px;
        }

        .email-footer {
            background-color: #05213F;
            padding: 26px 30px;
            text-align: center;
            font-size: 12px;
            color: #94a3b8;
            line-height: 1.6;
        }
        .email-footer a {
            color: #48A900;
            text-decoration: none;
            font-weight: 600;
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
                <p>Licensed & Certified Inspection Experts &bull; Melbourne</p>
            </div>

            <!-- Body -->
            <div class="email-body">
                @yield('content')
            </div>

            <!-- Footer -->
            <div class="email-footer">
                <p style="color: #ffffff; font-weight: 700; font-size: 14px; margin-bottom: 4px;">Premium Building & Pest Inspections</p>
                <p style="color: #94a3b8; font-size: 11px; margin-bottom: 12px;">
                    VBA Inspector Licence: <strong>IN-PS 74654</strong> &bull; Registered Domestic Builder: <strong>DB-L 100200</strong>
                </p>
                <p>Phone: <a href="tel:0466001551">0466 001 551</a> &bull; Email: <a href="mailto:info@premiumbuildinginspections.com.au">info@premiumbuildinginspections.com.au</a></p>
                <p>Website: <a href="https://premiumbuildinginspections.com.au/">https://premiumbuildinginspections.com.au/</a></p>
                <p style="margin-top: 14px; font-size: 11px; color: #64748b;">
                    &copy; {{ date('Y') }} Premium Building & Pest Inspections. All rights reserved.
                </p>
            </div>
        </div>
    </div>
</body>
</html>
