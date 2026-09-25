@extends('layouts.app')

@section('title', 'Our Services | Premium Building & Pest Inspections')

@section('content')

<style>

/* =========================================================
   SERVICES PAGE
   Same visual identity as reference screenshot
========================================================= */

:root {
    --service-navy: #0b3158;
    --service-navy-dark: #082846;
    --service-blue: #123f67;
    --service-green: #43a900;
    --service-green-dark: #319000;
    --service-light: #eef4f9;
    --service-text: #334b61;
    --service-muted: #66798a;
}


/* =========================================================
   COMMON
========================================================= */

.services-page {
    background: #ffffff;
}

.services-container {
    max-width: 1200px;
    margin: 0 auto;
    padding-left: 15px;
    padding-right: 15px;
}

.services-small-title {
    color: var(--service-green);
    font-size: 11px;
    font-weight: 900;
    text-transform: uppercase;
    letter-spacing: .4px;
    margin-bottom: 8px;
}

.services-main-heading {
    color: var(--service-navy);
    font-size: 30px;
    line-height: 1.08;
    font-weight: 900;
    text-transform: uppercase;
    margin: 0;
}


/* =========================================================
   SERVICES HERO
========================================================= */

.services-hero {
    min-height: 440px;

    display: flex;
    align-items: center;

    position: relative;

    padding: 60px 0;

    background:
        linear-gradient(
            rgba(4, 45, 78, .75),
            rgba(4, 45, 78, .75)
        ),
        url("{{ asset('images/service banner.jpg') }}")
        center center / cover no-repeat;
}

.services-hero-content {
    width: 100%;
    max-width: 780px;

    margin: 0 auto;

    text-align: center;

    color: #ffffff;

    padding: 48px 36px;

    background: rgba(4, 38, 67, .55);
    border-radius: 8px;
}

.services-hero-content h1 {
    color: #ffffff;

    font-family: 'Montserrat', sans-serif;

    font-size: 38px;
    font-weight: 900;

    line-height: 1.1;

    text-transform: uppercase;

    margin: 0 0 16px;
}

.services-hero-content p {
    max-width: 660px;

    margin: 0 auto;

    color: rgba(255,255,255,.95);

    font-size: 15.5px;

    line-height: 1.75;
}


/* =========================================================
   SERVICES INTRO
========================================================= */

.services-intro {
    padding: 35px 0 18px;

    text-align: center;
}

.services-intro .services-main-heading {
    margin-bottom: 0;
}


/* =========================================================
   SERVICES GRID
========================================================= */

.services-grid-section {
    padding: 0 0 70px;
}

.services-grid {
    display: grid;

    grid-template-columns:
        repeat(3, minmax(0, 1fr));

    gap: 10px;
}


/* =========================================================
   SERVICE CARD
========================================================= */

.service-card {
    background: #ffffff;

    border: 1px solid #e7e7e7;

    box-shadow:
        0 3px 12px rgba(0,0,0,.08);

    display: flex;

    flex-direction: column;

    min-width: 0;

    transition:
        transform .25s ease,
        box-shadow .25s ease;
}

.service-card:hover {
    transform: translateY(-4px);

    box-shadow:
        0 8px 22px rgba(0,0,0,.12);
}


/* =========================================================
   CARD IMAGE
========================================================= */

.service-card-image {
    width: 100%;

    height: 235px;

    overflow: hidden;

    background: #eef2f5;
}

.service-card-image img {
    width: 100%;

    height: 100%;

    object-fit: cover;

    display: block;

    transition: transform .4s ease;
}

.service-card:hover .service-card-image img {
    transform: scale(1.05);
}


/* =========================================================
   CARD BODY
========================================================= */

.service-card-body {
    padding: 20px 20px 22px;

    display: flex;

    flex-direction: column;

    flex: 1;
}

.service-card-title {
    color: var(--service-navy);

    font-size: 17px;

    line-height: 1.25;

    font-weight: 800;

    text-transform: uppercase;

    margin: 0 0 12px;
}

.service-card-description {
    color: var(--service-text);

    font-size: 13.5px;

    line-height: 1.6;

    margin: 0 0 18px;

    flex: 1;
}


