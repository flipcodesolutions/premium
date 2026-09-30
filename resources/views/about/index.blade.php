@extends('layouts.app')

@section('title', 'About Us | Premium Building & Pest Inspections')

@section('content')

<style>

/* =========================================================
   ABOUT PAGE VARIABLES
========================================================= */

.about-page {
    --about-navy: #0b3158;
    --about-navy-dark: #082846;
    --about-blue: #123f67;
    --about-green: #43a900;
    --about-green-dark: #319000;
    --about-light: #eef4f9;
    --about-text: #607487;
    --about-white: #ffffff;
}


/* =========================================================
   COMMON
========================================================= */

.about-page * {
    box-sizing: border-box;
}

.about-section {
    padding: 70px 0;
}

.about-small-title {
    color: var(--about-green);
    font-size: 13px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: .8px;
    margin-bottom: 12px;
}

.about-heading {
    color: var(--about-navy);
    font-size: 32px;
    line-height: 1.18;
    font-weight: 900;
    text-transform: uppercase;
    margin: 0 0 18px;
}

.about-text {
    color: var(--about-text);
    font-size: 14.5px;
    line-height: 1.75;
    margin-bottom: 16px;
}

.about-green-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;

    background: var(--about-green);
    border: 1px solid var(--about-green);

    color: #fff !important;

    padding: 12px 26px;

    font-size: 12px;
    font-weight: 800;

    text-transform: uppercase;
    text-decoration: none;
    border-radius: 4px;

    transition: all .25s ease;
}

.about-green-btn:hover {
    background: var(--about-green-dark);
    border-color: var(--about-green-dark);
    color: #fff !important;
    transform: translateY(-2px);
    box-shadow: 0 6px 18px rgba(67, 169, 0, .3);
}


/* =========================================================
   ABOUT HERO
========================================================= */

.about-hero {
    min-height: 270px;

    display: flex;
    align-items: center;
    justify-content: center;

    position: relative;

    background:
        linear-gradient(
            rgba(5, 45, 78, .80),
            rgba(5, 45, 78, .80)
        ),
        url("{{ asset('images/about banner.jpg') }}")
        center center / cover no-repeat;
}

.about-hero-content {
    width: 100%;
    max-width: 720px;

    margin: auto;

    padding: 38px 30px;

    text-align: center;

    background: rgba(4, 38, 67, .76);
    border-radius: 6px;

    color: #fff;
}

.about-hero-content h1 {
    margin: 0 0 14px;

    color: #fff;

    font-family: 'Oswald', sans-serif;

    font-size: 38px;
    font-weight: 700;

    line-height: 1.1;

    text-transform: uppercase;
    letter-spacing: .5px;
}

.about-hero-content p {
    max-width: 620px;

    margin: auto;

    color: rgba(255,255,255,.95);

    font-size: 14px;
    line-height: 1.7;
}


/* =========================================================
   WHO WE ARE
========================================================= */

.who-we-are {
    background: #fff;
}

.who-content {
    padding-right: 25px;
}


/* =========================================================
   WHO WE ARE IMAGE
   PERFECT PROPORTIONS - NEVER CUT OFF
========================================================= */

.who-image-wrap {
    position: relative;

    width: 100%;
    max-width: 440px;

    margin: 0 auto;

    z-index: 1;
}

.who-image {
    position: relative;
    z-index: 2;

    width: 100%;
    height: auto;
    aspect-ratio: 3 / 4;

    display: block;

    object-fit: cover;
    object-position: center top;

    border-radius: 8px;

    box-shadow:
        0 10px 28px rgba(8, 40, 70, .14);
}


/* Decorative corner */

.who-image-wrap::after {
    content: "";

    position: absolute;

    left: -16px;
    bottom: -16px;

    width: 140px;
    height: 140px;

    border-left: 2px solid rgba(67,169,0,.35);
    border-bottom: 2px solid rgba(67,169,0,.35);
    border-radius: 0 0 0 8px;

    z-index: 0;

    pointer-events: none;
}


