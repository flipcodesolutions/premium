@extends('layouts.app')

@section('title', 'Apartment Building Inspection Melbourne | Premium Building & Pest Inspections')

@section('content')

<style>
/* =========================================================
   APARTMENT BUILDING INSPECTION PAGE STYLES
   Designed 1:1 to match reference layout
========================================================= */

.apt-page {
    --apt-navy: #073763;
    --apt-navy-dark: #052646;
    --apt-green: #42a900;
    --apt-green-dark: #358c00;
    --apt-light-green: #eaf6e6;
    --apt-choose-bg: #d8edd5;
    --apt-cyan: #1b9eea;
    --apt-text: #333333;
    --apt-muted: #555555;
    --apt-border: #e2e8f0;
    --apt-orange: #ffb400;

    font-family: Arial, Helvetica, sans-serif;
    color: var(--apt-text);
    overflow-x: hidden;
    position: relative;
}

/* Container */
.apt-container {
    width: 92%;
    max-width: 1180px;
    margin: 0 auto;
}

.apt-section {
    padding: 65px 0;
}

/* Headings */
.apt-heading {
    text-align: center;
    margin-bottom: 35px;
}

.apt-heading .small-title {
    display: block;
    margin-bottom: 8px;
    color: var(--apt-green);
    font-size: 13.5px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.apt-heading h2 {
    margin: 0;
    color: var(--apt-navy);
    font-size: clamp(24px, 3.2vw, 32px);
    line-height: 1.25;
    font-weight: 900;
    text-transform: uppercase;
}

.apt-heading p {
    max-width: 720px;
    margin: 12px auto 0;
    color: var(--apt-muted);
    font-size: 15px;
    line-height: 1.7;
}

/* Buttons */
.apt-btn {
    display: inline-flex;
    justify-content: center;
    align-items: center;
    padding: 13px 26px;
    background: var(--apt-green);
    color: #fff !important;
    border: 0;
    border-radius: 4px;
    font-size: 14.5px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    text-decoration: none;
    transition: all 0.25s ease;
}

.apt-btn:hover {
    background: var(--apt-green-dark);
    transform: translateY(-2px);
    box-shadow: 0 8px 22px rgba(66, 169, 0, 0.35);
}

/* Floating Right Tab */
.apt-floating-tab {
    position: fixed;
    right: 0;
    top: 48%;
    transform: translateY(-50%);
    background: var(--apt-green);
    color: #fff !important;
    padding: 14px 10px;
    font-size: 13px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.8px;
    border-radius: 6px 0 0 6px;
    z-index: 999;
    box-shadow: -3px 4px 16px rgba(0, 0, 0, 0.25);
    text-decoration: none;
    writing-mode: vertical-rl;
    text-orientation: mixed;
    transform-origin: center;
    display: flex;
    align-items: center;
    gap: 8px;
    transition: all 0.25s ease;
}

.apt-floating-tab:hover {
    background: var(--apt-green-dark);
    padding-right: 14px;
}

/* =========================================================
   1. HERO SECTION
========================================================= */
.apt-hero {
    position: relative;
    background:
        linear-gradient(
            90deg,
            rgba(7, 43, 76, 0.95) 0%,
            rgba(7, 43, 76, 0.88) 52%,
            rgba(7, 43, 76, 0.65) 100%
        ),
        url("{{ asset('images/g1.jpg') }}") center center / cover no-repeat;
    color: #fff;
    padding: 20px 0;
}

.apt-hero-inner {
    display: grid;
    grid-template-columns: 1.15fr 0.85fr;
    gap: 40px;
    align-items: center;
    padding: 55px 0 65px;
}

.apt-hero-content h1 {
    font-size: clamp(28px, 4vw, 42px);
    line-height: 1.18;
    font-weight: 900;
    color: #ffffff;
    margin: 0 0 14px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.apt-hero-tag {
    display: inline-block;
    color: #ffffff;
    font-size: 13.5px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 16px;
    opacity: 0.95;
}

.apt-hero-content p {
    color: rgba(255, 255, 255, 0.92);
    font-size: 15px;
    line-height: 1.7;
    margin: 0 0 24px;
    max-width: 580px;
}

.apt-hero-license {
    display: inline-block;
    margin-top: 14px;
    font-size: 12.5px;
    color: rgba(255, 255, 255, 0.8);
    font-weight: 600;
}

/* Hero Form */
.apt-hero-form {
    background: #ffffff;
    border-radius: 8px;
    padding: 26px 24px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.25);
    color: var(--apt-text);
}

.apt-form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 10px;
    margin-bottom: 10px;
}

.apt-hero-form input,
.apt-hero-form select,
.apt-hero-form textarea {
    width: 100%;
    padding: 10px 12px;
    border: 1px solid #d2d6dc;
    border-radius: 4px;
    font-size: 13.5px;
    color: #333;
    outline: none;
    transition: border-color 0.2s ease;
    background: #fff;
    margin-bottom: 10px;
}

.apt-hero-form input:focus,
.apt-hero-form select:focus,
.apt-hero-form textarea:focus {
    border-color: var(--apt-green);
}