/* =========================================================
   LEARN MORE BUTTON
========================================================= */

.service-learn-btn {
    display: inline-flex;

    align-items: center;

    justify-content: center;

    align-self: flex-start;

    background: var(--service-green);

    border: 1px solid var(--service-green);

    color: #ffffff;

    padding: 11px 22px;

    font-size: 11.5px;

    font-weight: 800;

    text-transform: uppercase;

    text-decoration: none;

    border-radius: 4px;

    transition: .25s ease;
}

.service-learn-btn i {
    font-size: 11px;

    margin-left: 7px;
}

.service-learn-btn:hover {
    background: var(--service-green-dark);

    border-color: var(--service-green-dark);

    color: #ffffff;

    transform: translateY(-2px);
}


/* =========================================================
   WHY CHOOSE US / ENVIRONMENTALLY FRIENDLY
========================================================= */

.environment-section {
    padding: 0 0 65px;
}

.environment-wrapper {
    max-width: 1080px;

    margin: 0 auto;

    min-height: 280px;

    padding: 50px 40px 45px;

    border-radius: 18px 0 0 0;

    background:
        linear-gradient(
            180deg,
            #d7ecc7 0%,
            #edf6e9 55%,
            #ffffff 100%
        );
}

.environment-heading-wrap {
    text-align: center;

    margin-bottom: 35px;
}

.environment-heading-wrap .services-small-title {
    margin-bottom: 8px;
}

.environment-heading {
    color: var(--service-navy);

    font-size: 25px;

    line-height: 1.15;

    font-weight: 900;

    text-transform: uppercase;

    max-width: 580px;

    margin: 0 auto;
}


/* =========================================================
   ENVIRONMENT ITEMS
========================================================= */

.environment-items {
    display: grid;

    grid-template-columns:
        repeat(4, minmax(0, 1fr));

    gap: 25px;
}

.environment-item {
    text-align: center;
}

.environment-icon {
    width: 38px;
    height: 38px;

    margin: 0 auto 12px;

    display: flex;

    align-items: center;

    justify-content: center;

    background: var(--service-green);

    color: #ffffff;

    border-radius: 4px;

    font-size: 16px;
}

.environment-item h3 {
    color: var(--service-navy);

    font-size: 14px;

    font-weight: 900;

    text-transform: uppercase;

    margin: 0 0 7px;
}

.environment-item p {
    color: var(--service-text);

    font-size: 13px;

    line-height: 1.55;

    margin: 0 auto;

    max-width: 200px;
}


/* =========================================================
   SCHEDULE SECTION
========================================================= */

.services-schedule {
    min-height: 380px;

    display: flex;

    align-items: center;

    position: relative;

    background:
        linear-gradient(
            90deg,
            rgba(4,45,78,.93) 0%,
            rgba(4,45,78,.76) 45%,
            rgba(4,45,78,.38) 100%
        ),
        url("{{ asset('images/schedule.jpeg') }}")
        center center / cover no-repeat;
}

.services-schedule-content {
    max-width: 650px;

    color: #ffffff;

    padding: 45px 0;
}

.services-schedule-content .services-small-title {
    color: #8ed42b;
    font-size: 13px;
    letter-spacing: 1px;
}

.services-schedule-content h2 {
    color: #ffffff;

    font-size: 38px;

    line-height: 1.05;

    font-weight: 900;

    text-transform: uppercase;

    margin: 0 0 15px;
}

.services-schedule-content p {
    color: rgba(255,255,255,.94);

    font-size: 14.5px;

    line-height: 1.7;

    max-width: 570px;

    margin: 0 0 20px;
}


/* =========================================================
   SCHEDULE BUTTONS
========================================================= */

.schedule-action-buttons {
    display: flex;

    align-items: center;

    gap: 10px;

    flex-wrap: wrap;
}

.schedule-call-btn,
.schedule-book-btn {
    display: inline-flex;

    align-items: center;

    justify-content: center;

    gap: 8px;

    background: var(--service-green);

    border: 1px solid var(--service-green);

    color: #ffffff;

    padding: 13px 24px;

    font-size: 13px;

    font-weight: 800;

    text-transform: uppercase;

    text-decoration: none;

    transition: .25s ease;
}

