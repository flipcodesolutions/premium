@extends('layouts.app')

@section('title', 'Professional Rising Damp Inspection Services In Melbourne | Premium Building & Pest Inspections')

@section('content')

<style>
/* =========================================================
   RISING DAMP INSPECTION PAGE STYLES
   Designed 1:1 to match reference layout
   With increased font sizes as requested
========================================================= */

.rd-page {
    --rd-navy: #073763;
    --rd-navy-dark: #052646;
    --rd-green: #42a900;
    --rd-green-dark: #358c00;
    --rd-light-green: #eaf6e6;
    --rd-choose-bg: #d8edd5;
    --rd-cyan: #1b9eea;
    --rd-text: #2d3748;
    --rd-muted: #4a5568;
    --rd-border: #e2e8f0;
    --rd-orange: #ffb400;

    font-family: Arial, Helvetica, sans-serif;
    color: var(--rd-text);
    overflow-x: hidden;
    position: relative;
    font-size: 16px;
    line-height: 1.7;
}

/* Container */
.rd-container {
    width: 92%;
    max-width: 1180px;
    margin: 0 auto;
}

.rd-section {
    padding: 70px 0;
}

/* Headings with increased font sizes */
.rd-heading {
    text-align: center;
    margin-bottom: 40px;
}

.rd-heading .small-title {
    display: block;
    margin-bottom: 10px;
    color: var(--rd-green);
    font-size: 15px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 1.2px;
}

.rd-heading h2 {
    margin: 0;
    color: var(--rd-navy);
    font-size: clamp(26px, 3.4vw, 34px);
    line-height: 1.25;
    font-weight: 900;
    text-transform: uppercase;
}

.rd-heading p {
    max-width: 760px;
    margin: 14px auto 0;
    color: var(--rd-muted);
    font-size: 16px;
    line-height: 1.75;
}

/* Buttons */
.rd-btn {
    display: inline-flex;
    justify-content: center;
    align-items: center;
    padding: 14px 28px;
    background: var(--rd-green);
    color: #fff !important;
    border: 0;
    border-radius: 4px;
    font-size: 15.5px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    text-decoration: none;
    transition: all 0.25s ease;
}

.rd-btn:hover {
    background: var(--rd-green-dark);
    transform: translateY(-2px);
    box-shadow: 0 8px 22px rgba(66, 169, 0, 0.35);
}