/* =========================================================
   WHO WE ARE POINTS
========================================================= */

.who-points {
    margin: 22px 0 26px;

    padding: 0;

    list-style: none;

    display: grid;

    grid-template-columns: 1fr 1fr;

    gap: 12px 20px;
}

.who-points li {
    color: #4a5e70;

    font-size: 13.5px;
    font-weight: 500;

    line-height: 1.45;

    display: flex;

    align-items: flex-start;
}

.who-points i {
    color: var(--about-green);

    margin-right: 8px;

    margin-top: 1px;

    font-size: 15px;
    flex-shrink: 0;
}


/* =========================================================
   INSPECTOR
========================================================= */

.inspector-section {
    background: #fff;

    padding: 20px 0 75px;
}

.inspector-image-box {
    position: relative;

    width: 100%;
    max-width: 440px;

    margin: 0 auto;
    border-radius: 8px 8px 0 0;
    overflow: hidden;
    box-shadow:
        0 10px 28px rgba(0,0,0,.12);
}

.inspector-image {
    width: 100%;
    height: auto;
    aspect-ratio: 4 / 3;

    display: block;

    object-fit: cover;
    object-position: center 20%;
}

.inspector-label {
    background: #050505;

    color: #fff;

    text-align: center;

    padding: 12px 10px;

    font-family: 'Oswald', sans-serif;

    font-size: 13px;

    font-weight: 700;

    text-transform: uppercase;

    letter-spacing: .5px;
    border-radius: 0 0 8px 8px;
}

.inspector-content {
    padding-left: 15px;
}

.inspector-content .about-small-title {
    margin-bottom: 8px;
}

.inspector-content h2 {
    color: var(--about-navy);

    font-family: 'Oswald', sans-serif;

    font-size: 34px;

    font-weight: 700;

    text-transform: uppercase;

    line-height: 1.1;

    margin: 0 0 18px;
}

.inspector-content p {
    color: #607487;

    font-size: 14px;

    line-height: 1.72;

    margin-bottom: 14px;
}

.licence-highlight {
    color: var(--about-navy);

    font-weight: 800;
}


/* =========================================================
   VALUE / VISION / MISSION
========================================================= */

.value-section {
    background:
        linear-gradient(
            110deg,
            #43a900 0%,
            #299d92 52%,
            #168dd1 100%
        );

    padding: 70px 0;

    color: #fff;
}

.value-content {
    padding-right: 20px;
}

.value-content .about-small-title {
    color: #fff;
}

.value-content h2 {
    color: #fff;

    font-family: 'Oswald', sans-serif;

    font-size: 32px;

    font-weight: 700;

    line-height: 1.12;

    text-transform: uppercase;

    margin: 0 0 17px;
}

.value-content p {
    color: rgba(255,255,255,.95);

    font-size: 14px;

    line-height: 1.75;

    margin: 0;
}

.value-card {
    height: 100%;

    background: #fff;

    color: var(--about-navy);

    text-align: center;

    padding: 30px 24px;

    border-radius: 8px;

    box-shadow:
        0 8px 25px rgba(0,0,0,.10);
    transition: transform .3s ease, box-shadow .3s ease;
}

.value-icon {
    width: 48px;
    height: 48px;

    display: flex;

    align-items: center;
    justify-content: center;

    background: var(--about-green);

    color: #fff;

    margin: 0 auto 15px;

    border-radius: 6px;

    font-size: 20px;
}

.value-card h3 {
    color: var(--about-navy);

    font-family: 'Oswald', sans-serif;

    font-size: 18px;

    font-weight: 700;

    text-transform: uppercase;

    margin: 0 0 12px;
}

.value-card p {
    color: #607487;

    font-size: 13.5px;

    line-height: 1.7;

    margin: 0;
}


/* =========================================================
   STATISTICS
========================================================= */

