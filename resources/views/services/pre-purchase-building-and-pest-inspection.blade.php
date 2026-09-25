@extends('layouts.app')

@section('title', 'Pre-Purchase Building & Pest Inspection | Premium Building & Pest Inspections')

@section('content')

<style>
/* =========================================================
   PRE-PURCHASE INSPECTION PAGE
========================================================= */

.pp-page {
    --pp-navy: #073763;
    --pp-navy-dark: #052d52;
    --pp-green: #42a900;
    --pp-green-dark: #359000;
    --pp-light-green: #e4f4d9;
    --pp-light: #f5f7f8;
    --pp-text: #333;
    --pp-muted: #666;
    --pp-border: #e5e5e5;
    --pp-orange: #ffb400;

    font-family: Arial, Helvetica, sans-serif;
    color: var(--pp-text);
    overflow: hidden;
}

/* =========================================================
   COMMON
========================================================= */

.pp-container {
    width: 92%;
    max-width: 1180px;
    margin: auto;
}

.pp-section {
    padding: 55px 0;
}

.pp-heading {
    text-align: center;
    margin-bottom: 32px;
}

.pp-heading .small-title {
    display: block;
    margin-bottom: 7px;
    color: var(--pp-green);
    font-size: 13.5px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.pp-heading h2 {
    margin: 0;
    color: var(--pp-navy);
    font-size: 30px;
    line-height: 1.25;
    font-weight: 900;
    text-transform: uppercase;
}

.pp-heading p {
    max-width: 700px;
    margin: 12px auto 0;
    color: var(--pp-muted);
    font-size: 15px;
    line-height: 1.7;
}

.pp-btn {
    display: inline-flex;
    justify-content: center;
    align-items: center;

    padding: 13px 26px;

    background: var(--pp-green);
    color: #fff !important;

    border: 0;
    border-radius: 4px;

    font-size: 14.5px;
    font-weight: 700;
    text-decoration: none;

    transition: .25s ease;
}

.pp-btn:hover {
    background: var(--pp-green-dark);
    transform: translateY(-2px);
}


/* =========================================================
   HERO
========================================================= */

.pp-hero {
    min-height: 520px;

    position: relative;

    display: flex;
    align-items: center;

    background:
        linear-gradient(
            90deg,
            rgba(4, 39, 69, .95) 0%,
            rgba(4, 39, 69, .88) 55%,
            rgba(5, 43, 74, .45) 100%
        ),
        url("{{ asset('images/g1.jpg') }}")
        center right / cover no-repeat;
}

.pp-hero-inner {
    width: 92%;
    max-width: 1180px;
    margin: auto;

    display: grid;
    grid-template-columns: 1.05fr .72fr;

    gap: 45px;
    align-items: center;

    padding: 60px 0;
}

.pp-hero-content {
    color: #fff;
}

.pp-hero-content h1 {
    max-width: 650px;

    margin: 0 0 15px;

    color: #fff;

    font-size: clamp(34px, 4.4vw, 52px);
    line-height: 1.08;

    font-weight: 900;
    text-transform: uppercase;
}

.pp-hero-content p {
    max-width: 590px;

    margin: 0 0 20px;

    color: rgba(255,255,255,.88);

    font-size: 15.5px;
    line-height: 1.7;
}

.pp-hero-tag {
    display: inline-block;

    margin-bottom: 12px;

    color: #8bd765;

    font-size: 13px;
    font-weight: 800;

    text-transform: uppercase;
}

.pp-hero-form {
    background: #fff;

    padding: 24px;

    box-shadow: 0 15px 45px rgba(0,0,0,.28);

    border-radius: 4px;
}

.pp-hero-form-title {
    margin-bottom: 14px;

    color: var(--pp-navy);

    font-size: 22px;
    font-weight: 900;

    text-transform: uppercase;
}

.pp-form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 8px;
}

.pp-hero-form input,
.pp-hero-form select,
.pp-hero-form textarea {
    width: 100%;

    padding: 11px 12px;
    margin-bottom: 8px;

    border: 1px solid #dce3e8;

    background: #f3f7fa;

    color: #444;

    font-size: 14px;

    outline: none;

    box-sizing: border-box;

    border-radius: 3px;
}

.pp-hero-form textarea {
    height: 62px;
    resize: vertical;
}

.pp-hero-form input:focus,
.pp-hero-form select:focus,
.pp-hero-form textarea:focus {
    border-color: var(--pp-green);
}

.pp-submit {
    width: 100%;

    padding: 13px;

    border: 0;

    background: var(--pp-green);

    color: #fff;

    font-size: 15px;
    font-weight: 800;

    cursor: pointer;

    border-radius: 3px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}


/* =========================================================
   WELCOME SECTION
========================================================= */

.pp-welcome {
    background: #fff;
}

.pp-welcome-grid {
    display: grid;

    grid-template-columns: 1fr .9fr;

    gap: 35px;

    align-items: center;
}