/* Floating Right Tab */
.rd-floating-tab {
    position: fixed;
    right: 0;
    top: 48%;
    transform: translateY(-50%);
    background: var(--rd-green);
    color: #fff !important;
    padding: 14px 11px;
    font-size: 13.5px;
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

.rd-floating-tab:hover {
    background: var(--rd-green-dark);
    padding-right: 15px;
}

/* =========================================================
   1. HERO SECTION
========================================================= */
.rd-hero {
    position: relative;
    background:
        linear-gradient(
            90deg,
            rgba(7, 43, 76, 0.95) 0%,
            rgba(7, 43, 76, 0.88) 52%,
            rgba(7, 43, 76, 0.65) 100%
        ),
        url("{{ asset('images/rising-damp.jpg') }}") center center / cover no-repeat;
    color: #fff;
    padding: 25px 0;
}

.rd-hero-inner {
    display: grid;
    grid-template-columns: 1.15fr 0.85fr;
    gap: 45px;
    align-items: center;
    padding: 60px 0 70px;
}

.rd-hero-content h1 {
    font-size: clamp(30px, 4.2vw, 44px);
    line-height: 1.18;
    font-weight: 900;
    color: #ffffff;
    margin: 0 0 16px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.rd-hero-tag {
    display: inline-block;
    color: #ffffff;
    font-size: 14.5px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 16px;
    opacity: 0.95;
}

.rd-hero-content p {
    color: rgba(255, 255, 255, 0.94);
    font-size: 16.5px;
    line-height: 1.75;
    margin: 0 0 26px;
    max-width: 600px;
}

.rd-hero-license {
    display: inline-block;
    margin-top: 16px;
    font-size: 13.5px;
    color: rgba(255, 255, 255, 0.85);
    font-weight: 600;
}

/* Hero Form */
.rd-hero-form {
    background: #ffffff;
    border-radius: 8px;
    padding: 28px 26px;
    box-shadow: 0 12px 35px rgba(0, 0, 0, 0.28);
    color: var(--rd-text);
}

.rd-form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px;
    margin-bottom: 12px;
}

.rd-hero-form input,
.rd-hero-form select,
.rd-hero-form textarea {
    width: 100%;
    padding: 12px 14px;
    border: 1px solid #d2d6dc;
    border-radius: 4px;
    font-size: 14.5px;
    color: #2d3748;
    outline: none;
    transition: border-color 0.2s ease;
    background: #fff;
    margin-bottom: 12px;
}

.rd-hero-form input:focus,
.rd-hero-form select:focus,
.rd-hero-form textarea:focus {
    border-color: var(--rd-green);
}

.rd-hero-form textarea {
    resize: vertical;
    min-height: 75px;
}

.rd-hero-form .rd-submit {
    width: 100%;
    padding: 14px;
    background: var(--rd-green);
    color: #fff;
    border: 0;
    border-radius: 4px;
    font-size: 15.5px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    cursor: pointer;
    transition: background 0.2s ease;
    margin-top: 4px;
}

.rd-hero-form .rd-submit:hover {
    background: var(--rd-green-dark);
}

/* =========================================================
   2. WELCOME SECTION + INSPECTOR CARD
========================================================= */
.rd-welcome-grid {
    display: grid;
    grid-template-columns: 1.15fr 0.85fr;
    gap: 50px;
    align-items: center;
}

.rd-welcome-content .small-title {
    display: block;
    margin-bottom: 10px;
    color: var(--rd-green);
    font-size: 14.5px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.rd-welcome-content h2 {
    color: var(--rd-navy);
    font-size: clamp(26px, 3.3vw, 34px);
    line-height: 1.25;
    font-weight: 900;
    margin: 0 0 18px;
    text-transform: uppercase;
}

.rd-welcome-content > p {
    color: var(--rd-muted);
    font-size: 16px;
    line-height: 1.75;
    margin: 0 0 18px;
}

.rd-feature-mini {
    display: flex;
    gap: 16px;
    margin-bottom: 16px;
    align-items: flex-start;
}

.rd-feature-mini-icon {
    width: 36px;
    height: 36px;
    min-width: 36px;
    border-radius: 50%;
    background: #e8f4fc;
    color: var(--rd-cyan);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 17px;
    margin-top: 2px;
}

.rd-feature-mini h4 {
    margin: 0 0 4px;
    color: var(--rd-navy);
    font-size: 15.5px;
    font-weight: 800;
    text-transform: uppercase;
}

.rd-feature-mini p {
    margin: 0;
    color: var(--rd-muted);
    font-size: 14.5px;
    line-height: 1.6;
}

/* Inspector Card */
.rd-inspector-card {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
    text-align: center;
}

.rd-inspector-title {
    background: #111111;
    color: #ffffff;
    font-size: 14.5px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 1px;
    padding: 11px 16px;
}

.rd-inspector-card img {
    width: 100%;
    height: 350px;
    object-fit: cover;
    object-position: center top;
    display: block;
}

.rd-inspector-name {
    padding: 15px 12px 10px;
    font-size: 15px;
    font-weight: 800;
    color: var(--rd-navy);
    text-transform: uppercase;
}

.rd-inspector-btn {
    display: block;
    background: var(--rd-green);
    color: #ffffff !important;
    text-decoration: none;
    padding: 12px;
    font-size: 15.5px;
    font-weight: 800;
    letter-spacing: 0.5px;
    transition: background 0.2s ease;
}

.rd-inspector-btn:hover {
    background: var(--rd-green-dark);
}

/* =========================================================
   3. WHY RISING DAMP INSPECTIONS MATTER (2x2 GRID)
========================================================= */
.rd-matters {
    background: #fbfcfc;
}

.rd-matters-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 18px;
    max-width: 1040px;
    margin: 0 auto;
}

.rd-matters-card {
    background: #ffffff;
    border: 1px solid #e5e9ec;
    border-radius: 6px;
    padding: 20px 22px;
    display: flex;
    align-items: flex-start;
    gap: 16px;
    box-shadow: 0 3px 10px rgba(0, 0, 0, 0.03);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.rd-matters-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
}

.rd-check-icon {
    width: 28px;
    height: 28px;
    min-width: 28px;
    border-radius: 50%;
    background: var(--rd-green);
    color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 14px;
    font-weight: 900;
    margin-top: 3px;
}

.rd-matters-card-content h4 {
    margin: 0 0 6px;
    color: var(--rd-navy);
    font-size: 16px;
    font-weight: 800;
}

.rd-matters-card-content p {
    margin: 0;
    color: var(--rd-muted);
    font-size: 14.5px;
    line-height: 1.65;
}

/* =========================================================
   4. RISING DAMP INSPECTION PROCESS (SCOPE & r1.jpg)
========================================================= */
.rd-scope-grid {
    display: grid;
    grid-template-columns: 1.15fr 0.85fr;
    gap: 45px;
    align-items: center;
}

.rd-scope-content h3 {
    font-size: clamp(22px, 2.6vw, 28px);
    line-height: 1.25;
    font-weight: 900;
    color: var(--rd-navy);
    margin: 0 0 14px;
    text-transform: uppercase;
}

.rd-scope-content > p {
    color: var(--rd-muted);
    font-size: 15.5px;
    line-height: 1.75;
    margin-bottom: 22px;
}

.rd-scope-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.rd-scope-item {
    display: flex;
    gap: 16px;
    margin-bottom: 18px;
    align-items: flex-start;
}

.rd-scope-badge {
    width: 30px;
    height: 30px;
    min-width: 30px;
    border-radius: 50%;
    background: var(--rd-green);
    color: #fff;
    font-size: 14px;
    font-weight: 800;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 2px;
}

.rd-scope-info strong {
    display: block;
    color: var(--rd-navy);
    font-size: 15.5px;
    font-weight: 800;
    margin-bottom: 3px;
}

.rd-scope-info span {
    display: block;
    color: var(--rd-muted);
    font-size: 14.5px;
    line-height: 1.6;
}

.rd-scope-image-wrapper {
    position: relative;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
    height: 420px;
}

.rd-scope-image-wrapper img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center center;
    display: block;
}

