@extends('admin.layouts.app')

@section('title', 'Booking #' . $booking->id . ' - ' . $booking->name)
@section('page_title', 'Booking Details')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-9">
        <!-- Top Navigation -->
        <div class="d-flex align-items-center justify-content-between mb-3">
            <a href="{{ route('admin.bookings.index') }}" class="btn btn-sm btn-outline-secondary">
                <i class="bi bi-arrow-left me-1"></i> Back to Bookings
            </a>
            <div class="d-flex gap-2">
                <form action="{{ route('admin.bookings.destroy', $booking->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to permanently delete this booking?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-outline-danger">
                        <i class="bi bi-trash me-1"></i> Delete Booking
                    </button>
                </form>
            </div>
        </div>

        <div class="card-custom">
            <!-- Header -->
            <div class="card-custom-header">
                <div>
                    <h5 class="d-flex align-items-center gap-2">
                        <span>Inspection Booking #{{ $booking->id }}</span>
                        <span class="status-badge status-{{ $booking->status }}">
                            {{ $booking->status }}
                        </span>
                    </h5>
                    <small class="text-muted">Received on {{ $booking->created_at->format('d M Y, h:i A') }} ({{ $booking->created_at->diffForHumans() }})</small>
                </div>
            </div>

            <div class="p-4">
                <!-- Status Update Bar -->
                <div class="p-3 mb-4 rounded border bg-light">
                    <form action="{{ route('admin.bookings.update-status', $booking->id) }}" method="POST" class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                        @csrf
                        @method('PATCH')
                        <div class="d-flex flex-wrap align-items-center gap-3">
                            <div class="d-flex align-items-center gap-2">
                                <span class="fw-semibold text-dark"><i class="bi bi-sliders me-1"></i>Update Status:</span>
                                <select name="status" class="form-select form-select-sm" style="width: 170px;">
                                    <option value="pending" {{ $booking->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="confirmed" {{ $booking->status === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                    <option value="completed" {{ $booking->status === 'completed' ? 'selected' : '' }}>Completed</option>
                                    <option value="cancelled" {{ $booking->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>
                            </div>
                            @if($booking->email)
                                <div class="form-check m-0">
                                    <input class="form-check-input" type="checkbox" name="notify_customer" id="notifyBooking" value="1" checked>
                                    <label class="form-check-label small text-dark fw-semibold" for="notifyBooking">
                                        <i class="bi bi-envelope-check me-1 text-primary"></i>Notify customer via email
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
                    <!-- Customer Information -->
                    <div class="col-md-6">
                        <div class="p-3 rounded border h-100 bg-white">
                            <h6 class="fw-bold text-dark border-bottom pb-2 mb-3">
                                <i class="bi bi-person-circle me-1 text-primary"></i> Customer Information
                            </h6>
                            <dl class="row mb-0 small">
                                <dt class="col-sm-4 text-muted">Full Name:</dt>
                                <dd class="col-sm-8 fw-semibold text-dark">{{ $booking->name }}</dd>

                                <dt class="col-sm-4 text-muted">Phone:</dt>
                                <dd class="col-sm-8">
                                    <a href="tel:{{ $booking->phone }}" class="text-decoration-none fw-semibold">
                                        <i class="bi bi-telephone-outbound me-1"></i>{{ $booking->phone }}
                                    </a>
                                </dd>

                                <dt class="col-sm-4 text-muted">Email:</dt>
                                <dd class="col-sm-8">
                                    @if($booking->email)
                                        <a href="mailto:{{ $booking->email }}" class="text-decoration-none">
                                            <i class="bi bi-envelope me-1"></i>{{ $booking->email }}
                                        </a>
                                    @else
                                        <span class="text-muted">Not provided</span>
                                    @endif
                                </dd>
                            </dl>
                        </div>
                    </div>

                    <!-- Inspection Details -->
                    <div class="col-md-6">
                        <div class="p-3 rounded border h-100 bg-white">
                            <h6 class="fw-bold text-dark border-bottom pb-2 mb-3">
                                <i class="bi bi-calendar2-check me-1 text-success"></i> Inspection Details
                            </h6>
                            <dl class="row mb-0 small">
                                <dt class="col-sm-5 text-muted">Service Type:</dt>
                                <dd class="col-sm-7 fw-semibold text-dark">{{ $booking->service_type }}</dd>

                                <dt class="col-sm-5 text-muted">Requested Date:</dt>
                                <dd class="col-sm-7 fw-semibold text-dark">
                                    {{ $booking->inspection_date ? \Carbon\Carbon::parse($booking->inspection_date)->format('l, d M Y') : 'N/A' }}
                                </dd>

                                <dt class="col-sm-5 text-muted">Preferred Time:</dt>
                                <dd class="col-sm-7 fw-semibold text-dark">
                                    {{ $booking->inspection_time ?? 'N/A' }}
                                </dd>

                                <dt class="col-sm-5 text-muted">Current Status:</dt>
                                <dd class="col-sm-7">
                                    <span class="status-badge status-{{ $booking->status }}">
                                        {{ $booking->status }}
                                    </span>
                                </dd>
                            </dl>
                        </div>
                    </div>

                    <!-- Property Address -->
                    <div class="col-12">
                        <div class="p-3 rounded border bg-white">
                            <h6 class="fw-bold text-dark border-bottom pb-2 mb-2">
                                <i class="bi bi-geo-alt me-1 text-danger"></i> Property Address
                            </h6>
                            <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                                <p class="mb-0 fs-6 fw-semibold text-dark">
                                    {{ $booking->property_address }}
                                </p>
                                <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($booking->property_address) }}" 
                                   target="_blank" 
                                   class="btn btn-sm btn-outline-secondary">
                                    <i class="bi bi-map me-1"></i> Open in Google Maps
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Customer Notes / Message -->
                    @if($booking->message)
                        <div class="col-12">
                            <div class="p-3 rounded border bg-white">
                                <h6 class="fw-bold text-dark border-bottom pb-2 mb-2">
                                    <i class="bi bi-chat-left-text me-1 text-secondary"></i> Additional Notes / Special Instructions
                                </h6>
                                <p class="mb-0 text-muted" style="white-space: pre-line;">{{ $booking->message }}</p>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Quick Action Buttons -->
                <div class="d-flex flex-wrap gap-2 pt-4 mt-3 border-top">
                    <a href="tel:{{ $booking->phone }}" class="btn btn-navy">
                        <i class="bi bi-telephone-fill me-1"></i> Call Customer
                    </a>
                    @if($booking->email)
                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#sendBookingEmailModal">
                            <i class="bi bi-send-fill me-1"></i> Send Email to Customer
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@if($booking->email)
<!-- Send Email Modal -->
<div class="modal fade" id="sendBookingEmailModal" tabindex="-1" aria-labelledby="sendBookingEmailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <form action="{{ route('admin.bookings.send-email', $booking->id) }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title d-flex align-items-center gap-2" id="sendBookingEmailModalLabel">
                        <i class="bi bi-envelope-paper-fill text-primary"></i>
                        <span>Send Email to {{ $booking->name }}</span>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="alert alert-info py-2 px-3 mb-3 small d-flex align-items-center gap-2">
                        <i class="bi bi-info-circle-fill"></i>
                        <span>This email will be dispatched directly to <strong>{{ $booking->email }}</strong> using our branded template.</span>
                    </div>

                    <div class="mb-3">
                        <label for="emailSubject" class="form-label fw-bold small text-dark">Subject <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="emailSubject" name="subject" value="Regarding your inspection booking #{{ $booking->id }} - Premium Inspections" required>
                    </div>

                    <div class="mb-3">
                        <label for="emailMessage" class="form-label fw-bold small text-dark">Message <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="emailMessage" name="message" rows="6" placeholder="Type your message to the customer here..." required>Dear {{ $booking->name }},

Thank you for your inspection booking with Premium Building & Pest Inspections.

We would like to inform you that ...

If you have any questions, please contact us at 0468 444 786.

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
