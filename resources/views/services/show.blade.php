@extends('layouts.app')

@section('title', $service->name . ' | Premium Building & Pest Inspections')

@section('content')

{{-- =========================================================
     HERO
========================================================= --}}
<section class="service-detail-hero">

    <div class="container">

        <div class="service-hero-content" data-aos="fade-right">

            <span class="hero-label">
                PREMIUM BUILDING & PEST INSPECTIONS
            </span>

            <h1>
                {{ $service->name }}
            </h1>

            <p>
                {{ $service->short_description }}
            </p>

            <div class="hero-buttons">

                <a href="{{ url('/#quote') }}"
                   class="btn btn-orange btn-glow">

                    <i class="bi bi-calendar-check me-2"></i>
                    Request an Inspection

                </a>

                <a href="tel:0466001551"
                   class="btn btn-outline-light">

                    <i class="bi bi-telephone me-2"></i>
                    0466 001 551

                </a>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
     SERVICE INTRO + QUOTE
========================================================= --}}
<section class="service-main section-padding">

    <div class="container">

        <div class="row g-5 align-items-start">

            {{-- SERVICE CONTENT --}}
            <div class="col-lg-7" data-aos="fade-right">

                <span class="section-tag">
                    PROFESSIONAL INSPECTION
                </span>

                <h2 class="service-main-title">

                    {{ $service->name }}

                </h2>

                <div class="service-description">

                    {!! nl2br(e($service->description)) !!}

                </div>


                {{-- PRICE --}}
                <div class="service-price-box hover-lift">

                    <div class="price-icon">
                        <i class="bi bi-currency-dollar"></i>
                    </div>

                    <div>

                        <small>
                            STARTING FROM
                        </small>

                        <strong>
                            @if($service->starting_price)
                                ${{ number_format($service->starting_price, 0) }}
                            @else
                                TBA
                            @endif
                        </strong>

                    </div>

                </div>


                {{-- SERVICE FEATURES --}}
                <div class="service-features">

                    <div class="feature-item hover-lift">

                        <div class="feature-icon">
                            <i class="bi bi-search"></i>
                        </div>

                        <div>
                            <h5>Detailed Inspection</h5>

                            <p>
                                Systematic inspection of accessible areas
                                of the property.
                            </p>
                        </div>

                    </div>


                    <div class="feature-item hover-lift">

                        <div class="feature-icon">
                            <i class="bi bi-file-earmark-text"></i>
                        </div>

                        <div>
                            <h5>Professional Report</h5>

                            <p>
                                Clear documentation of relevant inspection
                                observations and findings.
                            </p>
                        </div>

                    </div>


                    <div class="feature-item hover-lift">

                        <div class="feature-icon">
                            <i class="bi bi-shield-check"></i>
                        </div>

                        <div>
                            <h5>Independent Information</h5>

                            <p>
                                Get useful information to help you make a
                                more informed property decision.
                            </p>
                        </div>

                    </div>


                    <div class="feature-item hover-lift">

                        <div class="feature-icon">
                            <i class="bi bi-chat-dots"></i>
                        </div>

                        <div>
                            <h5>Clear Communication</h5>

                            <p>
                                Inspection observations explained in
                                straightforward language.
                            </p>
                        </div>

                    </div>

                </div>

            </div>


            {{-- QUOTE FORM --}}
            <div class="col-lg-5" data-aos="fade-left">

                <div id="quote-form" class="service-quote-card hover-lift">

                    <div class="quote-header">

                        <span class="section-tag">
                            GET A QUOTE
                        </span>

                        <h3>
                            Request Your Inspection
                        </h3>

                        <p>
                            Complete the form and our team will contact
                            you shortly.
                        </p>

                    </div>


                    @if(session('success'))

                        <div class="alert alert-success">

                            <i class="bi bi-check-circle-fill me-2"></i>

                            {{ session('success') }}

                        </div>

                    @endif


                    @if($errors->any())

                        <div class="alert alert-danger">

                            <strong>
                                Please check the form.
                            </strong>

                            <ul class="mb-0 mt-2">

                                @foreach($errors->all() as $error)

                                    <li>{{ $error }}</li>

                                @endforeach

                            </ul>

                        </div>

                    @endif


                    <form action="{{ route('quote.store') }}"
                          method="POST">

                        @csrf

                        <div class="mb-3">

                            <label>
                                Full Name <span>*</span>
                            </label>

                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                value="{{ old('name') }}"
                                placeholder="Your full name"
                                required
                            >

                        </div>


                        <div class="mb-3">

                            <label>
                                Phone <span>*</span>
                            </label>

                            <input
                                type="text"
                                name="phone"
                                class="form-control"
                                value="{{ old('phone') }}"
                                placeholder="Your phone number"
                                required
                            >

                        </div>


                        <div class="mb-3">

                            <label>
                                Email <span>*</span>
                            </label>

                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                value="{{ old('email') }}"
                                placeholder="Your email address"
                                required
                            >

                        </div>


                        <div class="mb-3">

                            <label>
                                Property Address <span>*</span>
                            </label>

                            <input
                                type="text"
                                name="property_address"
                                class="form-control"
                                value="{{ old('property_address') }}"
                                placeholder="Property address"
                                required
                            >

                        </div>


                        <div class="mb-3">

                            <label>
                                Inspection Service <span>*</span>
                            </label>

                            <select
                                name="service_type"
                                class="form-select"
                                required
                            >

                                <option value="">
                                    Select Service
                                </option>

                                <option
                                    value="{{ $service->name }}"
                                    selected
                                >
                                    {{ $service->name }}
                                </option>

                                <option value="Pre-Purchase Building and Pest Inspection">
                                    Pre-Purchase Building and Pest Inspection
                                </option>

                                <option value="Building Stage by Stage Inspection">
                                    Building Stage by Stage Inspection
                                </option>

                                <option value="Apartment Building Inspection">
                                    Apartment Building Inspection
                                </option>

                                <option value="Rising Damp Inspection">
                                    Rising Damp Inspection
                                </option>

                                <option value="Pool Barrier Inspection">
                                    Pool Barrier Inspection
                                </option>

                                <option value="Dilapidation Inspection">
                                    Dilapidation Inspection
                                </option>

                                <option value="New Build Handover Inspection">
                                    New Build Handover Inspection
                                </option>

                                <option value="Vendor Inspection">
                                    Vendor Inspection
                                </option>

                                <option value="Builders Warranty Inspection">
                                    Builders Warranty Inspection
                                </option>

                            </select>

                        </div>


                        <div class="mb-4">

                            <label>
                                Message
                            </label>

                            <textarea
                                name="message"
                                class="form-control"
                                rows="4"
                                placeholder="Tell us anything important about the property..."
                            >{{ old('message') }}</textarea>

                        </div>


                        <button
                            type="submit"
                            class="btn btn-orange w-100 quote-submit btn-glow"
                        >

                            <i class="bi bi-send-fill me-2"></i>

                            Get My Quote

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
     WHY THIS INSPECTION IS IMPORTANT