.pp-welcome-content h2 {
    margin: 0 0 14px;

    color: var(--pp-navy);

    font-size: 28px;
    line-height: 1.22;

    font-weight: 900;

    text-transform: uppercase;
}

.pp-welcome-content > p {
    color: #555;

    font-size: 15px;
    line-height: 1.75;

    margin-bottom: 14px;
}

.pp-feature-mini {
    display: flex;

    gap: 14px;

    margin: 16px 0;

    align-items: flex-start;
}

.pp-feature-mini-icon {
    width: 36px;
    height: 36px;
    min-width: 36px;

    border: 2px solid #1b9eea;

    border-radius: 50%;

    color: #138bd2;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 16px;
}

.pp-feature-mini h4 {
    margin: 0 0 4px;

    color: var(--pp-navy);

    font-size: 15px;
    font-weight: 900;

    text-transform: uppercase;
}

.pp-feature-mini p {
    margin: 0;

    color: #666;

    font-size: 14px;
    line-height: 1.6;
}

.pp-inspector-card {
    background: #fff;

    box-shadow: 0 8px 25px rgba(0,0,0,.12);

    border-radius: 4px;

    overflow: hidden;
}

.pp-inspector-title {
    padding: 10px;

    background: #111;

    color: #fff;

    text-align: center;

    font-size: 13px;
    font-weight: 900;

    text-transform: uppercase;
    letter-spacing: 1px;
}

.pp-inspector-card img {
    display: block;

    width: 100%;
    height: auto;

    object-fit: cover;
}

.pp-inspector-name {
    padding: 10px 8px;

    color: #444;

    text-align: center;

    font-size: 12px;
    font-weight: 700;

    text-transform: uppercase;
    line-height: 1.4;
}

.pp-inspector-btn {
    display: block;

    width: 100%;

    padding: 12px;

    background: var(--pp-green);

    color: #fff !important;

    text-align: center;

    text-decoration: none;

    font-size: 14px;
    font-weight: 800;
}


/* =========================================================
   IMPORTANT SECTION
========================================================= */

.pp-important {
    background: #fff;
}

.pp-important-grid {
    display: grid;

    grid-template-columns: 1fr 1fr;

    gap: 12px;
}

.pp-important-card {
    padding: 18px;

    border: 1px solid #e8e8e8;

    background: #fff;

    border-radius: 4px;
}

.pp-important-card h4 {
    margin: 0 0 8px;

    color: var(--pp-navy);

    font-size: 15px;
    font-weight: 900;

    text-transform: uppercase;
}

.pp-important-card p {
    margin: 0;

    color: #666;

    font-size: 14px;
    line-height: 1.65;
}

.pp-important-card p::before {
    content: "✓";

    display: inline-flex;

    width: 18px;
    height: 18px;

    margin-right: 6px;

    align-items: center;
    justify-content: center;

    border-radius: 50%;

    background: #e8f6df;

    color: var(--pp-green);

    font-weight: 900;
    font-size: 11px;
}


/* =========================================================
   COMMON ISSUES
========================================================= */

.pp-issues {
    margin-top: 35px;

    display: grid;

    grid-template-columns: 1fr 1fr;

    gap: 35px;

    align-items: center;
}

.pp-issues h3 {
    margin: 0 0 12px;

    color: var(--pp-navy);

    font-size: 26px;
    font-weight: 900;

    text-transform: uppercase;
}

.pp-issues p {
    color: #555;

    font-size: 15px;
    line-height: 1.7;
}

.pp-issues ul {
    margin: 16px 0;
    padding-left: 20px;
}

.pp-issues li {
    margin-bottom: 9px;

    color: #444;

    font-size: 14.5px;
    line-height: 1.6;
}

.pp-issues li::marker {
    color: var(--pp-green);
}

.pp-issues-image {
    width: 100%;
    height: 440px;

    overflow: hidden;

    border-radius: 10px;

    box-shadow: 0 10px 30px rgba(0,0,0,.12);
}

.pp-issues-image img {
    display: block;

    width: 100%;
    height: 100%;

    object-fit: cover;
    object-position: center 10%;

    border-radius: 10px;
}


/* =========================================================
   STAND OUT
========================================================= */

.pp-standout {
    padding: 45px 35px;

    background: linear-gradient(
        135deg,
        #d8efc9,
        #eef9e9
    );

    border-radius: 15px;
}

.pp-standout-grid {
    display: grid;

    grid-template-columns: repeat(4, 1fr);

    gap: 25px;
}

.pp-standout-item {
    text-align: center;
}

.pp-standout-icon {
    width: 48px;
    height: 48px;

    margin: 0 auto 12px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: var(--pp-green);

    color: #fff;

    border-radius: 6px;

    font-size: 22px;
}

.pp-standout-item h4 {
    margin: 0 0 8px;

    color: var(--pp-navy);

    font-size: 14.5px;
    font-weight: 900;

    text-transform: uppercase;
}

.pp-standout-item p {
    margin: 0;

    color: #555;

    font-size: 13.5px;
    line-height: 1.6;
}


