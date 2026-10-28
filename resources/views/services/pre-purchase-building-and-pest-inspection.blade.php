@extends('layouts.app')

@section('title', 'Pre-Purchase Building & Pest Inspection | Premium Building & Pest Inspections')
@section('meta_description', 'Melbourne’s leading pre-purchase building and pest inspection. Detailed same-day reports uncovering structural defects, timber pests, and safety hazards.')

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

    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
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
    padding: 20px 22px;

    border: 1px solid #e2e8f0;

    background: #fff;

    border-radius: 6px;

    box-shadow: 0 4px 15px rgba(0,0,0,.04);
}

.pp-important-inner {
    display: flex;
    align-items: flex-start;
    gap: 14px;
}

.pp-check-icon {
    font-size: 20px;
    color: var(--pp-green);
    flex-shrink: 0;
    margin-top: 2px;
}

.pp-important-inner p {
    margin: 0;
    color: #4a5568;
    font-size: 14.5px;
    line-height: 1.65;
}

.pp-important-inner p strong,
.pp-important-inner p b {
    color: #1a202c;
    font-weight: 700;
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
    padding: 50px 35px;

    background: #eef7ed;

    border-radius: 18px;
}

.pp-standout-grid {
    display: grid;

    grid-template-columns: repeat(4, 1fr);

    gap: 20px;
}

.pp-standout-item {
    text-align: center;
    background: #ffffff;
    padding: 26px 18px;
    border-radius: 8px;
    box-shadow: 0 4px 15px rgba(0,0,0,.04);
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
    margin: 0 0 8px;

    color: var(--pp-navy);

    font-size: 15px;
    font-weight: 900;

    text-transform: uppercase;
}

.pp-price-card .price-from {
    font-size: 13px;
    font-weight: 700;
    color: #666;
    text-transform: uppercase;
    margin-bottom: 2px;
}

.pp-price {
    color: var(--pp-green);

    font-size: 36px;
    font-weight: 900;

    margin-bottom: 2px;
    line-height: 1.1;
}

.pp-price-card .price-sub {
    color: #777;

    font-size: 13px;
    font-weight: 600;

    margin-bottom: 16px;
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
    min-height: 540px;
    padding: 105px 0;

    display: flex;
    align-items: center;

    background:
        linear-gradient(
            90deg,
            rgba(4,43,75,.96) 0%,
            rgba(4,43,75,.88) 50%,
            rgba(4,43,75,.30) 100%
        ),
        url('{{ asset('images/pre purchase service.jpeg') }}')
        center right / cover no-repeat;
}

.pp-cta-content {
    max-width: 820px;

    color: #ffffff;
}