========================================================= --}}
<section class="why-inspection section-padding">

    <div class="container">

        <div class="row align-items-center g-5">

            <div class="col-lg-6" data-aos="fade-right">

                <div class="why-image img-zoom-hover">

                    <img
                        src="{{ asset('images/schedule.jpeg') }}"
                        alt="Property inspection"
                    >

                    <div class="image-badge">

                        <i class="bi bi-shield-check"></i>

                        <div>
                            <strong>Inspect Before You Invest</strong>
                            <span>Make an informed property decision</span>
                        </div>

                    </div>

                </div>

            </div>


            <div class="col-lg-6" data-aos="fade-left">

                <span class="section-tag">
                    WHY IT MATTERS
                </span>

                <h2 class="section-title">
                    Know What You're
                    <span>Buying</span>
                </h2>

                <p class="section-text">
                    A property may look perfect during a normal inspection,
                    but important concerns can be difficult to notice without
                    a professional inspection.
                </p>

                <p class="section-text">
                    Our inspection provides an independent assessment of
                    accessible areas and helps you understand visible defects,
                    deterioration, moisture concerns, pest-related observations
                    and other property conditions.
                </p>


                <div class="check-list">

                    <div>
                        <i class="bi bi-check-circle-fill"></i>
                        Identify visible property defects
                    </div>

                    <div>
                        <i class="bi bi-check-circle-fill"></i>
                        Identify moisture-related concerns
                    </div>

                    <div>
                        <i class="bi bi-check-circle-fill"></i>
                        Check for visible pest-related signs
                    </div>

                    <div>
                        <i class="bi bi-check-circle-fill"></i>
                        Understand maintenance concerns
                    </div>

                    <div>
                        <i class="bi bi-check-circle-fill"></i>
                        Make a more informed decision
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
     COMMON ISSUES
