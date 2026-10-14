<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inspection Agreement - {{ $agreement->reference_code }} - {{ $agreement->name }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            color: #1e293b;
            background: #f8fafc;
            padding: 30px;
        }

        .print-sheet {
            max-width: 850px;
            margin: 0 auto;
            background: #ffffff;
            padding: 40px 45px;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        .company-brand-title {
            font-size: 1.35rem;
            font-weight: 800;
            color: #0b1f3a;
            margin-bottom: 2px;
            letter-spacing: -0.5px;
        }

        .doc-title-badge {
            font-size: 0.8rem;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            padding: 4px 10px;
            background: #0b1f3a;
            color: #fff;
            border-radius: 4px;
            display: inline-block;
        }

        .section-header {
            font-size: 0.95rem;
            font-weight: 700;
            color: #0b1f3a;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 2px solid #e2e8f0;
            padding-bottom: 6px;
            margin-bottom: 14px;
            margin-top: 24px;
        }

        .detail-row {
            display: flex;
            margin-bottom: 8px;
            font-size: 0.9rem;
        }

        .detail-label {
            width: 180px;
            color: #64748b;
            font-weight: 500;
            flex-shrink: 0;
        }

        .detail-value {
            font-weight: 600;
            color: #0f172a;
        }

        .legal-box {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            padding: 16px 20px;
            font-size: 0.82rem;
            line-height: 1.55;
            color: #475569;
            margin-top: 15px;
        }

        .acceptance-seal {
            border: 2px dashed #10b981;
            background: #ecfdf5;
            border-radius: 8px;
            padding: 16px 20px;
            margin-top: 25px;
        }

        @media print {
            body {
                background: #ffffff;
                padding: 0;
            }
            .print-sheet {
                border: none;
                box-shadow: none;
                padding: 15px;
                max-width: 100%;
            }
            .no-print {
                display: none !important;
            }
        }
    </style>
</head>
<body>

    <div class="no-print text-center mb-4">
        <button onclick="window.print()" class="btn btn-primary px-4 fw-semibold me-2">
            Print Document
        </button>
        <button onclick="window.close()" class="btn btn-outline-secondary px-3">
            Close
        </button>
    </div>

    <div class="print-sheet">
        <!-- Document Header -->
        <div class="d-flex justify-content-between align-items-start border-bottom pb-3 mb-3">
            <div>
                <div class="company-brand-title">PREMIUM BUILDING &amp; PEST INSPECTIONS</div>
                <div class="text-muted small">Melbourne &amp; Regional Victoria &bull; Licensed &amp; Insured Building Inspectors</div>
                <div class="text-muted small">Website: {{ url('/') }}</div>
            </div>
            <div class="text-end">
                <span class="doc-title-badge">PRE-ENGAGEMENT AGREEMENT</span>
                <div class="fw-bold mt-2 text-dark">{{ $agreement->reference_code }}</div>
                <div class="text-muted small">Date: {{ $agreement->accepted_at ? $agreement->accepted_at->format('d/m/Y') : $agreement->created_at->format('d/m/Y') }}</div>
            </div>
        </div>

        <!-- Compliance Banner -->
        <div class="alert alert-light border py-2 px-3 small text-muted mb-3">
            <strong>Compliance Standard:</strong> Conducted in accordance with Australian Standards <strong>AS 4349.1-2007</strong> (Inspection of Buildings) and <strong>AS 4349.3-2010</strong> (Timber Pest Inspections).
        </div>

        <!-- Client & Property Details -->
        <div class="row g-4">
            <div class="col-6">
                <div class="section-header">Client Information</div>
                <div class="detail-row">
                    <span class="detail-label">Client Name:</span>
                    <span class="detail-value">{{ $agreement->name }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Telephone:</span>
                    <span class="detail-value">{{ $agreement->phone }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Email:</span>
                    <span class="detail-value">{{ $agreement->email ?: 'N/A' }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Agent Mobile:</span>
                    <span class="detail-value">{{ $agreement->agent_mobile ?: 'N/A' }}</span>
                </div>
            </div>

            <div class="col-6">
                <div class="section-header">Property Details</div>
                <div class="detail-row">
                    <span class="detail-label">Property Address:</span>
                    <span class="detail-value">{{ $agreement->property_address }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Inspection Type:</span>
                    <span class="detail-value">{{ $agreement->service_type }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Status:</span>
                    <span class="detail-value text-uppercase text-success">{{ $agreement->status }}</span>
                </div>
                @if($agreement->booking_id)
                    <div class="detail-row">
                        <span class="detail-label">Booking Ref:</span>
                        <span class="detail-value">#{{ $agreement->booking_id }}</span>
                    </div>
                @endif
            </div>
        </div>

        <!-- Scope & Limitations -->
        <div class="section-header">Scope &amp; Limitations Summary</div>
        <div class="legal-box">
            <p class="mb-2"><strong>1. Building Inspection (AS 4349.1-2007):</strong> The inspection provides advice to prospective purchasers regarding the visual condition of accessible building elements at the time of inspection. Major defects and safety hazards are individually identified, along with general comments on maintenance items.</p>
            <p class="mb-2"><strong>2. Timber Pest Inspection (AS 4349.3-2010):</strong> The timber pest inspection provides visual detection of timber pest activity and damage including subterranean termites, dampwood termites, borers of seasoned timber, and fungal decay.</p>
            <p class="mb-0"><strong>3. Limitations:</strong> The inspection is visual and non-invasive. Areas with restricted or denied safe reasonable access are excluded. No invasive testing, dismantling or cutting of fixtures, walls, or coverings is undertaken.</p>
        </div>

        <!-- Digital Acceptance Certificate Seal -->
        <div class="acceptance-seal">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <h6 class="fw-bold text-success mb-1">
                        ✓ DIGITALLY ACCEPTED &amp; EXECUTED
                    </h6>
                    <div class="small text-dark">
                        Signed electronically by: <strong>{{ $agreement->name }}</strong>
                    </div>
                    <div class="small text-muted">
                        Accepted Timestamp: {{ $agreement->accepted_at ? $agreement->accepted_at->format('l, d F Y - h:i:s A T') : $agreement->created_at->format('l, d F Y - h:i:s A T') }}
                    </div>
                </div>
                <div class="text-end small text-muted font-monospace">
                    <div>IP: {{ $agreement->ip_address ?? 'Recorded' }}</div>
                    <div>Ref: {{ $agreement->reference_code }}</div>
                </div>
            </div>
        </div>

        <!-- Document Footer -->
        <div class="text-center text-muted small mt-4 pt-3 border-top">
            This document confirms the pre-engagement acceptance required by Australian Standards AS 4349.1-2007 &amp; AS 4349.3-2010 before commencing building and timber pest inspections.
        </div>
    </div>

</body>
</html>
