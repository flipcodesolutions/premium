@extends('layouts.app')

@section('title', 'Book an Inspection | Premium Building & Pest Inspections')

@section('content')

<style>
.booking-hero {
    background: linear-gradient(135deg, rgba(11,31,58,0.94), rgba(18,63,103,0.88)), url('{{ asset('images/service banner.jpg') }}') center/cover no-repeat;
    padding: 110px 0 95px;
    color: #ffffff;
    position: relative;
}
.booking-hero h1 {
    color: #ffffff !important;
    font-family: 'Montserrat', sans-serif;
    font-weight: 800;
    font-size: clamp(2.1rem, 4.2vw, 3rem);
    margin-bottom: 16px;
    line-height: 1.25;
    text-shadow: 0 2px 10px rgba(0, 0, 0, 0.4);
}
.booking-hero p {
    color: rgba(255, 255, 255, 0.92);
    font-size: 1.12rem;
    line-height: 1.65;
    max-width: 680px;
    margin: 0 auto;
}
@media (max-width: 768px) {
    .booking-hero {
        padding: 70px 0 60px;
    }
}
</style>

<!-- =========================================================
     HERO BANNER
========================================================= -->
<section class="booking-hero">
    <div class="container text-center" data-aos="fade-down" data-aos-duration="800">
        <span class="animate-float" style="display: inline-block; background: rgba(72,169,0,0.25); color: #8ee346; border: 1px solid rgba(72,169,0,0.45); font-size: 0.82rem; font-weight: 700; padding: 7px 18px; border-radius: 50px; text-transform: uppercase; letter-spacing: 1.2px; margin-bottom: 16px;">
            Fast & Reliable Booking
        </span>
        <h1>
            Book Your Property Inspection
        </h1>
        <p>
            Schedule a certified, independent building & pest inspection across Melbourne. Receive your comprehensive report within 24 hours.
        </p>
    </div>
</section>

<!-- =========================================================
     BOOKING SECTION