.apt-hero-form textarea {
    resize: vertical;
    min-height: 70px;
}

.apt-hero-form .apt-submit {
    width: 100%;
    padding: 13px;
    background: var(--apt-green);
    color: #fff;
    border: 0;
    border-radius: 4px;
    font-size: 14.5px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    cursor: pointer;
    transition: background 0.2s ease;
    margin-top: 4px;
}

.apt-hero-form .apt-submit:hover {
    background: var(--apt-green-dark);
}

/* =========================================================
   2. WELCOME SECTION + INSPECTOR CARD
========================================================= */
.apt-welcome-grid {
    display: grid;
    grid-template-columns: 1.15fr 0.85fr;
    gap: 45px;
    align-items: center;
}

.apt-welcome-content .small-title {
    display: block;
    margin-bottom: 8px;
    color: var(--apt-green);
    font-size: 13px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.apt-welcome-content h2 {
    color: var(--apt-navy);
    font-size: clamp(24px, 3.2vw, 32px);
    line-height: 1.25;
    font-weight: 900;
    margin: 0 0 16px;
    text-transform: uppercase;
}

.apt-welcome-content > p {
    color: var(--apt-muted);
    font-size: 15px;
    line-height: 1.7;
    margin: 0 0 16px;
}

.apt-feature-mini {
    display: flex;
    gap: 14px;
    margin-bottom: 14px;
    align-items: flex-start;
}

.apt-feature-mini-icon {
    width: 32px;
    height: 32px;
    min-width: 32px;
    border-radius: 50%;
    background: #e8f4fc;
    color: var(--apt-cyan);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 15px;
    margin-top: 2px;
}

.apt-feature-mini h4 {
    margin: 0 0 3px;
    color: var(--apt-navy);
    font-size: 14.5px;
    font-weight: 800;
    text-transform: uppercase;
}

.apt-feature-mini p {
    margin: 0;
    color: var(--apt-muted);
    font-size: 13.5px;
    line-height: 1.55;
}

/* Inspector Card */
.apt-inspector-card {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
    text-align: center;
}

.apt-inspector-title {
    background: #111111;
    color: #ffffff;
    font-size: 14px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 1px;
    padding: 10px 14px;
}

.apt-inspector-card img {
    width: 100%;
    height: 340px;
    object-fit: cover;
    object-position: center top;
    display: block;
}

.apt-inspector-name {
    padding: 14px 10px 8px;
    font-size: 14px;
    font-weight: 800;
    color: var(--apt-navy);
    text-transform: uppercase;
}

.apt-inspector-btn {
    display: block;
    background: var(--apt-green);
    color: #ffffff !important;
    text-decoration: none;
    padding: 11px;
    font-size: 14.5px;
    font-weight: 800;
    letter-spacing: 0.5px;
    transition: background 0.2s ease;
}

.apt-inspector-btn:hover {
    background: var(--apt-green-dark);
}

/* =========================================================
   3. WHY APARTMENT BUILDING INSPECTIONS MATTER (2x2 GRID)
========================================================= */
.apt-matters {
    background: #fbfcfc;
}

.apt-matters-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px;
    max-width: 1020px;
    margin: 0 auto;
}

.apt-matters-card {
    background: #ffffff;
    border: 1px solid #e5e9ec;
    border-radius: 6px;
    padding: 18px 20px;
    display: flex;
    align-items: flex-start;
    gap: 14px;
    box-shadow: 0 3px 10px rgba(0, 0, 0, 0.03);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.apt-matters-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.07);
}

.apt-check-icon {
    width: 26px;
    height: 26px;
    min-width: 26px;
    border-radius: 50%;
    background: var(--apt-green);
    color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 13px;
    font-weight: 900;
    margin-top: 3px;
}

.apt-matters-card-content h4 {
    margin: 0 0 5px;
    color: var(--apt-navy);
    font-size: 15px;
    font-weight: 800;
}

.apt-matters-card-content p {
    margin: 0;
    color: var(--apt-muted);
    font-size: 13.5px;
    line-height: 1.6;
}

/* =========================================================
   4. COMPREHENSIVE APARTMENT INSPECTIONS (SCOPE)
========================================================= */
.apt-scope-grid {
    display: grid;
    grid-template-columns: 1.15fr 0.85fr;
    gap: 40px;
    align-items: center;
}

.apt-scope-content h3 {
    font-size: clamp(20px, 2.5vw, 26px);
    line-height: 1.25;
    font-weight: 900;
    color: var(--apt-navy);
    margin: 0 0 12px;
    text-transform: uppercase;
}

.apt-scope-content > p {
    color: var(--apt-muted);
    font-size: 14.5px;
    line-height: 1.7;
    margin-bottom: 20px;
}

.apt-scope-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.apt-scope-item {
    display: flex;
    gap: 14px;
    margin-bottom: 16px;
    align-items: flex-start;
}

.apt-scope-badge {
    width: 28px;
    height: 28px;
    min-width: 28px;
    border-radius: 50%;
    background: var(--apt-green);
    color: #fff;
    font-size: 13px;
    font-weight: 800;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 2px;
}