.schedule-call-btn:hover,
.schedule-book-btn:hover {
    background: var(--service-green-dark);

    border-color: var(--service-green-dark);

    color: #ffffff;

    transform: translateY(-2px);
}


/* =========================================================
   SERVICE EMPTY STATE
========================================================= */

.services-empty {
    grid-column: 1 / -1;

    text-align: center;

    padding: 60px 20px;

    background: #ffffff;

    border: 1px solid #e5e5e5;
}

.services-empty h3 {
    color: var(--service-navy);

    font-size: 22px;

    margin-bottom: 10px;
}

.services-empty p {
    color: var(--service-muted);

    font-size: 13px;

    margin-bottom: 20px;
}


/* =========================================================
   TABLET
========================================================= */

@media (max-width: 991px) {

    .services-hero {
        min-height: 380px;

        padding: 45px 0;
    }

    .services-hero-content h1 {
        font-size: 32px;
    }

    .services-grid {
        grid-template-columns:
            repeat(2, minmax(0, 1fr));

        gap: 16px;
    }

    .service-card-image {
        height: 220px;
    }

    .environment-wrapper {
        padding: 40px 25px;
    }

    .environment-items {
        grid-template-columns:
            repeat(2, minmax(0, 1fr));

        row-gap: 30px;
    }

    .services-schedule-content h2 {
        font-size: 32px;
    }
}


/* =========================================================
   MOBILE
========================================================= */

@media (max-width: 767px) {

    .services-hero {
        min-height: 340px;

        padding: 35px 0;
    }

    .services-hero-content {
        margin: 0 15px;

        padding: 30px 20px;
    }

    .services-hero-content h1 {
        font-size: 28px;
    }

    .services-hero-content p {
        font-size: 14px;
    }

    .services-intro {
        padding: 35px 0 18px;
    }

    .services-main-heading {
        font-size: 26px;
    }

    .services-grid-section {
        padding-bottom: 50px;
    }

    .services-grid {
        grid-template-columns: 1fr;

        gap: 18px;
    }

    .service-card-image {
        height: 240px;
    }

    .service-card-body {
        padding: 20px;
    }

    .service-card-title {
        font-size: 17px;
    }

    .service-card-description {
        font-size: 13.5px;
    }

    .environment-section {
        padding-bottom: 50px;
    }

    .environment-wrapper {
        border-radius: 15px 0 0 0;

        padding: 35px 20px;
    }

    .environment-heading {
        font-size: 22px;
    }

    .environment-items {
        grid-template-columns: 1fr 1fr;

        gap: 25px 12px;
    }

    .services-schedule {
        min-height: 430px;
    }

    .services-schedule-content {
        padding: 50px 0;
    }

    .services-schedule-content h2 {
        font-size: 29px;
    }

    .services-schedule-content p {
        font-size: 13.5px;
    }
}


/* =========================================================
   SMALL MOBILE
========================================================= */

@media (max-width: 575px) {

    .services-hero-content h1 {
        font-size: 23px;
    }

    .services-main-heading {
        font-size: 23px;
    }

    .service-card-image {
        height: 220px;
    }

    .environment-items {
        grid-template-columns: 1fr;
    }

    .environment-item p {
        max-width: 240px;
    }

    .services-schedule-content h2 {
        font-size: 26px;
    }

    .schedule-action-buttons {
        flex-direction: column;

        align-items: stretch;
    }

    .schedule-action-buttons a {
        width: 100%;

        text-align: center;
    }
}

</style>