/* =========================================================
   PRICING
========================================================= */

.pp-pricing {
    background: #fff;
}

.pp-price-grid {
    display: grid;

    grid-template-columns: repeat(3, 1fr);

    gap: 16px;
}

.pp-price-card {
    background: #fff;

    border: 1px solid #e4e4e4;

    border-top: 3px solid var(--pp-green);

    box-shadow: 0 5px 20px rgba(0,0,0,.07);

    text-align: center;

    padding: 26px 18px;

    border-radius: 4px;
}

.pp-price-icon {
    font-size: 32px;

    color: #0b3d68;

    margin-bottom: 10px;
}

.pp-price-card h3 {
    margin: 0 0 6px;

    color: var(--pp-navy);

    font-size: 15px;
    font-weight: 900;

    text-transform: uppercase;
}

.pp-price-card .price-sub {
    color: #777;

    font-size: 13px;

    margin-bottom: 8px;
}

.pp-price {
    color: var(--pp-green);

    font-size: 32px;
    font-weight: 900;

    margin-bottom: 14px;
}

.price-from {
    font-size: 13px;
    font-weight: 700;
    color: var(--pp-green);
    vertical-align: middle;
    margin-right: 4px;
}

.pp-price small {
    color: #777;

    font-size: 11px;
    font-weight: 400;
}

.pp-price-list {
    list-style: none;

    padding: 0;
    margin: 0 0 18px;
}

.pp-price-list li {
    padding: 8px 0;

    border-bottom: 1px solid #eee;

    color: #555;

    font-size: 13.5px;
}

.pp-price-list li::before {
    content: "✓";

    color: var(--pp-green);

    margin-right: 7px;

    font-weight: 900;
}

.pp-price-btn {
    display: block;

    padding: 12px;

    background: var(--pp-green);

    color: #fff !important;

    text-decoration: none;

    font-size: 13.5px;
    font-weight: 800;

    text-transform: uppercase;
    letter-spacing: 0.5px;
    border-radius: 3px;
}


/* =========================================================
   MODERN TOOLS
========================================================= */

.pp-tools {
    background: #eeeeee;
}

.pp-tools-grid {
    display: grid;

    grid-template-columns: repeat(3, 1fr);

    gap: 22px;
}

.pp-tool-card {
    background: #fff;

    padding: 18px;

    border: 1px solid #e3e3e3;

    border-radius: 4px;
}

.pp-tool-image {
    width: 100%;
    height: 220px;

    display: flex;
    align-items: center;
    justify-content: center;

    overflow: hidden;

    background: #fff;

    padding: 12px;
}

.pp-tool-image img {
    width: 100%;
    height: 100%;

    object-fit: contain;
}

.pp-tool-card h4 {
    margin: 14px 0 8px;

    color: var(--pp-navy);

    font-size: 15px;
    font-weight: 900;

    text-transform: uppercase;
}

.pp-tool-card p {
    margin: 0;

    color: #666;

    font-size: 13.5px;
    line-height: 1.65;
}


/* =========================================================
   CTA
========================================================= */

.pp-cta {
    min-height: 380px;

    display: flex;
    align-items: center;

    background:
        linear-gradient(
            90deg,
            rgba(4,43,75,.96) 0%,
            rgba(4,43,75,.88) 55%,
            rgba(4,43,75,.35) 100%
        ),
        url('{{ asset('images/pre purchase service.jpeg') }}')
        center right / cover no-repeat;
}

.pp-cta-content {
    max-width: 620px;

    color: #fff;
}

.pp-cta-content h2 {
    margin: 0 0 14px;

    font-size: 34px;
    line-height: 1.18;

    font-weight: 900;

    text-transform: uppercase;
}

.pp-cta-content p {
    margin: 0 0 22px;

    color: rgba(255,255,255,.90);

    font-size: 15.5px;
    line-height: 1.7;
}


/* =========================================================
   REVIEWS
========================================================= */

.pp-reviews {
    background: #fff;
}

.pp-review-grid {
    display: grid;

    grid-template-columns: repeat(3, 1fr);

    gap: 20px;
}

.pp-review-card {
    text-align: center;

    padding: 25px 20px;

    border-bottom: 3px solid #eee;

    box-shadow: 0 7px 20px rgba(0,0,0,.06);
}

.pp-review-quote {
    color: #dceaf5;

    font-size: 42px;

    line-height: 1;
}

.pp-review-card p {
    min-height: 70px;

    color: #555;

    font-size: 14px;
    line-height: 1.7;
}

.pp-stars {
    color: #ffb400;

    letter-spacing: 3px;

    font-size: 16px;

    margin: 12px 0 14px;
}

.pp-review-card h4 {
    margin: 0;

    color: var(--pp-navy);

    font-size: 14.5px;
    font-weight: 800;
}


/* =========================================================
   FAQ
========================================================= */

.pp-faq {
    background: #fff;
}

.pp-faq-grid {
    display: grid;

    grid-template-columns: 1fr 1fr;

    gap: 8px 16px;
}