.about-stats {
    background: #fff;

    padding: 38px 0;
}

.about-stats-row {
    display: grid;

    grid-template-columns: repeat(4, 1fr);
}

.about-stat {
    text-align: center;

    border-right: 1px solid #dce3e9;

    padding: 12px 18px;
}

.about-stat:last-child {
    border-right: 0;
}

.about-stat strong {
    display: block;

    color: var(--about-green);

    font-size: 36px;

    font-weight: 900;

    line-height: 1;
}

.about-stat span {
    display: block;

    color: var(--about-navy);

    font-family: 'Oswald', sans-serif;

    font-size: 12px;

    font-weight: 700;

    text-transform: uppercase;

    margin-top: 8px;
    letter-spacing: .5px;
}


/* =========================================================
   SCHEDULE INSPECTION CTA
========================================================= */

.schedule-about {
    min-height: 480px;

    display: flex;

    align-items: center;

    position: relative;

    background:
        linear-gradient(
            90deg,
            rgba(5,44,77,.92),
            rgba(5,44,77,.65)
        ),
        url("{{ asset('images/schedule.jpeg') }}")
        center center / cover no-repeat;
    padding: 60px 0;
}

.schedule-about-content {
    max-width: 650px;

    color: #fff;
}

.schedule-about-content .about-small-title {
    color: #8ed42b;
    font-size: 13px;
    letter-spacing: 1px;
}

.schedule-about-content h2 {
    color: #fff;

    font-family: 'Oswald', sans-serif;

    font-size: 40px;

    line-height: 1.05;

    font-weight: 700;

    text-transform: uppercase;

    margin: 0 0 18px;
}

.schedule-about-content p {
    color: rgba(255,255,255,.94);

    font-size: 14.5px;

    line-height: 1.7;

    margin-bottom: 24px;
}

.schedule-buttons {
    display: flex;

    gap: 14px;

    flex-wrap: wrap;
}

.schedule-phone {
    display: inline-flex;

    align-items: center;

    justify-content: center;

    gap: 8px;

    background: var(--about-green);

    color: #fff !important;

    text-decoration: none;

    padding: 13px 26px;

    font-size: 13px;

    font-weight: 800;

    text-transform: uppercase;
    border-radius: 4px;

    transition: all .25s ease;
}

.schedule-phone:hover {
    background: var(--about-green-dark);

    color: #fff !important;

    transform: translateY(-2px);
    box-shadow: 0 6px 18px rgba(67, 169, 0, .3);
}


/* =========================================================
   LARGE DESKTOP
========================================================= */

@media (min-width: 1200px) {

    .who-image-wrap {
        max-width: 440px;
    }

    .inspector-image-box {
        max-width: 440px;
    }

}


/* =========================================================
   TABLET
========================================================= */

@media (max-width: 991px) {

    .about-section {
        padding: 55px 0;
    }

    .who-content {
        padding-right: 0;

        margin-bottom: 25px;
    }

    .who-image-wrap {
        max-width: 400px;

        margin: 20px auto 0;
    }

    .inspector-content {
        padding-left: 0;

        margin-top: 25px;
    }

    .inspector-image-box {
        max-width: 420px;
        margin: 0 auto;
    }

    .value-content {
        margin-bottom: 25px;
    }

    .about-hero {
        min-height: 240px;
    }

}


/* =========================================================
   MOBILE
========================================================= */