========================================================= --}}
<section class="common-issues section-padding">

    <div class="container">

        <div class="text-center section-heading mb-5" data-aos="fade-up">

            <span class="section-tag">
                WHAT WE LOOK FOR
            </span>

            <h2>
                Common Property
                <span>Concerns</span>
            </h2>

            <p>
                Depending on the service and property, our inspection may
                identify visible concerns such as:
            </p>

        </div>


        <div class="row g-4">

            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">

                <div class="issue-card hover-lift">

                    <div class="issue-icon">
                        <i class="bi bi-bricks"></i>
                    </div>

                    <h4>
                        Cracking & Defects
                    </h4>

                    <p>
                        Visible cracking, deterioration and other building
                        defects that may require attention.
                    </p>

                </div>

            </div>


            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">

                <div class="issue-card hover-lift">

                    <div class="issue-icon">
                        <i class="bi bi-droplet-half"></i>
                    </div>

                    <h4>
                        Moisture Concerns
                    </h4>

                    <p>
                        Visible signs of dampness, staining or moisture-related
                        deterioration.
                    </p>

                </div>

            </div>


            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">

                <div class="issue-card hover-lift">

                    <div class="issue-icon">
                        <i class="bi bi-bug"></i>
                    </div>

                    <h4>
                        Termites & Timber Pests
                    </h4>

                    <p>
                        Visible signs of termite or timber pest activity and
                        conditions that may encourage activity.
                    </p>

                </div>

            </div>


            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">

                <div class="issue-card hover-lift">

                    <div class="issue-icon">
                        <i class="bi bi-house"></i>
                    </div>

                    <h4>
                        Roof Concerns
                    </h4>

                    <p>
                        Accessible roof areas may be assessed for visible
                        defects and deterioration.
                    </p>

                </div>

            </div>


            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">

                <div class="issue-card hover-lift">

                    <div class="issue-icon">
                        <i class="bi bi-water"></i>
                    </div>

                    <h4>
                        Drainage Issues
                    </h4>

                    <p>
                        Visible drainage and water-management concerns around
                        accessible areas of the property.
                    </p>

                </div>

            </div>


            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">

                <div class="issue-card hover-lift">

                    <div class="issue-icon">
                        <i class="bi bi-tools"></i>
                    </div>

                    <h4>
                        Maintenance Concerns
                    </h4>

                    <p>
                        Visible conditions that may require maintenance,
                        repair or further investigation.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
     TECHNOLOGY
