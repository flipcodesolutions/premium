@extends('layouts.app')

@section('title', 'Contact Us | Premium Building & Pest Inspections')

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
                    <div class="contact-detail-item">
                        <div class="contact-detail-icon">
                            <i class="bi bi-geo-alt-fill"></i>
                        </div>
                        <div class="contact-detail-content">
                            <h4>HEAD OFFICE</h4>
                            <p>37 Burlina Boulevard, Clyde North VIC 3978, Australia</p>
                        </div>
                    </div>

                    {{-- EMAIL SUPPORT --}}
                    <div class="contact-detail-item">
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
                    <div class="contact-detail-item">
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
                <div class="contact-form-wrapper">
                    <h2 class="quick-quote-heading">GET QUICK QUOTE</h2>

                    <form action="{{ route('quote.store') }}" method="POST">
                        @csrf

                        <div class="row g-3">
                            {{-- Name --}}
                            <div class="col-md-6">
                                <input type="text"
                                       name="name"
                                       class="form-control quote-input"
                                       placeholder="Name"
                                       value="{{ old('name') }}"
                                       required>
                            </div>

                            {{-- Phone --}}
                            <div class="col-md-6">
                                <input type="tel"
                                       name="phone"
                                       class="form-control quote-input"
                                       placeholder="Phone"
                                       value="{{ old('phone') }}"
                                       required>
                            </div>

                            {{-- Email --}}
                            <div class="col-md-6">
                                <input type="email"
                                       name="email"
                                       class="form-control quote-input"
                                       placeholder="Email"
                                       value="{{ old('email') }}"
                                       required>
                            </div>

                            {{-- Address --}}
                            <div class="col-md-6">
                                <input type="text"
                                       name="property_address"
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
                                <button type="submit" class="btn btn-quick-quote">
                                    Get My Quote
                                </button>
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
        <div class="reach-out-call-card" data-aos="zoom-in" data-aos-duration="600">
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
        --c-green: #43a900;
        --c-green-hover: #378e00;
        --c-navy: #072448;
        --c-navy-dark: #051c38;
        --c-text: #4a5568;
        --c-input-bg: #edf2f7;
        --c-input-border: #e2e8f0;
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
        font-family: 'Montserrat', sans-serif;
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
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 600 600' opacity='0.35'%3E%3Cpath fill='none' stroke='%2388c66e' stroke-width='1.2' d='M0,350 Q150,300 300,380 T600,320 M0,380 Q150,330 300,410 T600,350 M0,410 Q150,360 300,440 T600,380 M0,440 Q150,390 300,470 T600,410 M0,470 Q150,420 300,500 T600,440 M0,500 Q150,450 300,530 T600,470 M0,530 Q150,480 300,560 T600,500 M0,560 Q150,510 300,590 T600,530' /%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: bottom left;
        background-size: 380px;
    }

    .contact-green-label {
        display: inline-block;
        color: var(--c-green);
        font-size: 13.5px;
        font-weight: 900;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        margin-bottom: 8px;
    }

    .contact-tagline {
        color: var(--c-navy);
        font-size: 14px;
        line-height: 1.6;
        margin-bottom: 34px;
        max-width: 420px;
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
        width: 44px;
        min-width: 44px;
        height: 44px;
        background: var(--c-green);
        color: #ffffff;
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 19px;
    }

    .contact-detail-content h4 {
        color: var(--c-navy);
        font-size: 13px;
        font-weight: 900;
        text-transform: uppercase;
        letter-spacing: 0.4px;
        margin: 0 0 3px;
    }

    .contact-detail-content p,
    .contact-detail-content a {
        color: var(--c-text);
        font-size: 13.5px;
        line-height: 1.5;
        margin: 0;
        text-decoration: none;
    }

    .contact-detail-content a:hover {
        color: var(--c-green);
    }

    /* FORM */
    .quick-quote-heading {
        color: var(--c-navy);
        font-family: 'Montserrat', sans-serif;
        font-size: 27px;
        font-weight: 900;
        text-transform: uppercase;
        letter-spacing: 0.3px;
        margin: 0 0 20px;
    }

    .quote-input {
        background-color: var(--c-input-bg);
        border: 1px solid var(--c-input-border);
        border-radius: 4px;
        color: #1a202c;
        font-size: 13.5px;
        height: 46px;
        padding: 10px 14px;
        box-shadow: none;
        transition: all 0.2s ease;
    }

    .quote-input::placeholder {
        color: #8c9ba5;
    }

    .quote-input:focus {
        background-color: #ffffff;
        border-color: var(--c-green);
        box-shadow: 0 0 0 3px rgba(67, 169, 0, 0.15);
    }

    .quote-textarea {
        height: auto;
        min-height: 100px;
        resize: vertical;
    }

    .quote-select {
        color: #4a5568;
    }

    .btn-quick-quote {
        background: var(--c-green);
        border: 1px solid var(--c-green);
        color: #ffffff;
        font-size: 14px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        height: 46px;
        width: 100%;
        border-radius: 4px;
        transition: background 0.2s ease;
    }

    .btn-quick-quote:hover {
        background: var(--c-green-hover);
        border-color: var(--c-green-hover);
        color: #ffffff;
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
        font-family: 'Montserrat', sans-serif;
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
        font-family: 'Montserrat', sans-serif;
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