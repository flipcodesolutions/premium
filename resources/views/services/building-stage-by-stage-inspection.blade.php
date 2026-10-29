@extends('layouts.app')

@section('title', 'Building Stage Inspection Melbourne | PB Inspections')
@section('meta_description', 'Independent new home construction stage inspections in Melbourne. Verification of slab, frame, lockup, fixing, and handover compliance with Australian Standards.')

@section('content')

<style>
/* =========================================================
   STAGE-BY-STAGE INSPECTION PAGE STYLES
   Designed 1:1 to match live screenshot
========================================================= */

.st-page {
    --st-navy: #073763;
    --st-navy-dark: #052646;
    --st-green: #42a900;
    --st-green-dark: #358c00;
    --st-light-green: #eef7ed;
    --st-choose-bg: #eef7ed;
    --st-cyan: #1b9eea;
    --st-text: #333333;
    --st-muted: #555555;
    --st-border: #e2e8f0;
    --st-orange: #ffb400;

    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
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

/* =========================================================
   1. HERO SECTION
========================================================= */
.st-hero {
    min-height: 540px;
    display: flex;
    align-items: center;
    position: relative;
    background:
        linear-gradient(
            90deg,
            rgba(4, 39, 69, 0.95) 0%,
            rgba(4, 39, 69, 0.88) 55%,
            rgba(5, 43, 74, 0.45) 100%
        ),
        url("{{ asset('images/building-stage.jpg') }}") center right / cover no-repeat;
}

.st-hero-inner {
    width: 92%;
    max-width: 1180px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: 1.05fr 0.72fr;
    gap: 45px;
    align-items: center;
    padding: 60px 0;
}

.st-hero-content {
    color: #fff;
}

.st-hero-content h1 {
    max-width: 650px;
    margin: 0 0 14px;
    color: #fff;
    font-size: clamp(32px, 4.2vw, 48px);
    line-height: 1.12;
    font-weight: 900;
    text-transform: uppercase;
}

.st-hero-content p {
    max-width: 580px;
    margin: 0 0 24px;
    color: rgba(255, 255, 255, 0.90);
    font-size: 16px;
    line-height: 1.7;
}

/* Hero Form */
.st-hero-form {
    background: #fff;
    padding: 24px;
    border-radius: 6px;
    box-shadow: 0 12px 35px rgba(0, 0, 0, 0.25);
}

.st-hero-form-title {
    margin: 0 0 16px;
    color: var(--st-navy);
    font-size: 16px;
    font-weight: 900;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    text-align: center;
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
    background: #f8fafc;
    color: #444;
    font-size: 14px;
    outline: none;
    box-sizing: border-box;
    border-radius: 3px;
    font-family: inherit;
    transition: border-color 0.2s ease;
}

.st-hero-form input:focus,
.st-hero-form select:focus,
.st-hero-form textarea:focus {
    border-color: var(--st-green);
    background: #fff;
}

.st-hero-form textarea {
    height: 64px;
    resize: vertical;
}

.st-submit {
    width: 100%;
    padding: 13px;
    border: 0;
    background: var(--st-green);
    color: #fff;
    font-size: 14.5px;
    font-weight: 800;
    cursor: pointer;
    border-radius: 3px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
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
    gap: 40px;
    align-items: center;
}

.st-welcome-content h2 {
    margin: 0 0 16px;
    color: var(--st-navy);
    font-size: clamp(24px, 3.2vw, 30px);
    line-height: 1.25;
    font-weight: 900;
    text-transform: uppercase;
}

.st-welcome-content p {
    color: #555;
    font-size: 14.5px;
    line-height: 1.7;
    margin-bottom: 14px;
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
    color: #138bd2;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
    margin-top: 2px;
}

.st-feature-mini h4 {
    margin: 0 0 4px;
    color: var(--st-navy);
    font-size: 14.5px;
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
    padding: 12px 10px;
    color: #444;
    text-align: center;
    font-size: 12.5px;
    font-weight: 700;
    text-transform: uppercase;
    line-height: 1.45;
}

.st-inspector-btn {
    display: block;
    width: 100%;
    padding: 12px;
    background: var(--st-green);
    color: #fff !important;
    text-align: center;
    text-decoration: none;
    font-size: 14px;
    font-weight: 800;
    transition: background 0.25s ease;
}

.st-inspector-btn:hover {
    background: var(--st-green-dark);
}

/* =========================================================
   3. WHY STAGE-BY-STAGE INSPECTION MATTERS (4 BOXES)
========================================================= */
.st-matters {
    background: #fff;
}

.st-matters-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px;
}