/* Slider Arrows on Image */
.rd-slide-arrow {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 38px;
    height: 38px;
    border: 0;
    background: rgba(255, 255, 255, 0.85);
    color: #333;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 17px;
    cursor: pointer;
    box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
    transition: all 0.2s ease;
}

.rd-slide-arrow:hover {
    background: #fff;
    color: var(--rd-green);
}

.rd-slide-prev {
    left: 12px;
}

.rd-slide-next {
    right: 12px;
}

/* =========================================================
   5. WHY CHOOSE US (LIGHT GREEN BOX)
========================================================= */
.rd-choose {
    padding: 55px 38px;
    background: var(--rd-choose-bg);
    border-radius: 18px;
}

.rd-choose-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 22px;
}

.rd-choose-item {
    text-align: center;
    background: #ffffff;
    padding: 28px 20px;
    border-radius: 8px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
    transition: transform 0.3s ease;
}

.rd-choose-item:hover {
    transform: translateY(-4px);
}

.rd-choose-icon {
    width: 52px;
    height: 52px;
    margin: 0 auto 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--rd-green);
    color: #fff;
    border-radius: 6px;
    font-size: 24px;
}

.rd-choose-item h4 {
    margin: 0 0 10px;
    color: var(--rd-navy);
    font-size: 15.5px;
    font-weight: 900;
    text-transform: uppercase;
}

.rd-choose-item p {
    margin: 0;
    color: #4a5568;
    font-size: 14px;
    line-height: 1.65;
}

/* =========================================================
   6. PRICING PACKAGES (3 CARDS)
========================================================= */
.rd-pricing {
    background: #fff;
}

.rd-price-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 26px;
    max-width: 1060px;
    margin: 0 auto;
}

.rd-price-card {
    background: #fff;
    border: 1px solid #e4e4e4;
    border-top: 3px solid var(--rd-green);
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.06);
    text-align: center;
    padding: 30px 22px;
    border-radius: 4px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.rd-price-icon {
    font-size: 34px;
    color: var(--rd-navy);
    margin-bottom: 12px;
}

.rd-price-card h3 {
    margin: 0 0 10px;
    color: var(--rd-navy);
    font-size: 17px;
    font-weight: 900;
    text-transform: uppercase;
}

.rd-price {
    color: var(--rd-green);
    font-size: 36px;
    font-weight: 900;
    margin-bottom: 16px;
}

.rd-price small {
    color: #666;
    font-size: 13px;
    font-weight: 600;
}

.rd-price-list {
    list-style: none;
    padding: 0;
    margin: 0 0 24px;
    text-align: left;
    flex-grow: 1;
}

.rd-price-list li {
    padding: 9px 0;
    border-bottom: 1px solid #eee;
    color: #4a5568;
    font-size: 14.5px;
    display: flex;
    align-items: flex-start;
}

.rd-price-list li::before {
    content: "✓";
    color: var(--rd-green);
    margin-right: 10px;
    font-weight: 900;
    font-size: 15px;
}

.rd-price-btn {
    display: block;
    width: 100%;
    padding: 13px;
    background: var(--rd-green);
    color: #fff !important;
    text-decoration: none;
    font-size: 15px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    border-radius: 3px;
    transition: all 0.25s ease;
}

.rd-price-btn:hover {
    background: var(--rd-green-dark);
}

/* =========================================================
   7. CTA BANNER (SCHEDULE YOUR INSPECTION TODAY)
========================================================= */
.rd-cta {
    min-height: 390px;
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

.rd-cta-content {
    max-width: 660px;
    color: #fff;
    padding: 55px 0;
}

.rd-cta-content h2 {
    margin: 0 0 16px;
    font-size: clamp(26px, 3.5vw, 36px);
    line-height: 1.2;
    font-weight: 900;
    text-transform: uppercase;
    color: #fff;
}

.rd-cta-content p {
    margin: 0 0 24px;
    color: rgba(255, 255, 255, 0.92);
    font-size: 16.5px;
    line-height: 1.75;
}

/* =========================================================
   8. REVIEWS SECTION
========================================================= */
.rd-reviews {
    background: #fff;
}

.rd-review-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 22px;
}

.rd-review-card {
    text-align: center;
    padding: 28px 22px;
    border-bottom: 3px solid #eee;
    box-shadow: 0 7px 20px rgba(0, 0, 0, 0.06);
    border-radius: 4px;
    background: #fff;
}

.rd-review-quote {
    color: var(--rd-cyan);
    font-size: 40px;
    line-height: 1;
    margin-bottom: 8px;
}

