@extends('admin.layouts.app')

@section('title', 'Agreement ' . $agreement->reference_code . ' - ' . $agreement->name)
@section('page_title', 'Inspection Agreement Details')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-10">
        <!-- Top Navigation Bar -->
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-3">
            <a href="{{ route('admin.agreements.index') }}" class="btn btn-sm btn-outline-secondary">
                <i class="bi bi-arrow-left me-1"></i> Back to Agreements
            </a>
            <div class="d-flex flex-wrap gap-2">
                <a href="{{ route('admin.agreements.print', $agreement->id) }}" target="_blank" class="btn btn-sm btn-outline-secondary">
                    <i class="bi bi-printer me-1"></i> Print / Save PDF
                </a>
                @if($agreement->email)
                    <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#emailModal">
                        <i class="bi bi-envelope me-1"></i> Email Client
                    </button>
                @endif
                <form action="{{ route('admin.agreements.destroy', $agreement->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to permanently delete this agreement record?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-outline-danger">
                        <i class="bi bi-trash me-1"></i> Delete
                    </button>
                </form>
            </div>
        </div>

        <div class="card-custom">
            <!-- Header -->
            <div class="card-custom-header">
                <div>
                    <h5 class="d-flex align-items-center gap-2 mb-1">
                        <i class="bi bi-shield-check text-success"></i>
                        <span>Pre-Engagement Agreement: {{ $agreement->reference_code }}</span>
                        @if($agreement->status === 'accepted')
                            <span class="status-badge status-confirmed">Accepted</span>
                        @elseif($agreement->status === 'confirmed')
                            <span class="status-badge status-active">Confirmed</span>
                        @elseif($agreement->status === 'completed')
                            <span class="status-badge status-completed">Completed</span>
                        @elseif($agreement->status === 'cancelled')
                            <span class="status-badge status-cancelled">Cancelled</span>
                        @else
                            <span class="status-badge status-pending">{{ ucfirst($agreement->status) }}</span>
                        @endif
                    </h5>
                    <small class="text-muted">
                        Accepted by client on {{ $agreement->accepted_at ? $agreement->accepted_at->format('d M Y, h:i A') : $agreement->created_at->format('d M Y, h:i A') }}
                        ({{ ($agreement->accepted_at ?? $agreement->created_at)->diffForHumans() }})
                    </small>
                </div>
            </div>

            <div class="p-4">
                <!-- Status Update Bar -->
                <div class="p-3 mb-4 rounded border bg-light">
                    <form action="{{ route('admin.agreements.update-status', $agreement->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="row g-3 align-items-end">
                            <div class="col-md-3">
                                <label class="form-label small fw-semibold text-dark mb-1">Agreement Status:</label>
                                <select name="status" class="form-select form-select-sm">
                                    <option value="accepted" {{ $agreement->status === 'accepted' ? 'selected' : '' }}>Accepted</option>
                                    <option value="confirmed" {{ $agreement->status === 'confirmed' ? 'selected' : '' }}>Confirmed Schedule</option>
                                    <option value="completed" {{ $agreement->status === 'completed' ? 'selected' : '' }}>Inspection Completed</option>
                                    <option value="cancelled" {{ $agreement->status === 'cancelled' ? 'selected' : '' }}>Cancelled / Void</option>
                                </select>
                            </div>
                            <div class="col-md-5">
                                <label class="form-label small fw-semibold text-dark mb-1">Admin Notes:</label>
                                <input type="text" name="notes" class="form-control form-control-sm" placeholder="Add administrative note or update info..." value="{{ $agreement->notes }}">
                            </div>
                            <div class="col-md-2">
                                @if($agreement->email)
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" name="notify_customer" id="notifyAgreement" value="1">
                                        <label class="form-check-label small text-dark fw-semibold" for="notifyAgreement">
                                            Email Client
                                        </label>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-2 text-end">
                                <button type="submit" class="btn btn-sm btn-navy w-100">
                                    Update Status
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="row g-4 mb-4">
                    <!-- Client Details Card -->
                    <div class="col-md-6">
                        <div class="p-3 rounded border h-100 bg-white">
                            <h6 class="fw-bold text-dark border-bottom pb-2 mb-3">
                                <i class="bi bi-person-check-fill me-1 text-primary"></i> Client Information
                            </h6>
                            <dl class="row mb-0 small">
                                <dt class="col-sm-4 text-muted">First Name:</dt>
                                <dd class="col-sm-8 fw-semibold text-dark">{{ $agreement->first_name }}</dd>

                                <dt class="col-sm-4 text-muted">Last Name:</dt>
                                <dd class="col-sm-8 fw-semibold text-dark">{{ $agreement->last_name }}</dd>

                                <dt class="col-sm-4 text-muted">Full Name:</dt>
                                <dd class="col-sm-8 fw-bold text-dark">{{ $agreement->name }}</dd>

                                <dt class="col-sm-4 text-muted">Phone:</dt>
                                <dd class="col-sm-8">
                                    <a href="tel:{{ $agreement->phone }}" class="text-decoration-none fw-semibold">
                                        <i class="bi bi-telephone me-1"></i>{{ $agreement->phone }}
                                    </a>
                                </dd>

                                <dt class="col-sm-4 text-muted">Email:</dt>
                                <dd class="col-sm-8">
                                    @if($agreement->email)
                                        <a href="mailto:{{ $agreement->email }}" class="text-decoration-none">
                                            <i class="bi bi-envelope me-1"></i>{{ $agreement->email }}
                                        </a>
                                    @else
                                        <span class="text-muted">Not provided</span>
                                    @endif
                                </dd>

                                <dt class="col-sm-4 text-muted">Agent Phone:</dt>
                                <dd class="col-sm-8">
                                    @if($agreement->agent_mobile)
                                        <a href="tel:{{ $agreement->agent_mobile }}" class="text-decoration-none fw-semibold text-info">
                                            <i class="bi bi-phone me-1"></i>{{ $agreement->agent_mobile }}
                                        </a>
                                    @else
                                        <span class="text-muted">Not provided</span>
                                    @endif
                                </dd>
                            </dl>
                        </div>
                    </div>

                    <!-- Property & Inspection Details Card -->
                    <div class="col-md-6">
                        <div class="p-3 rounded border h-100 bg-white">
                            <h6 class="fw-bold text-dark border-bottom pb-2 mb-3">
                                <i class="bi bi-geo-alt-fill me-1 text-danger"></i> Inspection Property
                            </h6>
                            <dl class="row mb-0 small">
                                <dt class="col-sm-5 text-muted">Property Address:</dt>
                                <dd class="col-sm-7 fw-semibold text-dark">
                                    <i class="bi bi-pin-map-fill text-danger me-1"></i>{{ $agreement->property_address }}
                                </dd>

                                <dt class="col-sm-5 text-muted">Standard Scope:</dt>
                                <dd class="col-sm-7 fw-medium text-dark">
                                    Part 1: Building Inspection (AS 4349.1-2007)<br>
                                    Part 2: Timber Pest Inspection (AS 4349.3-2010)
                                </dd>

                                <dt class="col-sm-5 text-muted">Agreement Type:</dt>
                                <dd class="col-sm-7 fw-medium text-dark">{{ $agreement->service_type }}</dd>

                                @if($agreement->booking_id)
                                    <dt class="col-sm-5 text-muted">Linked Booking:</dt>
                                    <dd class="col-sm-7">
                                        <a href="{{ route('admin.bookings.show', $agreement->booking_id) }}" class="btn btn-xs btn-outline-primary py-0 px-2">
                                            <i class="bi bi-calendar-check me-1"></i> Booking #{{ $agreement->booking_id }}
                                        </a>
                                    </dd>
                                @endif
                            </dl>
                        </div>
                    </div>
                </div>

                <!-- Digital Acceptance & Legal Audit Trail -->
                <div class="p-3 mb-4 rounded border bg-light">
                    <h6 class="fw-bold text-dark border-bottom pb-2 mb-3">
                        <i class="bi bi-patch-check-fill me-1 text-success"></i> Digital Acceptance &amp; Legal Compliance Audit Trail
                    </h6>
                    <div class="row g-3 small">
                        <div class="col-md-4">
                            <div class="text-muted">Accepted At:</div>
                            <div class="fw-semibold text-dark">
                                {{ $agreement->accepted_at ? $agreement->accepted_at->format('l, d F Y - h:i:s A') : $agreement->created_at->format('l, d F Y - h:i:s A') }}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-muted">Client IP Address:</div>
                            <div class="fw-semibold text-dark font-monospace">
                                {{ $agreement->ip_address ?? 'Recorded at submission' }}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-muted">Standards Referenced:</div>
                            <div class="fw-semibold text-dark">
                                AS 4349.1-2007 &amp; AS 4349.3-2010
                            </div>
                        </div>
                        @if($agreement->user_agent)
                            <div class="col-12 mt-2">
                                <div class="text-muted">Client Browser / Device Signature:</div>
                                <div class="small text-muted font-monospace text-truncate" title="{{ $agreement->user_agent }}">
                                    {{ $agreement->user_agent }}
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Agreement Terms Acknowledged by Client -->
                <div class="card border rounded mb-3">
                    <div class="card-header bg-white py-3 d-flex align-items-center justify-content-between cursor-pointer" data-bs-toggle="collapse" data-bs-target="#termsCollapse" aria-expanded="false" style="cursor: pointer;">
                        <h6 class="fw-bold text-dark mb-0">
                            <i class="bi bi-file-text-fill me-2 text-primary"></i> Pre-Engagement Inspection Agreement Terms (AS 4349.1-2007 &amp; AS 4349.3-2010)
                        </h6>
                        <span class="badge bg-light text-primary border">Click to Expand Terms</span>
                    </div>
                    <div class="collapse" id="termsCollapse">
                        <div class="card-body p-4 small text-secondary" style="max-height: 400px; overflow-y: auto; line-height: 1.6;">
                            <h6 class="fw-bold text-dark">TYPE OF INSPECTION ORDERED:</h6>
                            <p>There are 2 parts: <strong>1. Building Inspection.</strong> <strong>2. Timber Pest Inspection</strong></p>

                            <h6 class="fw-bold text-dark mt-3">1. BUILDING INSPECTION</h6>
                            <p><strong>Inspection &amp; Report:</strong> The inspection will be of the Building Elements as outlined in Appendix C of AS4349.1-2007 except for Strata title properties where the inspection will be according to Appendix B of AS4349.1-2007.</p>
                            <p>The inspection will be carried out in accordance with AS4349.1-2007. The purpose of the inspection is to provide advice to a prospective purchaser regarding the condition of the property at the date and time of inspection. Areas for Inspection shall cover all safe and accessible areas.</p>

                            <h6 class="fw-bold text-dark mt-3">2. TIMBER PEST INSPECTION</h6>
                            <p>The Timber Pest Inspection will be carried out in accordance with AS 4349.3-2010. The purpose is to provide advice on the detection of timber pest activity and damage including Subterranean and dampwood termites, Borers of seasoned timber, and Wood decay fungi.</p>

                            <h6 class="fw-bold text-dark mt-3">LIMITATIONS &amp; ACCESS</h6>
                            <p>The Inspector will conduct a non-invasive visual inspection which will be limited to accessible areas and sections of the property to which Safe and Reasonable Access is available. The Inspection WILL NOT involve invasive inspection including cutting, dismantling, removing objects, foliage, insulation, or floor coverings.</p>

                            <h6 class="fw-bold text-dark mt-3">CLIENT ACCEPTANCE CONFIRMATION</h6>
                            <p class="mb-0 text-success fw-semibold">
                                ✓ The client ({{ $agreement->name }}) accepted these pre-engagement terms electronically prior to the inspection being conducted.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Email Modal -->
@if($agreement->email)
<div class="modal fade" id="emailModal" tabindex="-1" aria-labelledby="emailModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('admin.agreements.send-email', $agreement->id) }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title fs-6 fw-bold" id="emailModalLabel">
                        <i class="bi bi-envelope me-1 text-primary"></i> Email Client: {{ $agreement->name }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label small fw-semibold text-dark">To:</label>
                        <input type="text" class="form-control form-control-sm" value="{{ $agreement->email }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold text-dark">Subject:</label>
                        <input type="text" name="subject" class="form-control form-control-sm" value="Your Pre-Purchase Inspection Agreement - {{ $agreement->reference_code }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold text-dark">Message:</label>
                        <textarea name="message" rows="5" class="form-control form-control-sm" placeholder="Enter message for client..." required>Hello {{ $agreement->name }},

Thank you for accepting the Pre-Engagement Inspection Agreement (Ref #{{ $agreement->reference_code }}) for property:
{{ $agreement->property_address }}

Our inspection team is preparing your booking. If you have any questions, please contact our office.</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-sm btn-navy">
                        <i class="bi bi-send me-1"></i> Send Email
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif

@endsection