.st-matters-card {
    padding: 20px 22px;
    border: 1px solid #e2e8f0;
    background: #fff;
    border-radius: 6px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.04);
}

.st-matters-inner {
    display: flex;
    align-items: flex-start;
    gap: 14px;
}

.st-check-icon {
    font-size: 20px;
    color: var(--st-green);
    flex-shrink: 0;
    margin-top: 2px;
}

.st-matters-inner p {
    margin: 0;
    color: #4a5568;
    font-size: 14.5px;
    line-height: 1.65;
}

.st-matters-inner p strong {
    color: #1a202c;
    font-weight: 700;
}

/* =========================================================
   4. THE 5 STAGES OF BUILDING INSPECTION
========================================================= */
.st-process {
    background: #fff;
}

.st-process-grid {
    display: grid;
    grid-template-columns: 1fr 0.95fr;
    gap: 40px;
    align-items: center;
}

.st-process-content h2 {
    margin: 0 0 20px;
    color: var(--st-navy);
    font-size: clamp(24px, 3.2vw, 30px);
    line-height: 1.25;
    font-weight: 900;
    text-transform: uppercase;
}

.st-stage-block {
    margin-bottom: 16px;
}

.st-stage-block h4 {
    margin: 0 0 5px;
    color: var(--st-navy);
    font-size: 15px;
    font-weight: 800;
    line-height: 1.35;
}

.st-stage-block p {
    margin: 0;
    color: #555;
    font-size: 13.5px;
    line-height: 1.65;
}

.st-process-image-wrapper {
    position: relative;
    width: 100%;
    height: 480px;
    overflow: hidden;
    border-radius: 8px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
}

.st-process-image-wrapper img {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
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
    padding: 26px 16px;
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
    margin: 0 0 10px;
    color: var(--st-navy);
    font-size: 15px;
    font-weight: 900;
    text-transform: uppercase;
}

.st-price {
    color: var(--st-green);
    font-size: 36px;
    font-weight: 900;
    line-height: 1.1;
    margin-bottom: 4px;
}

.st-price-sub {
    color: #777;
    font-size: 12.5px;
    font-weight: 600;
    margin-bottom: 16px;
}

.st-price-list {
    list-style: none;
    padding: 0;
    margin: 0 0 18px;
    text-align: left;
    flex-grow: 1;
}

.st-price-list li {
    padding: 8px 0;
    border-bottom: 1px solid #eee;
    color: #555;
    font-size: 13.5px;
    display: flex;
    align-items: center;
}

.st-price-list li::before {
    content: "✓";
    color: var(--st-green);
    margin-right: 8px;
    font-weight: 900;
}

.st-price-btn {
    display: block;
    width: 100%;
    padding: 12px;
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
    min-height: 540px;
    padding: 105px 0;
    display: flex;
    align-items: center;
    background:
        linear-gradient(
            90deg,
            rgba(4, 43, 75, 0.96) 0%,
            rgba(4, 43, 75, 0.88) 50%,
            rgba(4, 43, 75, 0.30) 100%
        ),
        url("{{ asset('images/pre purchase service.jpeg') }}") center right / cover no-repeat;
}

.st-cta-content {
    max-width: 820px;
    color: #fff;
}

.st-cta-content h2 {
    margin: 0 0 20px;
    font-size: clamp(32px, 4.2vw, 48px);
    line-height: 1.2;
    font-weight: 900;
    text-transform: uppercase;
    color: #ffffff !important;
    letter-spacing: 0.5px;
}

.st-cta-content p {
    margin: 0 0 32px;
    color: rgba(255, 255, 255, 0.96) !important;
    font-size: 17.5px;
    line-height: 1.85;
}

.st-cta-btn {
    padding: 16px 38px !important;
    font-size: 15.5px !important;
    font-weight: 800 !important;
    letter-spacing: 0.6px;
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
    color: #dceaf5;
    font-size: 42px;
    line-height: 1;
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
}

.st-faq-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px;
    align-items: start;
}

