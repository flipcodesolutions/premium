@extends('layouts.app')

@section('title', 'Building Stage-by-Stage Inspection Melbourne | Premium Building & Pest Inspections')

@section('content')

<style>
/* =========================================================
   STAGE-BY-STAGE INSPECTION PAGE STYLES
   Designed 1:1 to match reference layout
========================================================= */

.stage-page {
    --st-navy: #073763;
    --st-navy-dark: #052646;
    --st-green: #42a900;
    --st-green-dark: #358c00;
    --st-light-green: #eaf6e6;
    --st-choose-bg: #d8edd5;
    --st-cyan: #1b9eea;
    --st-text: #333333;
    --st-muted: #555555;
    --st-border: #e2e8f0;
    --st-orange: #ffb400;

    font-family: Arial, Helvetica, sans-serif;
    color: var(--st-text);
    overflow-x: hidden;
    position: relative;
}

/* Container */
.st-container {
    width: 92%;
    max-width: 1180px;
    margin: 0 auto;
}

.st-section {
    padding: 60px 0;
}

/* Headings */
.st-heading {
    text-align: center;
    margin-bottom: 35px;
}

.st-heading .small-title {
    display: block;
    margin-bottom: 8px;
    color: var(--st-green);
    font-size: 13.5px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.st-heading h2 {
    margin: 0;
    color: var(--st-navy);
    font-size: clamp(24px, 3.2vw, 32px);
    line-height: 1.25;
    font-weight: 900;
    text-transform: uppercase;
}

.st-heading p {
    max-width: 720px;
    margin: 12px auto 0;
    color: var(--st-muted);
    font-size: 15px;
    line-height: 1.7;
}

/* Buttons */
.st-btn {
    display: inline-flex;
    justify-content: center;
    align-items: center;
    padding: 13px 26px;
    background: var(--st-green);
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

.st-btn:hover {
    background: var(--st-green-dark);
    transform: translateY(-2px);
    box-shadow: 0 8px 22px rgba(66, 169, 0, 0.35);
}

.st-btn-outline {
    display: inline-flex;
    justify-content: center;
    align-items: center;
    padding: 12px 24px;
    background: transparent;
    color: #fff !important;
    border: 2px solid #fff;
    border-radius: 4px;
    font-size: 14.5px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    text-decoration: none;
    transition: all 0.25s ease;
}

.st-btn-outline:hover {
    background: #fff;
    color: var(--st-navy) !important;
    transform: translateY(-2px);
}

/* Floating Right Tab */
.st-floating-tab {
    position: fixed;
    top: 45%;
    right: 0;
    transform: translateY(-50%) rotate(-90deg);
    transform-origin: right bottom;
    background: var(--st-green);
    color: #fff !important;
    padding: 10px 18px;
    font-size: 12.5px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.8px;
    text-decoration: none;
    border-radius: 6px 6px 0 0;
    box-shadow: -2px 0 12px rgba(0, 0, 0, 0.25);
    z-index: 999;
    transition: all 0.25s ease;
    white-space: nowrap;
}

.st-floating-tab:hover {
    background: var(--st-green-dark);
}

/* =========================================================
   1. HERO SECTION
========================================================= */
.st-hero {
    min-height: 540px;
    position: relative;
    display: flex;
    align-items: center;
    background:
        linear-gradient(
            90deg,
            rgba(4, 39, 69, 0.95) 0%,
            rgba(4, 39, 69, 0.88) 52%,
            rgba(5, 43, 74, 0.40) 100%
        ),
        url("{{ asset('images/g1.jpg') }}") center right / cover no-repeat;
}

.st-hero-inner {
    width: 92%;
    max-width: 1180px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: 1.08fr 0.76fr;
    gap: 45px;
    align-items: center;
    padding: 65px 0;
}

.st-hero-content {
    color: #fff;
}

.st-hero-content h1 {
    max-width: 650px;
    margin: 0 0 14px;
    color: #fff;
    font-size: clamp(32px, 4.4vw, 48px);
    line-height: 1.12;
    font-weight: 900;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.st-hero-tag {
    display: inline-block;
    margin-bottom: 14px;
    color: #8ee346;
    font-size: 13px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.6px;
}

.st-hero-content p {
    max-width: 580px;
    margin: 0 0 24px;
    color: rgba(255, 255, 255, 0.90);
    font-size: 15px;
    line-height: 1.7;
}

/* Hero Quote Form */
.st-hero-form {
    background: #fff;
    padding: 24px;
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.28);
    border-radius: 4px;
}

.st-form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 8px;
}

.st-hero-form input,
.st-hero-form select,
.st-hero-form textarea {
    width: 100%;
    padding: 11px 12px;
    margin-bottom: 8px;
    border: 1px solid #dce3e8;
    background: #f0f4f8;
    color: #333;
    font-size: 14px;
    outline: none;
    box-sizing: border-box;
    border-radius: 3px;
    transition: all 0.2s ease;
}

.st-hero-form textarea {
    height: 60px;
    resize: vertical;
}

.st-hero-form input:focus,
.st-hero-form select:focus,
.st-hero-form textarea:focus {
    border-color: var(--st-green);
    background: #fff;
}

.st-submit {
    width: 100%;
    padding: 13px;
    border: 0;
    background: var(--st-green);
    color: #fff;
    font-size: 15px;
    font-weight: 800;
    cursor: pointer;
    border-radius: 3px;
    text-transform: uppercase;
    letter-spacing: 0.6px;
    transition: all 0.25s ease;
}

.st-submit:hover {
    background: var(--st-green-dark);
}

/* =========================================================
   2. WELCOME SECTION + INSPECTOR CARD
========================================================= */
.st-welcome {
    background: #fff;
}

.st-welcome-grid {
    display: grid;
    grid-template-columns: 1fr 0.85fr;
    gap: 45px;
    align-items: center;
}

.st-welcome-content h2 {
    margin: 0 0 14px;
    color: var(--st-navy);
    font-size: clamp(23px, 2.8vw, 28px);
    line-height: 1.25;
    font-weight: 900;
    text-transform: uppercase;
}

.st-welcome-content > p {
    color: #555;
    font-size: 15px;
    line-height: 1.75;
    margin-bottom: 18px;
}

.st-feature-mini {
    display: flex;
    gap: 14px;
    margin: 16px 0;
    align-items: flex-start;
}

.st-feature-mini-icon {
    width: 36px;
    height: 36px;
    min-width: 36px;
    border: 2px solid #1b9eea;
    border-radius: 50%;
    color: #1b9eea;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 15px;
    margin-top: 2px;
}

.st-feature-mini h4 {
    margin: 0 0 3px;
    color: var(--st-navy);
    font-size: 15px;
    font-weight: 900;
    text-transform: uppercase;
}

.st-feature-mini p {
    margin: 0;
    color: #666;
    font-size: 13.5px;
    line-height: 1.6;
}

/* Inspector Card */
.st-inspector-card {
    background: #fff;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
    border-radius: 4px;
    overflow: hidden;
}

.st-inspector-title {
    padding: 10px;
    background: #111;
    color: #fff;
    text-align: center;
    font-size: 13px;
    font-weight: 900;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.st-inspector-card img {
    display: block;
    width: 100%;
    height: auto;
    object-fit: cover;
}

.st-inspector-name {
    padding: 12px 10px 8px;
    color: var(--st-navy);
    text-align: center;
    font-size: 13.5px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.st-inspector-btn {
    display: block;
    width: 100%;
    padding: 12px;
    background: var(--st-green);
    color: #fff !important;
    text-align: center;
    text-decoration: none;
    font-size: 14.5px;
    font-weight: 800;
    transition: all 0.2s ease;
}

.st-inspector-btn:hover {
    background: var(--st-green-dark);
}

/* =========================================================
   3. WHY STAGE-BY-STAGE INSPECTIONS MATTER
========================================================= */
.st-matters {
    background: #fff;
    padding-top: 20px;
}

.st-matters-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px;
}

.st-matters-card {
    padding: 18px 22px;
    border: 1px solid #e2e8f0;
    background: #fff;
    border-radius: 4px;
    display: flex;
    gap: 14px;
    align-items: center;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
}

.st-check-icon {
    width: 24px;
    height: 24px;
    min-width: 24px;
    border-radius: 50%;
    background: #e8f6df;
    color: var(--st-green);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 13px;
    font-weight: 900;
}

.st-matters-card p {
    margin: 0;
    color: #333;
    font-size: 14.5px;
    font-weight: 700;
    line-height: 1.5;
}

/* =========================================================
   4. INSPECTION PROCESS SECTION
========================================================= */
.st-process {
    background: #fff;
}

.st-process-grid {
    display: grid;
    grid-template-columns: 1.05fr 0.95fr;
    gap: 40px;
    align-items: center;
}

.st-process-content h3 {
    margin: 0 0 14px;
    color: var(--st-navy);
    font-size: clamp(22px, 2.8vw, 27px);
    font-weight: 900;
    text-transform: uppercase;
}

.st-process-content p {
    color: #555;
    font-size: 15px;
    line-height: 1.7;
    margin-bottom: 20px;
}

.st-stage-steps {
    list-style: none;
    padding: 0;
    margin: 0;
}

.st-stage-step {
    display: flex;
    gap: 14px;
    margin-bottom: 16px;
    align-items: flex-start;
}

.st-step-badge {
    width: 28px;
    height: 28px;
    min-width: 28px;
    border-radius: 50%;
    background: var(--st-green);
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 13px;
    font-weight: 800;
    margin-top: 2px;
}

.st-step-info strong {
    display: block;
    color: var(--st-navy);
    font-size: 15px;
    font-weight: 800;
    margin-bottom: 3px;
}

.st-step-info span {
    display: block;
    color: #666;
    font-size: 13.5px;
    line-height: 1.55;
}

.st-process-image-wrapper {
    position: relative;
    width: 100%;
    height: 440px;
    overflow: hidden;
    border-radius: 8px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
}

.st-process-image-wrapper img {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center 10%;
}

/* Slider Arrows on Image */
.st-slide-arrow {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 36px;
    height: 36px;
    border: 0;
    background: rgba(255, 255, 255, 0.75);
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

.st-slide-arrow:hover {
    background: #fff;
    color: var(--st-green);
}

.st-slide-prev {
    left: 12px;
}

.st-slide-next {
    right: 12px;
}

/* =========================================================
   5. WHY CHOOSE US (LIGHT GREEN BOX)
========================================================= */
.st-choose {
    padding: 50px 35px;
    background: var(--st-choose-bg);
    border-radius: 18px;
}

.st-choose-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
}

.st-choose-item {
    text-align: center;
    background: #ffffff;
    padding: 26px 18px;
    border-radius: 8px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
    transition: transform 0.3s ease;
}

.st-choose-item:hover {
    transform: translateY(-4px);
}

.st-choose-icon {
    width: 48px;
    height: 48px;
    margin: 0 auto 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--st-green);
    color: #fff;
    border-radius: 6px;
    font-size: 22px;
}

.st-choose-item h4 {
    margin: 0 0 8px;
    color: var(--st-navy);
    font-size: 14.5px;
    font-weight: 900;
    text-transform: uppercase;
}

.st-choose-item p {
    margin: 0;
    color: #555;
    font-size: 13px;
    line-height: 1.6;
}

/* =========================================================
   6. PRICING PACKAGES (4 CARDS)
========================================================= */
.st-pricing {
    background: #fff;
}

.st-price-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 16px;
}

