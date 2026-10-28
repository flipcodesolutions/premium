<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inspection Report - PBI-REP-{{ str_pad($booking->id, 5, '0', STR_PAD_LEFT) }} - {{ $booking->name }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --brand-navy: #063464;
            --brand-dark: #031e3b;
            --brand-green: #499B08;
            --brand-green-dark: #387c06;
            --brand-gray: #f8fafc;
            --border-color: #e2e8f0;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            color: #1e293b;
            background: #f1f5f9;
            padding: 30px 15px 50px;
            margin: 0;
        }

        /* Top Action Bar */
        .report-actions-bar {
            max-width: 900px;
            margin: 0 auto 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
        }

        .report-sheet {
            max-width: 900px;
            margin: 0 auto;
            background: #ffffff;
            padding: 45px 50px;
            border: 1px solid var(--border-color);
            border-radius: 10px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.07);
        }

        /* Header */
        .report-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            border-bottom: 2px solid var(--border-color);
            padding-bottom: 24px;
            margin-bottom: 24px;
            gap: 20px;
        }

        .company-logo {
            height: 70px;
            width: auto;
            object-fit: contain;
            display: block;
            margin-bottom: 12px;
        }

        .company-title {
            font-size: 1.35rem;
            font-weight: 800;
            color: var(--brand-navy);
            margin: 0 0 4px;
            letter-spacing: -0.3px;
        }

        .company-meta {
            font-size: 0.84rem;
            color: #64748b;
            line-height: 1.5;
            margin: 0;
        }

        .doc-badge-card {
            text-align: right;
            background: #f8fafc;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 14px 18px;
            min-width: 240px;
        }

        .doc-type-badge {
            display: inline-block;
            background: var(--brand-navy);
            color: #fff;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            padding: 4px 10px;
            border-radius: 4px;
            margin-bottom: 8px;
        }

        .doc-ref-number {
            font-size: 1.1rem;
            font-weight: 800;
            color: var(--brand-dark);
            margin-bottom: 3px;
            font-family: monospace;
        }

        .doc-date {
            font-size: 0.82rem;
            color: #64748b;
        }

        .compliance-pill {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #ecfdf5;
            color: #065f46;
            border: 1px solid #a7f3d0;
            font-size: 0.76rem;
            font-weight: 700;
            padding: 4px 10px;
            border-radius: 20px;
            margin-top: 6px;
        }

        /* Section Headings */
        .report-section-title {
            font-size: 0.95rem;
            font-weight: 800;
            color: var(--brand-navy);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 2px solid #e2e8f0;
            padding-bottom: 6px;
            margin-top: 26px;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .report-section-title i {
            color: var(--brand-green);
            font-size: 1.1rem;
        }

        /* Tables & Grids */
        .info-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 20px;
        }

        .info-table th {
            width: 28%;
            background: #f8fafc;
            color: #475569;
            font-size: 0.85rem;
            font-weight: 600;
            padding: 10px 16px;
            border-bottom: 1px solid var(--border-color);
            border-right: 1px solid var(--border-color);
        }

        .info-table td {
            background: #ffffff;
            color: #0f172a;
            font-size: 0.88rem;
            font-weight: 600;
            padding: 10px 16px;
            border-bottom: 1px solid var(--border-color);
        }

        .info-table tr:last-child th,
        .info-table tr:last-child td {
            border-bottom: none;
        }

        /* Scope Checklist */
        .scope-checklist-table {
            width: 100%;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            overflow: hidden;
            border-collapse: collapse;
            font-size: 0.85rem;
            margin-bottom: 20px;
        }

        .scope-checklist-table th {
            background: #f8fafc;
            color: #334155;
            font-weight: 700;
            padding: 10px 14px;
            border-bottom: 1px solid var(--border-color);
        }

        .scope-checklist-table td {
            padding: 9px 14px;
            border-bottom: 1px solid var(--border-color);
            color: #1e293b;
        }

        .scope-checklist-table tr:last-child td {
            border-bottom: none;
        }

        .badge-verified {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            background: #ecfdf5;
            color: #065f46;
            border: 1px solid #a7f3d0;
            padding: 3px 8px;
            border-radius: 4px;
            font-size: 0.75rem;
            font-weight: 700;
        }

        /* Assessment Box */
        .assessment-card {
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            border-radius: 8px;
            padding: 18px 22px;
            margin-bottom: 22px;
        }

        .assessment-card h6 {
            color: #166534;
            font-weight: 800;
            font-size: 0.95rem;
            margin-bottom: 6px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .assessment-card p {
            color: #14532d;
            font-size: 0.86rem;
            line-height: 1.6;
            margin: 0;
        }

        /* Sign-off Seal */
        .certification-seal {
            border: 2px dashed #10b981;
            background: #fafffc;
            border-radius: 8px;
            padding: 22px 26px;
            margin-top: 26px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            flex-wrap: wrap;
        }

        .cert-statement {
            flex: 1;
            min-width: 280px;
        }

        .cert-statement h6 {
            font-size: 0.95rem;
            font-weight: 800;
            color: var(--brand-dark);
            margin-bottom: 6px;
        }

        .cert-statement p {
            font-size: 0.82rem;
            color: #475569;
            line-height: 1.55;
            margin: 0;
        }

        .cert-signature-box {
            text-align: center;
            min-width: 220px;
            padding: 12px 18px;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
        }

        .cert-stamp {
            display: inline-block;
            border: 2px solid var(--brand-green);
            color: var(--brand-green);
            padding: 4px 12px;
            font-weight: 800;
            font-size: 0.78rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-radius: 4px;
            margin-bottom: 8px;
            transform: rotate(-2deg);
        }

        .cert-inspector-name {
            font-weight: 800;
            color: var(--brand-dark);
            font-size: 0.95rem;
            margin-bottom: 2px;
        }

        .cert-inspector-role {
            font-size: 0.78rem;
            color: #64748b;
            font-weight: 600;
        }

        /* Disclaimer */
        .disclaimer-text {
            font-size: 0.74rem;
            color: #94a3b8;
            line-height: 1.5;
            margin-top: 24px;
            border-top: 1px solid var(--border-color);
            padding-top: 14px;
        }

        /* Buttons */
        .btn-brand-green {
            background: var(--brand-green);
            border-color: var(--brand-green);
            color: #fff;
            font-weight: 700;
        }

        .btn-brand-green:hover {
            background: var(--brand-green-dark);
            border-color: var(--brand-green-dark);
            color: #fff;
        }

        /* Print Media Styles */
        @media print {
            body {
                background: #ffffff !important;
                padding: 0 !important;
                margin: 0 !important;
            }

            .report-actions-bar {
                display: none !important;
            }

            .report-sheet {
                box-shadow: none !important;
                border: none !important;
                padding: 0 !important;
                max-width: 100% !important;
            }

            a {
                text-decoration: none !important;
                color: inherit !important;
            }

            @page {
                size: A4;
                margin: 14mm 16mm;
            }
        }
    </style>
</head>
<body>

    <!-- On-screen Action Toolbar -->
    <div class="report-actions-bar">
        <div class="d-flex align-items-center gap-2">
            <a href="{{ route('admin.bookings.show', $booking->id) }}" class="btn btn-sm btn-outline-secondary">
                <i class="bi bi-arrow-left me-1"></i> Back to Booking Details
            </a>
            <span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-1">
                <i class="bi bi-check-circle-fill me-1"></i> Status: Completed
            </span>
        </div>

        <div class="d-flex align-items-center gap-2">
            @if($booking->email)
                <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#emailReportModal">
                    <i class="bi bi-envelope-paper me-1"></i> Email to Client
                </button>
            @endif

            <button type="button" class="btn btn-sm btn-brand-green" onclick="window.print();">
                <i class="bi bi-printer me-1"></i> Print / Save as PDF
            </button>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show max-w-900 mx-auto mb-3" style="max-width: 900px;" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Printable Report Sheet -->
    <div class="report-sheet">

        <!-- Header -->
        <div class="report-header">
            <div>
                <img
                    src="{{ asset('images/logo.png') }}"
                    alt="Premium Building & Pest Inspections"
                    class="company-logo"
                >
                <h1 class="company-title">Premium Building &amp; Pest Inspections</h1>
                <p class="company-meta">
                    <strong>Licensed Building Inspector:</strong> Ronak Gami<br>
                    <strong>Office:</strong> 37 Burlina Boulevard, Clyde North VIC 3978, Australia<br>
                    <strong>Phone:</strong> 0466 001 551 &nbsp;|&nbsp; <strong>Email:</strong> info@premiumbuildinginspections.com.au<br>
                    <strong>Web:</strong> premiumbuildinginspections.com.au
                </p>
            </div>

            <div class="doc-badge-card">
                <span class="doc-type-badge">Inspection Certificate</span>
                <div class="doc-ref-number">PBI-REP-{{ str_pad($booking->id, 5, '0', STR_PAD_LEFT) }}</div>
                <div class="doc-date">Issue Date: {{ now()->format('d M Y') }}</div>
                <div class="compliance-pill">
                    <i class="bi bi-shield-check"></i> AS 4349.1 &amp; AS 4349.3
                </div>
            </div>
        </div>

        <!-- Section 1: Client & Property Details -->
        <div class="report-section-title">
            <i class="bi bi-file-earmark-person"></i> 1. Client &amp; Property Information
        </div>

        <table class="info-table">
            <tr>
                <th>Client Name</th>
                <td>{{ $booking->name }}</td>
            </tr>
            <tr>
                <th>Contact Phone</th>
                <td>{{ $booking->phone }}</td>
            </tr>
            @if($booking->email)
            <tr>
                <th>Contact Email</th>
                <td>{{ $booking->email }}</td>
            </tr>
            @endif
            <tr>
                <th>Inspected Property</th>
                <td class="text-primary fw-bold">{{ $booking->property_address }}</td>
            </tr>
            <tr>
                <th>Inspection Service</th>
                <td>{{ $booking->service_type }}</td>
            </tr>
            <tr>
                <th>Date of Inspection</th>
                <td>
                    {{ $booking->inspection_date ? \Carbon\Carbon::parse($booking->inspection_date)->format('l, d F Y') : now()->format('l, d F Y') }}
                    @if($booking->inspection_time)
                        at {{ $booking->inspection_time }}
                    @endif
                </td>
            </tr>
            <tr>
                <th>Pre-Engagement Agreement</th>
                <td>
                    @if($booking->agreement)
                        <span class="text-success fw-bold">Signed &amp; Accepted (Ref #{{ $booking->agreement->reference_code }})</span>
                    @else
                        <span>Verified Standard Terms of Inspection</span>
                    @endif
                </td>
            </tr>
            <tr>
                <th>Inspection Status</th>
                <td>
                    <span class="badge-verified">
                        <i class="bi bi-patch-check-fill"></i> Completed &amp; Certified
                    </span>
                </td>
            </tr>
        </table>

        <!-- Section 2: Scope of Inspection & Checklist -->
        <div class="report-section-title">
            <i class="bi bi-clipboard2-check"></i> 2. Scope of Works &amp; Inspection Assessment Areas
        </div>

        <p class="text-muted small mb-2">
            The visual inspection was executed in compliance with Australian Standards <strong>AS 4349.1-2010</strong> (Pre-Purchase Inspections of Residential Buildings) and <strong>AS 4349.3-2010</strong> (Timber Pest Inspections).
        </p>

        <table class="scope-checklist-table">
            <thead>
                <tr>
                    <th style="width: 5%;">#</th>
                    <th style="width: 45%;">Inspection Area / Zone</th>
                    <th style="width: 30%;">Scope Details</th>
                    <th style="width: 20%; text-align: center;">Outcome</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td><strong>Internal Living Areas &amp; Rooms</strong></td>
                    <td>Walls, ceilings, timber floors, joinery, doors, windows &amp; architraves</td>
                    <td class="text-center"><span class="badge-verified"><i class="bi bi-check-circle"></i> Inspected</span></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td><strong>External Building Envelope</strong></td>
                    <td>Brickwork, cladding, mortar joints, flashings, lintels, eaves &amp; fascias</td>
                    <td class="text-center"><span class="badge-verified"><i class="bi bi-check-circle"></i> Inspected</span></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td><strong>Roof Exterior &amp; Stormwater Drainage</strong></td>
                    <td>Roof tiles / metal sheets, flashings, valleys, ridge caps, gutters &amp; downpipes</td>
                    <td class="text-center"><span class="badge-verified"><i class="bi bi-check-circle"></i> Inspected</span></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td><strong>Roof Space &amp; Framing Void</strong></td>
                    <td>Structural roof trusses, rafters, ceiling joists, sarking, insulation &amp; party walls</td>
                    <td class="text-center"><span class="badge-verified"><i class="bi bi-check-circle"></i> Inspected</span></td>
                </tr>
                <tr>
                    <td>5</td>
                    <td><strong>Subfloor &amp; Foundation Systems</strong></td>
                    <td>Concrete slab / stumps, bearers, joists, ventilation, damp course, ant caps</td>
                    <td class="text-center"><span class="badge-verified"><i class="bi bi-check-circle"></i> Inspected</span></td>
                </tr>
                <tr>
                    <td>6</td>
                    <td><strong>Wet Areas &amp; Plumbing Fixtures</strong></td>
                    <td>Bathrooms, ensuite, kitchen, laundry, tapware, waste outlets, moisture checks</td>
                    <td class="text-center"><span class="badge-verified"><i class="bi bi-check-circle"></i> Inspected</span></td>
                </tr>
                <tr>
                    <td>7</td>
                    <td><strong>Timber Pest &amp; Termite Evaluation</strong></td>
                    <td>Visual scan for subterranean termites, active borer damage &amp; fungal wood decay</td>
                    <td class="text-center"><span class="badge-verified"><i class="bi bi-check-circle"></i> Inspected</span></td>
                </tr>
                <tr>
                    <td>8</td>
                    <td><strong>Site, Drainage Fall &amp; Outbuildings</strong></td>
                    <td>Driveway, pathways, surface grading, boundary fencing, retaining walls &amp; patio</td>
                    <td class="text-center"><span class="badge-verified"><i class="bi bi-check-circle"></i> Inspected</span></td>
                </tr>
            </tbody>
        </table>

        <!-- Section 3: Summary of Findings -->
        <div class="report-section-title">
            <i class="bi bi-chat-square-text"></i> 3. Inspection Assessment &amp; Summary Findings
        </div>

        <div class="assessment-card">
            <h6><i class="bi bi-check2-circle"></i> Overall Inspection Assessment: COMPLETED IN FULL</h6>
            <p>
                @if(!empty($booking->message))
                    <strong>Client Instructions &amp; Recorded Notes:</strong><br>
                    {{ $booking->message }}<br><br>
                @endif
                The visual assessment for <strong>{{ $booking->property_address }}</strong> was conducted under standard inspection conditions in accordance with Victorian Building Regulations and Australian Standards. All accessible elements within the agreed scope have been visually appraised, verified, and noted in our official inspection records.
            </p>
        </div>

        <!-- Section 4: Certification & Inspector Sign-off -->
        <div class="certification-seal">
            <div class="cert-statement">
                <h6>Official Inspector Declaration</h6>
                <p>
                    I, <strong>Ronak Gami</strong>, certify that I have conducted this building and pest inspection for the property specified above in an objective, professional, and compliant manner in accordance with Australian Standards <strong>AS 4349.1</strong> and <strong>AS 4349.3</strong>.
                </p>
            </div>

            <div class="cert-signature-box">
                <div class="cert-stamp">Verified &amp; Certified</div>
                <div class="cert-inspector-name">Ronak Gami</div>
                <div class="cert-inspector-role">Licensed Building Inspector</div>
                <div class="small text-muted mt-1">Date: {{ now()->format('d M Y') }}</div>
            </div>
        </div>

        <!-- Footer Disclaimer -->
        <div class="disclaimer-text">
            <strong>NOTICE &amp; LIMITATIONS:</strong> This inspection completion certificate is a visual report carried out in accordance with Australian Standard AS 4349.1-2010 and AS 4349.3-2010. It is based on visible and readily accessible areas at the time of inspection only. It is not an invasive or destructive test, nor a warranty against future defects. Premium Building &amp; Pest Inspections accepts no liability for concealed, inaccessible, or latent building components. All intellectual property and report data remain under the ownership of Premium Building &amp; Pest Inspections.
        </div>

    </div>

    @if($booking->email)
    <!-- Email Report Modal -->
    <div class="modal fade" id="emailReportModal" tabindex="-1" aria-labelledby="emailReportModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ route('admin.bookings.email-report', $booking->id) }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title d-flex align-items-center gap-2" id="emailReportModalLabel">
                            <i class="bi bi-envelope-check text-success"></i>
                            <span>Email Report to {{ $booking->name }}</span>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                        <div class="alert alert-info py-2 px-3 mb-3 small">
                            Recipient: <strong>{{ $booking->email }}</strong><br>
                            Report Ref: <strong>PBI-REP-{{ str_pad($booking->id, 5, '0', STR_PAD_LEFT) }}</strong>
                        </div>

                        <div class="mb-3">
                            <label for="reportNotes" class="form-label fw-bold small text-dark">Additional Notes for Client (Optional)</label>
                            <textarea class="form-control" id="reportNotes" name="notes" rows="4" placeholder="Enter any extra notes or recommendations for the client..."></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-sm btn-brand-green">
                            <i class="bi bi-send-fill me-1"></i> Send Report Now
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