@media (max-width: 767px) {

    .about-section {
        padding: 45px 0;
    }


    /* HERO */

    .about-hero {
        min-height: 220px;
    }

    .about-hero-content {
        margin: 0 15px;

        padding: 28px 20px;
    }

    .about-hero-content h1 {
        font-size: 30px;
    }

    .about-hero-content p {
        font-size: 13px;
    }


    /* HEADINGS */

    .about-heading {
        font-size: 26px;
    }


    /* POINTS */

    .who-points {
        grid-template-columns: 1fr;
        gap: 10px;
    }


    /* WHO IMAGE */

    .who-image-wrap {
        max-width: 360px;

        margin-top: 15px;
    }

    .who-image-wrap::after {
        display: none;
    }


    /* INSPECTOR */

    .inspector-image-box {
        max-width: 360px;
    }

    .inspector-content h2 {
        font-size: 28px;
    }


    /* VALUES */

    .value-content h2 {
        font-size: 26px;
    }


    /* STATS */

    .about-stats-row {
        grid-template-columns: 1fr 1fr;
    }

    .about-stat:nth-child(2) {
        border-right: 0;
    }

    .about-stat:nth-child(1),
    .about-stat:nth-child(2) {
        border-bottom: 1px solid #dce3e9;

        padding-bottom: 18px;
    }

    .about-stat:nth-child(3),
    .about-stat:nth-child(4) {
        padding-top: 18px;
    }


    /* CTA */

    .schedule-about {
        min-height: 400px;
        padding: 45px 0;
    }

    .schedule-about-content h2 {
        font-size: 32px;
    }

}


/* =========================================================
   SMALL MOBILE
========================================================= */

@media (max-width: 575px) {

    .about-section {
        padding: 40px 0;
    }


    /* HERO */

    .about-hero-content {
        padding: 24px 16px;
    }

    .about-hero-content h1 {
        font-size: 26px;
    }


    /* HEADING */

    .about-heading {
        font-size: 24px;
    }


    /* WHO IMAGE */

    .who-image-wrap {
        max-width: 100%;
    }


    /* INSPECTOR IMAGE */

    .inspector-image-box {
        max-width: 100%;
    }


    /* CTA */

    .schedule-buttons {
        flex-direction: column;

        align-items: stretch;
    }

    .schedule-buttons a {
        text-align: center;
    }

}


/* =========================================================
   VERY SMALL DEVICES
========================================================= */

@media (max-width: 400px) {

    .about-hero-content h1 {
        font-size: 23px;
    }

    .about-heading {
        font-size: 22px;
    }

    .schedule-about-content h2 {
        font-size: 26px;
    }

}

</style>