.pp-faq-item {
    border: 1px solid #e4e4e4;

    background: #fff;

    border-radius: 4px;
    overflow: hidden;
}

.pp-faq-question {
    width: 100%;

    padding: 14px 16px;

    border: 0;

    background: #fff;

    color: var(--pp-navy);

    display: flex;
    justify-content: space-between;
    align-items: center;

    text-align: left;

    font-size: 14.5px;
    font-weight: 800;

    cursor: pointer;
}

.pp-faq-question:hover {
    background: #f7f9fa;
}

.pp-faq-answer {
    display: none;

    padding: 0 16px 14px;

    color: #666;

    font-size: 14px;
    line-height: 1.65;
}

.pp-faq-item.active .pp-faq-answer {
    display: block;
}

.pp-faq-item.active .pp-faq-question {
    color: var(--pp-green);
}


/* =========================================================
   FINAL CTA
========================================================= */

.pp-final-cta {
    padding: 45px 20px;

    text-align: center;

    background: var(--pp-green);

    color: #fff;
}

.pp-final-cta h2 {
    margin: 0 0 10px;

    font-size: 30px;
    font-weight: 900;

    text-transform: uppercase;
}

.pp-final-cta p {
    margin: 0 auto 20px;

    max-width: 650px;

    font-size: 15.5px;
    line-height: 1.65;
}

.pp-final-btn {
    background: #fff;

    color: var(--pp-green) !important;
}




/* =========================================================
   BACK TO TOP
========================================================= */