.rd-review-card p {
    min-height: 75px;
    color: #4a5568;
    font-size: 15px;
    line-height: 1.7;
}

.rd-stars {
    color: var(--rd-orange);
    letter-spacing: 3px;
    font-size: 17px;
    margin: 14px 0 16px;
}

.rd-review-card h4 {
    margin: 0;
    color: var(--rd-navy);
    font-size: 15.5px;
    font-weight: 800;
}

/* =========================================================
   9. FAQ ACCORDION SECTION
========================================================= */
.rd-faq {
    background: #fff;
    padding-bottom: 75px;
}

.rd-faq-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 14px 22px;
}

.rd-faq-item {
    border: 1px solid #e4e4e4;
    background: #fff;
    border-radius: 4px;
    overflow: hidden;
    margin-bottom: 10px;
}

.rd-faq-question {
    width: 100%;
    padding: 16px 18px;
    border: 0;
    background: #fff;
    color: var(--rd-navy);
    display: flex;
    justify-content: space-between;
    align-items: center;
    text-align: left;
    font-size: 15.5px;
    font-weight: 800;
    cursor: pointer;
    transition: all 0.2s ease;
}

.rd-faq-question:hover {
    background: #f7f9fa;
}

.rd-faq-answer {
    display: none;
    padding: 0 18px 16px;
    color: #4a5568;
    font-size: 15px;
    line-height: 1.7;
}

/* Active FAQ Item: Green background on header */
.rd-faq-item.active .rd-faq-question {
    background: var(--rd-green);
    color: #fff;
}

.rd-faq-item.active .rd-faq-answer {
    display: block;
    background: #fff;
    padding-top: 16px;
}

.rd-faq-item.active .rd-faq-icon {
    transform: rotate(180deg);
    color: #fff;
}

.rd-faq-icon {
    transition: transform 0.25s ease;
}

/* =========================================================
   RESPONSIVE MEDIA QUERIES
========================================================= */
@media (max-width: 991px) {
    .rd-hero-inner,
    .rd-welcome-grid,
    .rd-scope-grid {
        grid-template-columns: 1fr;
        gap: 38px;
    }

    .rd-hero-inner {
        padding: 50px 0;
    }

    .rd-choose-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .rd-price-grid {
        grid-template-columns: 1fr;
        max-width: 480px;
    }
}

@media (max-width: 767px) {
    .rd-section {
        padding: 45px 0;
    }

    .rd-hero-inner {
        padding: 40px 0;
    }

    .rd-form-row,
    .rd-matters-grid,
    .rd-review-grid,
    .rd-faq-grid {
        grid-template-columns: 1fr;
    }

    .rd-choose {
        padding: 32px 20px;
    }

    .rd-choose-grid {
        grid-template-columns: 1fr 1fr;
        gap: 16px 12px;
    }

    .rd-scope-image-wrapper {
        height: 320px;
    }

    .rd-floating-tab {
        display: none;
    }
}