========================================================= --}}
<section class="technology-section section-padding">

    <div class="container">

        <div class="row align-items-center g-5">

            <div class="col-lg-6" data-aos="fade-right">

                <span class="section-tag">
                    MODERN TECHNOLOGY
                </span>

                <h2 class="section-title">
                    We Inspect Beyond
                    <span>What You See</span>
                </h2>

                <p class="section-text">
                    Where appropriate, our inspectors use modern inspection
                    equipment to assist with identifying areas that may
                    require further investigation.
                </p>


                <div class="technology-list">

                    <div class="technology-item hover-lift">

                        <div class="technology-icon">
                            <i class="bi bi-thermometer-half"></i>
                        </div>

                        <div>

                            <h5>
                                Thermal Imaging
                            </h5>

                            <p>
                                Helps identify temperature variations in
                                accessible areas.
                            </p>

                        </div>

                    </div>


                    <div class="technology-item hover-lift">

                        <div class="technology-icon">
                            <i class="bi bi-droplet-half"></i>
                        </div>

                        <div>

                            <h5>
                                Moisture Detection
                            </h5>

                            <p>
                                Helps investigate suspected moisture-related
                                concerns.
                            </p>

                        </div>

                    </div>


                    <div class="technology-item hover-lift">

                        <div class="technology-icon">
                            <i class="bi bi-search"></i>
                        </div>

                        <div>

                            <h5>
                                Visual Inspection
                            </h5>

                            <p>
                                A systematic visual assessment of accessible
                                areas of the property.
                            </p>

                        </div>

                    </div>

                </div>

            </div>


            <div class="col-lg-6" data-aos="fade-left">

                <div class="technology-image img-zoom-hover">

                    <img
                        src="{{ asset('images/g3.jpg') }}"
                        alt="Building inspection technology"
                    >

                    <div class="technology-overlay">

                        <div>
                            <i class="bi bi-camera"></i>

                            <strong>
                                Professional Inspection
                            </strong>

                            <span>
                                Modern tools & detailed reporting
                            </span>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
     INSPECTOR
========================================================= --}}
<section class="inspector-section section-padding">

    <div class="container">

        <div class="inspector-box hover-lift" data-aos="fade-up">

            <div class="row align-items-center g-5">

                <div class="col-lg-4">

                    <div class="inspector-image img-zoom-hover">

                        <img
                            src="{{ asset('images/ronak gami.jpeg') }}"
                            alt="Ronak Gami - Professional building inspector"
                        >

                    </div>

                </div>


                <div class="col-lg-8">

                    <span class="section-tag">
                        YOUR INSPECTOR
                    </span>

                    <h2>
                        Ronak <span>Gami</span>
                    </h2>

                    <p class="inspector-role">
                        Building Inspector & Domestic Builder
                    </p>

                    <p>
                        Premium Building & Pest Inspections is committed to
                        providing professional, independent and easy-to-
                        understand inspection information to property buyers,
                        owners and builders.
                    </p>


                    <div class="licence-list">

                        <div>

                            <i class="bi bi-patch-check-fill"></i>

                            <span>
                                VBA Building Inspector Licence No.
                                <strong>IN-PS 74654</strong>
                            </span>

                        </div>

                        <div>

                            <i class="bi bi-patch-check-fill"></i>

                            <span>
                                Domestic Builder Licence No.
                                <strong>DB-L 100200</strong>
                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
     FAQ