.st-price-card {
    background: #fff;
    border: 1px solid #e4e4e4;
    border-top: 3px solid var(--st-green);
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.06);
    text-align: center;
    padding: 24px 16px;
    border-radius: 4px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.st-price-icon {
    font-size: 28px;
    color: var(--st-navy);
    margin-bottom: 8px;
}

.st-price-card h3 {
    margin: 0 0 8px;
    color: var(--st-navy);
    font-size: 14.5px;
    font-weight: 900;
    text-transform: uppercase;
}

.st-price {
    color: var(--st-green);
    font-size: 32px;
    font-weight: 900;
    margin-bottom: 12px;
}

.st-price small {
    color: #777;
    font-size: 12px;
    font-weight: 600;
}

.st-price-list {
    list-style: none;
    padding: 0;
    margin: 0 0 18px;
    text-align: left;
    flex-grow: 1;
}

.st-price-list li {
    padding: 7px 0;
    border-bottom: 1px solid #eee;
    color: #555;
    font-size: 13px;
    display: flex;
    align-items: flex-start;
}

.st-price-list li::before {
    content: "✓";
    color: var(--st-green);
    margin-right: 7px;
    font-weight: 900;
}

.st-price-btn {
    display: block;
    width: 100%;
    padding: 11px;
    background: var(--st-green);
    color: #fff !important;
    text-decoration: none;
    font-size: 13.5px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    border-radius: 3px;
    transition: all 0.25s ease;
}