.st-faq-col {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.st-faq-item {
    border: 1px solid #e4e4e4;
    background: #fff;
    border-radius: 4px;
    overflow: hidden;
    transition: border-color 0.2s ease;
}

.st-faq-item.active {
    border-color: var(--st-green);
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
    transition: background 0.2s ease, color 0.2s ease;
}

.st-faq-question:hover {
    background: #f7f9fa;
}

.st-faq-item.active .st-faq-question {
    background: var(--st-green);
    color: #fff;
}

.st-faq-item.active .st-faq-question span {
    color: #fff;
}

.st-faq-answer {
    display: none;
    padding: 14px 16px;
    color: #555;
    font-size: 14px;
    line-height: 1.65;
    background: #fff;
}

.st-faq-item.active .st-faq-answer {
    display: block;
}

/* =========================================================
   RESPONSIVE
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

    .st-choose-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .st-price-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 700px) {
    .st-section {
        padding: 42px 0;
    }

    .st-form-row,
    .st-matters-grid,
    .st-price-grid,
    .st-review-grid,
    .st-faq-grid {
        grid-template-columns: 1fr;
    }

    .st-choose {
        padding: 35px 20px;
    }

    .st-choose-grid {
        grid-template-columns: 1fr 1fr;
        gap: 16px 10px;
    }

    .st-process-image-wrapper {
        height: 320px;
    }

    .st-cta {
        min-height: 440px;
        padding: 60px 0;
    }
}

@media (max-width: 480px) {
    .st-choose-grid {
        grid-template-columns: 1fr;
    }

    .st-hero-content h1 {
        font-size: 30px;
    }
}
</style>

<div class="st-page">

    {{-- =====================================================
         1. HERO SECTION
    ====================================================== --}}
    <section class="st-hero">
        <div class="st-hero-inner">

            <div class="st-hero-content" data-aos="fade-right" data-aos-duration="850">
                <h1>
                    BUILDING STAGE-BY-STAGE INSPECTION IN MELBOURNE
                </h1>

                <p>
                    Ensure Quality at Every Stage with Expert Building Stage Inspections.
                </p>

                <a href="tel:0466001551" class="st-btn btn-glow">
                    <i class="bi bi-telephone-fill me-2"></i>
                    0466 001 551
                </a>
            </div>

            {{-- HERO FORM --}}
            <div id="quote-form" class="st-hero-form hover-lift" data-aos="fade-left" data-aos-duration="850">

                <div class="st-hero-form-title">
                    GET QUICK QUOTE
                </div>

                <form action="{{ route('quote.store') }}" method="POST">
                    @csrf

                    <div class="st-form-row">
                        <input type="text" name="name" placeholder="Name" required>
                        <input type="email" name="email" placeholder="Email" required>
                    </div>

                    <div class="st-form-row">
                        <input type="tel" name="phone" placeholder="Phone" required>
                        <input type="text" name="property_address" placeholder="Address" required>
                    </div>

                    <select name="service" required>
                        <option value="Building Stage by Stage Inspection" selected>
                            Building Stage by Stage Inspection
                        </option>
                        <option value="Pre-purchase Building and Pest Inspection">
                            Pre-purchase Building and Pest Inspection
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

                    <input type="date" name="inspection_date" placeholder="Inspection Date">

                    <textarea name="message" rows="3" placeholder="Message"></textarea>

                    <button type="submit" class="st-submit btn-glow">
                        Get My Quote
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
                        WELCOME TO PREMIUM BUILDING &amp; PEST INSPECTIONS
                    </h2>

                    <p>
                        Building a new home should be an exciting experience, not a stressful one. Our Stage-by-Stage Building Inspection service provides independent quality assessments throughout the construction process, helping homeowners identify defects, poor workmanship, and compliance issues before they become costly problems.
                    </p>

                    <p>
                        With detailed inspections at every critical stage, we help ensure your new home is built to an acceptable standard and in accordance with approved plans and industry requirements. <strong>We offer:</strong>
                    </p>

                    <div class="st-feature-mini">
                        <div class="st-feature-mini-icon">
                            <i class="bi bi-search"></i>
                        </div>
                        <div>
                            <h4>THOROUGH INSPECTION AT EACH STAGE</h4>
                            <p>Every major construction milestone is carefully assessed to identify visible defects, construction errors, and workmanship concerns before work progresses to the next stage.</p>
                        </div>
                    </div>

                    <div class="st-feature-mini">
                        <div class="st-feature-mini-icon">
                            <i class="bi bi-search"></i>
                        </div>
                        <div>
                            <h4>STRUCTURAL AND SAFETY CHECKS</h4>
                            <p>Our inspections provide an unbiased review of building work, helping homeowners gain confidence that construction is being completed to the expected quality standards.</p>
                        </div>
                    </div>

                    <div class="st-feature-mini">
                        <div class="st-feature-mini-icon">
                            <i class="bi bi-search"></i>
                        </div>
                        <div>
                            <h4>SAFETY AND COMPLIANCE</h4>
                            <p>Each inspection includes a comprehensive report with photographs, findings, and practical recommendations that can be discussed with your builder for rectification.</p>
                        </div>
                    </div>

                    <a href="#quote-form" class="st-btn btn-glow" style="margin-top: 18px;">
                        Schedule Inspection Now
                    </a>
                </div>

                {{-- INSPECTOR CARD --}}
                <div class="st-inspector-card hover-lift" data-aos="fade-left">
                    <div class="st-inspector-title">
                        YOUR INSPECTOR
                    </div>

                    <img src="{{ asset('images/ronak gami.jpeg') }}" alt="Ronak Gami | VBA Licensed Building Inspector">

                    <div class="st-inspector-name">
                        Ronak Gami, vba lic No: IN-PS 74654, Builder Lic No: DB-L 100200
                    </div>

                    <a href="tel:0466001551" class="st-inspector-btn btn-glow">
                        <i class="bi bi-telephone-fill me-2"></i> 0466 001 551
                    </a>
                </div>

            </div>

        </div>
    </section>


    {{-- =====================================================
         3. WHY STAGE-BY-STAGE INSPECTION MATTERS (4 BOXES)
    ====================================================== --}}
    <section class="st-section st-matters">
        <div class="st-container">

            <div class="st-heading" data-aos="fade-up">
                <h2>
                    WHY STAGE-BY-STAGE INSPECTION MATTERS
                </h2>
            </div>

            <div class="st-matters-grid">

                <div class="st-matters-card hover-lift" data-aos="fade-up" data-aos-delay="100">
                    <div class="st-matters-inner">
                        <i class="bi bi-check-circle-fill st-check-icon"></i>
                        <p>
                            <strong>Catch Issues Early:</strong> Detecting issues early helps prevent defects from being hidden behind completed work.
                        </p>
                    </div>
                </div>

                <div class="st-matters-card hover-lift" data-aos="fade-up" data-aos-delay="200">
                    <div class="st-matters-inner">
                        <i class="bi bi-check-circle-fill st-check-icon"></i>
                        <p>
                            <strong>Protect Your Investment :</strong> Independent inspections help ensure your home is built to the quality you are paying for.
                        </p>
                    </div>
                </div>

                <div class="st-matters-card hover-lift" data-aos="fade-up" data-aos-delay="300">
                    <div class="st-matters-inner">
                        <i class="bi bi-check-circle-fill st-check-icon"></i>
                        <p>
                            <strong>Improve Build Quality:</strong> Regular inspections encourage greater attention to workmanship and construction standard
                        </p>
                    </div>
                </div>

                <div class="st-matters-card hover-lift" data-aos="fade-up" data-aos-delay="400">
                    <div class="st-matters-inner">
                        <i class="bi bi-check-circle-fill st-check-icon"></i>
                        <p>
                            <strong>Builder Accountability:</strong> Use our detailed reports to ensure your builder addresses any identified issues promptly.
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </section>


    {{-- =====================================================
         4. THE 5 STAGES OF BUILDING INSPECTION
    ====================================================== --}}
    <section class="st-section st-process">
        <div class="st-container">

            <div class="st-process-grid">

                <div class="st-process-content" data-aos="fade-right">
                    <h2>THE 5 STAGES OF BUILDING INSPECTION</h2>

                    <div class="st-stage-block">
                        <h4>1. Pre-Pour (Foundation Inspection)</h4>
                        <p>The foundation forms the base of the entire structure. This inspection evaluates site preparation, footings, reinforcement placement, slab setup, and other critical elements before concrete is poured. Identifying issues at this stage can help avoid significant structural concerns in the future.</p>
                    </div>

                    <div class="st-stage-block">
                        <h4>2. Frame Stage Inspection</h4>
                        <p>The frame inspection focuses on the structural skeleton of the home, including wall frames, roof trusses, beams, bracing, and load-bearing components. It helps ensure the structure has been assembled correctly before internal and external finishes begin.</p>
                    </div>

                    <div class="st-stage-block">
                        <h4>3. Lockup Stage Inspection</h4>
                        <p>At the lockup stage, the building becomes weather resistant with the installation of windows, external doors, roofing, and wall cladding. This inspection assesses workmanship, structural elements, and visible defects that could affect performance, durability, or appearance.</p>
                    </div>

                    <div class="st-stage-block">
                        <h4>4. Pre-Plaster (Fixing Stage Inspection)</h4>
                        <p>Before walls and ceilings are covered, an inspection is conducted to review visible plumbing, electrical work, insulation, framing, and other building components. This stage provides an important opportunity to identify issues before they are concealed.</p>
                    </div>

                    <div class="st-stage-block">
                        <h4>5. Final Inspection (Handover)</h4>
                        <p>The final inspection is performed before handover to assess the overall condition of the property. It focuses on workmanship, finishes, fixtures, fittings, and visible defects to help ensure the home is ready for occupancy and meets expected quality standards.</p>
                    </div>
                </div>

                <div class="st-process-image-wrapper hover-lift" data-aos="fade-left">
                    <img src="{{ asset('images/stage-inspection-hallway.jpeg') }}" alt="Ronak Gami performing building stage inspection in hallway">
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
                    <h2>WHY CHOOSE US FOR YOUR NEW BUILD HANDOVER INSPECTION?</h2>
                </div>

                <div class="st-choose-grid">

                    <div class="st-choose-item hover-lift" data-aos="fade-up" data-aos-delay="100">
                        <div class="st-choose-icon">
                            <i class="bi bi-clipboard-check"></i>
                        </div>
                        <h4>Licensed and Experienced Inspectors</h4>
                        <p>Our team consists of fully qualified inspectors. With years of experience in Melbourne’s construction industry, we know exactly what to look for.</p>
                    </div>

                    <div class="st-choose-item hover-lift" data-aos="fade-up" data-aos-delay="200">
                        <div class="st-choose-icon">
                            <i class="bi bi-file-earmark-text"></i>
                        </div>
                        <h4>Comprehensive and Easy-to-Understand Reports</h4>
                        <p>Our detailed yet straightforward reports give you all the information you need to address any issues with your builder, ensuring a smooth handover process.</p>
                    </div>

                    <div class="st-choose-item hover-lift" data-aos="fade-up" data-aos-delay="300">
                        <div class="st-choose-icon">
                            <i class="bi bi-headset"></i>
                        </div>
                        <h4>Ongoing Support</h4>
                        <p>We remain available to answer any questions or concerns you may have during your build.</p>
                    </div>

                    <div class="st-choose-item hover-lift" data-aos="fade-up" data-aos-delay="400">
                        <div class="st-choose-icon">
                            <i class="bi bi-tag"></i>
                        </div>
                        <h4>Affordable Pricing</h4>
                        <p>We offer competitive rates for building stage inspections, ensuring that you get excellent value without compromising on quality.</p>
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
                <span class="small-title">CHOOSE PACKAGE</span>
                <h2>ENSURE SAFETY AND COMPLIANCE</h2>
            </div>

            <div class="st-price-grid">

                {{-- CARD 1: PRE POUR CONCRETE INSPECTION --}}
                <div class="st-price-card hover-lift" data-aos="fade-up" data-aos-delay="100">
                    <div>
                        <div class="st-price-icon">
                            <i class="bi bi-layers"></i>
                        </div>
                        <h3>Pre Pour Concrete Inspection</h3>

                        <div class="st-price">
                            $500
                        </div>
                        <div class="st-price-sub">
                            +GST/ Starting
                        </div>

                        <ul class="st-price-list">
                            <li>Comprehensive Inspection</li>
                            <li>Report &amp; Consultation</li>
                        </ul>
                    </div>

                    <a href="#quote-form" class="st-price-btn">
                        GET STARTED
                    </a>
                </div>

                {{-- CARD 2: FRAME INSPECTION --}}
                <div class="st-price-card hover-lift" data-aos="fade-up" data-aos-delay="200">
                    <div>
                        <div class="st-price-icon">
                            <i class="bi bi-building"></i>
                        </div>
                        <h3>Frame Inspection</h3>

                        <div class="st-price">
                            $600
                        </div>
                        <div class="st-price-sub">
                            +GST/ Starting
                        </div>

                        <ul class="st-price-list">
                            <li>Comprehensive Inspection</li>
                            <li>Report &amp; Consultation</li>
                        </ul>
                    </div>

                    <a href="#quote-form" class="st-price-btn">
                        GET STARTED
                    </a>
                </div>

                {{-- CARD 3: HANDOVER INSPECTION --}}
                <div class="st-price-card hover-lift" data-aos="fade-up" data-aos-delay="300">
                    <div>
                        <div class="st-price-icon">
                            <i class="bi bi-key"></i>
                        </div>
                        <h3>Handover Inspection</h3>

                        <div class="st-price">
                            $600
                        </div>
                        <div class="st-price-sub">
                            +GST/ Starting
                        </div>

                        <ul class="st-price-list">
                            <li>Comprehensive Inspection</li>
                            <li>Report &amp; Consultation</li>
                        </ul>
                    </div>

                    <a href="#quote-form" class="st-price-btn">
                        GET STARTED
                    </a>
                </div>

                {{-- CARD 4: ALL 5 STAGES INSPECTION --}}
                <div class="st-price-card hover-lift" data-aos="fade-up" data-aos-delay="400">
                    <div>
                        <div class="st-price-icon">
                            <i class="bi bi-award"></i>
                        </div>
                        <h3>All 5 Stages Inspection</h3>

                        <div class="st-price">
                            $2550
                        </div>
                        <div class="st-price-sub">
                            +GST/ Starting
                        </div>

                        <ul class="st-price-list">
                            <li>Comprehensive Inspection</li>
                            <li>Report &amp; Consultation</li>
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
    <section class="st-cta" data-aos="zoom-in">
        <div class="st-container">

            <div class="st-cta-content" data-aos="fade-right">
                <h2>ENSURE YOUR BUILD PROGRESSES SMOOTHLY</h2>

                <p>
                    With our Stage-by-Stage Inspection, you can ensure your home is built to last, with no hidden surprises along the way. Schedule your inspection today and build with confidence!
                </p>

                <a href="#quote-form" class="st-btn st-cta-btn btn-glow">
                    Schedule your inspection now
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
                <span class="small-title">TESTIMONIAL</span>
                <h2>CLIENT FEEDBACK &amp; REVIEWS</h2>
            </div>

            <div class="st-review-grid">

                {{-- REVIEW 1 --}}
                <div class="st-review-card hover-lift" data-aos="fade-up" data-aos-delay="100">
                    <div class="st-review-quote">“</div>
                    <p>
                        Very professional and approachable. The property inspection was done thoroughly, and even minor defects were identified. Really appreciate the attention to detail and commitment to the job. Highly recommended for any building inspection.
                    </p>
                    <div class="st-stars">★★★★★</div>
                    <h4>Swathi Tarini</h4>
                </div>

                {{-- REVIEW 2 (Max - visible in screenshot) --}}
                <div class="st-review-card hover-lift" data-aos="fade-up" data-aos-delay="200">
                    <div class="st-review-quote">“</div>
                    <p>
                        Very thorough and professional during my pre-purchase building and pest inspection. Strongly recommended.
                    </p>
                    <div class="st-stars">★★★★★</div>
                    <h4>Max</h4>
                </div>

                {{-- REVIEW 3 (Heena Bhavsar - visible in screenshot) --}}
                <div class="st-review-card hover-lift" data-aos="fade-up" data-aos-delay="300">
                    <div class="st-review-quote">“</div>
                    <p>
                        Amazing experience. Quick replies, prompt actions, and a positive attitude. Would definitely recommend 👏👏👏
                    </p>
                    <div class="st-stars">★★★★★</div>
                    <h4>Heena Bhavsar</h4>
                </div>

                {{-- REVIEW 4 --}}
                <div class="st-review-card hover-lift" data-aos="fade-up" data-aos-delay="100">
                    <div class="st-review-quote">“</div>
                    <p>
                        Took generous time to answer all my questions regarding the property's condition and report. Very kind, humble, and helpful. Highly recommended for anyone needing a building and pest inspection
                    </p>
                    <div class="st-stars">★★★★★</div>
                    <h4>Luxmy</h4>
                </div>

                {{-- REVIEW 5 --}}
                <div class="st-review-card hover-lift" data-aos="fade-up" data-aos-delay="200">
                    <div class="st-review-quote">“</div>
                    <p>
                        Provided an excellent inspection for the property I'm purchasing. All findings were explained clearly, and the report was prepared on the same day. Warm, professional, and efficient. Highly recommended to friends and family.
                    </p>
                    <div class="st-stars">★★★★★</div>
                    <h4>Shaleen De Silva</h4>
                </div>

                {{-- REVIEW 6 --}}
                <div class="st-review-card hover-lift" data-aos="fade-up" data-aos-delay="300">
                    <div class="st-review-quote">“</div>
                    <p>
                        Extremely helpful and responsive. The building and pest inspection was completed quickly, and the report was delivered exactly as requested. Smooth and professional experience overall— great service!
                    </p>
                    <div class="st-stars">★★★★★</div>
                    <h4>Niresh Wijesiri</h4>
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
                <span class="small-title">COMMON QUESTIONS</span>
                <h2>MOST POPULAR QUESTIONS</h2>
            </div>

            <div class="st-faq-grid">

                {{-- COLUMN 1 --}}
                <div class="st-faq-col">

                    {{-- Q1 (Active by default) --}}
                    <div class="st-faq-item active" data-aos="fade-up" data-aos-delay="100">
                        <button class="st-faq-question" type="button">
                            <span>1. What is a Stage-by-Stage Inspection?</span>
                            <span>⌃</span>
                        </button>
                        <div class="st-faq-answer">
                            A detailed inspection of each major construction phase, ensuring the build meets quality standards before moving on to the next stage.
                        </div>
                    </div>

                    {{-- Q2 --}}
                    <div class="st-faq-item" data-aos="fade-up" data-aos-delay="150">
                        <button class="st-faq-question" type="button">
                            <span>2.Why do I need a Stage-by-Stage Inspection?</span>
                            <span>⌄</span>
                        </button>
                        <div class="st-faq-answer">
                            It ensures that defects or issues are caught early, saving you time and money on repairs later.
                        </div>
                    </div>

                    {{-- Q3 --}}
                    <div class="st-faq-item" data-aos="fade-up" data-aos-delay="200">
                        <button class="st-faq-question" type="button">
                            <span>3.How many stages do you inspect?</span>
                            <span>⌄</span>
                        </button>
                        <div class="st-faq-answer">
                            We typically inspect 4-6 stages, including foundation, framing, roofing, lock-up, and final inspection.
                        </div>
                    </div>

                </div>

                {{-- COLUMN 2 --}}
                <div class="st-faq-col">

                    {{-- Q4 (Active by default) --}}
                    <div class="st-faq-item active" data-aos="fade-up" data-aos-delay="250">
                        <button class="st-faq-question" type="button">
                            <span>4. What happens if defects are found?</span>
                            <span>⌃</span>
                        </button>
                        <div class="st-faq-answer">
                            You’ll receive a detailed report outlining the defects, which you can use to request rectification from your builder.
                        </div>
                    </div>

                    {{-- Q5 --}}
                    <div class="st-faq-item" data-aos="fade-up" data-aos-delay="300">
                        <button class="st-faq-question" type="button">
                            <span>5. How much does a Stage-by-Stage Inspection cost?</span>
                            <span>⌄</span>
                        </button>
                        <div class="st-faq-answer">
                            Pricing depends on the size of the build and the number of stages, but we offer competitive rates Starting from $500+GST.
                        </div>
                    </div>

                    {{-- Q6 --}}
                    <div class="st-faq-item" data-aos="fade-up" data-aos-delay="350">
                        <button class="st-faq-question" type="button">
                            <span>6. How quickly will I receive the inspection report?</span>
                            <span>⌄</span>
                        </button>
                        <div class="st-faq-answer">
                            Reports are typically delivered within 24 hours of the inspection.
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const faqItems = document.querySelectorAll('.st-faq-item');

    faqItems.forEach(function (item) {
        const question = item.querySelector('.st-faq-question');
        if (!question) return;

        question.addEventListener('click', function () {
            const wasActive = item.classList.contains('active');
            const col = item.closest('.st-faq-col') || item.parentElement;

            if (col) {
                col.querySelectorAll('.st-faq-item').forEach(function (faq) {
                    faq.classList.remove('active');
                    const icon = faq.querySelector('.st-faq-question span:last-child');
                    if (icon) icon.textContent = '⌄';
                });
            }

            if (!wasActive) {
                item.classList.add('active');
                const icon = item.querySelector('.st-faq-question span:last-child');
                if (icon) icon.textContent = '⌃';
            }
        });
    });
});
</script>

@endsection