.pp-cta-content h2 {
    margin: 0 0 20px;

    color: #ffffff !important;

    font-size: clamp(32px, 4.2vw, 48px);
    line-height: 1.2;

    font-weight: 900;

    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.pp-cta-content p {
    margin: 0 0 32px;

    color: rgba(255, 255, 255, 0.96) !important;

    font-size: 17.5px;
    line-height: 1.85;
}

.pp-cta-btn {
    padding: 16px 38px !important;
    font-size: 15.5px !important;
    font-weight: 800 !important;
    letter-spacing: 0.6px;
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

    gap: 16px;
    align-items: start;
}

.pp-faq-col {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.pp-faq-item {
    border: 1px solid #e4e4e4;

    background: #fff;

    border-radius: 4px;
    overflow: hidden;
    transition: border-color .2s ease;
}

.pp-faq-item.active {
    border-color: var(--pp-green);
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
    transition: background .2s ease, color .2s ease;
}

.pp-faq-question:hover {
    background: #f7f9fa;
}

.pp-faq-answer {
    display: none;

    padding: 14px 16px;

    color: #555;

    font-size: 14px;
    line-height: 1.65;
    background: #fff;
}

.pp-faq-item.active .pp-faq-answer {
    display: block;
}

.pp-faq-item.active .pp-faq-question {
    background: var(--pp-green);
    color: #fff;
}

.pp-faq-item.active .pp-faq-question span {
    color: #fff;
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
        min-height: 440px;
        padding: 60px 0;
    }

    .pp-cta-content h2 {
        font-size: 32px;
        color: #ffffff !important;
    }

    .pp-cta-content p {
        font-size: 15.5px;
        color: #ffffff !important;
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
         1. HERO
    ====================================================== --}}

    <section class="pp-hero">

        <div class="pp-hero-inner">

            <div class="pp-hero-content" data-aos="fade-right" data-aos-duration="850">

                <span class="pp-hero-tag">
                    Premium Building &amp; Pest Inspections
                </span>

                <h1>
                    EXPERT PRE-PURCHASE BUILDING AND PEST INSPECTIONS IN MELBOURNE
                </h1>

                <p>
                    Comprehensive, Same-Day Inspections for Your Peace of Mind
                </p>

                <a
                    href="#quote-form"
                    class="pp-btn btn-glow"
                >
                    Contact Us
                </a>

            </div>


            {{-- HERO FORM --}}

            <div id="quote-form" class="pp-hero-form hover-lift" data-aos="fade-left" data-aos-duration="850">

                <div class="pp-hero-form-title">
                    GET QUICK QUOTE
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
                            placeholder="Name"
                            required
                        >

                        <input
                            type="email"
                            name="email"
                            placeholder="Email"
                            required
                        >

                    </div>


                    <div class="pp-form-row">

                        <input
                            type="tel"
                            name="phone"
                            placeholder="Phone"
                            required
                        >

                        <input
                            type="text"
                            name="property_address"
                            placeholder="Address"
                            required
                        >

                    </div>


                    <select
                        name="service"
                        required
                    >

                        <option value="Pre-purchase Building and Pest Inspection">
                            Pre-purchase Building and Pest Inspection
                        </option>

                        <option value="Building Stage by Stage Inspection">
                            Building Stage by Stage Inspection
                        </option>

                        <option value="New Build Handover Inspection">
                            New Build Handover Inspection
                        </option>

                        <option value="Rising Damp Inspection">
                            Rising Damp Inspection
                        </option>

                        <option value="Pool Barrier Inspection">
                            Pool Barrier Inspection
                        </option>

                        <option value="Apartment Building Inspection">
                            Apartment Building Inspection
                        </option>

                        <option value="Dilapidation Report">
                            Dilapidation Report
                        </option>

                        <option value="vendor Inspection">
                            vendor Inspection
                        </option>

                        <option value="Builders Warranty Inspection">
                            Builders Warranty Inspection
                        </option>

                    </select>


                    <input
                        type="date"
                        name="inspection_date"
                        placeholder="Inspection Date"
                    >


                    <textarea
                        name="message"
                        rows="3"
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
         2. WELCOME TO PREMIUM BUILDING & PEST INSPECTIONS
    ====================================================== --}}

    <section class="pp-section pp-welcome">

        <div class="pp-container">

            <div class="pp-welcome-grid">

                <div class="pp-welcome-content" data-aos="fade-right" data-aos-duration="800">

                    <h2>
                        WELCOME TO PREMIUM BUILDING &amp; PEST INSPECTIONS
                    </h2>

                    <p>
                        Looking to purchase a property in Melbourne or surrounding suburbs? Before you commit, it is essential to understand the true condition of the property with a professional pre-purchase building and pest inspection.
                    </p>

                    <p>
                        Premium Building &amp; Pest Inspections provides detailed, independent inspection reports that help property buyers identify hidden defects, moisture issues, termite activity, and workmanship concerns before finalising a purchase.
                    </p>

                    <p>
                        We service Clyde North, Melbourne, and surrounding suburbs, delivering fast and detailed inspection reports to support confident property decisions. <strong>We Offer :</strong>
                    </p>

                    <div class="pp-feature-mini">

                        <div class="pp-feature-mini-icon">
                            <i class="bi bi-search"></i>
                        </div>

                        <div>

                            <h4>
                                PRE-PURCHASE BUILDING INSPECTION
                            </h4>

                            <p>
                                A comprehensive visual inspection of your property's interior and exterior to identify visible defects, maintenance issues, and safety concerns, covering walls, ceilings, floors, roofing, doors, windows, drainage, external areas, and overall workmanship.
                            </p>

                        </div>

                    </div>


                    <div class="pp-feature-mini">

                        <div class="pp-feature-mini-icon">
                            <i class="bi bi-search"></i>
                        </div>

                        <div>

                            <h4>
                                PRE-PURCHASE PEST INSPECTION
                            </h4>

                            <p>
                                A specialised inspection to identify active termites, timber pests, past termite damage, timber deterioration, moisture issues, and conditions that may increase the risk of future pest infestations.
                            </p>

                        </div>

                    </div>


                    <div class="pp-feature-mini">

                        <div class="pp-feature-mini-icon">
                            <i class="bi bi-search"></i>
                        </div>

                        <div>

                            <h4>
                                BUILDING AND TERMITE INSPECTIONS
                            </h4>

                            <p>
                                A comprehensive inspection that assesses the property's overall condition, identifies termite activity and pest risks, uncovers visible defects affecting safety or value, and highlights maintenance requirements—providing buyers with a complete property assessment before purchase.
                            </p>

                        </div>

                    </div>


                    <a
                        href="#quote-form"
                        class="pp-btn btn-glow"
                        style="margin-top: 18px;"
                    >
                        Schedule your inspection now
                    </a>

                </div>


                {{-- INSPECTOR CARD --}}

                <div class="pp-inspector-card hover-lift" data-aos="fade-left" data-aos-duration="800">

                    <div class="pp-inspector-title">
                        YOUR INSPECTOR
                    </div>

                    <img
                        src="{{ asset('images/ronak gami.jpeg') }}"
                        alt="Ronak Gami | VBA Licensed Inspector"
                    >

                    <div class="pp-inspector-name">
                        Ronak Gami, vba lic No: IN-PS 74654, Builder Lic No: DB-L 100200
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
         3. WHY PRE-PURCHASE INSPECTIONS ARE IMPORTANT
    ====================================================== --}}

    <section class="pp-section pp-important">

        <div class="pp-container">

            <div class="pp-heading" data-aos="fade-up">

                <h2>
                    WHY PRE-PURCHASE BUILDING AND PEST INSPECTIONS ARE IMPORTANT
                </h2>

            </div>


            <div class="pp-important-grid">

                <div class="pp-important-card hover-lift" data-aos="fade-up" data-aos-delay="100">

                    <div class="pp-important-inner">

                        <i class="bi bi-check-circle-fill pp-check-icon"></i>

                        <p>
                            <strong>Protect Your Investment:</strong> A property may appear well maintained but still contain hidden defects. A professional inspection helps identify issues before purchase, allowing you to make informed financial decisions.
                        </p>

                    </div>

                </div>


                <div class="pp-important-card hover-lift" data-aos="fade-up" data-aos-delay="200">

                    <div class="pp-important-inner">

                        <i class="bi bi-check-circle-fill pp-check-icon"></i>

                        <p>
                            <strong>Peace of Mind:</strong> Knowing the true condition of the property before signing any contracts ensures peace of mind. You’ll feel confident about your purchase, knowing there won’t be any unpleasant surprises after you’ve moved in.
                        </p>

                    </div>

                </div>


                <div class="pp-important-card hover-lift" data-aos="fade-up" data-aos-delay="300">

                    <div class="pp-important-inner">

                        <i class="bi bi-check-circle-fill pp-check-icon"></i>

                        <p>
                            <strong>Uncover Hidden Problems:</strong> Many issues, such as termite infestations or structural defects, may not be visible during a casual property viewing. Our trained inspectors use specialized tools and extensive experience to detect these hidden problems before they escalate.
                        </p>

                    </div>

                </div>


                <div class="pp-important-card hover-lift" data-aos="fade-up" data-aos-delay="400">

                    <div class="pp-important-inner">

                        <i class="bi bi-check-circle-fill pp-check-icon"></i>

                        <p>
                            <strong>Avoid Future Costs:</strong> Identifying potential problems early on means you can address them before they become more significant and costly. For example, untreated termite damage can weaken a building’s structure over time, leading to major repairs down the road.
                        </p>

                    </div>

                </div>

            </div>


            {{-- =====================================================
                 4. COMMON ISSUES WE FIND
            ====================================================== --}}

            <div class="pp-issues">

                <div data-aos="fade-right">

                    <h3>
                        COMMON ISSUES WE FIND IN PRE-PURCHASE INSPECTIONS
                    </h3>

                    <p>
                        Through our extensive experience in conducting pre-purchase building and pest inspections, we frequently encounter:
                    </p>

                    <ul>

                        <li>
                            <strong>Structural Defects:</strong> Foundation cracks, subsidence, and water damage that weaken the overall integrity of the property.
                        </li>

                        <li>
                            <strong>Pest Infestations:</strong> Termite damage and other wood-destroying pests that can severely affect the structural soundness of a property.
                        </li>

                        <li>
                            <strong>Roofing Problems:</strong> Leaks, broken tiles, or improperly installed roofing that can lead to long-term water damage and other issues.
                        </li>

                        <li>
                            <strong>Moisture Issues:</strong> Poor drainage or plumbing problems that can cause dampness and mold, leading to health risks and structural decay.
                        </li>

                        <li>
                            <strong>Electrical Hazards:</strong> Old or faulty wiring that poses a fire risk, along with non-compliant electrical systems.
                        </li>

                    </ul>

                    <p style="margin-top: 14px;">
                        By identifying these problems before purchasing, you avoid expensive repairs and potential dangers in the future.
                    </p>

                </div>


                <div class="pp-issues-image img-zoom-hover" data-aos="fade-left">

                    <img
                        src="{{ asset('images/g3.jpg') }}"
                        alt="Pre-Purchase Property Inspection - Common Issues"
                    >

                </div>

            </div>

        </div>

    </section>


    {{-- =====================================================
         5. WHY OUR SERVICE STANDS OUT
    ====================================================== --}}

    <section class="pp-section">

        <div class="pp-container">

            <div class="pp-standout">

                <div class="pp-heading" data-aos="fade-up">

                    <span class="small-title">
                        Why Choose Us
                    </span>

                    <h2>
                        WHY OUR PRE-PURCHASE BUILDING AND PEST INSPECTION SERVICE STANDS OUT
                    </h2>

                </div>


                <div class="pp-standout-grid">

                    <div class="pp-standout-item hover-lift" data-aos="fade-up" data-aos-delay="100">

                        <div class="pp-standout-icon">
                            <i class="bi bi-clipboard-check"></i>
                        </div>

                        <h4>
                            Licensed and Experienced Inspectors
                        </h4>

                        <p>
                            With years of experience, our certified inspectors are VBA licensed experts.
                        </p>

                    </div>


                    <div class="pp-standout-item hover-lift" data-aos="fade-up" data-aos-delay="200">

                        <div class="pp-standout-icon">
                            <i class="bi bi-cpu"></i>
                        </div>

                        <h4>
                            Advanced Technology
                        </h4>

                        <p>
                            Utilizing the latest tools for precise assessments and reporting.
                        </p>

                    </div>


                    <div class="pp-standout-item hover-lift" data-aos="fade-up" data-aos-delay="300">

                        <div class="pp-standout-icon">
                            <i class="bi bi-file-earmark-text"></i>
                        </div>

                        <h4>
                            Detailed Reports
                        </h4>

                        <p>
                            Receive a comprehensive building and pest inspection report within 24 hours.
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
                            Our building and pest inspection cost is competitive and transparent, ensuring you get value for your money.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- =====================================================
         6. CHOOSE PACKAGE / PRICING
    ====================================================== --}}

    <section class="pp-section pp-pricing">

        <div class="pp-container">

            <div class="pp-heading" data-aos="fade-up">

                <span class="small-title">
                    Choose Package
                </span>

                <h2>
                    DEFENDING YOUR SPACE,FULL INSPECTION AT A TIME
                </h2>

            </div>


            <div class="pp-price-grid">


                {{-- PACKAGE 1 --}}

                <div class="pp-price-card hover-lift" data-aos="fade-up" data-aos-delay="100">

                    <div class="pp-price-icon">
                        <i class="bi bi-house"></i>
                    </div>

                    <h3>
                        2 bed room
                    </h3>

                    <div class="price-from">
                        From
                    </div>

                    <div class="pp-price">
                        $400
                    </div>

                    <div class="price-sub">
                        +GST
                    </div>

                    <ul class="pp-price-list">

                        <li>
                            Building Inspection
                        </li>

                        <li>
                            Pest Inspection
                        </li>

                        <li>
                            Report &amp; Consultation
                        </li>

                    </ul>

                    <a
                        href="#quote-form"
                        class="pp-price-btn btn-glow"
                    >
                        Get Started
                    </a>

                </div>


                {{-- PACKAGE 2 --}}

                <div class="pp-price-card hover-lift" data-aos="fade-up" data-aos-delay="200">

                    <div class="pp-price-icon">
                        <i class="bi bi-houses"></i>
                    </div>

                    <h3>
                        3 bed room
                    </h3>

                    <div class="price-from">
                        From
                    </div>

                    <div class="pp-price">
                        $450
                    </div>

                    <div class="price-sub">
                        +GST
                    </div>

                    <ul class="pp-price-list">

                        <li>
                            Building Inspection
                        </li>

                        <li>
                            Pest Inspection
                        </li>

                        <li>
                            Report &amp; Consultation
                        </li>

                    </ul>

                    <a
                        href="#quote-form"
                        class="pp-price-btn btn-glow"
                    >
                        Get Started
                    </a>

                </div>


                {{-- PACKAGE 3 --}}

                <div class="pp-price-card hover-lift" data-aos="fade-up" data-aos-delay="300">

                    <div class="pp-price-icon">
                        <i class="bi bi-buildings"></i>
                    </div>

                    <h3>
                        4 bed room
                    </h3>

                    <div class="price-from">
                        From
                    </div>

                    <div class="pp-price">
                        $525
                    </div>

                    <div class="price-sub">
                        +GST
                    </div>

                    <ul class="pp-price-list">

                        <li>
                            Building Inspection
                        </li>

                        <li>
                            Pest Inspection
                        </li>

                        <li>
                            Report &amp; Consultation
                        </li>

                    </ul>

                    <a
                        href="#quote-form"
                        class="pp-price-btn btn-glow"
                    >
                        Get Started
                    </a>

                </div>


            </div>

        </div>

    </section>


    {{-- =====================================================
         7. WE UTILIZE THE MOST MODERN TOOLS
    ====================================================== --}}

    <section class="pp-section pp-tools">

        <div class="pp-container">

            <div class="pp-heading" data-aos="fade-up">

                <h2>
                    WE UTILIZE THE MOST MODERN TOOLS
                </h2>

            </div>


            <div class="pp-tools-grid">


                {{-- TOOL 1 --}}

                <div class="pp-tool-card hover-lift" data-aos="fade-up" data-aos-delay="100">

                    <div class="pp-tool-image img-zoom-hover">

                        <img
                            src="{{ asset('images/pre2.jpg') }}"
                            alt="Infrared Thermography - FLIR E5 Camera"
                        >

                    </div>

                    <h4>
                        Infrared Thermography
                    </h4>

                    <p>
                        Utilizes an FLIR E5 infrared camera in an effort to detect potential moisture intrusion, electrical issues, plumbing leaks, and defective areas of the home that may be causing energy loss.
                    </p>

                </div>


                {{-- TOOL 2 --}}

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
                        Used to obtain an exact measurement of moisture content in scanned components.
                    </p>

                </div>


                {{-- TOOL 3 --}}

                <div class="pp-tool-card hover-lift" data-aos="fade-up" data-aos-delay="300">

                    <div class="pp-tool-image img-zoom-hover">

                        <img
                            src="{{ asset('images/pre4.jpg') }}"
                            alt="Foundation Level - Zip Level"
                        >

                    </div>

                    <h4>
                        Foundation Level
                    </h4>

                    <p>
                        A zip level is used to ensure that a home’s foundation hasn’t become sunken or sloped over time.
                    </p>

                </div>


            </div>

        </div>

    </section>


    {{-- =====================================================
         8. SCHEDULE YOUR INSPECTION TODAY (CTA)
    ====================================================== --}}

    <section class="pp-cta" data-aos="zoom-in">

        <div class="pp-container">

            <div class="pp-cta-content">

                <h2>
                    SCHEDULE YOUR INSPECTION TODAY
                </h2>

                <p>
                    A pre-purchase building and pest inspection is a small investment that can save you from significant expenses and stress in the future. Our professional inspections provide you with the information needed to make an informed, confident decision about your property purchase. Don’t take risks with your investment—book your inspection today.
                </p>

                <a
                    href="#quote-form"
                    class="pp-btn pp-cta-btn btn-glow"
                >
                    Schedule your inspection now
                </a>

            </div>

        </div>

    </section>


    {{-- =====================================================
         9. CLIENT FEEDBACK & REVIEWS
    ====================================================== --}}

    <section class="pp-section pp-reviews">

        <div class="pp-container">

            <div class="pp-heading" data-aos="fade-up">

                <span class="small-title">
                    Testimonial
                </span>

                <h2>
                    CLIENT FEEDBACK &amp; REVIEWS
                </h2>

            </div>


            <div class="pp-review-grid">


                {{-- REVIEW 1 --}}

                <div class="pp-review-card hover-lift" data-aos="fade-up" data-aos-delay="100">

                    <div class="pp-review-quote">
                        “
                    </div>

                    <p>
                        Very professional and approachable. The property inspection was done thoroughly, and even minor defects were identified. Really appreciate the attention to detail and commitment to the job. Highly recommended for any building inspection.
                    </p>

                    <div class="pp-stars">
                        ★★★★★
                    </div>

                    <h4>
                        Swathi Tarini
                    </h4>

                </div>


                {{-- REVIEW 2 (Max - visible in screenshot) --}}

                <div class="pp-review-card hover-lift" data-aos="fade-up" data-aos-delay="200">

                    <div class="pp-review-quote">
                        “
                    </div>

                    <p>
                        Very thorough and professional during my pre-purchase building and pest inspection. Strongly recommended.
                    </p>

                    <div class="pp-stars">
                        ★★★★★
                    </div>

                    <h4>
                        Max
                    </h4>

                </div>


                {{-- REVIEW 3 (Heena Bhavsar - visible in screenshot) --}}

                <div class="pp-review-card hover-lift" data-aos="fade-up" data-aos-delay="300">

                    <div class="pp-review-quote">
                        “
                    </div>

                    <p>
                        Amazing experience. Quick replies, prompt actions, and a positive attitude. Would definitely recommend 👏👏👏
                    </p>

                    <div class="pp-stars">
                        ★★★★★
                    </div>

                    <h4>
                        Heena Bhavsar
                    </h4>

                </div>


                {{-- REVIEW 4 --}}

                <div class="pp-review-card hover-lift" data-aos="fade-up" data-aos-delay="100">

                    <div class="pp-review-quote">
                        “
                    </div>

                    <p>
                        Took generous time to answer all my questions regarding the property's condition and report. Very kind, humble, and helpful. Highly recommended for anyone needing a building and pest inspection
                    </p>

                    <div class="pp-stars">
                        ★★★★★
                    </div>

                    <h4>
                        Luxmy
                    </h4>

                </div>


                {{-- REVIEW 5 --}}

                <div class="pp-review-card hover-lift" data-aos="fade-up" data-aos-delay="200">

                    <div class="pp-review-quote">
                        “
                    </div>

                    <p>
                        Provided an excellent inspection for the property I'm purchasing. All findings were explained clearly, and the report was prepared on the same day. Warm, professional, and efficient. Highly recommended to friends and family.
                    </p>

                    <div class="pp-stars">
                        ★★★★★
                    </div>

                    <h4>
                        Shaleen De Silva
                    </h4>

                </div>


                {{-- REVIEW 6 --}}

                <div class="pp-review-card hover-lift" data-aos="fade-up" data-aos-delay="300">

                    <div class="pp-review-quote">
                        “
                    </div>

                    <p>
                        Extremely helpful and responsive. The building and pest inspection was completed quickly, and the report was delivered exactly as requested. Smooth and professional experience overall— great service!
                    </p>

                    <div class="pp-stars">
                        ★★★★★
                    </div>

                    <h4>
                        Niresh Wijesiri
                    </h4>

                </div>


            </div>

        </div>

    </section>


    {{-- =====================================================
         10. MOST POPULAR QUESTIONS (FAQ)
    ====================================================== --}}

    <section class="pp-section pp-faq">

        <div class="pp-container">

            <div class="pp-heading" data-aos="fade-up">

                <span class="small-title">
                    Common Questions
                </span>

                <h2>
                    MOST POPULAR QUESTIONS
                </h2>

            </div>


            <div class="pp-faq-grid">


                {{-- COLUMN 1 --}}

                <div class="pp-faq-col">

                    {{-- Q1 (Active by default) --}}

                    <div class="pp-faq-item active" data-aos="fade-up" data-aos-delay="100">

                        <button
                            class="pp-faq-question"
                            type="button"
                        >
                            1. What is a pre-purchase building and pest inspection?
                            <span>⌃</span>
                        </button>

                        <div class="pp-faq-answer">
                            A pre-purchase building and pest inspection is a comprehensive assessment of a property’s structure and pest activity, conducted before you finalize a purchase. The inspection helps uncover any hidden issues, such as structural defects, termite infestations, or safety hazards, so you can make an informed decision.
                        </div>

                    </div>


                    {{-- Q2 --}}

                    <div class="pp-faq-item" data-aos="fade-up" data-aos-delay="150">

                        <button
                            class="pp-faq-question"
                            type="button"
                        >
                            2.Why is a pre-purchase building and pest inspection important?
                            <span>⌄</span>
                        </button>

                        <div class="pp-faq-answer">
                            This inspection is essential because it protects you from purchasing a property with hidden structural or pest issues that could lead to costly repairs later. It provides peace of mind, knowing the true condition of the property before committing to the purchase.
                        </div>

                    </div>


                    {{-- Q3 --}}

                    <div class="pp-faq-item" data-aos="fade-up" data-aos-delay="200">

                        <button
                            class="pp-faq-question"
                            type="button"
                        >
                            3. How much does a pre-purchase building and pest inspection cost?
                            <span>⌄</span>
                        </button>

                        <div class="pp-faq-answer">
                            The cost of a pre-purchase inspection depends on the size and location of the property, but our rates are competitive and start at $400. We also offer package deals for combined building and pest inspections to provide extra value.
                        </div>

                    </div>

                </div>


                {{-- COLUMN 2 --}}

                <div class="pp-faq-col">

                    {{-- Q4 (Active by default) --}}

                    <div class="pp-faq-item active" data-aos="fade-up" data-aos-delay="250">

                        <button
                            class="pp-faq-question"
                            type="button"
                        >
                            4. What areas do you inspect during a building inspection?
                            <span>⌃</span>
                        </button>

                        <div class="pp-faq-answer">
                            The cost of a new home building inspection varies depending on the size of the property and any additional services you may require. We offer competitive pricing and will provide you with a clear estimate before scheduling the inspection.
                        </div>

                    </div>


                    {{-- Q5 --}}

                    <div class="pp-faq-item" data-aos="fade-up" data-aos-delay="300">

                        <button
                            class="pp-faq-question"
                            type="button"
                        >
                            5. How long does the inspection take, and when will I receive the report?
                            <span>⌄</span>
                        </button>

                        <div class="pp-faq-answer">
                            A typical inspection takes 1 to 2 hours, depending on the size of the property. You will receive a detailed inspection report within 24 hours of the inspection, and we offer same-day reports for urgent cases.
                        </div>

                    </div>


                    {{-- Q6 --}}

                    <div class="pp-faq-item" data-aos="fade-up" data-aos-delay="350">

                        <button
                            class="pp-faq-question"
                            type="button"
                        >
                            6. How can I schedule a new home building inspection?
                            <span>⌄</span>
                        </button>

                        <div class="pp-faq-answer">
                            You can schedule a new home building inspection by contacting us directly through our website or by phone. We’ll work with you to find a convenient time for the inspection and answer any additional questions you may have.
                        </div>

                    </div>

                </div>


            </div>

        </div>

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
       FAQ ACCORDION (Column-based independent toggle)
    ===================================================== */

    const faqItems =
        document.querySelectorAll('.pp-faq-item');

    faqItems.forEach(function (item) {

        const question =
            item.querySelector('.pp-faq-question');

        if (!question) return;

        question.addEventListener('click', function () {

            const wasActive =
                item.classList.contains('active');

            const col =
                item.closest('.pp-faq-col') || item.parentElement;

            if (col) {
                col.querySelectorAll('.pp-faq-item').forEach(function (faq) {
                    faq.classList.remove('active');
                    const icon = faq.querySelector('.pp-faq-question span');
                    if (icon) {
                        icon.textContent = '⌄';
                    }
                });
            }

            if (!wasActive) {
                item.classList.add('active');
                const icon = item.querySelector('.pp-faq-question span');
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

    if (backTop) {

        function toggleBackTop() {
            if (window.scrollY > 400) {
                backTop.style.display = 'block';
            } else {
                backTop.style.display = 'none';
            }
        }

        window.addEventListener('scroll', toggleBackTop);

        backTop.addEventListener('click', function () {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

    }

});

</script>

@endsection