.st-price-btn:hover {
    background: var(--st-green-dark);
}

/* =========================================================
   7. CTA BANNER (ENSURE YOUR BUILD PROGRESSES SMOOTHLY)
========================================================= */
.st-cta {
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

.st-cta-content {
    max-width: 640px;
    color: #fff;
    padding: 50px 0;
}

.st-cta-content h2 {
    margin: 0 0 14px;
    font-size: clamp(26px, 3.4vw, 34px);
    line-height: 1.2;
    font-weight: 900;
    text-transform: uppercase;
    color: #fff;
}

.st-cta-content p {
    margin: 0 0 22px;
    color: rgba(255, 255, 255, 0.90);
    font-size: 15.5px;
    line-height: 1.7;
}

/* =========================================================
   8. REVIEWS SECTION
========================================================= */
.st-reviews {
    background: #fff;
}

.st-review-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
}

.st-review-card {
    text-align: center;
    padding: 25px 20px;
    border-bottom: 3px solid #eee;
    box-shadow: 0 7px 20px rgba(0, 0, 0, 0.06);
    border-radius: 4px;
    background: #fff;
}

.st-review-quote {
    color: var(--st-cyan);
    font-size: 38px;
    line-height: 1;
    margin-bottom: 6px;
}

.st-review-card p {
    min-height: 70px;
    color: #555;
    font-size: 14px;
    line-height: 1.7;
}