.apt-scope-info strong {
    display: block;
    color: var(--apt-navy);
    font-size: 14.5px;
    font-weight: 800;
    margin-bottom: 2px;
}

.apt-scope-info span {
    display: block;
    color: var(--apt-muted);
    font-size: 13.5px;
    line-height: 1.55;
}

.apt-scope-image-wrapper {
    position: relative;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
    height: 420px;
}

.apt-scope-image-wrapper img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center center;
    display: block;
}

/* Slider Arrows on Image */
.apt-slide-arrow {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 36px;
    height: 36px;
    border: 0;
    background: rgba(255, 255, 255, 0.85);
    color: #333;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
    cursor: pointer;
    box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
    transition: all 0.2s ease;
}

.apt-slide-arrow:hover {
    background: #fff;
    color: var(--apt-green);
}

.apt-slide-prev {
    left: 12px;
}

.apt-slide-next {
    right: 12px;
}

/* =========================================================
   5. WHY CHOOSE US (LIGHT GREEN BOX)
========================================================= */
.apt-choose {
    padding: 50px 35px;
    background: var(--apt-choose-bg);
    border-radius: 18px;
}

.apt-choose-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
}

.apt-choose-item {
    text-align: center;
    background: #ffffff;
    padding: 26px 18px;
    border-radius: 8px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
    transition: transform 0.3s ease;
}

.apt-choose-item:hover {
    transform: translateY(-4px);
}

.apt-choose-icon {
    width: 48px;
    height: 48px;
    margin: 0 auto 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--apt-green);
    color: #fff;
    border-radius: 6px;
    font-size: 22px;
}

.apt-choose-item h4 {
    margin: 0 0 8px;
    color: var(--apt-navy);
    font-size: 14.5px;
    font-weight: 900;
    text-transform: uppercase;
}

.apt-choose-item p {
    margin: 0;
    color: #555;
    font-size: 13px;
    line-height: 1.6;
}

/* =========================================================
   6. PRICING PACKAGES (3 CARDS)
========================================================= */
.apt-pricing {
    background: #fff;
}

.apt-price-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
    max-width: 1050px;
    margin: 0 auto;
}

.apt-price-card {
    background: #fff;
    border: 1px solid #e4e4e4;
    border-top: 3px solid var(--apt-green);
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.06);
    text-align: center;
    padding: 28px 20px;
    border-radius: 4px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.apt-price-icon {
    font-size: 32px;
    color: var(--apt-navy);
    margin-bottom: 10px;
}

.apt-price-card h3 {
    margin: 0 0 8px;
    color: var(--apt-navy);
    font-size: 16px;
    font-weight: 900;
    text-transform: uppercase;
}

.apt-price {
    color: var(--apt-green);
    font-size: 34px;
    font-weight: 900;
    margin-bottom: 14px;
}

.apt-price small {
    color: #777;
    font-size: 12px;
    font-weight: 600;
}

.apt-price-list {
    list-style: none;
    padding: 0;
    margin: 0 0 22px;
    text-align: left;
    flex-grow: 1;
}

.apt-price-list li {
    padding: 8px 0;
    border-bottom: 1px solid #eee;
    color: #555;
    font-size: 13.5px;
    display: flex;
    align-items: flex-start;
}

.apt-price-list li::before {
    content: "✓";
    color: var(--apt-green);
    margin-right: 8px;
    font-weight: 900;
}

.apt-price-btn {
    display: block;
    width: 100%;
    padding: 12px;
    background: var(--apt-green);
    color: #fff !important;
    text-decoration: none;
    font-size: 14px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    border-radius: 3px;
    transition: all 0.25s ease;
}

.apt-price-btn:hover {
    background: var(--apt-green-dark);
}

/* =========================================================
   7. CTA BANNER (PROTECT YOUR INVESTMENT)
========================================================= */
.apt-cta {
    min-height: 380px;
    display: flex;
    align-items: center;
    background:
        linear-gradient(
            90deg,
            rgba(4, 43, 75, 0.96) 0%,
            rgba(4, 43, 75, 0.88) 55%,
            rgba(4, 43, 75, 0.40) 100%
        ),
        url("{{ asset('images/schedule.jpeg') }}") center right / cover no-repeat;
}

.apt-cta-content {
    max-width: 640px;
    color: #fff;
    padding: 50px 0;
}

.apt-cta-content h2 {
    margin: 0 0 14px;
    font-size: clamp(26px, 3.4vw, 34px);
    line-height: 1.2;
    font-weight: 900;
    text-transform: uppercase;
    color: #fff;
}

.apt-cta-content p {
    margin: 0 0 22px;
    color: rgba(255, 255, 255, 0.90);
    font-size: 15.5px;
    line-height: 1.7;
}

/* =========================================================
   8. REVIEWS SECTION
========================================================= */
.apt-reviews {
    background: #fff;
}

.apt-review-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
}

.apt-review-card {
    text-align: center;
    padding: 25px 20px;
    border-bottom: 3px solid #eee;
    box-shadow: 0 7px 20px rgba(0, 0, 0, 0.06);
    border-radius: 4px;
    background: #fff;
}