.pp-back-top {
    display: none;

    position: fixed;

    right: 15px;
    bottom: 18px;

    width: 32px;
    height: 32px;

    border: 0;

    background: #7100d8;

    color: #fff;

    font-size: 14px;

    cursor: pointer;

    z-index: 99999;
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media(max-width: 991px) {

    .pp-hero-inner,
    .pp-welcome-grid,
    .pp-issues {
        grid-template-columns: 1fr;
    }

    .pp-hero-inner {
        gap: 30px;
    }

    .pp-standout-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .pp-price-grid {
        grid-template-columns: repeat(3, 1fr);
    }
}


@media(max-width: 700px) {

    .pp-section {
        padding: 42px 0;
    }

    .pp-hero {
        min-height: auto;
    }

    .pp-hero-inner {
        padding: 45px 0;
    }

    .pp-hero-content h1 {
        font-size: 36px;
    }

    .pp-form-row,
    .pp-important-grid,
    .pp-price-grid,
    .pp-tools-grid,
    .pp-review-grid,
    .pp-faq-grid {
        grid-template-columns: 1fr;
    }

    .pp-standout {
        padding: 35px 20px;
    }

    .pp-standout-grid {
        grid-template-columns: 1fr 1fr;
        gap: 22px 10px;
    }

    .pp-price-card {
        max-width: 380px;
        width: 100%;
        margin: auto;
    }

    .pp-cta {
        min-height: 420px;
    }

    .pp-cta-content h2 {
        font-size: 29px;
    }


    .pp-heading h2 {
        font-size: 25px;
    }

    .pp-issues-image {
        height: 320px;
    }
}


@media(max-width: 430px) {

    .pp-standout-grid {
        grid-template-columns: 1fr;
    }

    .pp-hero-content h1 {
        font-size: 32px;
    }

    .pp-inspector-card img {
        height: auto;
    }

}
</style>


<div class="pp-page">

    {{-- =====================================================
         HERO
    ====================================================== --}}

    <section class="pp-hero">

        <div class="pp-hero-inner">

            <div class="pp-hero-content" data-aos="fade-right" data-aos-duration="850">

                <span class="pp-hero-tag">
                    Premium Building & Pest Inspections
                </span>

                <h1>
                    Expert Pre-Purchase Building And Pest Inspections In Melbourne
                </h1>

                <p>
                    Comprehensive building and pest inspections to help you
                    understand the condition of a property before you buy.
                </p>

                <a
                    href="tel:0466001551"
                    class="pp-btn btn-glow"
                >
                    <i class="bi bi-telephone-fill me-2"></i>
                    0466 001 551
                </a>

            </div>


            {{-- HERO FORM --}}

            <div class="pp-hero-form hover-lift" data-aos="fade-left" data-aos-duration="850">

                <div class="pp-hero-form-title">
                    Book Your Inspection
                </div>

                <form
                    action="{{ route('quote.store') }}"
                    method="POST"
                >

                    @csrf

                    <div class="pp-form-row">

                        <input
                            type="text"
                            name="name"
                            placeholder="Full Name"
                            required
                        >

                        <input
                            type="tel"
                            name="phone"
                            placeholder="Phone"
                            required
                        >

                    </div>


                    <div class="pp-form-row">

                        <input
                            type="email"
                            name="email"
                            placeholder="Email"
                            required
                        >

                        <input
                            type="text"
                            name="suburb"
                            placeholder="Suburb"
                        >

                    </div>


                    <select
                        name="service"
                        required
                    >

                        <option value="">
                            Pre-Purchase Building and Pest Inspection
                        </option>

                        <option value="Pre-Purchase Building and Pest Inspection">
                            Pre-Purchase Building and Pest Inspection
                        </option>

                        <option value="Building Inspection">
                            Building Inspection
                        </option>

                        <option value="Pest Inspection">
                            Pest Inspection
                        </option>

                    </select>


                    <input
                        type="text"
                        name="property_address"
                        placeholder="Property Address"
                    >


                    <textarea
                        name="message"
                        placeholder="Message"
                    ></textarea>


                    <button
                        type="submit"
                        class="pp-submit btn-glow"
                    >
                        Get My Quote
                    </button>

                </form>

            </div>

        </div>

    </section>


    {{-- =====================================================
         WELCOME
    ====================================================== --}}

    <section class="pp-section pp-welcome">

        <div class="pp-container">

            <div class="pp-welcome-grid">

                <div class="pp-welcome-content" data-aos="fade-right" data-aos-duration="800">

                    <h2>
                        Welcome To Premium Building & Pest Inspections
                    </h2>

                    <p>
                        Buying a property is one of the biggest investments
                        you can make. A professional inspection can help
                        identify visible building defects, pest activity,
                        moisture concerns and other property issues.
                    </p>

                    <p>
                        Our experienced inspection team provides detailed
                        building and pest inspections throughout Melbourne,
                        helping property buyers make informed decisions.
                    </p>


                    <div class="pp-feature-mini">

                        <div class="pp-feature-mini-icon">
                            <i class="bi bi-search"></i>
                        </div>

                        <div>

                            <h4>
                                Pre-Purchase Building Inspection
                            </h4>

                            <p>
                                We conduct a detailed inspection of accessible
                                areas of the property and identify visible
                                defects and potential concerns.
                            </p>

                        </div>

                    </div>


                    <div class="pp-feature-mini">

                        <div class="pp-feature-mini-icon">
                            <i class="bi bi-search"></i>
                        </div>

                        <div>

                            <h4>
                                Pre-Purchase Pest Inspection
                            </h4>

                            <p>
                                We look for visible evidence of termites,
                                timber pests and conditions that may contribute
                                to pest activity.
                            </p>

                        </div>

                    </div>


                    <div class="pp-feature-mini">

                        <div class="pp-feature-mini-icon">
                            <i class="bi bi-search"></i>
                        </div>

                        <div>

                            <h4>
                                Professional Inspection Report
                            </h4>

                            <p>
                                Receive clear documentation of relevant
                                inspection observations and areas requiring
                                attention.
                            </p>

                        </div>

                    </div>


                    <a
                        href="{{ route('contact') }}"
                        class="pp-btn btn-glow"
                    >
                        Schedule Your Inspection
                    </a>

                </div>


                <div class="pp-inspector-card hover-lift" data-aos="fade-left" data-aos-duration="800">

                    <div class="pp-inspector-title">
                        VBA LICENSED
                    </div>

                    <img
                        src="{{ asset('images/ronak gami.jpeg') }}"
                        alt="Ronak Gami | VBA Building Inspector"
                    >

                    <div class="pp-inspector-name">
                        Ronak Gami | VBA Building Inspector Licence No. IN-PS 74654
                    </div>

                    <a
                        href="tel:0466001551"
                        class="pp-inspector-btn btn-glow"
                    >
                        <i class="bi bi-telephone-fill me-2"></i> 0466 001 551
                    </a>

                </div>

            </div>

        </div>

    </section>


    {{-- =====================================================
         WHY IMPORTANT
    ====================================================== --}}

    <section class="pp-section pp-important">

        <div class="pp-container">

            <div class="pp-heading" data-aos="fade-up">

                <span class="small-title">
                    Protect Your Investment
                </span>

                <h2>
                    Why Pre-Purchase Building And Pest Inspections Are Important
                </h2>

            </div>


            <div class="pp-important-grid">

                <div class="pp-important-card hover-lift" data-aos="fade-up" data-aos-delay="100">

                    <h4>
                        Identify Hidden Defects
                    </h4>

                    <p>
                        Identify visible concerns that may not be obvious
                        during a normal property inspection.
                    </p>

                </div>


                <div class="pp-important-card hover-lift" data-aos="fade-up" data-aos-delay="200">

                    <h4>
                        Protect Your Investment
                    </h4>

                    <p>
                        Understand relevant property concerns before making
                        a major purchasing commitment.
                    </p>

                </div>


                <div class="pp-important-card hover-lift" data-aos="fade-up" data-aos-delay="300">

                    <h4>
                        Understand Property Condition
                    </h4>

                    <p>
                        Gain a clearer understanding of the accessible
                        condition of the property.
                    </p>

                </div>


                <div class="pp-important-card hover-lift" data-aos="fade-up" data-aos-delay="400">

                    <h4>
                        Make An Informed Decision
                    </h4>

                    <p>
                        Use the inspection findings as part of your broader
                        property purchasing decision.
                    </p>

                </div>

            </div>


            {{-- COMMON ISSUES --}}

            <div class="pp-issues">

                <div data-aos="fade-right">

                    <h3>
                        Common Issues We Find In Pre-Purchase Inspections
                    </h3>

                    <p>
                        Our inspections can identify a range of visible
                        building and pest-related concerns, including:
                    </p>

                    <ul>

                        <li>
                            Structural defects, movement and cracking
                        </li>

                        <li>
                            Roof and drainage concerns
                        </li>

                        <li>
                            Moisture and water damage
                        </li>

                        <li>
                            Pest and termite activity
                        </li>

                        <li>
                            Deteriorated building materials
                        </li>

                        <li>
                            Poor workmanship and maintenance issues
                        </li>

                        <li>
                            Conditions that may contribute to future defects
                        </li>

                    </ul>

                </div>


                <div class="pp-issues-image img-zoom-hover" data-aos="fade-left">

                    <img
                        src="{{ asset('images/g15.jpeg') }}"
                        alt="Pre-Purchase Property Inspection - Areas Checked"
                    >

                </div>

            </div>

        </div>

    </section>


    {{-- =====================================================
         WHY OUR SERVICE STANDS OUT
    ====================================================== --}}

    <section class="pp-section">

        <div class="pp-container">

            <div class="pp-standout">

                <div class="pp-heading" data-aos="fade-up">

                    <span class="small-title">
                        Why Choose Us
                    </span>

                    <h2>
                        Why Our Pre-Purchase Building And Pest Inspection Service Stands Out
                    </h2>

                </div>


                <div class="pp-standout-grid">

                    <div class="pp-standout-item hover-lift" data-aos="fade-up" data-aos-delay="100">

                        <div class="pp-standout-icon">
                            <i class="bi bi-clipboard2-check"></i>
                        </div>

                        <h4>
                            Comprehensive Reports
                        </h4>

                        <p>
                            Detailed, easy-to-read reports covering every accessible area of the property.
                        </p>

                    </div>


                    <div class="pp-standout-item hover-lift" data-aos="fade-up" data-aos-delay="200">

                        <div class="pp-standout-icon">
                            <i class="bi bi-lightning-charge"></i>
                        </div>

                        <h4>
                            Fast Turnaround
                        </h4>

                        <p>
                            Prompt delivery of thorough inspection reports to meet your tight deadlines.
                        </p>

                    </div>


                    <div class="pp-standout-item hover-lift" data-aos="fade-up" data-aos-delay="300">

                        <div class="pp-standout-icon">
                            <i class="bi bi-person-check"></i>
                        </div>

                        <h4>
                            Expert Advice
                        </h4>

                        <p>
                            VBA licensed inspector guidance to discuss findings and answer questions.
                        </p>

                    </div>


                    <div class="pp-standout-item hover-lift" data-aos="fade-up" data-aos-delay="400">

                        <div class="pp-standout-icon">
                            <i class="bi bi-tag"></i>
                        </div>

                        <h4>
                            Competitive Pricing
                        </h4>

                        <p>
                            Clear, upfront pricing with no hidden fees and complete transparency.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- =====================================================
         PRICING
    ====================================================== --}}

    <section class="pp-section pp-pricing">

        <div class="pp-container">

            <div class="pp-heading" data-aos="fade-up">

                <span class="small-title">
                    Our Pricing
                </span>

                <h2>
                    Building And Pest Inspection Pricing
                </h2>

            </div>


            <div class="pp-price-grid">


                <div class="pp-price-card hover-lift" data-aos="fade-up" data-aos-delay="100">

                    <div class="pp-price-icon">
                        <i class="bi bi-house"></i>
                    </div>

                    <h3>
                        2 Bedroom
                    </h3>

                    <div class="pp-price">
                        <span class="price-from">FROM</span>$420*
                    </div>

                    <ul class="pp-price-list">

                        <li>
                            Building Inspection
                        </li>

                        <li>
                            Pest Inspection
                        </li>

                        <li>
                            Thermal Imaging
                        </li>

                    </ul>

                    <a
                        href="{{ route('contact') }}"
                        class="pp-price-btn btn-glow"
                    >
                        Get A Quote
                    </a>

                </div>


                <div class="pp-price-card hover-lift" data-aos="fade-up" data-aos-delay="200">

                    <div class="pp-price-icon">
                        <i class="bi bi-houses"></i>
                    </div>

                    <h3>
                        3 Bedroom
                    </h3>

                    <div class="pp-price">
                        <span class="price-from">FROM</span>$450*
                    </div>

                    <ul class="pp-price-list">

                        <li>
                            Building Inspection
                        </li>

                        <li>
                            Pest Inspection
                        </li>

                        <li>
                            Thermal Imaging
                        </li>

                    </ul>

                    <a
                        href="{{ route('contact') }}"
                        class="pp-price-btn btn-glow"
                    >
                        Get A Quote
                    </a>

                </div>


                <div class="pp-price-card hover-lift" data-aos="fade-up" data-aos-delay="300">

                    <div class="pp-price-icon">
                        <i class="bi bi-buildings"></i>
                    </div>

                    <h3>
                        4 Bedroom
                    </h3>

                    <div class="pp-price">
                        <span class="price-from">FROM</span>$525*
                    </div>

                    <ul class="pp-price-list">

                        <li>
                            Building Inspection
                        </li>

                        <li>
                            Pest Inspection
                        </li>

                        <li>
                            Thermal Imaging
                        </li>

                    </ul>

                    <a
                        href="{{ route('contact') }}"
                        class="pp-price-btn btn-glow"
                    >
                        Get A Quote
                    </a>

                </div>


            </div>

        </div>

    </section>


    {{-- =====================================================
         MODERN TOOLS
    ====================================================== --}}

    <section class="pp-section pp-tools">

        <div class="pp-container">

            <div class="pp-heading" data-aos="fade-up">

                <h2>
                    We Utilize The Most Modern Tools
                </h2>

            </div>


            <div class="pp-tools-grid">


                <div class="pp-tool-card hover-lift" data-aos="fade-up" data-aos-delay="100">

                    <div class="pp-tool-image img-zoom-hover">

                        <img
                            src="{{ asset('images/pre2.jpg') }}"
                            alt="Infrared Thermal Camera"
                        >

                    </div>

                    <h4>
                        Infrared Thermal Camera
                    </h4>

                    <p>
                        Thermal imaging can assist with identifying temperature
                        variations that may indicate areas requiring further
                        investigation.
                    </p>

                </div>


                <div class="pp-tool-card hover-lift" data-aos="fade-up" data-aos-delay="200">

                    <div class="pp-tool-image img-zoom-hover">

                        <img
                            src="{{ asset('images/pre3.jpg') }}"
                            alt="Moisture Meter"
                        >

                    </div>

                    <h4>
                        Moisture Meter
                    </h4>

                    <p>
                        Moisture detection equipment can assist in assessing
                        areas where moisture concerns may be present.
                    </p>

                </div>


                <div class="pp-tool-card hover-lift" data-aos="fade-up" data-aos-delay="300">

                    <div class="pp-tool-image img-zoom-hover">

                        <img
                            src="{{ asset('images/pre4.jpg') }}"
                            alt="ZIPLEVEL Precision Altimeter"
                        >

                    </div>

                    <h4>
                        ZIPLEVEL
                    </h4>

                    <p>
                        High-precision altimeter used to measure floor levels and
                        detect any foundation movement, settlement, or uneven
                        surfaces throughout the property.
                    </p>

                </div>


            </div>

        </div>

    </section>


    {{-- =====================================================
         CTA
    ====================================================== --}}

    <section class="pp-cta" data-aos="zoom-in">

        <div class="pp-container">

            <div class="pp-cta-content">

                <h2>
                    Schedule Your Inspection Today
                </h2>

                <p>
                    Before purchasing a property, make sure you understand
                    what you are buying. Our professional building and pest
                    inspections help identify visible concerns and provide
                    clear documentation of the inspection findings.
                </p>

                <a
                    href="{{ route('contact') }}"
                    class="pp-btn btn-glow"
                >
                    Schedule Your Inspection Now
                </a>

            </div>

        </div>

    </section>


    {{-- =====================================================
         REVIEWS
    ====================================================== --}}

    <section class="pp-section pp-reviews">

        <div class="pp-container">

            <div class="pp-heading" data-aos="fade-up">

                <span class="small-title">
                    Testimonials
                </span>

                <h2>
                    Client Feedback & Reviews
                </h2>

            </div>


            <div class="pp-review-grid">


                <div class="pp-review-card hover-lift" data-aos="fade-up" data-aos-delay="100">

                    <div class="pp-review-quote">
                        “
                    </div>

                    <p>
                        Professional and thorough service. The inspection
                        report helped us understand the property condition
                        before making our decision.
                    </p>

                    <div class="pp-stars">
                        ★★★★★
                    </div>

                    <h4>
                        Shireen De Silva
                    </h4>

                </div>


                <div class="pp-review-card hover-lift" data-aos="fade-up" data-aos-delay="200">

                    <div class="pp-review-quote">
                        “
                    </div>

                    <p>
                        Extremely helpful and knowledgeable. The inspection
                        was detailed and everything was explained clearly.
                    </p>

                    <div class="pp-stars">
                        ★★★★★
                    </div>

                    <h4>
                        Nimesh Wagani
                    </h4>

                </div>


                <div class="pp-review-card hover-lift" data-aos="fade-up" data-aos-delay="300">

                    <div class="pp-review-quote">
                        “
                    </div>

                    <p>
                        Very thorough inspection and great communication from
                        start to finish. Highly recommended service.
                    </p>

                    <div class="pp-stars">
                        ★★★★★
                    </div>

                    <h4>
                        Max
                    </h4>

                </div>


            </div>

        </div>

    </section>


    {{-- =====================================================
         FAQ
    ====================================================== --}}

    <section class="pp-section pp-faq">

        <div class="pp-container">

            <div class="pp-heading" data-aos="fade-up">

                <span class="small-title">
                    Common Questions
                </span>

                <h2>
                    Most Popular Questions
                </h2>

            </div>


            <div class="pp-faq-grid">


                <div class="pp-faq-item active" data-aos="fade-up" data-aos-delay="100">

                    <button
                        class="pp-faq-question"
                        type="button"
                    >
                        What is a pre-purchase building and pest inspection?
                        <span>⌃</span>
                    </button>

                    <div class="pp-faq-answer">
                        A pre-purchase building and pest inspection assesses
                        accessible areas of a property for visible building
                        defects, pest activity and other relevant concerns
                        before purchase.
                    </div>

                </div>


                <div class="pp-faq-item" data-aos="fade-up" data-aos-delay="150">

                    <button
                        class="pp-faq-question"
                        type="button"
                    >
                        Why should I get an inspection before buying?
                        <span>⌄</span>
                    </button>

                    <div class="pp-faq-answer">
                        An inspection can help you understand the visible
                        condition of a property and identify concerns that
                        may not be obvious during a normal inspection.
                    </div>

                </div>


                <div class="pp-faq-item" data-aos="fade-up" data-aos-delay="200">

                    <button
                        class="pp-faq-question"
                        type="button"
                    >
                        How long does a pre-purchase inspection take?
                        <span>⌄</span>
                    </button>

                    <div class="pp-faq-answer">
                        Inspection duration depends on the property's size,
                        construction, accessibility and condition.
                    </div>

                </div>


                <div class="pp-faq-item" data-aos="fade-up" data-aos-delay="250">

                    <button
                        class="pp-faq-question"
                        type="button"
                    >
                        Do you inspect for termites?
                        <span>⌄</span>
                    </button>

                    <div class="pp-faq-answer">
                        The pest component of the inspection looks for
                        accessible evidence of termites and other timber pests
                        and conditions that may contribute to pest activity.
                    </div>

                </div>


                <div class="pp-faq-item" data-aos="fade-up" data-aos-delay="300">

                    <button
                        class="pp-faq-question"
                        type="button"
                    >
                        Do I receive an inspection report?
                        <span>⌄</span>
                    </button>

                    <div class="pp-faq-answer">
                        Yes. Relevant observations from the inspection are
                        documented in the professional inspection report.
                    </div>

                </div>


                <div class="pp-faq-item" data-aos="fade-up" data-aos-delay="350">

                    <button
                        class="pp-faq-question"
                        type="button"
                    >
                        Can you inspect an older property?
                        <span>⌄</span>
                    </button>

                    <div class="pp-faq-answer">
                        Yes. The inspection can assess accessible areas of
                        older properties and identify visible defects and
                        deterioration.
                    </div>

                </div>


            </div>

        </div>

    </section>


    {{-- =====================================================
         FINAL CTA
    ====================================================== --}}

    <section class="pp-final-cta" data-aos="zoom-in">

        <h2>
            Inspect Before You Invest
        </h2>

        <p>
            Protect your property investment with a professional
            pre-purchase building and pest inspection.
        </p>

        <a
            href="{{ route('contact') }}"
            class="pp-btn pp-final-btn btn-glow"
        >
            Book Inspection Today
        </a>

    </section>




    {{-- =====================================================
         BACK TO TOP
    ====================================================== --}}

    <button
        type="button"
        id="ppBackTop"
        class="pp-back-top"
        aria-label="Back to top"
    >
        ↑
    </button>