.st-stars {
    color: var(--st-orange);
    letter-spacing: 3px;
    font-size: 16px;
    margin: 12px 0 14px;
}

.st-review-card h4 {
    margin: 0;
    color: var(--st-navy);
    font-size: 14.5px;
    font-weight: 800;
}

/* =========================================================
   9. FAQ ACCORDION SECTION
========================================================= */
.st-faq {
    background: #fff;
    padding-bottom: 70px;
}

.st-faq-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 10px 18px;
}

.st-faq-item {
    border: 1px solid #e4e4e4;
    background: #fff;
    border-radius: 4px;
    overflow: hidden;
}

.st-faq-question {
    width: 100%;
    padding: 14px 16px;
    border: 0;
    background: #fff;
    color: var(--st-navy);
    display: flex;
    justify-content: space-between;
    align-items: center;
    text-align: left;
    font-size: 14.5px;
    font-weight: 800;
    cursor: pointer;
    transition: all 0.2s ease;
}

.st-faq-question:hover {
    background: #f7f9fa;
}

.st-faq-answer {
    display: none;
    padding: 0 16px 14px;
    color: #666;
    font-size: 14px;
    line-height: 1.65;
}

/* Active FAQ Item: Green background on header */
.st-faq-item.active .st-faq-question {
    background: var(--st-green);
    color: #fff;
}

.st-faq-item.active .st-faq-answer {
    display: block;
    background: #fff;
    padding-top: 14px;
}

.st-faq-item.active .st-faq-icon {
    transform: rotate(180deg);
    color: #fff;
}

.st-faq-icon {
    transition: transform 0.25s ease;
}

/* =========================================================
   RESPONSIVE MEDIA QUERIES
========================================================= */
@media (max-width: 991px) {
    .st-hero-inner,
    .st-welcome-grid,
    .st-process-grid {
        grid-template-columns: 1fr;
        gap: 35px;
    }

    .st-hero-inner {
        padding: 50px 0;
    }

    .st-choose-grid,
    .st-price-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 767px) {
    .st-section {
        padding: 42px 0;
    }

    .st-hero-inner {
        padding: 40px 0;
    }

    .st-form-row,
    .st-matters-grid,
    .st-price-grid,
    .st-review-grid,
    .st-faq-grid {
        grid-template-columns: 1fr;
    }

    .st-choose {
        padding: 30px 18px;
    }

    .st-choose-grid {
        grid-template-columns: 1fr 1fr;
        gap: 16px 10px;
    }

    .st-process-image-wrapper {
        height: 320px;
    }

    .st-floating-tab {
        display: none;
    }
}