.apt-review-quote {
    color: var(--apt-cyan);
    font-size: 38px;
    line-height: 1;
    margin-bottom: 6px;
}

.apt-review-card p {
    min-height: 70px;
    color: #555;
    font-size: 14px;
    line-height: 1.7;
}

.apt-stars {
    color: var(--apt-orange);
    letter-spacing: 3px;
    font-size: 16px;
    margin: 12px 0 14px;
}

.apt-review-card h4 {
    margin: 0;
    color: var(--apt-navy);
    font-size: 14.5px;
    font-weight: 800;
}

/* =========================================================
   9. FAQ ACCORDION SECTION
========================================================= */
.apt-faq {
    background: #fff;
    padding-bottom: 70px;
}

.apt-faq-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px 20px;
}

.apt-faq-item {
    border: 1px solid #e4e4e4;
    background: #fff;
    border-radius: 4px;
    overflow: hidden;
    margin-bottom: 8px;
}

.apt-faq-question {
    width: 100%;
    padding: 14px 16px;
    border: 0;
    background: #fff;
    color: var(--apt-navy);
    display: flex;
    justify-content: space-between;
    align-items: center;
    text-align: left;
    font-size: 14.5px;
    font-weight: 800;
    cursor: pointer;
    transition: all 0.2s ease;
}

.apt-faq-question:hover {
    background: #f7f9fa;
}

.apt-faq-answer {
    display: none;
    padding: 0 16px 14px;
    color: #666;
    font-size: 14px;
    line-height: 1.65;
}

/* Active FAQ Item: Green background on header */
.apt-faq-item.active .apt-faq-question {
    background: var(--apt-green);
    color: #fff;
}

.apt-faq-item.active .apt-faq-answer {
    display: block;
    background: #fff;
    padding-top: 14px;
}

.apt-faq-item.active .apt-faq-icon {
    transform: rotate(180deg);
    color: #fff;
}

.apt-faq-icon {
    transition: transform 0.25s ease;
}

/* =========================================================
   RESPONSIVE MEDIA QUERIES
========================================================= */
@media (max-width: 991px) {
    .apt-hero-inner,
    .apt-welcome-grid,
    .apt-scope-grid {
        grid-template-columns: 1fr;
        gap: 35px;
    }

    .apt-hero-inner {
        padding: 50px 0;
    }

    .apt-choose-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .apt-price-grid {
        grid-template-columns: 1fr;
        max-width: 480px;
    }
}

@media (max-width: 767px) {
    .apt-section {
        padding: 42px 0;
    }

    .apt-hero-inner {
        padding: 40px 0;
    }

    .apt-form-row,
    .apt-matters-grid,
    .apt-review-grid,
    .apt-faq-grid {
        grid-template-columns: 1fr;
    }

    .apt-choose {
        padding: 30px 18px;
    }

    .apt-choose-grid {
        grid-template-columns: 1fr 1fr;
        gap: 16px 10px;
    }

    .apt-scope-image-wrapper {
        height: 320px;
    }

    .apt-floating-tab {
        display: none;
    }
}