<div class="services-page">


    {{-- =====================================================
         HERO
    ====================================================== --}}

    <section class="services-hero">

        <div class="services-container">

            <div class="services-hero-content" data-aos="fade-up" data-aos-duration="850">

                <h1>
                    Our Services
                </h1>

                <p>
                    We offer a range of expert services to ensure your
                    property is thoroughly evaluated and safe. Our certified
                    inspectors use advanced technology to provide
                    comprehensive assessments, detailed reports and
                    actionable recommendations.
                </p>

            </div>

        </div>

    </section>



    {{-- =====================================================
         SERVICES INTRO
    ====================================================== --}}

    <section class="services-intro">

        <div class="services-container" data-aos="fade-up">

            <div class="services-small-title">
                What We Offer
            </div>

            <h2 class="services-main-heading">
                Our Services
            </h2>

        </div>

    </section>



    {{-- =====================================================
         SERVICES GRID
    ====================================================== --}}

    <section class="services-grid-section">

        <div class="services-container">

            <div class="services-grid">


                {{-- =================================================
                     SERVICE 1
                ================================================== --}}

                <article class="service-card hover-lift" data-aos="fade-up" data-aos-delay="50">

                    <div class="service-card-image img-zoom-hover">

                        <img
                            src="{{ asset('images/pre-purchase.png') }}"
                            alt="Pre-Purchase Building and Pest Inspection"
                            loading="lazy"
                        >

                    </div>

                    <div class="service-card-body">

                        <h3 class="service-card-title">
                            Pre-Purchase Building and Pest Inspection
                        </h3>

                        <p class="service-card-description">
                            Ensure your property is free from structural
                            issues and pest infestations with our
                            comprehensive inspection service, designed to
                            highlight hidden problems that could affect the
                            value or safety of your property.
                        </p>

                        <a
                            href="{{ route('services.pre-purchase') }}"
                            class="service-learn-btn"
                        >
                            Learn More
                            <i class="bi bi-arrow-right"></i>
                        </a>

                    </div>

                </article>



                {{-- =================================================
                     SERVICE 2
                ================================================== --}}

                <article class="service-card hover-lift" data-aos="fade-up" data-aos-delay="100">

                    <div class="service-card-image img-zoom-hover">

                        <img
                            src="{{ asset('images/building-stage.jpg') }}"
                            alt="Building Stage by Stage Inspection"
                            loading="lazy"
                        >

                    </div>

                    <div class="service-card-body">

                        <h3 class="service-card-title">
                            Building Stage by Stage Inspection
                        </h3>

                        <p class="service-card-description">
                            Ensure your property is built to the highest
                            standards at every stage of construction. Our
                            stage-by-stage inspections help identify issues
                            early, avoid costly defects and keep your build
                            on track.
                        </p>

                        <a
                            href="{{ route('services.building-stage') }}"
                            class="service-learn-btn"
                        >
                            Learn More
                            <i class="bi bi-arrow-right"></i>
                        </a>

                    </div>

                </article>



                {{-- =================================================
                     SERVICE 3
                ================================================== --}}

                <article class="service-card hover-lift" data-aos="fade-up" data-aos-delay="150">

                    <div class="service-card-image img-zoom-hover">

                        <img
                            src="{{ asset('images/new-build-handover.jpg') }}"
                            alt="New Build Handover Inspection"
                            loading="lazy"
                        >

                    </div>

                    <div class="service-card-body">

                        <h3 class="service-card-title">
                            New Build Handover Inspection
                        </h3>

                        <p class="service-card-description">
                            Before you accept your new home, make sure
                            everything is built to standard. Our handover
                            inspections give you peace of mind by ensuring
                            your property meets building codes and quality
                            expectations.
                        </p>

                        <a
                            href="{{ route('services.new-build-handover') }}"
                            class="service-learn-btn"
                        >
                            Learn More
                            <i class="bi bi-arrow-right"></i>
                        </a>

                    </div>

                </article>



                {{-- =================================================
                     SERVICE 4
                ================================================== --}}

                <article class="service-card hover-lift" data-aos="fade-up" data-aos-delay="50">

                    <div class="service-card-image img-zoom-hover">

                        <img
                            src="{{ asset('images/rising-damp.jpg') }}"
                            alt="Rising Damp Inspection"
                            loading="lazy"
                        >

                    </div>

                    <div class="service-card-body">

                        <h3 class="service-card-title">
                            Rising Damp Inspection
                        </h3>

                        <p class="service-card-description">
                            Protect your property from rising damp and
                            hidden moisture damage. Our expert inspections
                            help you detect issues early, avoid costly
                            repairs and maintain a safe living space.
                        </p>

                        <a
                            href="{{ route('services.rising-damp') }}"
                            class="service-learn-btn"
                        >
                            Learn More
                            <i class="bi bi-arrow-right"></i>
                        </a>

                    </div>

                </article>



                {{-- =================================================
                     SERVICE 5
                ================================================== --}}

                <article class="service-card hover-lift" data-aos="fade-up" data-aos-delay="100">

                    <div class="service-card-image img-zoom-hover">

                        <img
                            src="{{ asset('images/pool-barrier.jpg') }}"
                            alt="Pool Barrier Inspection"
                            loading="lazy"
                        >

                    </div>

                    <div class="service-card-body">

                        <h3 class="service-card-title">
                            Pool Barrier Inspection
                        </h3>

                        <p class="service-card-description">
                            Ensure your pool complies with Victoria's
                            stringent safety regulations. Our certified
                            pool barrier inspections help you avoid fines
                            and keep your property safe for everyone.
                        </p>

                        <a
                            href="{{ route('services.pool-barrier') }}"
                            class="service-learn-btn"
                        >
                            Learn More
                            <i class="bi bi-arrow-right"></i>
                        </a>

                    </div>

                </article>



                {{-- =================================================
                     SERVICE 6
                ================================================== --}}

                <article class="service-card hover-lift" data-aos="fade-up" data-aos-delay="150">

                    <div class="service-card-image img-zoom-hover">

                        <img
                            src="{{ asset('images/apartment.jpeg') }}"
                            alt="Apartment Building Inspection"
                            loading="lazy"
                        >

                    </div>

                    <div class="service-card-body">

                        <h3 class="service-card-title">
                            Apartment Building Inspection
                        </h3>

                        <p class="service-card-description">
                            Ensure your property meets insurance requirements
                            with our expert inspections. We provide
                            comprehensive reports to help you secure the best
                            insurance coverage for your property.
                        </p>

                        <a
                            href="{{ route('services.apartment') }}"
                            class="service-learn-btn"
                        >
                            Learn More
                            <i class="bi bi-arrow-right"></i>
                        </a>

                    </div>

                </article>



                {{-- =================================================
                     SERVICE 7
                ================================================== --}}

                <article class="service-card hover-lift" data-aos="fade-up" data-aos-delay="50">

                    <div class="service-card-image img-zoom-hover">

                        <img
                            src="{{ asset('images/dilapidation.jpg') }}"
                            alt="Dilapidation Inspection"
                            loading="lazy"
                        >

                    </div>

                    <div class="service-card-body">

                        <h3 class="service-card-title">
                            Dilapidation Report
                        </h3>

                        <p class="service-card-description">
                            Protect your property investment with our
                            dilapidation reports. We document the current
                            condition of your property, providing a reliable
                            reference point for future assessments and
                            disputes.
                        </p>

                        <a
                            href="{{ route('services.dilapidation') }}"
                            class="service-learn-btn"
                        >
                            Learn More
                            <i class="bi bi-arrow-right"></i>
                        </a>

                    </div>

                </article>



                {{-- =================================================
                     SERVICE 8
                ================================================== --}}

                <article class="service-card hover-lift" data-aos="fade-up" data-aos-delay="100">

                    <div class="service-card-image img-zoom-hover">

                        <img
                            src="{{ asset('images/vendor.jpg') }}"
                            alt="Vendor Inspection"
                            loading="lazy"
                        >

                    </div>

                    <div class="service-card-body">

                        <h3 class="service-card-title">
                            Vendor Inspection
                        </h3>

                        <p class="service-card-description">
                            Get ahead of the market with a pre-sale
                            inspection. Identify any potential issues that
                            buyers may raise and resolve them before listing
                            your property.
                        </p>

                        <a
                            href="{{ route('services.vendor') }}"
                            class="service-learn-btn"
                        >
                            Learn More
                            <i class="bi bi-arrow-right"></i>
                        </a>

                    </div>

                </article>



                {{-- =================================================
                     SERVICE 9
                ================================================== --}}

                <article class="service-card hover-lift" data-aos="fade-up" data-aos-delay="150">

                    <div class="service-card-image img-zoom-hover">

                        <img
                            src="{{ asset('images/builders-warranty.jpg') }}"
                            alt="Builders Warranty Inspection"
                            loading="lazy"
                        >

                    </div>

                    <div class="service-card-body">

                        <h3 class="service-card-title">
                            Builders Warranty Inspection
                        </h3>

                        <p class="service-card-description">
                            Ensure your new home meets all standards and
                            regulations with our comprehensive inspections.
                            Our experts provide detailed reports on structural
                            integrity and safety of your newly constructed
                            home.
                        </p>

                        <a
                            href="{{ route('services.builders-warranty') }}"
                            class="service-learn-btn"
                        >
                            Learn More
                            <i class="bi bi-arrow-right"></i>
                        </a>

                    </div>

                </article>


            </div>

        </div>

    </section>



    {{-- =====================================================
         WHY CHOOSE US
    ====================================================== --}}

    <section class="environment-section">

        <div class="services-container">

            <div class="environment-wrapper">

                <div class="environment-heading-wrap" data-aos="fade-up">

                    <div class="services-small-title">
                        Why Choose Us
                    </div>

                    <h2 class="environment-heading">
                        We Use Safe And Environmentally Friendly Measures
                    </h2>

                </div>


                <div class="environment-items">


                    {{-- Experienced Inspectors --}}

                    <div class="environment-item hover-lift" data-aos="fade-up" data-aos-delay="100">

                        <div class="environment-icon">

                            <i class="bi bi-hand-thumbs-up-fill"></i>

                        </div>

                        <h3>
                            Experienced Inspectors
                        </h3>

                        <p>
                            Certified professionals with extensive
                            expertise.
                        </p>

                    </div>


                    {{-- Advanced Technology --}}

                    <div class="environment-item hover-lift" data-aos="fade-up" data-aos-delay="200">

                        <div class="environment-icon">

                            <i class="bi bi-search"></i>

                        </div>

                        <h3>
                            Advanced Technology
                        </h3>

                        <p>
                            Utilising the latest tools for precise
                            assessments.
                        </p>

                    </div>


                    {{-- Detailed Reports --}}

                    <div class="environment-item hover-lift" data-aos="fade-up" data-aos-delay="300">

                        <div class="environment-icon">

                            <i class="bi bi-file-earmark-text-fill"></i>

                        </div>

                        <h3>
                            Detailed Reports
                        </h3>

                        <p>
                            Clear, comprehensive reports with actionable
                            insights.
                        </p>

                    </div>


                    {{-- Customer Focused --}}

                    <div class="environment-item hover-lift" data-aos="fade-up" data-aos-delay="400">

                        <div class="environment-icon">

                            <i class="bi bi-shield-check"></i>

                        </div>

                        <h3>
                            Customer Focused
                        </h3>

                        <p>
                            Exceptional support throughout the process.
                        </p>

                    </div>


                </div>

            </div>

        </div>

    </section>



    {{-- =====================================================
         SCHEDULE INSPECTION
    ====================================================== --}}

    <section class="services-schedule">

        <div class="services-container">

            <div class="services-schedule-content" data-aos="zoom-in" data-aos-duration="800">

                <div class="services-small-title">
                    Book Your Inspection
                </div>

                <h2>
                    Schedule Your Inspection Today
                </h2>

                <p>
                    Don't wait to ensure your property is safe and sound.
                    Contact Premium Building & Pest Inspections now to book
                    a comprehensive evaluation and gain the peace of mind
                    you deserve.
                </p>


                <div class="schedule-action-buttons">

                    <a
                        href="tel:0466001551"
                        class="schedule-call-btn btn-glow"
                    >
                        <i class="bi bi-telephone-fill"></i>
                        0466 001 551
                    </a>

                    <a
                        href="{{ route('contact') }}"
                        class="schedule-book-btn btn-glow"
                    >
                        Book Inspection
                        <i class="bi bi-arrow-right"></i>
                    </a>

                </div>

            </div>

        </div>

    </section>


</div>


@endsection