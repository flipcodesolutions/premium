@extends('admin.layouts.app')

@section('title', 'Add New Booking')
@section('page_title', 'Create Inspection Booking')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-9">
        <div class="card-custom">
            <div class="card-custom-header">
                <div>
                    <h5>New Inspection Booking</h5>
                    <small class="text-muted">Enter client and inspection schedule details</small>
                </div>
                <a href="{{ route('admin.bookings.index') }}" class="btn btn-sm btn-outline-secondary">
                    <i class="bi bi-arrow-left me-1"></i> Back to Bookings
                </a>
            </div>

            <form action="{{ route('admin.bookings.store') }}" method="POST" class="p-4">
                @csrf

                <!-- Customer Details -->
                <h6 class="fw-bold text-dark text-uppercase small tracking-wide mb-3 border-bottom pb-2">
                    <i class="bi bi-person me-1 text-primary"></i> Customer Information
                </h6>

                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label for="name" class="form-label fw-semibold">Customer Full Name <span class="text-danger">*</span></label>
                        <input type="text"
                               class="form-control @error('name') is-invalid @enderror"
                               id="name"
                               name="name"
                               value="{{ old('name') }}"
                               placeholder="e.g. Sarah Jenkins"
                               required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="phone" class="form-label fw-semibold">Phone Number <span class="text-danger">*</span></label>
                        <input type="tel"
                               class="form-control @error('phone') is-invalid @enderror"
                               id="phone"
                               name="phone"
                               value="{{ old('phone') }}"
                               placeholder="e.g. 0412 345 678"
                               required>
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="email" class="form-label fw-semibold">Email Address</label>
                        <input type="email"
                               class="form-control @error('email') is-invalid @enderror"
                               id="email"
                               name="email"
                               value="{{ old('email') }}"
                               placeholder="e.g. sarah@example.com">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Inspection Details -->
                <h6 class="fw-bold text-dark text-uppercase small tracking-wide mb-3 border-bottom pb-2">
                    <i class="bi bi-geo-alt me-1 text-danger"></i> Property & Service Details
                </h6>

                <div class="row g-3 mb-4">
                    <div class="col-12">
                        <label for="property_address" class="form-label fw-semibold">Property Address <span class="text-danger">*</span></label>
                        <input type="text"
                               class="form-control @error('property_address') is-invalid @enderror"
                               id="property_address"
                               name="property_address"
                               value="{{ old('property_address') }}"
                               placeholder="e.g. 45 Victoria Street, Hawthorn VIC 3122"
                               required>
                        @error('property_address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-8">
                        <label for="service_type" class="form-label fw-semibold">Service Type <span class="text-danger">*</span></label>
                        <select class="form-select @error('service_type') is-invalid @enderror"
                                id="service_type"
                                name="service_type"
                                required>
                            <option value="">-- Choose Inspection Service --</option>
                            <option value="Pre-Purchase Building & Pest Inspection" {{ old('service_type') == 'Pre-Purchase Building & Pest Inspection' ? 'selected' : '' }}>
                                Pre-Purchase Building & Pest Inspection
                            </option>
                            <option value="Building Stage by Stage Inspection" {{ old('service_type') == 'Building Stage by Stage Inspection' ? 'selected' : '' }}>
                                Building Stage by Stage Inspection
                            </option>
                            <option value="New Build Handover Inspection" {{ old('service_type') == 'New Build Handover Inspection' ? 'selected' : '' }}>
                                New Build Handover Inspection
                            </option>
                            <option value="Apartment Building Inspection" {{ old('service_type') == 'Apartment Building Inspection' ? 'selected' : '' }}>
                                Apartment Building Inspection
                            </option>
                            <option value="Rising Damp Inspection" {{ old('service_type') == 'Rising Damp Inspection' ? 'selected' : '' }}>
                                Rising Damp Inspection
                            </option>
                            <option value="Pool Barrier Inspection" {{ old('service_type') == 'Pool Barrier Inspection' ? 'selected' : '' }}>
                                Pool Barrier Inspection
                            </option>
                            <option value="Dilapidation Inspection" {{ old('service_type') == 'Dilapidation Inspection' ? 'selected' : '' }}>
                                Dilapidation Inspection
                            </option>
                            <option value="Vendor Inspection" {{ old('service_type') == 'Vendor Inspection' ? 'selected' : '' }}>
                                Vendor Inspection
                            </option>
                            <option value="Builders Warranty Inspection" {{ old('service_type') == 'Builders Warranty Inspection' ? 'selected' : '' }}>
                                Builders Warranty Inspection
                            </option>
                            @foreach($services as $srv)
                                <option value="{{ $srv->name }}" {{ old('service_type') == $srv->name ? 'selected' : '' }}>
                                    {{ $srv->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('service_type')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="status" class="form-label fw-semibold">Initial Status <span class="text-danger">*</span></label>
                        <select class="form-select @error('status') is-invalid @enderror"
                                id="status"
                                name="status"
                                required>
                            <option value="confirmed" {{ old('status') == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                            <option value="pending" {{ old('status', 'pending') == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="cancelled" {{ old('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Schedule -->
                <h6 class="fw-bold text-dark text-uppercase small tracking-wide mb-3 border-bottom pb-2">
                    <i class="bi bi-clock me-1 text-success"></i> Schedule
                </h6>

                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label for="inspection_date" class="form-label fw-semibold">Inspection Date</label>
                        <input type="date"
                               class="form-control @error('inspection_date') is-invalid @enderror"
                               id="inspection_date"
                               name="inspection_date"
                               value="{{ old('inspection_date', date('Y-m-d')) }}">
                        @error('inspection_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="inspection_time" class="form-label fw-semibold">Inspection Time</label>
                        <input type="time"
                               class="form-control @error('inspection_time') is-invalid @enderror"
                               id="inspection_time"
                               name="inspection_time"
                               value="{{ old('inspection_time', '10:00') }}">
                        @error('inspection_time')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Notes -->
                <div class="mb-4">
                    <label for="message" class="form-label fw-semibold">Special Instructions / Inspector Notes</label>
                    <textarea class="form-control @error('message') is-invalid @enderror"
                              id="message"
                              name="message"
                              rows="3"
                              placeholder="Access notes, key lockbox code, real estate agent details...">{{ old('message') }}</textarea>
                    @error('message')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex align-items-center justify-content-end gap-2 pt-3 border-top">
                    <a href="{{ route('admin.bookings.index') }}" class="btn btn-outline-secondary">
                        Cancel
                    </a>
                    <button type="submit" class="btn btn-green px-4">
                        <i class="bi bi-check-lg me-1"></i> Save Booking
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