<div class="about-page">


    {{-- =====================================================
         1. ABOUT HERO
    ====================================================== --}}

    <section class="about-hero">

        <div class="container">

            <div class="about-hero-content" data-aos="fade-up" data-aos-duration="850">

                <h1>
                    About Us
                </h1>

                <p>
                    At Premium Building & Pest Inspections, we are
                    committed to providing top-notch inspection services
                    that you can trust. Our team of certified inspectors
                    brings extensive experience and knowledge to every
                    evaluation, ensuring thorough and accurate assessments
                    of your property.
                </p>

            </div>

        </div>

    </section>



    {{-- =====================================================
         2. WHO WE ARE
    ====================================================== --}}

    <section class="about-section who-we-are">

        <div class="container">

            <div class="row align-items-center g-5">


                {{-- LEFT CONTENT --}}

                <div class="col-lg-6">

                    <div class="who-content" data-aos="fade-right" data-aos-duration="800">

                        <div class="about-small-title">
                            Who We Are
                        </div>

                        <h2 class="about-heading">
                            Protect Your Home With Our Expert Solutions.
                        </h2>

                        <p class="about-text">
                            At Premium Building & Pest Inspections, we
                            understand that your home is more than just a
                            place to live — it's an investment in your
                            future. Our team of certified inspectors is
                            dedicated to providing thorough and accurate
                            inspections, ensuring that every aspect of your
                            property is safe, sound, and up to code.
                        </p>

                        <p class="about-text">
                            With our expert solutions, you can have peace
                            of mind knowing that your home is protected
                            from hidden issues and potential risks. Trust
                            us to safeguard your investment and enhance
                            the quality of your living environment.
                        </p>


                        <ul class="who-points">

                            <li>
                                <i class="bi bi-check-circle-fill"></i>

                                <span>
                                    Flexible scheduling to suit your needs
                                </span>
                            </li>

                            <li>
                                <i class="bi bi-check-circle-fill"></i>

                                <span>
                                    Clear and honest communication
                                </span>
                            </li>

                            <li>
                                <i class="bi bi-check-circle-fill"></i>

                                <span>
                                    Fast, reliable service
                                </span>
                            </li>

                            <li>
                                <i class="bi bi-check-circle-fill"></i>

                                <span>
                                    Qualified and certified inspectors
                                </span>
                            </li>

                            <li>
                                <i class="bi bi-check-circle-fill"></i>

                                <span>
                                    Precision through advanced technology
                                </span>
                            </li>

                            <li>
                                <i class="bi bi-check-circle-fill"></i>

                                <span>
                                    Comprehensive reports with actionable
                                    insights
                                </span>
                            </li>

                        </ul>


                        <a
                            href="{{ route('contact') }}"
                            class="about-green-btn btn-glow"
                        >

                            Contact Us

                            <i class="bi bi-arrow-right"></i>

                        </a>

                    </div>

                </div>



                {{-- RIGHT IMAGE --}}

                <div class="col-lg-6">

                    <div class="who-image-wrap img-zoom-hover hover-lift" data-aos="fade-left" data-aos-duration="800">

                        <img
                            src="{{ asset('images/about ronak.jpg') }}?v=2"
                            alt="Professional Building Inspection"
                            class="who-image"
                        >

                    </div>

                </div>

            </div>

        </div>

    </section>



    {{-- =====================================================
         3. MEET YOUR INSPECTOR
    ====================================================== --}}

    <section class="inspector-section">

        <div class="container">

            <div class="row align-items-center g-4">


                {{-- INSPECTOR IMAGE --}}

                <div class="col-lg-5">

                    <div class="inspector-image-box hover-lift" data-aos="fade-right" data-aos-duration="800">

                        <img
                            src="{{ asset('images/ronak gami.jpeg') }}?v=2"
                            alt="Ronak Gami - Building Inspector"
                            class="inspector-image"
                        >

                        <div class="inspector-label">
                            Your Inspector
                        </div>

                    </div>

                </div>



                {{-- INSPECTOR CONTENT --}}

                <div class="col-lg-7">

                    <div class="inspector-content" data-aos="fade-left" data-aos-duration="800">

                        <div class="about-small-title">
                            Meet Your Inspector
                        </div>

                        <h2>
                            Ronak Gami
                        </h2>


                        <p>
                            Welcome to Premium Building & Pest Inspections!
                            I'm Ronak Gami, a VBA-registered inspector and
                            experienced building professional.
                        </p>


                        <p>

                            <span class="licence-highlight">
                                Building Inspector Licence:
                            </span>

                            IN-PS 74654

                        </p>


                        <p>

                            <span class="licence-highlight">
                                Domestic Builder Licence:
                            </span>

                            DB-L 100200

                        </p>


                        <p>
                            With years of hands-on experience serving
                            Melbourne and surrounding suburbs, whether
                            you're a homeowner, buyer, investor or property
                            professional, my goal is to help you make
                            informed decisions about your property.
                        </p>


                        <p>
                            Every property has unique characteristics and
                            potential hidden defects. With my expertise and
                            the latest inspection technology, I conduct
                            detailed inspections to identify problems such
                            as structural defects, pest infestations,
                            moisture damage and more.
                        </p>


                        <p>
                            My reports are thorough, easy to understand and
                            designed to give you peace of mind.
                        </p>


                        <p>
                            Let's work together to protect your most
                            valuable asset. Your property is my priority.
                        </p>


                        <a
                            href="{{ route('booking.create') }}"
                            class="about-green-btn btn-glow"
                        >

                            Book Inspection

                            <i class="bi bi-arrow-right"></i>

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </section>



    {{-- =====================================================
         4. OUR VALUE / VISION / MISSION
    ====================================================== --}}

    <section class="value-section">

        <div class="container">

            <div class="row align-items-center g-4">


                {{-- OUR VALUE --}}

                <div class="col-lg-4">

                    <div class="value-content" data-aos="fade-up">

                        <div class="about-small-title">
                            Our Value
                        </div>

                        <h2>
                            Our Commitment To Excellence
                        </h2>

                        <p>
                            At Premium Building & Pest Inspections, we
                            believe in providing the highest level of
                            service to our clients. Our vision and mission
                            reflect our dedication to quality, integrity
                            and customer satisfaction.
                        </p>

                    </div>

                </div>



                {{-- VISION --}}

                <div class="col-lg-4">

                    <div class="value-card hover-lift" data-aos="fade-up" data-aos-delay="150">

                        <div class="value-icon">

                            <i class="bi bi-eye-fill"></i>

                        </div>

                        <h3>
                            Our Vision
                        </h3>

                        <p>
                            To be the leading provider of top-quality
                            building inspections, ensuring safer and more
                            secure homes through advanced technology and
                            expert service.
                        </p>

                    </div>

                </div>



                {{-- MISSION --}}

                <div class="col-lg-4">

                    <div class="value-card hover-lift" data-aos="fade-up" data-aos-delay="300">

                        <div class="value-icon">

                            <i class="bi bi-hand-thumbs-up-fill"></i>

                        </div>

                        <h3>
                            Our Mission
                        </h3>

                        <p>
                            To deliver precise and comprehensive building
                            inspections, empowering clients with the
                            information they need to protect and enhance
                            their property investments.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>



    {{-- =====================================================
         5. STATISTICS
    ====================================================== --}}

    <section class="about-stats">

        <div class="container">

            <div class="about-stats-row">

                <div class="about-stat hover-lift" data-aos="zoom-in" data-aos-delay="50">

                    <strong>
                        <span data-counter="50" data-suffix="+">50+</span>
                    </strong>

                    <span>
                        Happy Clients
                    </span>

                </div>


                <div class="about-stat hover-lift" data-aos="zoom-in" data-aos-delay="150">

                    <strong>
                        <span data-counter="2">2</span>
                    </strong>

                    <span>
                        Registered Inspectors
                    </span>

                </div>


                <div class="about-stat hover-lift" data-aos="zoom-in" data-aos-delay="250">

                    <strong>
                        <span data-counter="5" data-suffix="★">5★</span>
                    </strong>

                    <span>
                        Client Ratings
                    </span>

                </div>


                <div class="about-stat hover-lift" data-aos="zoom-in" data-aos-delay="350">

                    <strong>
                        <span data-counter="2" data-suffix="+">2+</span>
                    </strong>

                    <span>
                        Years Of Experience
                    </span>

                </div>

            </div>

        </div>

    </section>



    {{-- =====================================================
         6. SCHEDULE YOUR INSPECTION
    ====================================================== --}}

    <section class="schedule-about">

        <div class="container">

            <div class="schedule-about-content" data-aos="zoom-in" data-aos-duration="800">

                <div class="about-small-title">
                    Book Your Inspection
                </div>

                <h2>
                    Schedule Your Inspection Today
                </h2>

                <p>
                    Don't wait to ensure your property is safe and sound.
                    Contact Premium Building & Pest Inspections now to
                    book a comprehensive evaluation and gain the peace of
                    mind you deserve.
                </p>


                <div class="schedule-buttons">


                    {{-- PHONE --}}

                    <a
                        href="tel:0466001551"
                        class="schedule-phone btn-glow pulse-glow"
                    >

                        <i class="bi bi-telephone-fill"></i>

                        0466 001 551

                    </a>


                    {{-- CONTACT --}}

                    <a
                        href="{{ route('booking.create') }}"
                        class="about-green-btn btn-glow"
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