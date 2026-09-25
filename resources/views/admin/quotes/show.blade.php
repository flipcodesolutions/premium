@extends('admin.layouts.app')

@section('title', 'Quote Request #' . $quote->id . ' - ' . $quote->name)
@section('page_title', 'Quote Request Details')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-9">
        <!-- Top Navigation -->
        <div class="d-flex align-items-center justify-content-between mb-3">
            <a href="{{ route('admin.quotes.index') }}" class="btn btn-sm btn-outline-secondary">
                <i class="bi bi-arrow-left me-1"></i> Back to Quotes
            </a>
            <div class="d-flex gap-2">
                <form action="{{ route('admin.quotes.destroy', $quote->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to permanently delete this quote request?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-outline-danger">
                        <i class="bi bi-trash me-1"></i> Delete Quote
                    </button>
                </form>
            </div>
        </div>

        <div class="card-custom">
            <!-- Header -->
            <div class="card-custom-header">
                <div>
                    <h5 class="d-flex align-items-center gap-2">
                        <span>Quote Request #{{ $quote->id }}</span>
                        <span class="status-badge status-{{ $quote->status }}">
                            {{ $quote->status }}
                        </span>
                    </h5>
                    <small class="text-muted">Received on {{ $quote->created_at->format('d M Y, h:i A') }} ({{ $quote->created_at->diffForHumans() }})</small>
                </div>
            </div>

            <div class="p-4">
                <!-- Status Update Bar -->
                <div class="p-3 mb-4 rounded border bg-light">
                    <form action="{{ route('admin.quotes.update-status', $quote->id) }}" method="POST" class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                        @csrf
                        @method('PATCH')
                        <div class="d-flex flex-wrap align-items-center gap-3">
                            <div class="d-flex align-items-center gap-2">
                                <span class="fw-semibold text-dark"><i class="bi bi-sliders me-1"></i>Update Status:</span>
                                <select name="status" class="form-select form-select-sm" style="width: 170px;">
                                    <option value="pending" {{ $quote->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="contacted" {{ $quote->status === 'contacted' ? 'selected' : '' }}>Contacted</option>
                                    <option value="quoted" {{ $quote->status === 'quoted' ? 'selected' : '' }}>Quoted</option>
                                    <option value="closed" {{ $quote->status === 'closed' ? 'selected' : '' }}>Closed</option>
                                </select>
                            </div>
                            @if($quote->email)
                                <div class="form-check m-0">
                                    <input class="form-check-input" type="checkbox" name="notify_customer" id="notifyQuote" value="1" checked>
                                    <label class="form-check-label small text-dark fw-semibold" for="notifyQuote">
                                        <i class="bi bi-envelope-check me-1 text-primary"></i>Notify client via email
                                    </label>
                                </div>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-sm btn-navy">
                            Save Status Change
                        </button>
                    </form>
                </div>

                <div class="row g-4">
                    <!-- Client Contact Information -->
                    <div class="col-md-6">
                        <div class="p-3 rounded border h-100 bg-white">
                            <h6 class="fw-bold text-dark border-bottom pb-2 mb-3">
                                <i class="bi bi-person-circle me-1 text-primary"></i> Client Information
                            </h6>
                            <dl class="row mb-0 small">
                                <dt class="col-sm-4 text-muted">Full Name:</dt>
                                <dd class="col-sm-8 fw-semibold text-dark">{{ $quote->name }}</dd>

                                <dt class="col-sm-4 text-muted">Phone:</dt>
                                <dd class="col-sm-8">
                                    <a href="tel:{{ $quote->phone }}" class="text-decoration-none fw-semibold">
                                        <i class="bi bi-telephone-outbound me-1"></i>{{ $quote->phone }}
                                    </a>
                                </dd>

                                <dt class="col-sm-4 text-muted">Email:</dt>
                                <dd class="col-sm-8">
                                    <a href="mailto:{{ $quote->email }}" class="text-decoration-none">
                                        <i class="bi bi-envelope me-1"></i>{{ $quote->email }}
                                    </a>
                                </dd>
                            </dl>
                        </div>
                    </div>

                    <!-- Inspection Details -->
                    <div class="col-md-6">
                        <div class="p-3 rounded border h-100 bg-white">
                            <h6 class="fw-bold text-dark border-bottom pb-2 mb-3">
                                <i class="bi bi-file-earmark-check me-1 text-success"></i> Requested Service
                            </h6>
                            <dl class="row mb-0 small">
                                <dt class="col-sm-5 text-muted">Service:</dt>
                                <dd class="col-sm-7 fw-semibold text-dark">{{ $quote->service_type ?? 'General Inquiry' }}</dd>

                                <dt class="col-sm-5 text-muted">Status:</dt>
                                <dd class="col-sm-7">
                                    <span class="status-badge status-{{ $quote->status }}">
                                        {{ $quote->status }}
                                    </span>
                                </dd>

                                <dt class="col-sm-5 text-muted">Received Date:</dt>
                                <dd class="col-sm-7 text-muted">{{ $quote->created_at->format('d M Y, h:i A') }}</dd>
                            </dl>
                        </div>
                    </div>

                    <!-- Property Address -->
                    @if($quote->property_address)
                        <div class="col-12">
                            <div class="p-3 rounded border bg-white">
                                <h6 class="fw-bold text-dark border-bottom pb-2 mb-2">
                                    <i class="bi bi-geo-alt me-1 text-danger"></i> Target Property Address
                                </h6>
                                <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                                    <p class="mb-0 fs-6 fw-semibold text-dark">
                                        {{ $quote->property_address }}
                                    </p>
                                    <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($quote->property_address) }}" 
                                       target="_blank" 
                                       class="btn btn-sm btn-outline-secondary">
                                        <i class="bi bi-map me-1"></i> Open in Google Maps
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Client Message -->
                    @if($quote->message)
                        <div class="col-12">
                            <div class="p-3 rounded border bg-white">
                                <h6 class="fw-bold text-dark border-bottom pb-2 mb-2">
                                    <i class="bi bi-chat-left-text me-1 text-secondary"></i> Message / Request Description
                                </h6>
                                <p class="mb-0 text-muted" style="white-space: pre-line;">{{ $quote->message }}</p>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Quick Action Buttons -->
                <div class="d-flex flex-wrap gap-2 pt-4 mt-3 border-top">
                    <a href="tel:{{ $quote->phone }}" class="btn btn-navy">
                        <i class="bi bi-telephone-fill me-1"></i> Call Client
                    </a>
                    @if($quote->email)
                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#sendQuoteEmailModal">
                            <i class="bi bi-send-fill me-1"></i> Send Email to Client
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@if($quote->email)
<!-- Send Email Modal -->
<div class="modal fade" id="sendQuoteEmailModal" tabindex="-1" aria-labelledby="sendQuoteEmailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <form action="{{ route('admin.quotes.send-email', $quote->id) }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title d-flex align-items-center gap-2" id="sendQuoteEmailModalLabel">
                        <i class="bi bi-envelope-paper-fill text-primary"></i>
                        <span>Send Email / Quote to {{ $quote->name }}</span>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="alert alert-info py-2 px-3 mb-3 small d-flex align-items-center gap-2">
                        <i class="bi bi-info-circle-fill"></i>
                        <span>This email will be dispatched directly to <strong>{{ $quote->email }}</strong> using our branded template.</span>
                    </div>

                    <div class="mb-3">
                        <label for="emailSubject" class="form-label fw-bold small text-dark">Subject <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="emailSubject" name="subject" value="Regarding your quote request #{{ $quote->id }} - Premium Inspections" required>
                    </div>

                    <div class="mb-3">
                        <label for="emailMessage" class="form-label fw-bold small text-dark">Message / Quote Details <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="emailMessage" name="message" rows="7" placeholder="Type your message or quote estimate to the client here..." required>Dear {{ $quote->name }},

Thank you for requesting an estimate with Premium Building & Pest Inspections.

We have reviewed your request for: {{ $quote->service_type ?? 'Building & Pest Inspection' }}.
Target Property: {{ $quote->property_address ?? 'Your designated property' }}

Estimated Cost: $
Includes:
- Comprehensive Thermal Imaging
- Licensed & Insured Inspector
- Same-Day Detailed Digital Report

To proceed with your inspection or discuss your requirements, please feel free to call us at 0468 444 786.

Kind regards,
Premium Building & Pest Inspections Team</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-sm btn-navy">
                        <i class="bi bi-send-fill me-1"></i> Send Email Now
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif

@endsection