========================================================= -->
<section style="padding: 60px 0; background: #f8fafc;">
    <div class="container">
        <!-- Success Alert -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show p-4 mb-4 rounded-3 shadow-sm border-0" role="alert" style="background: #eaf7e4; border-left: 6px solid #48A900 !important;">
                <div class="d-flex align-items-center gap-3">
                    <i class="bi bi-check-circle-fill text-success fs-2"></i>
                    <div>
                        <h5 class="fw-bold mb-1 text-success">Booking Request Received!</h5>
                        <p class="mb-0 text-dark">{{ session('success') }}</p>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show p-3 mb-4 rounded-3" role="alert">
                <div class="fw-bold mb-1"><i class="bi bi-exclamation-triangle-fill me-2"></i>Please check the form for errors:</div>
                <ul class="mb-0 ps-3">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row g-4">
            <!-- Left Form Column -->
            <div class="col-lg-8">
                <div class="bg-white p-4 p-md-5 rounded-4 shadow-sm border hover-lift" data-aos="fade-right" data-aos-duration="800">
                    <div class="d-flex align-items-center gap-2 mb-4 pb-3 border-bottom">
                        <i class="bi bi-calendar2-check-fill fs-3" style="color: #48A900;"></i>
                        <div>
                            <h3 class="fw-bold mb-0 text-dark" style="font-family: 'Montserrat', sans-serif; font-size: 1.4rem;">
                                Inspection Booking Details
                            </h3>
                            <small class="text-muted">Fill out the details below and we will confirm the booking promptly.</small>
                        </div>
                    </div>

                    <form action="{{ route('booking.store') }}" method="POST">
                        @csrf

                        <!-- Contact Details -->
                        <h6 class="fw-bold text-dark text-uppercase small tracking-wide mb-3" style="color: #0B1F3A; letter-spacing: 0.5px;">
                            1. Contact Information
                        </h6>

                        <div class="row g-3 mb-4">
                            <!-- Name -->
                            <div class="col-md-6">
                                <label for="name" class="form-label fw-semibold small text-secondary">
                                    Full Name <span class="text-danger">*</span>
                                </label>
                                <input type="text"
                                       class="form-control form-control-lg @error('name') is-invalid @enderror"
                                       id="name"
                                       name="name"
                                       value="{{ old('name') }}"
                                       placeholder="e.g. John Smith"
                                       required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Phone -->
                            <div class="col-md-6">
                                <label for="phone" class="form-label fw-semibold small text-secondary">
                                    Phone Number <span class="text-danger">*</span>
                                </label>
                                <input type="tel"
                                       class="form-control form-control-lg @error('phone') is-invalid @enderror"
                                       id="phone"
                                       name="phone"
                                       value="{{ old('phone') }}"
                                       placeholder="e.g. 0400 000 000"
                                       required>
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="col-12">
                                <label for="email" class="form-label fw-semibold small text-secondary">
                                    Email Address <span class="text-danger">*</span> <span class="text-muted fw-normal">(For receiving booking confirmation & report)</span>
                                </label>
                                <input type="email"
                                       class="form-control form-control-lg @error('email') is-invalid @enderror"
                                       id="email"
                                       name="email"
                                       value="{{ old('email') }}"
                                       placeholder="e.g. john@example.com"
                                       required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Property & Inspection Details -->
                        <h6 class="fw-bold text-dark text-uppercase small tracking-wide mb-3 pt-2 border-top" style="color: #0B1F3A; letter-spacing: 0.5px;">
                            2. Property & Service Selection
                        </h6>

                        <div class="row g-3 mb-4">
                            <!-- Property Address -->
                            <div class="col-12">
                                <label for="property_address" class="form-label fw-semibold small text-secondary">
                                    Property Address to Inspect <span class="text-danger">*</span>
                                </label>
                                <input type="text"
                                       class="form-control form-control-lg @error('property_address') is-invalid @enderror"
                                       id="property_address"
                                       name="property_address"
                                       value="{{ old('property_address') }}"
                                       placeholder="e.g. 123 Smith Street, Richmond VIC 3121"
                                       required>
                                @error('property_address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Service Type -->
                            <div class="col-12">
                                <label for="service_type" class="form-label fw-semibold small text-secondary">
                                    Type of Inspection Required <span class="text-danger">*</span>
                                </label>
                                <select class="form-select form-select-lg @error('service_type') is-invalid @enderror"
                                        id="service_type"
                                        name="service_type"
                                        required>
                                    <option value="">-- Choose an Inspection Service --</option>
                                    <option value="Pre-Purchase Building & Pest Inspection" {{ old('service_type') == 'Pre-Purchase Building & Pest Inspection' ? 'selected' : '' }}>
                                        Pre-Purchase Building & Pest Inspection (Most Popular)
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

                                    @if(isset($services) && $services->count() > 0)
                                        @foreach($services as $srv)
                                            <option value="{{ $srv->name }}" {{ old('service_type') == $srv->name ? 'selected' : '' }}>
                                                {{ $srv->name }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('service_type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Date & Time Preference -->
                        <h6 class="fw-bold text-dark text-uppercase small tracking-wide mb-3 pt-2 border-top" style="color: #0B1F3A; letter-spacing: 0.5px;">
                            3. Preferred Schedule
                        </h6>

                        <div class="row g-3 mb-4">
                            <!-- Preferred Date -->
                            <div class="col-md-6">
                                <label for="inspection_date" class="form-label fw-semibold small text-secondary">
                                    Preferred Inspection Date
                                </label>
                                <input type="date"
                                       class="form-control form-control-lg @error('inspection_date') is-invalid @enderror"
                                       id="inspection_date"
                                       name="inspection_date"
                                       min="{{ date('Y-m-d') }}"
                                       value="{{ old('inspection_date', date('Y-m-d', strtotime('+1 day'))) }}">
                                @error('inspection_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Preferred Time -->
                            <div class="col-md-6">
                                <label for="inspection_time" class="form-label fw-semibold small text-secondary">
                                    Preferred Time (Approx.)
                                </label>
                                <input type="time"
                                       class="form-control form-control-lg @error('inspection_time') is-invalid @enderror"
                                       id="inspection_time"
                                       name="inspection_time"
                                       value="{{ old('inspection_time', '10:00') }}">
                                @error('inspection_time')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Notes / Access details -->
                        <div class="mb-4">
                            <label for="message" class="form-label fw-semibold small text-secondary">
                                Special Notes or Access Details <span class="text-muted fw-normal">(Optional)</span>
                            </label>
                            <textarea class="form-control @error('message') is-invalid @enderror"
                                      id="message"
                                      name="message"
                                      rows="3"
                                      placeholder="e.g. Real estate agent name, lockbox code, or specific areas of concern...">{{ old('message') }}</textarea>
                            @error('message')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" 
                                class="btn w-100 py-3 text-white fw-bold fs-5 rounded-3 shadow btn-glow"
                                style="background-color: #48A900; border: none; transition: background-color 0.2s;">
                            <i class="bi bi-calendar-check me-2"></i> Submit Inspection Booking
                        </button>
                        <small class="text-muted d-block text-center mt-2">
                            <i class="bi bi-shield-lock me-1"></i> No upfront payment required. We will call you to confirm access.
                        </small>
                    </form>
                </div>
            </div>

            <!-- Right Sidebar Column -->
            <div class="col-lg-4">
                <!-- Direct Call Card -->
                <div class="p-4 rounded-4 shadow-sm mb-4 text-white text-center hover-lift" data-aos="fade-left" data-aos-duration="800" style="background: linear-gradient(135deg, #0B1F3A, #123F67);">
                    <div class="mb-3 d-inline-flex align-items-center justify-content-center rounded-circle" style="width: 60px; height: 60px; background: rgba(72,169,0,0.25); color: #48A900; font-size: 1.8rem;">
                        <i class="bi bi-telephone-fill"></i>
                    </div>
                    <h5 class="fw-bold mb-1" style="font-family: 'Montserrat', sans-serif; color: #ffffff !important;">Need Urgency?</h5>
                    <p class="small text-white-50 mb-3">Call us directly to secure same-day or next-day inspection times.</p>
                    <a href="tel:0466001551" class="btn text-white fw-bold px-4 py-2 rounded-pill d-inline-flex align-items-center gap-2 btn-glow pulse-glow" style="background: #48A900;">
                        <i class="bi bi-telephone-outbound"></i> 0466 001 551
                    </a>
                </div>

                <!-- Guarantee List -->
                <div class="bg-white p-4 rounded-4 shadow-sm border mb-4 hover-lift" data-aos="fade-left" data-aos-delay="150" data-aos-duration="800">
                    <h6 class="fw-bold text-dark mb-3 border-bottom pb-2" style="font-family: 'Montserrat', sans-serif;">
                        Why Book With Us?
                    </h6>
                    <ul class="list-unstyled mb-0 d-flex flex-column gap-3 small text-secondary">
                        <li class="d-flex align-items-start gap-2">
                            <i class="bi bi-check-circle-fill text-success fs-5 mt-n1"></i>
                            <span><strong>Licensed Building Inspector:</strong> Qualified & fully insured inspection specialists.</span>
                        </li>
                        <li class="d-flex align-items-start gap-2">
                            <i class="bi bi-check-circle-fill text-success fs-5 mt-n1"></i>
                            <span><strong>24-Hour Report Delivery:</strong> Fast digital reports complete with high-resolution photos.</span>
                        </li>
                        <li class="d-flex align-items-start gap-2">
                            <i class="bi bi-check-circle-fill text-success fs-5 mt-n1"></i>
                            <span><strong>Thermal & Moisture Tech:</strong> State of the art thermal imaging and moisture meters.</span>
                        </li>
                        <li class="d-flex align-items-start gap-2">
                            <i class="bi bi-check-circle-fill text-success fs-5 mt-n1"></i>
                            <span><strong>Post-Inspection Debrief:</strong> Over-the-phone consultation to discuss key findings.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