========================================================= --}}
<section class="faq-section section-padding">

    <div class="container">

        <div class="text-center section-heading mb-5" data-aos="fade-up">

            <span class="section-tag">
                FAQ
            </span>

            <h2>
                Frequently Asked
                <span>Questions</span>
            </h2>

        </div>


        <div class="accordion faq-accordion"
             id="serviceFaq">


            <div class="accordion-item" data-aos="fade-up" data-aos-delay="100">

                <h2 class="accordion-header">

                    <button
                        class="accordion-button"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#faqOne"
                    >
                        What does the inspection include?
                    </button>

                </h2>

                <div
                    id="faqOne"
                    class="accordion-collapse collapse show"
                    data-bs-parent="#serviceFaq"
                >

                    <div class="accordion-body">

                        The inspection focuses on accessible areas of the
                        property and visible conditions relevant to the
                        inspection service requested.

                    </div>

                </div>

            </div>


            <div class="accordion-item" data-aos="fade-up" data-aos-delay="200">

                <h2 class="accordion-header">

                    <button
                        class="accordion-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#faqTwo"
                    >
                        Will I receive a report?
                    </button>

                </h2>

                <div
                    id="faqTwo"
                    class="accordion-collapse collapse"
                    data-bs-parent="#serviceFaq"
                >

                    <div class="accordion-body">

                        A professional report may be provided following the
                        inspection, depending on the service and agreed scope.

                    </div>

                </div>

            </div>


            <div class="accordion-item" data-aos="fade-up" data-aos-delay="300">

                <h2 class="accordion-header">

                    <button
                        class="accordion-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#faqThree"
                    >
                        Can you inspect concealed areas?
                    </button>

                </h2>

                <div
                    id="faqThree"
                    class="accordion-collapse collapse"
                    data-bs-parent="#serviceFaq"
                >

                    <div class="accordion-body">

                        No. A standard visual inspection is limited to areas
                        that are accessible and reasonably safe to inspect.
                        Concealed areas may require specialist investigation.

                    </div>

                </div>

            </div>


            <div class="accordion-item" data-aos="fade-up" data-aos-delay="400">

                <h2 class="accordion-header">

                    <button
                        class="accordion-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#faqFour"
                    >
                        How can I arrange an inspection?

                    </button>

                </h2>

                <div
                    id="faqFour"
                    class="accordion-collapse collapse"
                    data-bs-parent="#serviceFaq"
                >

                    <div class="accordion-body">

                        You can request an inspection using the quote form on
                        this page or contact our team directly on
                        <strong>0466 001 551</strong>.

                    </div>

                </div>

            </div>


        </div>

    </div>

</section>


{{-- =========================================================
     FINAL CTA
========================================================= --}}
<section class="service-final-cta">

    <div class="container">

        <div class="final-cta-box text-center" data-aos="zoom-in">

            <span class="section-tag">
                READY TO GET STARTED?
            </span>

            <h2>
                Don't Buy Blind.
                <span>Inspect First.</span>
            </h2>

            <p>
                Get the information you need to make a confident
                property decision.
            </p>

            <div class="cta-buttons">

                <a href="#quote-form"
                   class="btn btn-orange btn-glow">

                    <i class="bi bi-calendar-check me-2"></i>

                    Request Your Inspection

                </a>

                <a href="{{ route('contact') }}"
                   class="btn btn-navy">

                    <i class="bi bi-envelope me-2"></i>

                    Contact Us

                </a>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
     CSS
