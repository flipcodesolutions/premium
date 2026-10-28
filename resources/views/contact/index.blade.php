@extends('layouts.app')

@section('title', 'Contact Us | Premium Building & Pest Inspections')
@section('meta_description', 'Get in touch with Premium Building & Pest Inspections Melbourne. Call 0466 001 551 or submit an inquiry for rapid quotes and flexible inspection bookings.')

@section('content')

{{-- =========================================================
     01. HERO SECTION
========================================================= --}}
<section class="contact-hero">
    <div class="container">
        <div class="contact-hero-card" data-aos="fade-up" data-aos-duration="800">
            <h1>CONTACT US</h1>
            <p>
                We're here to help with all your building inspection needs. Whether you have questions, need a quote, or want to schedule an inspection, our team is ready to assist you.
            </p>
        </div>
    </div>
</section>


{{-- =========================================================
     02. CONTACT & QUICK QUOTE SECTION
========================================================= --}}
<section class="contact-section">
    <div class="container">

        {{-- FLASH MESSAGES --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row g-5 align-items-start">

            {{-- LEFT: GET IN TOUCH --}}
            <div class="col-lg-5 contact-info-col" data-aos="fade-right" data-aos-duration="800">
                <span class="contact-green-label">GET IN TOUCH</span>
                <p class="contact-tagline">
                    Contact us today and experience the Premium Building & Pest Inspections difference!
                </p>

                <div class="contact-details-list">
                    {{-- HEAD OFFICE --}}
                    <div class="contact-detail-item hover-lift" data-aos="fade-up" data-aos-delay="100">
                        <div class="contact-detail-icon">
                            <i class="bi bi-geo-alt-fill"></i>
                        </div>
                        <div class="contact-detail-content">
                            <h4>HEAD OFFICE</h4>
                            <p>37 Burlina Boulevard, Clyde North VIC 3978, Australia</p>
                        </div>
                    </div>

                    {{-- EMAIL SUPPORT --}}
                    <div class="contact-detail-item hover-lift" data-aos="fade-up" data-aos-delay="200">
                        <div class="contact-detail-icon">
                            <i class="bi bi-envelope-fill"></i>
                        </div>
                        <div class="contact-detail-content">
                            <h4>EMAIL SUPPORT</h4>
                            <a href="mailto:info@premiumbuildinginspections.com.au">
                                info@premiumbuildinginspections.com.au
                            </a>
                        </div>
                    </div>

                    {{-- LET'S TALK --}}
                    <div class="contact-detail-item hover-lift" data-aos="fade-up" data-aos-delay="300">
                        <div class="contact-detail-icon">
                            <i class="bi bi-telephone-fill"></i>
                        </div>
                        <div class="contact-detail-content">
                            <h4>LET'S TALK</h4>
                            <p>
                                Phone: <a href="tel:0466001551">0466 001 551</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- RIGHT: GET QUICK QUOTE --}}
            <div class="col-lg-7" data-aos="fade-left" data-aos-duration="800">
                <div class="contact-form-wrapper hover-lift">
                    <h2 class="quick-quote-heading">GET QUICK QUOTE</h2>

                    <form action="{{ route('quote.store') }}" method="POST" id="quickQuoteForm" novalidate>
                        @csrf

                        <div class="row g-3">
                            {{-- Name --}}
                            <div class="col-md-6">
                                <input type="text"
                                       name="name"
                                       id="quote_name"
                                       class="form-control quote-input @error('name') is-invalid @enderror"
                                       placeholder="Name"
                                       value="{{ old('name') }}"
                                       required>
                                <div class="quote-field-error" id="error_name" style="{{ $errors->has('name') ? 'display: flex;' : 'display: none;' }}">
                                    <i class="bi bi-info-circle"></i>
                                    <span>{{ $errors->first('name') ?? 'The field is required.' }}</span>
                                </div>
                            </div>

                            {{-- Phone --}}
                            <div class="col-md-6">
                                <input type="tel"
                                       name="phone"
                                       id="quote_phone"
                                       class="form-control quote-input @error('phone') is-invalid @enderror"
                                       placeholder="Phone"
                                       value="{{ old('phone') }}"
                                       required>
                                <div class="quote-field-error" id="error_phone" style="{{ $errors->has('phone') ? 'display: flex;' : 'display: none;' }}">
                                    <i class="bi bi-info-circle"></i>
                                    <span>{{ $errors->first('phone') ?? 'The field accepts only numbers and phone characters (#, -, *, etc).' }}</span>
                                </div>
                            </div>

                            {{-- Email --}}
                            <div class="col-md-6">
                                <input type="email"
                                       name="email"
                                       id="quote_email"
                                       class="form-control quote-input @error('email') is-invalid @enderror"
                                       placeholder="Email"
                                       value="{{ old('email') }}"
                                       required>
                                <div class="quote-field-error" id="error_email" style="{{ $errors->has('email') ? 'display: flex;' : 'display: none;' }}">
                                    <i class="bi bi-info-circle"></i>
                                    <span>{{ $errors->first('email') ?? 'Please enter a valid email address.' }}</span>
                                </div>
                            </div>

                            {{-- Address --}}
                            <div class="col-md-6">
                                <input type="text"
                                       name="property_address"
                                       id="quote_address"
                                       class="form-control quote-input"
                                       placeholder="Address"
                                       value="{{ old('property_address') }}">
                            </div>

                            {{-- Select Service --}}
                            <div class="col-12">
                                <select name="service_type" class="form-select quote-input quote-select">
                                    <option value="" disabled {{ old('service_type') ? '' : 'selected' }}>Select Service</option>
                                    <option value="Pre-Purchase Building and Pest Inspection" {{ old('service_type') == 'Pre-Purchase Building and Pest Inspection' ? 'selected' : '' }}>Pre-Purchase Building and Pest Inspection</option>
                                    <option value="Building Stage-by-Stage Inspection" {{ old('service_type') == 'Building Stage-by-Stage Inspection' ? 'selected' : '' }}>Building Stage-by-Stage Inspection</option>
                                    <option value="Pool Barrier Inspection" {{ old('service_type') == 'Pool Barrier Inspection' ? 'selected' : '' }}>Pool Barrier Inspection</option>
                                    <option value="Apartment Building Inspections" {{ old('service_type') == 'Apartment Building Inspections' ? 'selected' : '' }}>Apartment Building Inspections</option>
                                    <option value="Rising Damp Inspection" {{ old('service_type') == 'Rising Damp Inspection' ? 'selected' : '' }}>Rising Damp Inspection</option>
                                    <option value="Dilapidation Inspection" {{ old('service_type') == 'Dilapidation Inspection' ? 'selected' : '' }}>Dilapidation Inspection</option>
                                    <option value="New Build Handover Inspection" {{ old('service_type') == 'New Build Handover Inspection' ? 'selected' : '' }}>New Build Handover Inspection</option>
                                    <option value="Vendor Inspections" {{ old('service_type') == 'Vendor Inspections' ? 'selected' : '' }}>Vendor Inspections</option>
                                    <option value="Builders Warranty Inspection" {{ old('service_type') == 'Builders Warranty Inspection' ? 'selected' : '' }}>Builders Warranty Inspection</option>
                                </select>
                            </div>

                            {{-- Inspection Date --}}
                            <div class="col-12">
                                <input type="text"
                                       name="inspection_date"
                                       class="form-control quote-input"
                                       placeholder="Inspection Date"
                                       onfocus="(this.type='date')"
                                       onblur="if(!this.value)this.type='text'"
                                       value="{{ old('inspection_date') }}">
                            </div>

                            {{-- Message --}}
                            <div class="col-12">
                                <textarea name="message"
                                          class="form-control quote-input quote-textarea"
                                          rows="4"
                                          placeholder="Message">{{ old('message') }}</textarea>
                            </div>

                            {{-- Submit Button --}}
                            <div class="col-12">
                                <button type="submit" class="btn btn-quick-quote btn-glow">
                                    Get My Quote
                                </button>

                                {{-- Submission error message matching screenshot --}}
                                <div class="quote-submission-error" id="form_submission_error" style="{{ $errors->any() ? 'display: flex;' : 'display: none;' }}">
                                    <i class="bi bi-info-circle"></i>
                                    <span>Your submission failed because of an error.</span>
                                </div>

                                {{-- Success message --}}
                                <div class="quote-submission-success" id="form_submission_success" style="{{ session('success') ? 'display: flex;' : 'display: none;' }}">
                                    <i class="bi bi-check-circle"></i>
                                    <span id="form_success_text">{{ session('success') ?? '' }}</span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>
</section>


{{-- =========================================================
     03. MIDDLE REACH OUT BANNER + OVERLAPPING QUICK CALL CARD
========================================================= --}}
<section class="reach-out-section">
    <div class="container text-center" data-aos="fade-up" data-aos-duration="800">
        <span class="reach-out-tag">NEED MORE HELP?</span>
        <h2 class="reach-out-heading">
            FEEL FREE TO REACH OUT TO US FOR FURTHER INFORMATION.
        </h2>
    </div>
</section>

<div class="reach-out-floating-wrap">
    <div class="container">
        <div class="reach-out-call-card hover-lift pulse-glow" data-aos="zoom-in" data-aos-duration="600">
            <div class="quick-call-icon">
                <i class="bi bi-telephone-fill"></i>
            </div>
            <div class="quick-call-details">
                <span class="quick-call-label">QUICK CALL</span>
                <a href="tel:0466001551" class="quick-call-phone">
                    Phone : 0466 001 551
                </a>
            </div>
        </div>
    </div>
</div>


{{-- =========================================================
     PAGE CSS
========================================================= --}}
<style>
    :root {
        --c-green: #499B08;
        --c-green-hover: #387c06;
        --c-navy: #05213F;
        --c-navy-dark: #03162B;
        --c-text: #000000;
        --c-input-bg: #edf2f7;
        --c-input-border: #cbd5e1;
    }

    /* ---------------------------------------------------------
       01. HERO
    --------------------------------------------------------- */
    .contact-hero {
        min-height: 420px;
        display: flex;
        align-items: center;
        position: relative;
        padding: 60px 0;
        background:
            linear-gradient(
                rgba(4, 45, 78, 0.65),
                rgba(4, 45, 78, 0.65)
            ),
            url("{{ asset('images/contact first.jpg') }}")
            center center / cover no-repeat;
    }

    .contact-hero-card {
        max-width: 680px;
        margin: 0 auto;
        text-align: center;
        color: #ffffff;
        padding: 40px 32px;
        background: rgba(4, 38, 67, 0.72);
        border-radius: 8px;
        backdrop-filter: blur(2px);
    }

    .contact-hero-card h1 {
        font-family: 'Inter', sans-serif;
        color: #ffffff;
        font-size: 38px;
        font-weight: 900;
        line-height: 1.1;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin: 0 0 14px;
    }

    .contact-hero-card p {
        color: rgba(255, 255, 255, 0.95);
        font-size: 14.5px;
        line-height: 1.7;
        margin: 0 auto;
        max-width: 580px;
    }

    /* ---------------------------------------------------------
       02. MAIN CONTACT SECTION
    --------------------------------------------------------- */
    .contact-section {
        background: #ffffff;
        padding: 85px 0 95px;
    }

    .contact-info-col {
        position: relative;
        padding-bottom: 30px;
    }

    .contact-green-label {
        display: inline-block;
        color: var(--c-green);
        font-size: 14px;
        font-weight: 900;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        margin-bottom: 8px;
    }

    .contact-tagline {
        color: #000000;
        font-size: 15.5px;
        font-weight: 500;
        line-height: 1.6;
        margin-bottom: 34px;
        max-width: 440px;
    }

    .contact-details-list {
        display: flex;
        flex-direction: column;
        gap: 26px;
    }

    .contact-detail-item {
        display: flex;
        align-items: flex-start;
        gap: 16px;
    }

    .contact-detail-icon {
        width: 48px;
        min-width: 48px;
        height: 48px;
        background: var(--c-green);
        color: #ffffff;
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
    }

    .contact-detail-content h4 {
        color: #062a4d;
        font-family: 'Inter', sans-serif;
        font-size: 15.5px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.3px;
        margin: 0 0 4px;
    }

    .contact-detail-content p,
    .contact-detail-content a {
        color: #111827;
        font-size: 15px;
        font-weight: 500;
        line-height: 1.5;
        margin: 0;
        text-decoration: none;
    }

    .contact-detail-content a:hover {
        color: var(--c-green);
    }

    /* FORM */
    .quick-quote-heading {
        color: #000000;
        font-family: 'Inter', sans-serif;
        font-size: 30px;
        font-weight: 900;
        text-transform: uppercase;
        letter-spacing: 0.3px;
        margin: 0 0 22px;
    }

    .quote-input {
        background-color: var(--c-input-bg);
        border: 1px solid var(--c-input-border);
        border-radius: 4px;
        color: #000000;
        font-size: 15px;
        font-weight: 600;
        height: 50px;
        padding: 12px 16px;
        box-shadow: none;
        transition: all 0.2s ease;
    }

    .quote-input::placeholder {
        color: #000000;
        opacity: 0.65;
        font-size: 15px;
        font-weight: 500;
    }

    .quote-input:focus {
        background-color: #ffffff;
        border-color: var(--c-green);
        color: #000000;
        box-shadow: 0 0 0 3px rgba(67, 169, 0, 0.15);
    }

    .quote-textarea {
        height: auto;
        min-height: 110px;
        resize: vertical;
        color: #000000;
        font-size: 15px;
        font-weight: 600;
    }

    .quote-select {
        color: #000000;
        font-size: 15px;
        font-weight: 500;
    }

    .quote-select option {
        color: #000000;
        font-size: 15px;
    }

    .btn-quick-quote {
        background: var(--c-green);
        border: 1px solid var(--c-green);
        color: #ffffff;
        font-size: 15.5px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        height: 50px;
        width: 100%;
        border-radius: 4px;
        transition: background 0.2s ease;
    }

    .btn-quick-quote:hover {
        background: var(--c-green-hover);
        border-color: var(--c-green-hover);
        color: #ffffff;
    }

    /* Validation Errors & Messages */
    .quote-field-error {
        color: #d9534f;
        font-size: 13.5px;
        font-weight: 500;
        margin-top: 6px;
        display: flex;
        align-items: center;
        gap: 6px;
        line-height: 1.4;
    }

    .quote-field-error i {
        font-size: 14px;
        color: #d9534f;
        flex-shrink: 0;
    }

    .quote-submission-error {
        color: #d9534f;
        font-size: 14px;
        font-weight: 500;
        margin-top: 14px;
        display: flex;
        align-items: center;
        gap: 6px;
        line-height: 1.4;
    }

    .quote-submission-error i {
        font-size: 15px;
        color: #d9534f;
        flex-shrink: 0;
    }

    .quote-submission-success {
        color: #42a900;
        background: rgba(66, 169, 0, 0.08);
        border: 1px solid rgba(66, 169, 0, 0.3);
        border-radius: 4px;
        padding: 10px 14px;
        font-size: 14px;
        font-weight: 600;
        margin-top: 14px;
        display: flex;
        align-items: center;
        gap: 8px;
        line-height: 1.4;
    }

    .quote-input.is-invalid {
        border-color: #d9534f !important;
    }

    /* ---------------------------------------------------------
       03. REACH OUT BANNER
    --------------------------------------------------------- */
    .reach-out-section {
        min-height: 380px;
        display: flex;
        align-items: center;
        position: relative;
        padding: 85px 0 110px;
        background:
            linear-gradient(
                rgba(4, 33, 60, 0.88),
                rgba(4, 33, 60, 0.88)
            ),
            url("{{ asset('images/contact 2.jpg') }}")
            center center / cover no-repeat;
    }

    .reach-out-tag {
        display: inline-block;
        color: #8ed42b;
        font-size: 13px;
        font-weight: 900;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 12px;
    }

    .reach-out-heading {
        color: #ffffff;
        font-family: 'Inter', sans-serif;
        font-size: clamp(24px, 3.2vw, 34px);
        font-weight: 900;
        line-height: 1.25;
        text-transform: uppercase;
        max-width: 780px;
        margin: 0 auto;
    }

    /* FLOATING QUICK CALL CARD */
    .reach-out-floating-wrap {
        position: relative;
        margin-top: -55px;
        margin-bottom: 75px;
        z-index: 10;
    }

    .reach-out-call-card {
        background: #ffffff;
        max-width: 500px;
        margin: 0 auto;
        padding: 24px 38px;
        border-radius: 8px;
        box-shadow: 0 15px 45px rgba(4, 28, 52, 0.14);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 20px;
        transition: transform 0.25s ease, box-shadow 0.25s ease;
    }

    .reach-out-call-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 20px 50px rgba(4, 28, 52, 0.18);
    }

    .quick-call-icon {
        width: 52px;
        min-width: 52px;
        height: 52px;
        background: var(--c-green);
        color: #ffffff;
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
    }

    .quick-call-details {
        display: flex;
        flex-direction: column;
    }

    .quick-call-label {
        color: var(--c-navy);
        font-size: 13px;
        font-weight: 900;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        margin-bottom: 2px;
    }

    .quick-call-phone {
        color: var(--c-navy);
        font-family: 'Inter', sans-serif;
        font-size: 24px;
        font-weight: 900;
        text-decoration: none;
        transition: color 0.2s ease;
    }

    .quick-call-phone:hover {
        color: var(--c-green);
    }

    /* ---------------------------------------------------------
       RESPONSIVE
    --------------------------------------------------------- */
    @media (max-width: 991px) {
        .contact-section {
            padding: 60px 0 70px;
        }

        .reach-out-section {
            padding: 70px 0 95px;
        }
    }

    @media (max-width: 767px) {
        .contact-hero {
            min-height: 340px;
            padding: 40px 0;
        }

        .contact-hero-card {
            padding: 30px 20px;
        }

        .contact-hero-card h1 {
            font-size: 28px;
        }

        .contact-hero-card p {
            font-size: 13.5px;
        }

        .contact-section {
            padding: 45px 0 55px;
        }

        .quick-quote-heading {
            font-size: 23px;
        }

        .reach-out-section {
            min-height: 320px;
            padding: 60px 0 80px;
        }

        .reach-out-heading {
            font-size: 21px;
        }

        .reach-out-call-card {
            padding: 18px 22px;
            gap: 14px;
        }

        .quick-call-icon {
            width: 44px;
            min-width: 44px;
            height: 44px;
            font-size: 20px;
        }

        .quick-call-phone {
            font-size: 19px;
        }

        .reach-out-floating-wrap {
            margin-top: -45px;
            margin-bottom: 50px;
        }
    }
</style>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('quickQuoteForm');
    if (!form) return;

    const nameInput = document.getElementById('quote_name');
    const phoneInput = document.getElementById('quote_phone');
    const emailInput = document.getElementById('quote_email');

    const nameError = document.getElementById('error_name');
    const phoneError = document.getElementById('error_phone');
    const emailError = document.getElementById('error_email');

    const submitError = document.getElementById('form_submission_error');
    const submitSuccess = document.getElementById('form_submission_success');
    const successText = document.getElementById('form_success_text');
    const submitBtn = form.querySelector('button[type="submit"]');

    function showError(input, errorEl, message) {
        if (!input || !errorEl) return;
        input.classList.add('is-invalid');
        const span = errorEl.querySelector('span');
        if (span) span.textContent = message;
        errorEl.style.display = 'flex';
    }

    function clearError(input, errorEl) {
        if (!input || !errorEl) return;
        input.classList.remove('is-invalid');
        errorEl.style.display = 'none';
    }

    function validateName() {
        const val = nameInput.value.trim();
        if (!val) {
            showError(nameInput, nameError, 'The field is required.');
            return false;
        }
        clearError(nameInput, nameError);
        return true;
    }

    function validatePhone() {
        const val = phoneInput.value.trim();
        if (!val) {
            showError(phoneInput, phoneError, 'The field is required.');
            return false;
        }
        // Accepts only numbers and phone characters (#, -, *, etc)
        const phoneCharsRegex = /^[0-9\s\+\-\(\)\#\*]{6,25}$/;
        if (!phoneCharsRegex.test(val)) {
            showError(phoneInput, phoneError, 'The field accepts only numbers and phone characters (#, -, *, etc).');
            return false;
        }
        clearError(phoneInput, phoneError);
        return true;
    }

    function validateEmail() {
        const val = emailInput.value.trim();
        if (!val) {
            showError(emailInput, emailError, 'The field is required.');
            return false;
        }
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(val)) {
            showError(emailInput, emailError, 'Please enter a valid email address.');
            return false;
        }
        clearError(emailInput, emailError);
        return true;
    }

    // Real-time phone check: if user enters letters or invalid phone characters, show error immediately
    phoneInput.addEventListener('input', function () {
        const val = phoneInput.value.trim();
        if (val && !/^[\d\s\+\-\(\)\#\*]+$/.test(val)) {
            showError(phoneInput, phoneError, 'The field accepts only numbers and phone characters (#, -, *, etc).');
        } else if (phoneInput.classList.contains('is-invalid')) {
            validatePhone();
        }
    });

    phoneInput.addEventListener('blur', function () {
        if (phoneInput.value.trim() !== '') {
            validatePhone();
        }
    });

    nameInput.addEventListener('input', function () {
        if (nameInput.classList.contains('is-invalid')) {
            validateName();
        }
    });

    nameInput.addEventListener('blur', function () {
        if (nameInput.value.trim() !== '') {
            validateName();
        }
    });

    emailInput.addEventListener('input', function () {
        if (emailInput.classList.contains('is-invalid')) {
            validateEmail();
        }
    });

    emailInput.addEventListener('blur', function () {
        if (emailInput.value.trim() !== '') {
            validateEmail();
        }
    });

    form.addEventListener('submit', function (e) {
        e.preventDefault();

        const isNameValid = validateName();
        const isPhoneValid = validatePhone();
        const isEmailValid = validateEmail();

        if (!isNameValid || !isPhoneValid || !isEmailValid) {
            if (submitError) submitError.style.display = 'flex';
            if (submitSuccess) submitSuccess.style.display = 'none';

            // Focus first invalid element
            if (!isNameValid) nameInput.focus();
            else if (!isPhoneValid) phoneInput.focus();
            else if (!isEmailValid) emailInput.focus();
            return;
        }

        if (submitError) submitError.style.display = 'none';
        const originalBtnText = submitBtn ? submitBtn.innerHTML : 'Get My Quote';
        if (submitBtn) {
            submitBtn.disabled = true;
            submitBtn.innerHTML = 'Sending...';
        }

        const formData = new FormData(form);

        fetch(form.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        })
        .then(async (response) => {
            const data = await response.json();
            if (!response.ok) {
                if (submitError) submitError.style.display = 'flex';
                if (data.errors) {
                    if (data.errors.name) showError(nameInput, nameError, data.errors.name[0]);
                    if (data.errors.phone) showError(phoneInput, phoneError, data.errors.phone[0]);
                    if (data.errors.email) showError(emailInput, emailError, data.errors.email[0]);
                }
            } else {
                form.reset();
                clearError(nameInput, nameError);
                clearError(phoneInput, phoneError);
                clearError(emailInput, emailError);
                if (submitError) submitError.style.display = 'none';
                if (submitSuccess) {
                    if (successText) {
                        successText.textContent = data.message || 'Thank you! Your inspection request has been submitted successfully.';
                    }
                    submitSuccess.style.display = 'flex';
                }
            }
        })
        .catch((err) => {
            console.error('Submission error:', err);
            if (submitError) submitError.style.display = 'flex';
        })
        .finally(() => {
            if (submitBtn) {
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalBtnText;
            }
        });
    });
});
</script>
@endpush