@media (max-width: 500px) {
    .st-choose-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<div class="stage-page">

    {{-- FLOATING RIGHT TAB --}}
    <a href="#quote-form" class="st-floating-tab">
        <i class="bi bi-calendar-check me-2"></i> BOOK AN INSPECTION
    </a>

    {{-- =====================================================
         1. HERO SECTION
    ====================================================== --}}
    <section class="st-hero">
        <div class="st-hero-inner">

            <div class="st-hero-content" data-aos="fade-right" data-aos-duration="850">
                <h1>
                    BUILDING STAGE-BY-<br>STAGE INSPECTION IN<br>MELBOURNE
                </h1>

                <span class="st-hero-tag">
                    TOP-RATED, FULLY CERTIFIED & INSURED INSPECTORS
                </span>

                <p>
                    Building a new home is one of the most significant investments you'll ever make. Our comprehensive stage-by-stage building inspections in Melbourne ensure that your builder complies with Australian Standards, the National Construction Code (NCC), and approved architectural plans at every critical construction milestone.
                </p>

                <a href="tel:0466001551" class="st-btn btn-glow">
                    <i class="bi bi-telephone-fill me-2"></i>
                    0466 001 551
                </a>
            </div>

            {{-- HERO FORM --}}
            <div id="quote-form" class="st-hero-form hover-lift" data-aos="fade-left" data-aos-duration="850">
                @if(session('success'))
                    <div class="alert alert-success py-2 mb-2" style="font-size: 13.5px;">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('quote.store') }}" method="POST">
                    @csrf

                    <div class="st-form-row">
                        <input type="text" name="name" placeholder="First Name" value="{{ old('name') }}" required>
                        <input type="text" name="last_name" placeholder="Last Name" value="{{ old('last_name') }}">
                    </div>

                    <div class="st-form-row">
                        <input type="email" name="email" placeholder="Email Address" value="{{ old('email') }}" required>
                        <input type="tel" name="phone" placeholder="Phone Number" value="{{ old('phone') }}" required>
                    </div>

                    <select name="service_type" required>
                        <option value="Building Stage by Stage Inspection" selected>Building Stage by Stage Inspection</option>
                        <option value="Pre-Purchase Building & Pest Inspection">Pre-Purchase Building & Pest Inspection</option>
                        <option value="New Build Handover Inspection">New Build Handover Inspection</option>
                        <option value="Apartment Building Inspection">Apartment Building Inspection</option>
                    </select>

                    <input type="text" name="property_address" placeholder="Inspection Address" value="{{ old('property_address') }}" required>

                    <textarea name="message" placeholder="Details / Build Stage Notes">{{ old('message') }}</textarea>

                    <button type="submit" class="st-submit">
                        GET A FREE QUOTE
                    </button>
                </form>
            </div>

        </div>
    </section>


    {{-- =====================================================
         2. WELCOME SECTION + INSPECTOR CARD
    ====================================================== --}}
    <section class="st-section st-welcome">
        <div class="st-container">

            <div class="st-welcome-grid">

                <div class="st-welcome-content" data-aos="fade-right">
                    <h2>
                        WELCOME TO PREMIUM BUILDING & PEST INSPECTIONS
                    </h2>

                    <p>
                        Building a home is exciting, but hidden building defects and substandard workmanship can quickly turn your dream project into a stressful nightmare. Our independent stage-by-stage inspections give Melbourne homeowners total transparency and reassurance during every phase of construction.
                    </p>

                    <div class="st-feature-mini">
                        <div class="st-feature-mini-icon">
                            <i class="bi bi-search"></i>
                        </div>
                        <div>
                            <h4>REGISTERED BUILDING INSPECTOR</h4>
                            <p>Fully licensed VBA registered inspector with years of residential construction expertise.</p>
                        </div>
                    </div>

                    <div class="st-feature-mini">
                        <div class="st-feature-mini-icon">
                            <i class="bi bi-search"></i>
                        </div>
                        <div>
                            <h4>THOROUGH & INDEPENDENT</h4>
                            <p>We work 100% for you, not the builder, providing unbiased defect detection.</p>
                        </div>
                    </div>

                    <div class="st-feature-mini">
                        <div class="st-feature-mini-icon">
                            <i class="bi bi-search"></i>
                        </div>
                        <div>
                            <h4>DETAILED SAME-DAY REPORTS</h4>
                            <p>Comprehensive digital report with high-resolution photographic evidence within 24 hours.</p>
                        </div>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('about') }}" class="st-btn btn-glow">
                            ABOUT US MORE <i class="bi bi-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>

                {{-- INSPECTOR CARD --}}
                <div class="st-welcome-card-col" data-aos="fade-left">
                    <div class="st-inspector-card hover-lift">
                        <div class="st-inspector-title">
                            VBA REGISTERED
                        </div>

                        <img src="{{ asset('images/ronak gami.jpeg') }}" alt="Ronak Gami - Registered Building Inspector">

                        <div class="st-inspector-name">
                            VBA REGISTERED BUILDING INSPECTOR
                        </div>

                        <a href="tel:0466001551" class="st-inspector-btn">
                            <i class="bi bi-telephone-fill me-2"></i>
                            0466 001 551
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </section>


    {{-- =====================================================
         3. WHY STAGE-BY-STAGE INSPECTION MATTERS
    ====================================================== --}}
    <section class="st-section st-matters">
        <div class="st-container">

            <div class="st-heading" data-aos="fade-up">
                <h2>WHY STAGE-BY-STAGE INSPECTION MATTERS</h2>
            </div>

            <div class="st-matters-grid">

                <div class="st-matters-card hover-lift" data-aos="fade-up" data-aos-delay="100">
                    <div class="st-check-icon">✓</div>
                    <p>Catch defects early before they are covered up and expensive to rectify</p>
                </div>

                <div class="st-matters-card hover-lift" data-aos="fade-up" data-aos-delay="200">
                    <div class="st-check-icon">✓</div>
                    <p>Hold your builder accountable to Australian Standards and building regulations</p>
                </div>

                <div class="st-matters-card hover-lift" data-aos="fade-up" data-aos-delay="300">
                    <div class="st-check-icon">✓</div>
                    <p>Independent third-party inspection gives you leverage before paying progress claims</p>
                </div>

                <div class="st-matters-card hover-lift" data-aos="fade-up" data-aos-delay="400">
                    <div class="st-check-icon">✓</div>
                    <p>Protect your investment, ensure peace of mind, and prevent future disputes</p>
                </div>

            </div>

        </div>
    </section>


    {{-- =====================================================
         4. OUR STAGE-BY-STAGE INSPECTION PROCESS
    ====================================================== --}}
    <section class="st-section st-process">
        <div class="st-container">

            <div class="st-process-grid">

                <div class="st-process-content" data-aos="fade-right">
                    <span class="st-heading" style="text-align: left; margin-bottom: 0;">
                        <span class="small-title">STAGE BY STAGE PROCESS</span>
                    </span>

                    <h3>THE 5 STAGES OF INSPECTION WE COVER:</h3>

                    <p>
                        We inspect your new build across each critical milestone before you make progress payments:
                    </p>

                    <ul class="st-stage-steps">
                        <li class="st-stage-step">
                            <div class="st-step-badge">1</div>
                            <div class="st-step-info">
                                <strong>Pre-Pour / Base Stage</strong>
                                <span>Footings, soil clearance, slab thickness, vapor barrier integrity, termite collars, and steel reinforcement spacing before concrete is poured.</span>
                            </div>
                        </li>

                        <li class="st-stage-step">
                            <div class="st-step-badge">2</div>
                            <div class="st-step-info">
                                <strong>Frame Stage</strong>
                                <span>Wall frames plumb and squareness, stud spacing, lintel bearings, roof truss tie-downs, lateral bracing, and point loads (AS 1684).</span>
                            </div>
                        </li>

                        <li class="st-stage-step">
                            <div class="st-step-badge">3</div>
                            <div class="st-step-info">
                                <strong>Lock-Up / Pre-Plaster Stage</strong>
                                <span>External brickwork cavities, weep holes, wall cladding, windows, external doors, roof flashings, and plumbing/electrical rough-ins.</span>
                            </div>
                        </li>

                        <li class="st-stage-step">
                            <div class="st-step-badge">4</div>
                            <div class="st-step-info">
                                <strong>Fixing / Pre-Paint Stage</strong>
                                <span>Wet area waterproofing membranes (AS 3740), internal plasterboard, architraves, skirting boards, internal doors, and cabinetry.</span>
                            </div>
                        </li>

                        <li class="st-stage-step">
                            <div class="st-step-badge">5</div>
                            <div class="st-step-info">
                                <strong>Final / Handover (PCI)</strong>
                                <span>Thorough practical completion defect audit (snag list) of all cosmetic, functional, and compliance items before making final contract payment.</span>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="st-process-image-wrapper hover-lift" data-aos="fade-left">
                    <img src="{{ asset('images/g8.jpeg') }}" alt="Ronak Gami measuring frame alignment on site">
                    <button class="st-slide-arrow st-slide-prev" type="button" aria-label="Previous">
                        <i class="bi bi-chevron-left"></i>
                    </button>
                    <button class="st-slide-arrow st-slide-next" type="button" aria-label="Next">
                        <i class="bi bi-chevron-right"></i>
                    </button>
                </div>

            </div>

        </div>
    </section>


    {{-- =====================================================
         5. WHY CHOOSE US (LIGHT GREEN BOX)
    ====================================================== --}}
    <section class="st-section">
        <div class="st-container">

            <div class="st-choose">

                <div class="st-heading" data-aos="fade-up">
                    <span class="small-title">WHY CHOOSE US</span>
                    <h2>WHY CHOOSE PREMIUM BUILDING INSPECTION FOR YOUR BUILD?</h2>
                </div>

                <div class="st-choose-grid">

                    <div class="st-choose-item" data-aos="fade-up" data-aos-delay="100">
                        <div class="st-choose-icon">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <h4>APPROVE PROGRESS INVOICES</h4>
                        <p>Only release builder progress stage payments once defects are fully identified and rectified.</p>
                    </div>

                    <div class="st-choose-item" data-aos="fade-up" data-aos-delay="200">
                        <div class="st-choose-icon">
                            <i class="bi bi-search"></i>
                        </div>
                        <h4>EXPERIENCED VBA INSPECTORS</h4>
                        <p>Qualified VBA registered inspectors with extensive hands-on residential construction knowledge.</p>
                    </div>

                    <div class="st-choose-item" data-aos="fade-up" data-aos-delay="300">
                        <div class="st-choose-icon">
                            <i class="bi bi-file-earmark-check"></i>
                        </div>
                        <h4>FAST 24-HOUR REPORTS</h4>
                        <p>Detailed photographic digital reports delivered within 24 hours with reference to NCC & Australian Standards.</p>
                    </div>

                    <div class="st-choose-item" data-aos="fade-up" data-aos-delay="400">
                        <div class="st-choose-icon">
                            <i class="bi bi-patch-check"></i>
                        </div>
                        <h4>PEACE OF MIND</h4>
                        <p>Complete confidence knowing your new dream home is structurally sound and defect-free.</p>
                    </div>

                </div>

            </div>

        </div>
    </section>


    {{-- =====================================================
         6. STAGE INSPECTION PRICING PACKAGES (4 CARDS)
    ====================================================== --}}
    <section class="st-section st-pricing">
        <div class="st-container">

            <div class="st-heading" data-aos="fade-up">
                <span class="small-title">PRICING PLANS</span>
                <h2>FAIR, TRANSPARENT AND COMPETITIVE</h2>
            </div>

            <div class="st-price-grid">

                {{-- CARD 1: PRE-POUR SLAB --}}
                <div class="st-price-card hover-lift" data-aos="fade-up" data-aos-delay="100">
                    <div>
                        <div class="st-price-icon">
                            <i class="bi bi-layers"></i>
                        </div>
                        <h3>PRE-POUR SLAB</h3>

                        <div class="st-price">
                            $500*
                            <small>+ GST</small>
                        </div>

                        <ul class="st-price-list">
                            <li>Footing excavations & depths</li>
                            <li>Vapor barrier & membrane check</li>
                            <li>Termite collar penetration seals</li>
                            <li>Steel reinforcement mesh & chairs</li>
                            <li>Detailed digital photographic report</li>
                        </ul>
                    </div>

                    <a href="#quote-form" class="st-price-btn">
                        GET STARTED
                    </a>
                </div>

                {{-- CARD 2: FRAME STAGE --}}
                <div class="st-price-card hover-lift" data-aos="fade-up" data-aos-delay="200">
                    <div>
                        <div class="st-price-icon">
                            <i class="bi bi-building"></i>
                        </div>
                        <h3>FRAME STAGE</h3>

                        <div class="st-price">
                            $600*
                            <small>+ GST</small>
                        </div>

                        <ul class="st-price-list">
                            <li>Wall frames plumb & alignment</li>
                            <li>Roof trusses, bracing & tie-downs</li>
                            <li>Lintel bearing & load paths</li>
                            <li>Slab overhang & bottom plate anchor</li>
                            <li>Fast 24-hour turnaround report</li>
                        </ul>
                    </div>

                    <a href="#quote-form" class="st-price-btn">
                        GET STARTED
                    </a>
                </div>

                {{-- CARD 3: PRE-PLASTER --}}
                <div class="st-price-card hover-lift" data-aos="fade-up" data-aos-delay="300">
                    <div>
                        <div class="st-price-icon">
                            <i class="bi bi-door-closed"></i>
                        </div>
                        <h3>PRE-PLASTER</h3>

                        <div class="st-price">
                            $600*
                            <small>+ GST</small>
                        </div>

                        <ul class="st-price-list">
                            <li>External brickwork & cladding</li>
                            <li>Roof covering, gutters & flashings</li>
                            <li>Wet area waterproofing check</li>
                            <li>Plaster, doors, skirtings & joinery</li>
                            <li>Full rectification item checklist</li>
                        </ul>
                    </div>

                    <a href="#quote-form" class="st-price-btn">
                        GET STARTED
                    </a>
                </div>

                {{-- CARD 4: FULL PACKAGE (ALL 5 STAGES) --}}
                <div class="st-price-card hover-lift" data-aos="fade-up" data-aos-delay="400">
                    <div>
                        <div class="st-price-icon">
                            <i class="bi bi-house-check"></i>
                        </div>
                        <h3>FULL PACKAGE (ALL 5 STAGES)</h3>

                        <div class="st-price">
                            $2550*
                            <small>+ GST</small>
                        </div>

                        <ul class="st-price-list">
                            <li>Pre-Pour / Base Foundation Stage</li>
                            <li>Frame Stage Inspection</li>
                            <li>Lock-Up / Pre-Plaster Stage</li>
                            <li>Fixing / Waterproofing Stage</li>
                            <li>Final Practical Completion (PCI)</li>
                        </ul>
                    </div>

                    <a href="#quote-form" class="st-price-btn">
                        GET STARTED
                    </a>
                </div>

            </div>

        </div>
    </section>


    {{-- =====================================================
         7. CTA BANNER (ENSURE YOUR BUILD PROGRESSES SMOOTHLY)
    ====================================================== --}}
    <section class="st-cta">
        <div class="st-container">

            <div class="st-cta-content" data-aos="fade-right">
                <h2>ENSURE YOUR BUILD PROGRESSES SMOOTHLY</h2>

                <p>
                    Avoid costly defects, delays and disputes. Partner with Melbourne's trusted independent building inspection specialist to protect your investment.
                </p>

                <a href="#quote-form" class="st-btn btn-glow">
                    SCHEDULE AN INSPECTION TODAY
                </a>
            </div>

        </div>
    </section>


    {{-- =====================================================
         8. CLIENT REVIEWS & FEEDBACK
    ====================================================== --}}
    <section class="st-section st-reviews">
        <div class="st-container">

            <div class="st-heading" data-aos="fade-up">
                <span class="small-title">TESTIMONIALS</span>
                <h2>CLIENT REVIEWS & FEEDBACK</h2>
            </div>

            <div class="st-review-grid">

                <div class="st-review-card hover-lift" data-aos="fade-up" data-aos-delay="100">
                    <div class="st-review-quote">“</div>
                    <p>
                        "Ronak did frame and pre-handover inspections for our double-storey build in Point Cook. He found several critical frame overhangs and missing truss brackets that the builder's surveyor missed. Excellent service!"
                    </p>
                    <div class="st-stars">★★★★★</div>
                    <h4>Shireen De Silva</h4>
                </div>

                <div class="st-review-card hover-lift" data-aos="fade-up" data-aos-delay="200">
                    <div class="st-review-quote">“</div>
                    <p>
                        "Having Premium Building Inspections inspect our slab and frame gave us incredible peace of mind. Ronak's civil engineering background really shows in the thoroughness of his reports. Builder rectified all items!"
                    </p>
                    <div class="st-stars">★★★★★</div>
                    <h4>Nimesh Wagani</h4>
                </div>

                <div class="st-review-card hover-lift" data-aos="fade-up" data-aos-delay="300">
                    <div class="st-review-quote">“</div>
                    <p>
                        "Top notch inspector! Super prompt, very knowledgeable, and delivered a clear photo report within hours. Made dealing with our builder so much easier before paying stage progress claims."
                    </p>
                    <div class="st-stars">★★★★★</div>
                    <h4>Max Cooper</h4>
                </div>

            </div>

        </div>
    </section>


    {{-- =====================================================
         9. FREQUENTLY ASKED QUESTIONS (FAQ)
    ====================================================== --}}
    <section class="st-section st-faq">
        <div class="st-container">

            <div class="st-heading" data-aos="fade-up">
                <span class="small-title">QUESTIONS & ANSWERS</span>
                <h2>FREQUENTLY ASKED QUESTIONS</h2>
            </div>

            <div class="st-faq-grid">

                {{-- FAQ 1 (Active by default) --}}
                <div class="st-faq-item active" data-aos="fade-up" data-aos-delay="100">
                    <button class="st-faq-question" type="button">
                        <span>Why do I need a stage inspection?</span>
                        <i class="bi bi-chevron-down st-faq-icon"></i>
                    </button>
                    <div class="st-faq-answer">
                        A stage inspection ensures your builder adheres strictly to Australian Standards, building codes, and plans before defects get concealed behind plaster or concrete, saving you thousands in future rectifications.
                    </div>
                </div>

                {{-- FAQ 2 --}}
                <div class="st-faq-item" data-aos="fade-up" data-aos-delay="150">
                    <button class="st-faq-question" type="button">
                        <span>What stages should be inspected?</span>
                        <i class="bi bi-chevron-down st-faq-icon"></i>
                    </button>
                    <div class="st-faq-answer">
                        The key construction stages include Base/Pre-pour slab, Frame stage, Lock-up / Pre-plaster, Fixing/Waterproofing stage, and Final Handover (Practical Completion Inspection).
                    </div>
                </div>

                {{-- FAQ 3 --}}
                <div class="st-faq-item" data-aos="fade-up" data-aos-delay="200">
                    <button class="st-faq-question" type="button">
                        <span>When should I book each inspection stage?</span>
                        <i class="bi bi-chevron-down st-faq-icon"></i>
                    </button>
                    <div class="st-faq-answer">
                        You should contact us as soon as your builder gives you an estimated completion date for a stage. Ideally, give us 2 to 3 business days notice so we can schedule the inspection promptly.
                    </div>
                </div>

                {{-- FAQ 4 --}}
                <div class="st-faq-item" data-aos="fade-up" data-aos-delay="250">
                    <button class="st-faq-question" type="button">
                        <span>Can my builder refuse independent stage inspections?</span>
                        <i class="bi bi-chevron-down st-faq-icon"></i>
                    </button>
                    <div class="st-faq-answer">
                        No. Under standard Victorian residential building contracts (HIA and Master Builders), clients have statutory access rights to inspect the property with their appointed consultant.
                    </div>
                </div>

                {{-- FAQ 5 --}}
                <div class="st-faq-item" data-aos="fade-up" data-aos-delay="300">
                    <button class="st-faq-question" type="button">
                        <span>How fast do we receive the stage report?</span>
                        <i class="bi bi-chevron-down st-faq-icon"></i>
                    </button>
                    <div class="st-faq-answer">
                        We provide verbal feedback immediately following the inspection and deliver the comprehensive digital photographic report within 24 hours.
                    </div>
                </div>

                {{-- FAQ 6 --}}
                <div class="st-faq-item" data-aos="fade-up" data-aos-delay="350">
                    <button class="st-faq-question" type="button">
                        <span>Do you inspect homes throughout Melbourne?</span>
                        <i class="bi bi-chevron-down st-faq-icon"></i>
                    </button>
                    <div class="st-faq-answer">
                        Yes! We service all Greater Melbourne metropolitan areas including northern, western, eastern, and south-eastern growth corridors.
                    </div>
                </div>

            </div>

        </div>
    </section>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const faqButtons = document.querySelectorAll('.st-faq-question');
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