========================================================= --}}
<style>

    /* HERO */

    .service-detail-hero {
        min-height: 500px;

        display: flex;
        align-items: center;

        color: #fff;

        background:
            linear-gradient(
                90deg,
                rgba(7, 28, 52, .96),
                rgba(7, 28, 52, .78)
            ),
            url('{{ asset('images/service banner.jpg') }}')
            center/cover no-repeat;
    }

    .service-hero-content {
        max-width: 900px;

        padding: 90px 0;
    }

    .hero-label {
        display: inline-block;

        color: #FF6B00;

        font-size: 13px;

        font-weight: 800;

        letter-spacing: 2px;

        margin-bottom: 15px;
    }

    .service-hero-content h1 {
        font-size: clamp(38px, 5.5vw, 65px);

        font-weight: 800;

        line-height: 1.15;

        margin-bottom: 22px;
    }

    .service-hero-content p {
        max-width: 760px;

        color: rgba(255,255,255,.88);

        font-size: 18px;

        line-height: 1.8;

        margin-bottom: 30px;
    }

    .hero-buttons {
        display: flex;

        flex-wrap: wrap;

        gap: 15px;
    }


    /* COMMON */

    .section-padding {
        padding: 90px 0;
    }

    .section-tag {
        display: inline-block;

        color: #FF6B00;

        font-size: 13px;

        font-weight: 800;

        letter-spacing: 1.8px;

        margin-bottom: 12px;
    }

    .service-main-title,
    .section-title {
        color: #0B1F3A;

        font-size: clamp(34px, 4vw, 50px);

        font-weight: 800;

        line-height: 1.2;

        margin-bottom: 20px;
    }

    .section-title span,
    .service-main-title span {
        color: #FF6B00;
    }

    .section-text {
        color: #687586;

        line-height: 1.8;

        font-size: 16px;
    }


    /* SERVICE MAIN */

    .service-main {
        background: #f7f9fc;
    }

    .service-description {
        color: #687586;

        font-size: 16px;

        line-height: 1.9;

        margin-bottom: 25px;
    }

    .service-price-box {
        display: inline-flex;

        align-items: center;

        gap: 15px;

        padding: 17px 24px;

        margin-bottom: 30px;

        border-radius: 12px;

        background: #0B1F3A;

        color: #fff;
    }

    .price-icon {
        width: 45px;
        height: 45px;

        display: flex;

        align-items: center;
        justify-content: center;

        border-radius: 10px;

        background: #FF6B00;

        font-size: 20px;
    }

    .service-price-box small {
        display: block;

        color: rgba(255,255,255,.65);

        font-size: 10px;

        font-weight: 700;

        letter-spacing: 1px;
    }

    .service-price-box strong {
        display: block;

        font-size: 24px;

        font-weight: 800;
    }


    /* FEATURES */

    .service-features {
        display: grid;

        grid-template-columns: repeat(2, 1fr);

        gap: 20px;

        margin-top: 10px;
    }

    .feature-item {
        display: flex;

        gap: 13px;

        padding: 18px;

        background: #fff;

        border-radius: 12px;

        border: 1px solid #e7ecf1;
    }

    .feature-icon {
        width: 42px;
        min-width: 42px;
        height: 42px;

        display: flex;

        align-items: center;
        justify-content: center;

        border-radius: 10px;

        background: rgba(255,107,0,.1);

        color: #FF6B00;
    }

    .feature-item h5 {
        color: #0B1F3A;

        font-size: 15px;

        font-weight: 800;

        margin-bottom: 5px;
    }

    .feature-item p {
        color: #687586;

        font-size: 13px;

        line-height: 1.6;

        margin-bottom: 0;
    }


    /* QUOTE */

    .service-quote-card {
        padding: 35px;

        background: #fff;

        border-radius: 20px;

        box-shadow:
            0 15px 45px rgba(11,31,58,.1);
    }

    .quote-header {
        margin-bottom: 25px;
    }

    .quote-header h3 {
        color: #0B1F3A;

        font-size: 28px;

        font-weight: 800;

        margin-bottom: 8px;
    }

    .quote-header p {
        color: #687586;

        margin-bottom: 0;
    }

    .service-quote-card label {
        display: block;

        color: #0B1F3A;

        font-weight: 700;

        font-size: 14px;

        margin-bottom: 7px;
    }

    .service-quote-card label span {
        color: #FF6B00;
    }

    .service-quote-card .form-control,
    .service-quote-card .form-select {
        min-height: 52px;

        border: 1px solid #dce2e9;

        border-radius: 9px;

        box-shadow: none;
    }

    .service-quote-card .form-control:focus,
    .service-quote-card .form-select:focus {
        border-color: #FF6B00;

        box-shadow:
            0 0 0 3px rgba(255,107,0,.1);
    }

    .service-quote-card textarea.form-control {
        min-height: 100px;

        resize: vertical;
    }

    .quote-submit {
        min-height: 54px;

        border: 0;

        font-weight: 800;
    }


    /* WHY */

    .why-inspection {
        background: #fff;
    }

    .why-image {
        position: relative;

        overflow: hidden;

        border-radius: 20px;
    }

    .why-image img {
        width: 100%;

        min-height: 500px;

        object-fit: cover;
    }

    .image-badge {
        position: absolute;

        left: 25px;
        right: 25px;
        bottom: 25px;

        display: flex;

        align-items: center;

        gap: 15px;

        padding: 17px 20px;

        border-radius: 12px;

        background: #fff;

        box-shadow: 0 10px 30px rgba(0,0,0,.15);
    }

    .image-badge > i {
        color: #FF6B00;

        font-size: 27px;
    }

    .image-badge strong,
    .image-badge span {
        display: block;
    }

    .image-badge strong {
        color: #0B1F3A;
    }

    .image-badge span {
        color: #687586;

        font-size: 13px;
    }

    .check-list {
        margin-top: 25px;
    }

    .check-list div {
        padding: 9px 0;

        color: #344256;

        font-weight: 600;
    }

    .check-list i {
        color: #48a900;

        margin-right: 10px;
    }


    /* COMMON ISSUES */

    .common-issues {
        background: #f7f9fc;
    }

    .section-heading {
        max-width: 750px;

        margin-left: auto;
        margin-right: auto;
    }

    .section-heading p {
        color: #687586;

        line-height: 1.8;
    }

    .issue-card {
        height: 100%;

        padding: 30px;

        background: #fff;

        border-radius: 15px;

        border: 1px solid #e7ecf1;

        transition: .3s ease;
    }

    .issue-card:hover {
        transform: translateY(-7px);

        box-shadow:
            0 15px 35px rgba(11,31,58,.08);
    }

    .issue-icon {
        width: 58px;
        height: 58px;

        display: flex;

        align-items: center;
        justify-content: center;

        border-radius: 13px;

        background: rgba(255,107,0,.1);

        color: #FF6B00;

        font-size: 25px;

        margin-bottom: 18px;
    }

    .issue-card h4 {
        color: #0B1F3A;

        font-size: 19px;

        font-weight: 800;

        margin-bottom: 10px;
    }

    .issue-card p {
        color: #687586;

        line-height: 1.7;

        margin-bottom: 0;
    }


    /* TECHNOLOGY */

    .technology-section {
        background: #fff;
    }

    .technology-list {
        margin-top: 25px;
    }

    .technology-item {
        display: flex;

        gap: 16px;

        padding: 17px 0;

        border-bottom: 1px solid #e7ecf1;
    }

    .technology-item:last-child {
        border-bottom: 0;
    }

    .technology-icon {
        width: 50px;
        min-width: 50px;
        height: 50px;

        display: flex;

        align-items: center;
        justify-content: center;

        border-radius: 11px;

        background: rgba(255,107,0,.1);

        color: #FF6B00;

        font-size: 21px;
    }

    .technology-item h5 {
        color: #0B1F3A;

        font-weight: 800;

        margin-bottom: 5px;
    }

    .technology-item p {
        color: #687586;

        font-size: 14px;

        line-height: 1.6;

        margin-bottom: 0;
    }

    .technology-image {
        position: relative;

        overflow: hidden;

        border-radius: 20px;
    }

    .technology-image img {
        width: 100%;

        min-height: 500px;

        object-fit: cover;
    }

    .technology-overlay {
        position: absolute;

        inset: auto 20px 20px;

        padding: 20px;

        border-radius: 13px;

        background: rgba(11,31,58,.9);

        color: #fff;
    }

    .technology-overlay i {
        display: block;

        color: #FF6B00;

        font-size: 25px;

        margin-bottom: 7px;
    }

    .technology-overlay strong,
    .technology-overlay span {
        display: block;
    }

    .technology-overlay span {
        color: rgba(255,255,255,.65);

        font-size: 13px;

        margin-top: 4px;
    }


    /* INSPECTOR */

    .inspector-section {
        background: #f7f9fc;
    }

    .inspector-box {
        padding: 45px;

        background: #fff;

        border-radius: 20px;

        box-shadow:
            0 15px 45px rgba(11,31,58,.08);
    }

    .inspector-image {
        height: 360px;

        overflow: hidden;

        border-radius: 15px;
    }

    .inspector-image img {
        width: 100%;
        height: 100%;

        object-fit: cover;
    }

    .inspector-box h2 {
        color: #0B1F3A;

        font-size: 42px;

        font-weight: 800;

        margin-bottom: 5px;
    }

    .inspector-box h2 span {
        color: #FF6B00;
    }

    .inspector-role {
        color: #FF6B00;

        font-weight: 700;

        margin-bottom: 18px;
    }

    .inspector-box > .row p {
        color: #687586;

        line-height: 1.8;
    }

    .licence-list {
        margin-top: 20px;
    }

    .licence-list div {
        display: flex;

        gap: 10px;

        margin-bottom: 12px;

        color: #344256;
    }

    .licence-list i {
        color: #48a900;
    }


    /* FAQ */

    .faq-section {
        background: #fff;
    }

    .faq-accordion {
        max-width: 850px;

        margin: auto;
    }

    .faq-accordion .accordion-item {
        margin-bottom: 12px;

        border: 1px solid #e2e8ee;

        border-radius: 10px !important;

        overflow: hidden;
    }

    .faq-accordion .accordion-button {
        color: #0B1F3A;

        font-weight: 700;

        padding: 20px;

        background: #fff;

        box-shadow: none;
    }

    .faq-accordion .accordion-button:not(.collapsed) {
        color: #FF6B00;

        background: #fff7ef;
    }

    .faq-accordion .accordion-body {
        color: #687586;

        line-height: 1.8;

        padding: 0 20px 20px;
    }


    /* CTA */

    .service-final-cta {
        padding: 80px 0;

        background: #f7f9fc;
    }

    .final-cta-box {
        padding: 70px 30px;

        background: #fff;

        border-radius: 22px;

        box-shadow:
            0 15px 45px rgba(11,31,58,.08);
    }

    .final-cta-box h2 {
        color: #0B1F3A;

        font-size: clamp(35px, 5vw, 55px);

        font-weight: 800;

        margin-bottom: 15px;
    }

    .final-cta-box h2 span {
        color: #FF6B00;
    }

    .final-cta-box p {
        color: #687586;

        font-size: 17px;

        margin-bottom: 28px;
    }

    .cta-buttons {
        display: flex;

        justify-content: center;

        flex-wrap: wrap;

        gap: 15px;
    }

    .btn-orange {
        background: #FF6B00;

        border: 2px solid #FF6B00;

        color: #fff;

        font-weight: 800;

        padding: 13px 25px;

        border-radius: 8px;
    }

    .btn-orange:hover {
        background: #e95f00;

        border-color: #e95f00;

        color: #fff;
    }

    .btn-outline-light {
        border: 2px solid rgba(255,255,255,.8);

        color: #fff;

        font-weight: 700;

        padding: 13px 25px;

        border-radius: 8px;
    }

    .btn-outline-light:hover {
        background: #fff;

        color: #0B1F3A;
    }

    .btn-navy {
        background: #0B1F3A;

        border: 2px solid #0B1F3A;

        color: #fff;

        font-weight: 800;

        padding: 13px 25px;

        border-radius: 8px;
    }

    .btn-navy:hover {
        background: #123F67;

        border-color: #123F67;

        color: #fff;
    }


    /* MOBILE */

    @media (max-width: 767px) {

        .service-detail-hero {
            min-height: 450px;
        }

        .service-hero-content {
            padding: 65px 0;
        }

        .service-hero-content p {
            font-size: 16px;
        }

        .hero-buttons {
            flex-direction: column;
        }

        .hero-buttons .btn {
            width: 100%;
        }

        .section-padding {
            padding: 65px 0;
        }

        .service-features {
            grid-template-columns: 1fr;
        }

        .service-quote-card {
            padding: 25px 20px;
        }

        .why-image img,
        .technology-image img {
            min-height: 350px;
        }

        .inspector-box {
            padding: 25px 20px;
        }

        .inspector-image {
            height: 300px;
        }

        .inspector-box h2 {
            font-size: 34px;
        }

        .agreement-card {
            padding: 25px 20px;
        }

        .final-cta-box {
            padding: 50px 20px;
        }

        .cta-buttons {
            flex-direction: column;
        }

        .cta-buttons .btn {
            width: 100%;
        }

    }

</style>

@endsection