@media (max-width: 500px) {
    .rd-choose-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<div class="rd-page">

    {{-- FLOATING RIGHT TAB --}}
    <a href="#rd-hero-form" class="rd-floating-tab">
        <i class="bi bi-calendar-check me-1"></i> BOOK AN INSPECTION
    </a>

    {{-- =====================================================
         1. HERO SECTION
    ====================================================== --}}
    <section class="rd-hero">
        <div class="rd-container">
            <div class="rd-hero-inner">

                <div class="rd-hero-content" data-aos="fade-right" data-aos-duration="850">
                    <span class="rd-hero-tag">
                        PREMIUM BUILDING & PEST INSPECTIONS
                    </span>

                    <h1>
                        PROFESSIONAL RISING<br>DAMP INSPECTION<br>SERVICES IN MELBOURNE
                    </h1>

                    <p>
                        Identify moisture problems early with a professional rising damp inspection. We assess visible signs of dampness, moisture-related damage, staining and other observable building concerns before they cause costly structural decay.
                    </p>

                    <div>
                        <a href="tel:0466001551" class="rd-btn btn-glow">
                            <i class="bi bi-telephone-fill me-2"></i>
                            0466 001 551
                        </a>
                    </div>

                    <div class="rd-hero-license">
                        VBA Building Inspector Licence No. IN-PS 74654 &nbsp;|&nbsp; Domestic Builder Licence No. DB-L 100200
                    </div>
                </div>

                {{-- HERO FORM --}}
                <div id="rd-hero-form" class="rd-hero-form hover-lift" data-aos="fade-left" data-aos-duration="850">
                    @if(session('success'))
                        <div class="alert alert-success py-2 mb-2" style="font-size: 14px;">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('quote.store') }}" method="POST">
                        @csrf

                        <div class="rd-form-row">
                            <input type="text" name="name" placeholder="Name *" value="{{ old('name') }}" required>
                            <input type="tel" name="phone" placeholder="Phone *" value="{{ old('phone') }}" required>
                        </div>

                        <div class="rd-form-row">
                            <input type="email" name="email" placeholder="Email *" value="{{ old('email') }}" required>
                            <input type="text" name="property_address" placeholder="Property Address" value="{{ old('property_address') }}">
                        </div>

                        <select name="service_type" required>
                            <option value="rising-damp-inspection" selected>Rising Damp Inspection</option>
                            <option value="pre-purchase-building-and-pest-inspection">Pre-Purchase Building & Pest Inspection</option>
                            <option value="building-stage-by-stage-inspection">Building Stage By Stage Inspection</option>
                            <option value="new-build-handover-inspection">New Build Handover Inspection</option>
                            <option value="apartment-building-inspection">Apartment Building Inspection</option>
                            <option value="pool-barrier-inspection">Pool Barrier Inspection</option>
                            <option value="dilapidation-report">Dilapidation Report</option>
                            <option value="vendor-inspection">Vendor Inspection</option>
                            <option value="builders-warranty-inspection">Builders Warranty Inspection</option>
                        </select>

                        <textarea name="message" placeholder="Message / Details (e.g. Lower wall stains, peeling paint, room location)">{{ old('message') }}</textarea>

                        <button type="submit" class="rd-submit">
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
    <section class="rd-section rd-welcome">
        <div class="rd-container">

            <div class="rd-welcome-grid">

                <div class="rd-welcome-content" data-aos="fade-right">
                    <span class="small-title">Expert Rising Damp Inspections</span>
                    <h2>
                        WELCOME TO PREMIUM RISING DAMP INSPECTION
                    </h2>

                    <p>
                        Is your home showing signs of moisture, dampness or deterioration near the lower sections of walls? Rising damp can contribute to visible damage and may require professional assessment.
                    </p>

                    <p>
                        Our rising damp inspections focus on identifying visible signs and indicators associated with moisture movement, dampness and related building conditions.
                    </p>

                    <div class="rd-feature-mini">
                        <div class="rd-feature-mini-icon">
                            <i class="bi bi-search"></i>
                        </div>
                        <div>
                            <h4>ASSESSMENT OF RISING DAMP</h4>
                            <p>Assessment of visible rising damp indicators and moisture-related building conditions.</p>
                        </div>
                    </div>

                    <div class="rd-feature-mini">
                        <div class="rd-feature-mini-icon">
                            <i class="bi bi-search"></i>
                        </div>
                        <div>
                            <h4>IDENTIFICATION OF SYMPTOMS</h4>
                            <p>Identification of damp staining, deterioration, peeling finishes, and salt efflorescence.</p>
                        </div>
                    </div>

                    <div class="rd-feature-mini">
                        <div class="rd-feature-mini-icon">
                            <i class="bi bi-search"></i>
                        </div>
                        <div>
                            <h4>MOISTURE MEASUREMENT & DETECTION</h4>
                            <p>Non-invasive electronic moisture meter observations and professional damp reporting.</p>
                        </div>
                    </div>

                    <div class="rd-feature-mini">
                        <div class="rd-feature-mini-icon">
                            <i class="bi bi-search"></i>
                        </div>
                        <div>
                            <h4>MAINTENANCE & NEXT STEPS</h4>
                            <p>Clear findings so property owners understand if further specialist advice is required.</p>
                        </div>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('about') }}" class="rd-btn btn-glow">
                            ABOUT US MORE <i class="bi bi-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>

                {{-- INSPECTOR CARD --}}
                <div class="rd-welcome-card-col" data-aos="fade-left">
                    <div class="rd-inspector-card hover-lift">
                        <div class="rd-inspector-title">
                            VBA REGISTERED
                        </div>

                        <img src="{{ asset('images/ronak gami.jpeg') }}" alt="Ronak Gami - Registered Building Inspector">

                        <div class="rd-inspector-name">
                            VBA REGISTERED BUILDING INSPECTOR
                        </div>

                        <a href="tel:0466001551" class="rd-inspector-btn">
                            <i class="bi bi-telephone-fill me-2"></i>
                            0466 001 551
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </section>


    {{-- =====================================================
         3. WHY RISING DAMP INSPECTIONS MATTER (2x2 GRID)
    ====================================================== --}}
    <section class="rd-section rd-matters">
        <div class="rd-container">

            <div class="rd-heading" data-aos="fade-up">
                <span class="small-title">Important Information</span>
                <h2>WHY RISING DAMP INSPECTIONS ARE IMPORTANT</h2>
            </div>

            <div class="rd-matters-grid">

                <div class="rd-matters-card hover-lift" data-aos="fade-up" data-aos-delay="100">
                    <div class="rd-check-icon">✓</div>
                    <div class="rd-matters-card-content">
                        <h4>Protect Structural Integrity</h4>
                        <p>Rising damp and persistent moisture can contribute to deterioration of building materials, mortar decay, and structural foundation weakness if left unresolved.</p>
                    </div>
                </div>

                <div class="rd-matters-card hover-lift" data-aos="fade-up" data-aos-delay="200">
                    <div class="rd-check-icon">✓</div>
                    <div class="rd-matters-card-content">
                        <h4>Ensure Healthy Living Conditions</h4>
                        <p>Damp conditions can contribute to mould growth, airborne allergens, musty odours, and deterioration of internal finishes that should be investigated promptly.</p>
                    </div>
                </div>

                <div class="rd-matters-card hover-lift" data-aos="fade-up" data-aos-delay="300">
                    <div class="rd-check-icon">✓</div>
                    <div class="rd-matters-card-content">
                        <h4>Prevent Expensive Repairs</h4>
                        <p>Identifying moisture-related concerns early can help property owners understand potential maintenance needs before extensive replastering is necessary.</p>
                    </div>
                </div>

                <div class="rd-matters-card hover-lift" data-aos="fade-up" data-aos-delay="400">
                    <div class="rd-check-icon">✓</div>
                    <div class="rd-matters-card-content">
                        <h4>Maintain Property Value</h4>
                        <p>Understanding and addressing moisture problems can assist owners in preserving long-term property market value and buyer confidence.</p>
                    </div>
                </div>

            </div>

        </div>
    </section>


    {{-- =====================================================
         4. OUR RISING DAMP INSPECTION PROCESS (SCOPE & r1.jpg)
    ====================================================== --}}
    <section class="rd-section rd-scope">
        <div class="rd-container">

            <div class="rd-scope-grid">

                <div class="rd-scope-content" data-aos="fade-right">
                    <span class="rd-heading" style="text-align: left; margin-bottom: 0;">
                        <span class="small-title">OUR INSPECTION SCOPE</span>
                    </span>

                    <h3>OUR RISING DAMP INSPECTION PROCESS</h3>

                    <p>
                        Through our inspections, we assess visible signs that may indicate moisture movement or damp-related deterioration across all accessible areas:
                    </p>

                    <ul class="rd-scope-list">
                        <li class="rd-scope-item">
                            <div class="rd-scope-badge">1</div>
                            <div class="rd-scope-info">
                                <strong>Visible Moisture & Tide Mark Assessment</strong>
                                <span>Tide marks or visible moisture staining on lower walls, skirtings, timber footings, and internal plaster.</span>
                            </div>
                        </li>

                        <li class="rd-scope-item">
                            <div class="rd-scope-badge">2</div>
                            <div class="rd-scope-info">
                                <strong>Peeling Paint & Plaster Deterioration</strong>
                                <span>Assessment of bubbling, flaking paint, crumbled plaster, and white powder salt efflorescence deposits.</span>
                            </div>
                        </li>

                        <li class="rd-scope-item">
                            <div class="rd-scope-badge">3</div>
                            <div class="rd-scope-info">
                                <strong>Electronic Moisture Meter Scanning</strong>
                                <span>Non-invasive moisture testing across damp profiles to gauge elevated moisture concentrations within wall substrates.</span>
                            </div>
                        </li>

                        <li class="rd-scope-item">
                            <div class="rd-scope-badge">4</div>
                            <div class="rd-scope-info">
                                <strong>Subfloor & Ventilation Examination</strong>
                                <span>Inspection of subfloor airflow vents, soil clearance, damp-proof course (DPC) bridging, and site drainage.</span>
                            </div>
                        </li>

                        <li class="rd-scope-item">
                            <div class="rd-scope-badge">5</div>
                            <div class="rd-scope-info">
                                <strong>Mould, Odour & Structural Risks</strong>
                                <span>Evaluation of musty smells, mould growth, rot in adjacent structural timbers, and detailed photographic reporting.</span>
                            </div>
                        </li>
                    </ul>
                </div>

                {{-- IMAGE r1.jpg FROM public/images/r1.jpg --}}
                <div class="rd-scope-image-wrapper hover-lift" data-aos="fade-left">
                    <img src="{{ asset('images/r1.jpg') }}" alt="Rising damp wall crack and moisture inspection">
                    <button class="rd-slide-arrow rd-slide-prev" type="button" aria-label="Previous">
                        <i class="bi bi-chevron-left"></i>
                    </button>
                    <button class="rd-slide-arrow rd-slide-next" type="button" aria-label="Next">
                        <i class="bi bi-chevron-right"></i>
                    </button>
                </div>

            </div>

        </div>
    </section>


    {{-- =====================================================
         5. WHY CHOOSE US (LIGHT GREEN BOX)
    ====================================================== --}}
    <section class="rd-section">
        <div class="rd-container">

            <div class="rd-choose">

                <div class="rd-heading" data-aos="fade-up">
                    <span class="small-title">WHY CHOOSE US</span>
                    <h2>WHY CHOOSE US FOR YOUR RISING DAMP INSPECTION?</h2>
                </div>

                <div class="rd-choose-grid">

                    <div class="rd-choose-item" data-aos="fade-up" data-aos-delay="100">
                        <div class="rd-choose-icon">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <h4>LICENSED INSPECTOR</h4>
                        <p>Your inspection is conducted by an appropriately licensed and experienced VBA building inspector.</p>
                    </div>

                    <div class="rd-choose-item" data-aos="fade-up" data-aos-delay="200">
                        <div class="rd-choose-icon">
                            <i class="bi bi-search"></i>
                        </div>
                        <h4>THOROUGH INSPECTION</h4>
                        <p>We take a detailed approach when assessing visible moisture and damp-related building conditions.</p>
                    </div>

                    <div class="rd-choose-item" data-aos="fade-up" data-aos-delay="300">
                        <div class="rd-choose-icon">
                            <i class="bi bi-file-earmark-check"></i>
                        </div>
                        <h4>CLEAR REPORTS</h4>
                        <p>Inspection findings are documented in a clear, professional photographic report delivered in 24 hours.</p>
                    </div>

                    <div class="rd-choose-item" data-aos="fade-up" data-aos-delay="400">
                        <div class="rd-choose-icon">
                            <i class="bi bi-clock-history"></i>
                        </div>
                        <h4>FAST SERVICE</h4>
                        <p>We provide a prompt, convenient inspection service designed around your property schedule.</p>
                    </div>

                </div>

            </div>

        </div>
    </section>


    {{-- =====================================================
         6. RISING DAMP PRICING (3 CARDS)
    ====================================================== --}}
    <section class="rd-section rd-pricing">
        <div class="rd-container">

            <div class="rd-heading" data-aos="fade-up">
                <span class="small-title">PRICING PLANS</span>
                <h2>RISING DAMP INSPECTION PRICING</h2>
            </div>

            <div class="rd-price-grid">

                {{-- CARD 1: 2 BEDROOM --}}
                <div class="rd-price-card hover-lift" data-aos="fade-up" data-aos-delay="100">
                    <div>
                        <div class="rd-price-icon">
                            <i class="bi bi-house-door"></i>
                        </div>
                        <h3>2 BEDROOM</h3>

                        <div class="rd-price">
                            $400*
                            <small>+ GST</small>
                        </div>

                        <ul class="rd-price-list">
                            <li>Comprehensive visual inspection</li>
                            <li>Lower wall moisture meter scanning</li>
                            <li>Damp profile & staining check</li>
                            <li>Report & consultation included</li>
                            <li>Delivered within 24 hours</li>
                        </ul>
                    </div>

                    <a href="{{ route('contact') }}" class="rd-price-btn">
                        GET STARTED
                    </a>
                </div>

                {{-- CARD 2: 3 BEDROOM --}}
                <div class="rd-price-card hover-lift" data-aos="fade-up" data-aos-delay="200">
                    <div>
                        <div class="rd-price-icon">
                            <i class="bi bi-house-fill"></i>
                        </div>
                        <h3>3 BEDROOM</h3>

                        <div class="rd-price">
                            $450*
                            <small>+ GST</small>
                        </div>

                        <ul class="rd-price-list">
                            <li>Full 3-bedroom property inspection</li>
                            <li>Subfloor ventilation & DPC check</li>
                            <li>Thermal & moisture detection scanning</li>
                            <li>Detailed photographic damp report</li>
                            <li>Delivered within 24 hours</li>
                        </ul>
                    </div>

                    <a href="{{ route('contact') }}" class="rd-price-btn">
                        GET STARTED
                    </a>
                </div>

                {{-- CARD 3: 4+ BEDROOM --}}
                <div class="rd-price-card hover-lift" data-aos="fade-up" data-aos-delay="300">
                    <div>
                        <div class="rd-price-icon">
                            <i class="bi bi-building"></i>
                        </div>
                        <h3>4+ BEDROOM</h3>

                        <div class="rd-price">
                            $525*
                            <small>+ GST</small>
                        </div>

                        <ul class="rd-price-list">
                            <li>Multi-room & large home damp audit</li>
                            <li>Full perimeter & subfloor evaluation</li>
                            <li>Detailed observations across all levels</li>
                            <li>Priority defect report delivery</li>
                            <li>Phone debrief with licensed inspector</li>
                        </ul>
                    </div>

                    <a href="{{ route('contact') }}" class="rd-price-btn">
                        GET STARTED
                    </a>
                </div>

            </div>

        </div>
    </section>


    {{-- =====================================================
         7. CTA BANNER (SCHEDULE YOUR INSPECTION TODAY)
    ====================================================== --}}
    <section class="rd-cta">
        <div class="rd-container">

            <div class="rd-cta-content" data-aos="fade-right">
                <h2>SCHEDULE YOUR INSPECTION TODAY</h2>

                <p>
                    A professional rising damp inspection can help identify moisture-related concerns before they become more extensive. Our inspection provides clear observations and professional reporting to help you protect the condition of your property.
                </p>

                <a href="{{ route('contact') }}" class="rd-btn btn-glow">
                    SCHEDULE YOUR INSPECTION NOW
                </a>
            </div>

        </div>
    </section>


    {{-- =====================================================
         8. CLIENT REVIEWS & FEEDBACK
    ====================================================== --}}
    <section class="rd-section rd-reviews">
        <div class="rd-container">

            <div class="rd-heading" data-aos="fade-up">
                <span class="small-title">Client Feedback & Reviews</span>
                <h2>WHAT OUR CLIENTS SAY</h2>
            </div>

            <div class="rd-review-grid">

                <div class="rd-review-card hover-lift" data-aos="fade-up" data-aos-delay="100">
                    <div class="rd-review-quote">“</div>
                    <p>
                        "The inspection was very thorough and the report clearly explained the moisture concerns we had noticed in our property."
                    </p>
                    <div class="rd-stars">★★★★★</div>
                    <h4>Neela Wajiani</h4>
                </div>

                <div class="rd-review-card hover-lift" data-aos="fade-up" data-aos-delay="200">
                    <div class="rd-review-quote">“</div>
                    <p>
                        "Very professional service and excellent communication. We received useful information about the damp areas and possible next steps."
                    </p>
                    <div class="rd-stars">★★★★★</div>
                    <h4>Max</h4>
                </div>

                <div class="rd-review-card hover-lift" data-aos="fade-up" data-aos-delay="300">
                    <div class="rd-review-quote">“</div>
                    <p>
                        "Arranging the inspection was simple and the findings were explained clearly. Very happy with the service."
                    </p>
                    <div class="rd-stars">★★★★★</div>
                    <h4>Neena Dhivar</h4>
                </div>

            </div>

        </div>
    </section>


    {{-- =====================================================
         9. FREQUENTLY ASKED QUESTIONS (FAQ)
    ====================================================== --}}
    <section class="rd-section rd-faq">
        <div class="rd-container">

            <div class="rd-heading" data-aos="fade-up">
                <span class="small-title">Quick Answers</span>
                <h2>MOST POPULAR QUESTIONS</h2>
            </div>

            <div class="rd-faq-grid">

                {{-- LEFT COLUMN --}}
                <div class="rd-faq-col">

                    {{-- FAQ 1 (Active by default) --}}
                    <div class="rd-faq-item active" data-aos="fade-up" data-aos-delay="100">
                        <button class="rd-faq-question" type="button">
                            <span>What is rising damp?</span>
                            <i class="bi bi-chevron-down rd-faq-icon"></i>
                        </button>
                        <div class="rd-faq-answer">
                            Rising damp refers to moisture movement from the ground into porous building materials like brickwork and mortar. A professional inspection can help identify visible indicators and moisture-related conditions that require remediation.
                        </div>
                    </div>

                    {{-- FAQ 2 --}}
                    <div class="rd-faq-item" data-aos="fade-up" data-aos-delay="200">
                        <button class="rd-faq-question" type="button">
                            <span>How is rising damp inspected?</span>
                            <i class="bi bi-chevron-down rd-faq-icon"></i>
                        </button>
                        <div class="rd-faq-answer">
                            The inspection generally involves visual assessment of accessible areas and, where appropriate, moisture measurements, damp profile examination, and inspection of visible building conditions.
                        </div>
                    </div>

                    {{-- FAQ 3 --}}
                    <div class="rd-faq-item" data-aos="fade-up" data-aos-delay="300">
                        <button class="rd-faq-question" type="button">
                            <span>Will I receive a report after the inspection?</span>
                            <i class="bi bi-chevron-down rd-faq-icon"></i>
                        </button>
                        <div class="rd-faq-answer">
                            Yes. Inspection findings, moisture measurements, and relevant photo observations are documented in a comprehensive professional inspection report delivered within 24 hours.
                        </div>
                    </div>

                </div>

                {{-- RIGHT COLUMN --}}
                <div class="rd-faq-col">

                    {{-- FAQ 4 (Active by default) --}}
                    <div class="rd-faq-item active" data-aos="fade-up" data-aos-delay="150">
                        <button class="rd-faq-question" type="button">
                            <span>How do I know if my property has rising damp?</span>
                            <i class="bi bi-chevron-down rd-faq-icon"></i>
                        </button>
                        <div class="rd-faq-answer">
                            Common visible indicators include damp staining, tide marks along lower walls, peeling paint, blistered plaster, efflorescence salt deposits, and musty damp odours.
                        </div>
                    </div>

                    {{-- FAQ 5 --}}
                    <div class="rd-faq-item" data-aos="fade-up" data-aos-delay="250">
                        <button class="rd-faq-question" type="button">
                            <span>Can rising damp cause mould?</span>
                            <i class="bi bi-chevron-down rd-faq-icon"></i>
                        </button>
                        <div class="rd-faq-answer">
                            Persistent damp conditions can contribute to mould growth and deterioration of internal finishes. The underlying moisture source should be investigated promptly to safeguard health.
                        </div>
                    </div>

                    {{-- FAQ 6 --}}
                    <div class="rd-faq-item" data-aos="fade-up" data-aos-delay="350">
                        <button class="rd-faq-question" type="button">
                            <span>Can you identify the exact source of moisture?</span>
                            <i class="bi bi-chevron-down rd-faq-icon"></i>
                        </button>
                        <div class="rd-faq-answer">
                            An inspection identifies observable signs and indicators of moisture movement, such as breached damp-proof courses or subfloor ventilation issues, providing clear guidance on necessary next steps.
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const faqButtons = document.querySelectorAll('.rd-faq-question');
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