@media (max-width: 500px) {
    .apt-choose-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<div class="apt-page">

    {{-- FLOATING RIGHT TAB --}}
    <a href="#quote-form" class="apt-floating-tab">
        <i class="bi bi-calendar-check me-1"></i> BOOK AN INSPECTION
    </a>

    {{-- =====================================================
         1. HERO SECTION
    ====================================================== --}}
    <section class="apt-hero">
        <div class="apt-container">
            <div class="apt-hero-inner">

                <div class="apt-hero-content" data-aos="fade-right" data-aos-duration="850">
                    <span class="apt-hero-tag">
                        PREMIUM BUILDING & PEST INSPECTIONS
                    </span>

                    <h1>
                        EXPERT APARTMENT<br>BUILDING INSPECTIONS<br>IN MELBOURNE
                    </h1>

                    <p>
                        Protect your apartment investment with a professional inspection. We identify visible defects, moisture concerns, structural issues, maintenance problems and other observable risks before they become costly surprises.
                    </p>

                    <div>
                        <a href="tel:0466001551" class="apt-btn btn-glow">
                            <i class="bi bi-telephone-fill me-2"></i>
                            0466 001 551
                        </a>
                    </div>

                    <div class="apt-hero-license">
                        VBA Building Inspector Licence No. IN-PS 74654 &nbsp;|&nbsp; Domestic Builder Licence No. DB-L 100200
                    </div>
                </div>

                {{-- HERO FORM --}}
                <div id="quote-form" class="apt-hero-form hover-lift" data-aos="fade-left" data-aos-duration="850">
                    @if(session('success'))
                        <div class="alert alert-success py-2 mb-2" style="font-size: 13.5px;">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('quote.store') }}" method="POST">
                        @csrf

                        <div class="apt-form-row">
                            <input type="text" name="name" placeholder="Name *" value="{{ old('name') }}" required>
                            <input type="tel" name="phone" placeholder="Phone *" value="{{ old('phone') }}" required>
                        </div>

                        <div class="apt-form-row">
                            <input type="email" name="email" placeholder="Email *" value="{{ old('email') }}" required>
                            <input type="text" name="property_address" placeholder="Property Address" value="{{ old('property_address') }}">
                        </div>

                        <select name="service_type" required>
                            <option value="apartment-building-inspection" selected>Apartment Building Inspection</option>
                            <option value="pre-purchase-building-and-pest-inspection">Pre-Purchase Building & Pest Inspection</option>
                            <option value="building-stage-by-stage-inspection">Building Stage By Stage Inspection</option>
                            <option value="new-build-handover-inspection">New Build Handover Inspection</option>
                            <option value="rising-damp-inspection">Rising Damp Inspection</option>
                            <option value="pool-barrier-inspection">Pool Barrier Inspection</option>
                            <option value="dilapidation-report">Dilapidation Report</option>
                            <option value="vendor-inspection">Vendor Inspection</option>
                            <option value="builders-warranty-inspection">Builders Warranty Inspection</option>
                        </select>

                        <textarea name="message" placeholder="Message / Details (e.g. 1 Bed, 2 Bed, Off-the-plan, Level)">{{ old('message') }}</textarea>

                        <button type="submit" class="apt-submit">
                            BOOK MY QUOTE
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </section>


    {{-- =====================================================
         2. WELCOME SECTION + INSPECTOR CARD
    ====================================================== --}}
    <section class="apt-section apt-welcome">
        <div class="apt-container">

            <div class="apt-welcome-grid">

                <div class="apt-welcome-content" data-aos="fade-right">
                    <span class="small-title">Expert Apartment Building Inspections</span>
                    <h2>
                        WELCOME TO PREMIUM BUILDING & PEST INSPECTIONS
                    </h2>

                    <p>
                        When purchasing an apartment, understanding the condition of both the individual property and its accessible building elements is important before making a significant investment.
                    </p>

                    <p>
                        Our apartment building inspections are designed to identify observable defects, maintenance concerns, moisture problems, structural indicators and other issues that may affect the property.
                    </p>

                    <div class="apt-feature-mini">
                        <div class="apt-feature-mini-icon">
                            <i class="bi bi-search"></i>
                        </div>
                        <div>
                            <h4>COMPREHENSIVE VISUAL INSPECTION</h4>
                            <p>Comprehensive visual inspection of accessible areas across the apartment unit.</p>
                        </div>
                    </div>

                    <div class="apt-feature-mini">
                        <div class="apt-feature-mini-icon">
                            <i class="bi bi-search"></i>
                        </div>
                        <div>
                            <h4>STRUCTURAL & BUILDING DEFECTS</h4>
                            <p>Identification of visible structural indicators, movement, and building defects.</p>
                        </div>
                    </div>

                    <div class="apt-feature-mini">
                        <div class="apt-feature-mini-icon">
                            <i class="bi bi-search"></i>
                        </div>
                        <div>
                            <h4>MOISTURE & WATER-RELATED RISKS</h4>
                            <p>Detailed moisture meter testing and water-related observations across wet areas.</p>
                        </div>
                    </div>

                    <div class="apt-feature-mini">
                        <div class="apt-feature-mini-icon">
                            <i class="bi bi-search"></i>
                        </div>
                        <div>
                            <h4>MAINTENANCE & SAFETY CONCERNS</h4>
                            <p>Assessment of visible maintenance issues, fixtures, fittings, and safety concerns.</p>
                        </div>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('about') }}" class="apt-btn btn-glow">
                            ABOUT US MORE <i class="bi bi-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>

                {{-- INSPECTOR CARD --}}
                <div class="apt-welcome-card-col" data-aos="fade-left">
                    <div class="apt-inspector-card hover-lift">
                        <div class="apt-inspector-title">
                            VBA REGISTERED
                        </div>

                        <img src="{{ asset('images/ronak gami.jpeg') }}" alt="Ronak Gami - Registered Building Inspector">

                        <div class="apt-inspector-name">
                            VBA REGISTERED BUILDING INSPECTOR
                        </div>

                        <a href="tel:0466001551" class="apt-inspector-btn">
                            <i class="bi bi-telephone-fill me-2"></i>
                            0466 001 551
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </section>


    {{-- =====================================================
         3. WHY APARTMENT BUILDING INSPECTIONS MATTER (2x2 GRID)
    ====================================================== --}}
    <section class="apt-section apt-matters">
        <div class="apt-container">

            <div class="apt-heading" data-aos="fade-up">
                <span class="small-title">Important Information</span>
                <h2>WHY APARTMENT BUILDING INSPECTIONS MATTER</h2>
            </div>

            <div class="apt-matters-grid">

                <div class="apt-matters-card hover-lift" data-aos="fade-up" data-aos-delay="100">
                    <div class="apt-check-icon">✓</div>
                    <div class="apt-matters-card-content">
                        <h4>Uncover Hidden Defects</h4>
                        <p>Apartment defects may not always be obvious during a standard viewing. A professional inspection can identify observable concerns that require attention.</p>
                    </div>
                </div>

                <div class="apt-matters-card hover-lift" data-aos="fade-up" data-aos-delay="200">
                    <div class="apt-check-icon">✓</div>
                    <div class="apt-matters-card-content">
                        <h4>Understand Potential Risks</h4>
                        <p>Identify visible moisture, cracking, deterioration, drainage and maintenance concerns before committing to the property.</p>
                    </div>
                </div>

                <div class="apt-matters-card hover-lift" data-aos="fade-up" data-aos-delay="300">
                    <div class="apt-check-icon">✓</div>
                    <div class="apt-matters-card-content">
                        <h4>Evaluate Property Condition</h4>
                        <p>Understanding the observable condition of an apartment can help you make better-informed property decisions.</p>
                    </div>
                </div>

                <div class="apt-matters-card hover-lift" data-aos="fade-up" data-aos-delay="400">
                    <div class="apt-check-icon">✓</div>
                    <div class="apt-matters-card-content">
                        <h4>Long-Term Savings</h4>
                        <p>Identifying maintenance concerns early may help you understand potential future repair requirements and prevent unexpected costs.</p>
                    </div>
                </div>

            </div>

        </div>
    </section>


    {{-- =====================================================
         4. COMPREHENSIVE APARTMENT INSPECTIONS (SCOPE)
    ====================================================== --}}
    <section class="apt-section apt-scope">
        <div class="apt-container">

            <div class="apt-scope-grid">

                <div class="apt-scope-content" data-aos="fade-right">
                    <span class="apt-heading" style="text-align: left; margin-bottom: 0;">
                        <span class="small-title">OUR INSPECTION SCOPE</span>
                    </span>

                    <h3>COMPREHENSIVE APARTMENT BUILDING INSPECTIONS</h3>

                    <p>
                        We assess accessible areas for visible defects, deterioration, movement, damage, poor workmanship and other building concerns:
                    </p>

                    <ul class="apt-scope-list">
                        <li class="apt-scope-item">
                            <div class="apt-scope-badge">1</div>
                            <div class="apt-scope-info">
                                <strong>Comprehensive Building Inspection</strong>
                                <span>We assess accessible interior living spaces, bedrooms, walls, ceilings, floors, doors, and windows for visible defects, deterioration, movement, and poor workmanship.</span>
                            </div>
                        </li>

                        <li class="apt-scope-item">
                            <div class="apt-scope-badge">2</div>
                            <div class="apt-scope-info">
                                <strong>Structural And Safety Checks</strong>
                                <span>Observable indicators around walls, floors, ceilings, balconies, roof areas and other accessible elements are considered within the inspection scope.</span>
                            </div>
                        </li>

                        <li class="apt-scope-item">
                            <div class="apt-scope-badge">3</div>
                            <div class="apt-scope-info">
                                <strong>External & Internal Assessments</strong>
                                <span>Internal and accessible external areas are visually assessed for defects, water damage, moisture indicators, balustrades, and maintenance concerns.</span>
                            </div>
                        </li>

                        <li class="apt-scope-item">
                            <div class="apt-scope-badge">4</div>
                            <div class="apt-scope-info">
                                <strong>Apartment Common Areas</strong>
                                <span>Where access and inspection scope permit, relevant accessible common areas can be considered for observable issues affecting the apartment environment.</span>
                            </div>
                        </li>

                        <li class="apt-scope-item">
                            <div class="apt-scope-badge">5</div>
                            <div class="apt-scope-info">
                                <strong>Moisture And Water Risks</strong>
                                <span>Areas showing signs of water penetration, dampness, staining or elevated moisture conditions across wet areas and bathrooms may require further investigation.</span>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="apt-scope-image-wrapper hover-lift" data-aos="fade-left">
                    <img src="{{ asset('images/g4.jpeg') }}" alt="Ronak Gami inspecting apartment window frame">
                    <button class="apt-slide-arrow apt-slide-prev" type="button" aria-label="Previous">
                        <i class="bi bi-chevron-left"></i>
                    </button>
                    <button class="apt-slide-arrow apt-slide-next" type="button" aria-label="Next">
                        <i class="bi bi-chevron-right"></i>
                    </button>
                </div>

            </div>

        </div>
    </section>


    {{-- =====================================================
         5. WHY CHOOSE US (LIGHT GREEN BOX)
    ====================================================== --}}
    <section class="apt-section">
        <div class="apt-container">

            <div class="apt-choose">

                <div class="apt-heading" data-aos="fade-up">
                    <span class="small-title">WHY CHOOSE US</span>
                    <h2>WHY CHOOSE US FOR YOUR APARTMENT BUILDING INSPECTION?</h2>
                </div>

                <div class="apt-choose-grid">

                    <div class="apt-choose-item" data-aos="fade-up" data-aos-delay="100">
                        <div class="apt-choose-icon">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <h4>PROTECT YOUR INVESTMENT</h4>
                        <p>Ensure major defects are identified before you pay or settle on your apartment purchase.</p>
                    </div>

                    <div class="apt-choose-item" data-aos="fade-up" data-aos-delay="200">
                        <div class="apt-choose-icon">
                            <i class="bi bi-search"></i>
                        </div>
                        <h4>EXPERIENCED VBA INSPECTORS</h4>
                        <p>Qualified VBA registered inspectors with specialist apartment and building knowledge.</p>
                    </div>

                    <div class="apt-choose-item" data-aos="fade-up" data-aos-delay="300">
                        <div class="apt-choose-icon">
                            <i class="bi bi-file-earmark-check"></i>
                        </div>
                        <h4>CLEAR DETAILED REPORTS</h4>
                        <p>Clear photographic reports delivered within 24 hours citing relevant Australian Standards.</p>
                    </div>

                    <div class="apt-choose-item" data-aos="fade-up" data-aos-delay="400">
                        <div class="apt-choose-icon">
                            <i class="bi bi-patch-check"></i>
                        </div>
                        <h4>PEACE OF MIND</h4>
                        <p>Total confidence knowing your apartment purchase is safe, compliant, and structurally sound.</p>
                    </div>

                </div>

            </div>

        </div>
    </section>


    {{-- =====================================================
         6. APARTMENT INSPECTION PRICING (3 CARDS)
    ====================================================== --}}
    <section class="apt-section apt-pricing">
        <div class="apt-container">

            <div class="apt-heading" data-aos="fade-up">
                <span class="small-title">PRICING PLANS</span>
                <h2>APARTMENT INSPECTION PRICING</h2>
            </div>

            <div class="apt-price-grid">

                {{-- CARD 1: 1 BEDROOM --}}
                <div class="apt-price-card hover-lift" data-aos="fade-up" data-aos-delay="100">
                    <div>
                        <div class="apt-price-icon">
                            <i class="bi bi-door-closed"></i>
                        </div>
                        <h3>1 BEDROOM</h3>

                        <div class="apt-price">
                            $400*
                            <small>+ GST</small>
                        </div>

                        <ul class="apt-price-list">
                            <li>Comprehensive visual inspection of accessible areas</li>
                            <li>Moisture & water-related observations</li>
                            <li>Interior living, bedroom, bathroom & kitchen</li>
                            <li>Balcony, fixtures & fittings assessment</li>
                            <li>Clear digital inspection report within 24 hours</li>
                        </ul>
                    </div>

                    <a href="#quote-form" class="apt-price-btn">
                        GET STARTED
                    </a>
                </div>

                {{-- CARD 2: 2 BEDROOM --}}
                <div class="apt-price-card hover-lift" data-aos="fade-up" data-aos-delay="200">
                    <div>
                        <div class="apt-price-icon">
                            <i class="bi bi-house-door"></i>
                        </div>
                        <h3>2 BEDROOM</h3>

                        <div class="apt-price">
                            $450*
                            <small>+ GST</small>
                        </div>

                        <ul class="apt-price-list">
                            <li>Complete 2-bedroom apartment visual assessment</li>
                            <li>Ensuite, bathroom & laundry waterproofing check</li>
                            <li>Moisture meter scanning & leak identification</li>
                            <li>Kitchen, balcony & accessible building elements</li>
                            <li>Detailed photographic report delivered within 24 hours</li>
                        </ul>
                    </div>

                    <a href="#quote-form" class="apt-price-btn">
                        GET STARTED
                    </a>
                </div>

                {{-- CARD 3: 3+ BEDROOM / PENTHOUSE --}}
                <div class="apt-price-card hover-lift" data-aos="fade-up" data-aos-delay="300">
                    <div>
                        <div class="apt-price-icon">
                            <i class="bi bi-building"></i>
                        </div>
                        <h3>3+ BEDROOM</h3>

                        <div class="apt-price">
                            $525*
                            <small>+ GST</small>
                        </div>

                        <ul class="apt-price-list">
                            <li>Multi-bedroom / penthouse inspection</li>
                            <li>Multiple bathrooms, powder room & laundry</li>
                            <li>Extensive balcony, balustrade & joinery check</li>
                            <li>Assessment of observable maintenance & safety issues</li>
                            <li>Priority 24-hour detailed digital report</li>
                        </ul>
                    </div>

                    <a href="#quote-form" class="apt-price-btn">
                        GET STARTED
                    </a>
                </div>

            </div>

        </div>
    </section>


    {{-- =====================================================
         7. CTA BANNER (PROTECT YOUR INVESTMENT)
    ====================================================== --}}
    <section class="apt-cta">
        <div class="apt-container">

            <div class="apt-cta-content" data-aos="fade-right">
                <h2>PROTECT YOUR INVESTMENT WITH A PROFESSIONAL INSPECTION</h2>

                <p>
                    When purchasing an apartment, understanding the condition of both the property and accessible building elements gives you confidence. Schedule your inspection with Ronak Gami today.
                </p>

                <a href="#quote-form" class="apt-btn btn-glow">
                    SCHEDULE AN INSPECTION TODAY
                </a>
            </div>

        </div>
    </section>


    {{-- =====================================================
         8. CLIENT REVIEWS & FEEDBACK
    ====================================================== --}}
    <section class="apt-section apt-reviews">
        <div class="apt-container">

            <div class="apt-heading" data-aos="fade-up">
                <span class="small-title">Client Feedback & Reviews</span>
                <h2>WHAT OUR CLIENTS SAY</h2>
            </div>

            <div class="apt-review-grid">

                <div class="apt-review-card hover-lift" data-aos="fade-up" data-aos-delay="100">
                    <div class="apt-review-quote">“</div>
                    <p>
                        "The inspection was thorough and the report was very easy to understand. We appreciated the clear communication throughout the process."
                    </p>
                    <div class="apt-stars">★★★★★</div>
                    <h4>Nneka Wozni</h4>
                </div>

                <div class="apt-review-card hover-lift" data-aos="fade-up" data-aos-delay="200">
                    <div class="apt-review-quote">“</div>
                    <p>
                        "Very professional service. The inspection identified several things we had not noticed during our apartment viewing."
                    </p>
                    <div class="apt-stars">★★★★★</div>
                    <h4>Max</h4>
                </div>

                <div class="apt-review-card hover-lift" data-aos="fade-up" data-aos-delay="300">
                    <div class="apt-review-quote">“</div>
                    <p>
                        "Great communication and attention to detail. The inspection gave us much better information about the apartment before purchasing."
                    </p>
                    <div class="apt-stars">★★★★★</div>
                    <h4>Neena Dhivar</h4>
                </div>

            </div>

        </div>
    </section>


    {{-- =====================================================
         9. FREQUENTLY ASKED QUESTIONS (FAQ)
    ====================================================== --}}
    <section class="apt-section apt-faq">
        <div class="apt-container">

            <div class="apt-heading" data-aos="fade-up">
                <span class="small-title">Quick Answers</span>
                <h2>MOST POPULAR QUESTIONS</h2>
            </div>

            <div class="apt-faq-grid">

                {{-- LEFT COLUMN --}}
                <div class="apt-faq-col">

                    {{-- FAQ 1 (Active by default) --}}
                    <div class="apt-faq-item active" data-aos="fade-up" data-aos-delay="100">
                        <button class="apt-faq-question" type="button">
                            <span>What is an apartment building inspection?</span>
                            <i class="bi bi-chevron-down apt-faq-icon"></i>
                        </button>
                        <div class="apt-faq-answer">
                            An apartment building inspection is a professional assessment of accessible areas of an apartment and relevant building elements within the agreed inspection scope. It is designed to identify visible defects, maintenance concerns and other observable issues.
                        </div>
                    </div>

                    {{-- FAQ 2 --}}
                    <div class="apt-faq-item" data-aos="fade-up" data-aos-delay="200">
                        <button class="apt-faq-question" type="button">
                            <span>Do you inspect apartment common areas?</span>
                            <i class="bi bi-chevron-down apt-faq-icon"></i>
                        </button>
                        <div class="apt-faq-answer">
                            Where access is available and included in the agreed scope, relevant accessible common areas can be considered during the inspection.
                        </div>
                    </div>

                    {{-- FAQ 3 --}}
                    <div class="apt-faq-item" data-aos="fade-up" data-aos-delay="300">
                        <button class="apt-faq-question" type="button">
                            <span>Will I receive a report?</span>
                            <i class="bi bi-chevron-down apt-faq-icon"></i>
                        </button>
                        <div class="apt-faq-answer">
                            Yes. A professional inspection report documents the relevant findings and observable conditions identified during the inspection.
                        </div>
                    </div>

                </div>

                {{-- RIGHT COLUMN --}}
                <div class="apt-faq-col">

                    {{-- FAQ 4 (Active by default) --}}
                    <div class="apt-faq-item active" data-aos="fade-up" data-aos-delay="150">
                        <button class="apt-faq-question" type="button">
                            <span>What does an apartment inspection cover?</span>
                            <i class="bi bi-chevron-down apt-faq-icon"></i>
                        </button>
                        <div class="apt-faq-answer">
                            The inspection can cover accessible internal and external areas, visible building elements, moisture indicators, cracking, fixtures, fittings and other observable conditions within the agreed scope.
                        </div>
                    </div>

                    {{-- FAQ 5 --}}
                    <div class="apt-faq-item" data-aos="fade-up" data-aos-delay="250">
                        <button class="apt-faq-question" type="button">
                            <span>How long does an apartment inspection take?</span>
                            <i class="bi bi-chevron-down apt-faq-icon"></i>
                        </button>
                        <div class="apt-faq-answer">
                            Inspection time depends on apartment size, accessibility, construction type and the agreed scope of the inspection. We can provide an estimated timeframe when arranging your booking.
                        </div>
                    </div>

                    {{-- FAQ 6 --}}
                    <div class="apt-faq-item" data-aos="fade-up" data-aos-delay="350">
                        <button class="apt-faq-question" type="button">
                            <span>Should I inspect an apartment before buying?</span>
                            <i class="bi bi-chevron-down apt-faq-icon"></i>
                        </button>
                        <div class="apt-faq-answer">
                            A professional inspection can provide additional information about the property's observable condition before you make a significant purchasing decision.
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const faqButtons = document.querySelectorAll('.apt-faq-question');
    faqButtons.forEach(button => {
        button.addEventListener('click', function () {
            const item = this.parentElement;
            const isActive = item.classList.contains('active');
            
            // Toggle clicked
            if (isActive) {
                item.classList.remove('active');
            } else {
                item.classList.add('active');
            }
        });
    });
});
</script>

@endsection