</div>


<script>

document.addEventListener('DOMContentLoaded', function () {

    /* =====================================================
       FAQ
    ===================================================== */

    const faqItems =
        document.querySelectorAll('.pp-faq-item');

    faqItems.forEach(function (item) {

        const question =
            item.querySelector('.pp-faq-question');

        question.addEventListener('click', function () {

            const wasActive =
                item.classList.contains('active');

            faqItems.forEach(function (faq) {

                faq.classList.remove('active');

                const icon =
                    faq.querySelector(
                        '.pp-faq-question span'
                    );

                if (icon) {
                    icon.textContent = '⌄';
                }

            });

            if (!wasActive) {

                item.classList.add('active');

                const icon =
                    item.querySelector(
                        '.pp-faq-question span'
                    );

                if (icon) {
                    icon.textContent = '⌃';
                }

            }

        });

    });


    /* =====================================================
       BACK TO TOP
    ===================================================== */

    const backTop =
        document.getElementById('ppBackTop');

    function toggleBackTop() {

        if (window.scrollY > 400) {
            backTop.style.display = 'block';
        } else {
            backTop.style.display = 'none';
        }

    }

    window.addEventListener(
        'scroll',
        toggleBackTop
    );

    backTop.addEventListener(
        'click',
        function () {

            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });

        }
    );

});

</script>

@endsection