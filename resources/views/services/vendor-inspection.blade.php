@extends('layouts.app')

@section('title', 'Vendor Pre-Sale Inspection Melbourne | PB Inspections')
@section('meta_description', 'Pre-sale vendor building and pest inspections in Melbourne. Identify property defects before listing, avoid last-minute price reductions, and sell with complete confidence.')

@section('content')

<style>
/* =========================================================
   VENDOR INSPECTION PAGE STYLES
   1:1 Pixel-Perfect Match with Reference Screenshot & Live Site
========================================================= */

:root {
    --v-navy: #073763;
    --v-navy-dark: #052646;
    --v-green: #42a900;
    --v-green-dark: #358c00;
    --v-light-green: #eef7ed;
    --v-text: #333333;
    --v-muted: #555555;
    --v-border: #e2e8f0;
}

.v-page {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
    color: var(--v-text);
    overflow-x: hidden;
    position: relative;
    background: #ffffff;
}

.v-container {
    width: 92%;
    max-width: 1180px;
    margin: 0 auto;
}

.v-section {
    padding: 70px 0;
}

/* Headings */
.v-badge {
    display: inline-block;
    color: var(--v-green);
    font-size: 13.5px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 1.2px;
    margin-bottom: 8px;
}

.v-heading-center {
    text-align: center;
    margin-bottom: 40px;
}

.v-heading-center h2 {
    margin: 0;
    color: var(--v-navy);
    font-size: clamp(24px, 3.2vw, 34px);
    line-height: 1.25;
    font-weight: 900;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.v-heading-center p {
    max-width: 720px;
    margin: 12px auto 0;
    color: var(--v-muted);
    font-size: 15px;
    line-height: 1.7;
}

/* Buttons */
.v-btn-green {
    display: inline-flex;
    justify-content: center;
    align-items: center;
    gap: 8px;
    padding: 13px 28px;
    background: var(--v-green);
    color: #ffffff !important;
    border: 0;
    border-radius: 4px;
    font-size: 14.5px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    text-decoration: none;
    transition: all 0.25s ease;
    cursor: pointer;
}

.v-btn-green:hover {
    background: var(--v-green-dark);
    transform: translateY(-2px);
    box-shadow: 0 8px 22px rgba(66, 169, 0, 0.35);
}

/* =========================================================
   1. HERO SECTION
========================================================= */
.v-hero {
    position: relative;
    background:
        linear-gradient(
            90deg,
            rgba(7, 43, 76, 0.94) 0%,
            rgba(7, 43, 76, 0.88) 50%,
            rgba(7, 43, 76, 0.65) 100%
        ),
        url("{{ asset('images/dilapidation-hero.jpg') }}") center center / cover no-repeat;
    color: #fff;
    padding: 30px 0;
}

.v-hero-inner {
    display: grid;
    grid-template-columns: 1.15fr 0.85fr;
    gap: 45px;
    align-items: center;
    padding: 50px 0 60px;
}

.v-hero-content .v-hero-badge {
    color: rgba(255, 255, 255, 0.9);
    font-size: 13px;
    font-weight: 800;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    display: block;
    margin-bottom: 12px;
}

.v-hero-content h1 {
    font-size: clamp(26px, 3.5vw, 40px);
    line-height: 1.2;
    font-weight: 900;
    color: #ffffff;
    margin: 0 0 16px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.v-hero-content .v-hero-sub {
    color: rgba(255, 255, 255, 0.95);
    font-size: 17px;
    line-height: 1.6;
    margin: 0 0 26px;
    font-weight: 500;
}

/* Hero Form */
.v-hero-form {
    background: #ffffff;
    border-radius: 8px;
    padding: 26px 24px;
    box-shadow: 0 12px 35px rgba(0, 0, 0, 0.28);
    color: var(--v-text);
}

.v-hero-form h3 {
    margin: 0 0 16px;
    color: var(--v-navy);
    font-size: 19px;
    font-weight: 900;
    text-transform: uppercase;
    text-align: center;
    letter-spacing: 0.5px;
}

.v-form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px;
    margin-bottom: 12px;
}

.v-hero-form input,
.v-hero-form select,
.v-hero-form textarea {
    width: 100%;
    padding: 11px 14px;
    border: 1px solid #d2d6dc;
    border-radius: 4px;
    font-size: 13.5px;
    color: #333;
    outline: none;
    transition: border-color 0.2s ease;
    background: #fff;
    box-sizing: border-box;
}

.v-hero-form input:focus,
.v-hero-form select:focus,
.v-hero-form textarea:focus {
    border-color: var(--v-green);
    box-shadow: 0 0 0 3px rgba(66, 169, 0, 0.15);
}

.v-hero-form textarea {
    height: 75px;
    resize: none;
    margin-bottom: 14px;
}

.v-submit-btn {
    width: 100%;
    padding: 13px;
    background: var(--v-green);
    color: #fff;
    border: none;
    border-radius: 4px;
    font-size: 15px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.8px;
    cursor: pointer;
    transition: background 0.2s ease, transform 0.15s ease;
}

.v-submit-btn:hover {
    background: var(--v-green-dark);
}

/* =========================================================
   2. WELCOME SECTION + INSPECTOR CARD
========================================================= */
.v-welcome-grid {
    display: grid;
    grid-template-columns: 1.25fr 0.75fr;
    gap: 45px;
    align-items: flex-start;
}

.v-welcome-content h2 {
    color: var(--v-navy);
    font-size: clamp(24px, 2.8vw, 32px);
    font-weight: 900;
    line-height: 1.3;
    margin: 0 0 16px;
    text-transform: uppercase;
}

.v-welcome-content p {
    color: var(--v-muted);
    font-size: 15px;
    line-height: 1.7;
    margin: 0 0 16px;
}

.v-feature-list {
    margin: 22px 0 28px;
    display: flex;
    flex-direction: column;
    gap: 18px;
}

.v-feature-item {
    display: flex;
    gap: 15px;
    align-items: flex-start;
}

.v-feature-icon {
    flex-shrink: 0;
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: rgba(27, 158, 234, 0.12);
    color: #1b9eea;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
    margin-top: 2px;
}

.v-feature-item h4 {
    margin: 0 0 4px;
    color: var(--v-navy);
    font-size: 15px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.3px;
}

.v-feature-item p {
    margin: 0;
    color: var(--v-muted);
    font-size: 14px;
    line-height: 1.6;
}

/* Inspector Card */
.v-inspector-card {
    background: #ffffff;
    border: 1px solid #dce2e8;
    border-radius: 6px;
    overflow: hidden;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
    position: sticky;
    top: 90px;
}

.v-inspector-header {
    background: #000000;
    color: #ffffff;
    padding: 12px 18px;
    font-size: 15px;
    font-weight: 900;
    text-align: center;
    letter-spacing: 1px;
    text-transform: uppercase;
}

.v-inspector-card img {
    width: 100%;
    height: 340px;
    object-fit: cover;
    object-position: center top;
    display: block;
}

.v-inspector-body {
    padding: 18px 20px 22px;
    text-align: center;
    background: #ffffff;
}

.v-inspector-body h4 {
    margin: 0 0 14px;
    color: var(--v-navy);
    font-size: 14px;
    font-weight: 800;
    line-height: 1.5;
}

.v-inspector-call {
    display: inline-flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    padding: 12px;
    background: var(--v-green);
    color: #ffffff !important;
    text-decoration: none;
    font-size: 15px;
    font-weight: 900;
    border-radius: 4px;
    transition: background 0.2s ease;
}

.v-inspector-call:hover {
    background: var(--v-green-dark);
}

/* =========================================================
   3. WHY IMPORTANT (2x2 GRID)
========================================================= */
.v-why-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 22px;
    margin-top: 15px;
}

.v-why-card {
    background: #ffffff;
    border: 1px solid #e1e7ed;
    border-radius: 6px;
    padding: 24px 22px;
    display: flex;
    gap: 15px;
    align-items: flex-start;
    transition: transform 0.25s ease, box-shadow 0.25s ease;
}

.v-why-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.06);
}

.v-why-icon {
    flex-shrink: 0;
    font-size: 20px;
    color: var(--v-green);
    margin-top: 2px;
}

.v-why-text strong {
    color: var(--v-navy);
    font-size: 15px;
    font-weight: 800;
    display: inline;
}

.v-why-text span {
    color: var(--v-muted);
    font-size: 14px;
    line-height: 1.65;
}

/* =========================================================
   4. COMMON DEFECTS / ISSUES (LIST + RIGHT IMAGE)
========================================================= */
.v-issues-grid {
    display: grid;
    grid-template-columns: 1.15fr 0.85fr;
    gap: 40px;
    align-items: center;
    margin-top: 20px;
}

.v-issues-list {
    display: flex;
    flex-direction: column;
    gap: 14px;
}

.v-issue-item {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    font-size: 14.5px;
    line-height: 1.6;
    color: var(--v-muted);
}

.v-issue-item i {
    color: var(--v-green);
    font-size: 16px;
    margin-top: 3px;
    flex-shrink: 0;
}

.v-issue-item strong {
    color: var(--v-navy);
    font-weight: 800;
}

.v-issues-img {
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
}

.v-issues-img img {
    width: 100%;
    height: 420px;
    object-fit: cover;
    display: block;
}

/* =========================================================
   5. WHY CHOOSE US (MINT CONTAINER + 4 WHITE CARDS)
========================================================= */
.v-choose-box {
    background: var(--v-light-green);
    border-radius: 18px;
    padding: 55px 40px;
    margin: 20px 0;
}

.v-choose-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 22px;
    margin-top: 35px;
}

.v-choose-card {
    background: #ffffff;
    border-radius: 8px;
    padding: 30px 22px;
    text-align: center;
    box-shadow: 0 4px 14px rgba(0, 0, 0, 0.05);
    transition: transform 0.25s ease, box-shadow 0.25s ease;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.v-choose-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 10px 24px rgba(0, 0, 0, 0.09);
}

.v-choose-icon {
    width: 58px;
    height: 58px;
    border-radius: 50%;
    background: var(--v-green);
    color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    margin-bottom: 18px;
}

.v-choose-card h4 {
    margin: 0 0 10px;
    color: var(--v-navy);
    font-size: 16px;
    font-weight: 800;
    line-height: 1.35;
}

.v-choose-card p {
    margin: 0;
    color: var(--v-muted);
    font-size: 13.5px;
    line-height: 1.6;
}

/* =========================================================
   6. PRICING PACKAGES (3 CARDS)
========================================================= */
.v-price-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 25px;
    max-width: 1020px;
    margin: 0 auto;
}

.v-price-card {
    background: #ffffff;
    border: 1px solid #e4e7eb;
    border-top: 3px solid var(--v-green);
    border-radius: 6px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
    padding: 30px 22px;
    text-align: center;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    transition: transform 0.25s ease, box-shadow 0.25s ease;
}

.v-price-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 10px 28px rgba(0, 0, 0, 0.1);
}

.v-price-icon {
    font-size: 32px;
    color: var(--v-navy);
    margin-bottom: 12px;
}

.v-price-card h3 {
    margin: 0 0 10px;
    color: var(--v-navy);
    font-size: 17px;
    font-weight: 800;
    text-transform: capitalize;
}

.v-price-amount {
    color: var(--v-green);
    font-size: 36px;
    font-weight: 900;
    line-height: 1;
    margin-bottom: 4px;
}

.v-price-suffix {
    color: #666666;
    font-size: 13px;
    font-weight: 600;
    margin-bottom: 20px;
}

.v-price-features {
    list-style: none;
    padding: 0;
    margin: 0 0 24px;
    text-align: left;
    flex-grow: 1;
}

.v-price-features li {
    padding: 9px 0;
    border-bottom: 1px solid #f0f2f5;
    color: #444444;
    font-size: 13.5px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.v-price-features li i {
    color: var(--v-green);
    font-size: 15px;
}

.v-price-btn {
    display: block;
    width: 100%;
    padding: 12px;
    background: var(--v-green);
    color: #ffffff !important;
    text-decoration: none;
    font-size: 14px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    border-radius: 4px;
    transition: background 0.2s ease;
}

.v-price-btn:hover {
    background: var(--v-green-dark);
}

/* =========================================================
   7. SCHEDULE CTA (ENLARGED)
========================================================= */
.v-cta {
    position: relative;
    min-height: 540px;
    display: flex;
    align-items: center;
    background:
        linear-gradient(
            90deg,
            rgba(4, 43, 75, 0.96) 0%,
            rgba(4, 43, 75, 0.88) 50%,
            rgba(4, 43, 75, 0.30) 100%
        ),
        url("{{ asset('images/dilapidation-cta.jpeg') }}") center right / cover no-repeat;
    color: #ffffff;
    padding: 105px 0;
}

.v-cta-content {
    max-width: 820px;
    color: #fff;
    padding: 0;
}

.v-cta-content h2 {
    margin: 0 0 20px;
    font-size: clamp(26px, 3.4vw, 38px);
    font-weight: 900;
    line-height: 1.25;
    color: #ffffff;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.v-cta-content p {
    font-size: 16px;
    line-height: 1.75;
    color: rgba(255, 255, 255, 0.92);
    margin: 0 0 30px;
}

/* =========================================================
   8. CLIENT FEEDBACK & REVIEWS
========================================================= */
.v-reviews {
    background: #ffffff;
}

.v-review-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 25px;
}

.v-review-card {
    background: #ffffff;
    border: 1px solid #e5e9f0;
    border-radius: 6px;
    padding: 30px 24px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.04);
    position: relative;
    transition: transform 0.25s ease;
}

.v-review-card:hover {
    transform: translateY(-3px);
}

.v-review-icon {
    font-size: 32px;
    color: #1b9eea;
    margin-bottom: 12px;
    line-height: 1;
}

.v-review-card p {
    color: var(--v-muted);
    font-size: 14px;
    line-height: 1.7;
    margin: 0 0 18px;
    flex-grow: 1;
}

.v-review-stars {
    color: #ffb400;
    font-size: 16px;
    margin-bottom: 8px;
    letter-spacing: 2px;
}

.v-review-card h4 {
    margin: 0;
    color: var(--v-navy);
    font-size: 15px;
    font-weight: 800;
}

/* =========================================================
   9. FAQS (ACCORDION)
========================================================= */
.v-faqs {
    background: #fbfcfd;
}

.v-faq-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 24px;
    align-items: flex-start;
}

.v-faq-col {
    display: flex;
    flex-direction: column;
    gap: 14px;
}

.v-faq-item {
    background: #f4f6f8;
    border: 1px solid #e5eaef;
    border-radius: 4px;
    overflow: hidden;
    transition: all 0.25s ease;
}

.v-faq-item.active {
    background: #ffffff;
    border-color: var(--v-green);
    box-shadow: 0 4px 14px rgba(66, 169, 0, 0.12);
}

.v-faq-question {
    width: 100%;
    padding: 16px 20px;
    background: transparent;
    border: none;
    text-align: left;
    display: flex;
    justify-content: space-between;
    align-items: center;
    cursor: pointer;
    font-size: 15px;
    font-weight: 800;
    color: var(--v-navy);
    gap: 12px;
    transition: color 0.2s ease, background 0.2s ease;
}

.v-faq-item.active .v-faq-question {
    background: var(--v-green);
    color: #ffffff;
}

.v-faq-icon {
    font-size: 14px;
    transition: transform 0.25s ease;
    flex-shrink: 0;
}

.v-faq-item.active .v-faq-icon {
    transform: rotate(180deg);
    color: #ffffff;
}

.v-faq-answer {
    padding: 0 20px;
    max-height: 0;
    overflow: hidden;
    color: var(--v-muted);
    font-size: 14px;
    line-height: 1.7;
    transition: max-height 0.3s ease, padding 0.3s ease;
}

.v-faq-item.active .v-faq-answer {
    padding: 16px 20px 20px;
    max-height: 500px;
}

/* Responsive */
@media (max-width: 991px) {
    .v-hero-inner,
    .v-welcome-grid,
    .v-issues-grid {
        grid-template-columns: 1fr;
        gap: 35px;
    }

    .v-choose-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .v-price-grid {
        grid-template-columns: 1fr;
        max-width: 420px;
    }

    .v-review-grid {
        grid-template-columns: 1fr;
    }

    .v-faq-grid {
        grid-template-columns: 1fr;
    }

    .v-inspector-card {
        position: static;
        max-width: 420px;
        margin: 0 auto;
    }
}

@media (max-width: 767px) {
    .v-section {
        padding: 50px 0;
    }

    .v-why-grid {
        grid-template-columns: 1fr;
    }

    .v-choose-grid {
        grid-template-columns: 1fr;
    }

    .v-choose-box {
        padding: 35px 20px;
    }

    .v-cta {
        min-height: 440px;
        padding: 70px 0;
    }

    .v-form-row {
        grid-template-columns: 1fr;
    }
}
</style>

<div class="v-page">

    {{-- =====================================================
         1. HERO SECTION
    ====================================================== --}}
    <section class="v-hero">
        <div class="v-container">
            <div class="v-hero-inner">

                {{-- Left Text --}}
                <div class="v-hero-content">
                    <span class="v-hero-badge">VENDOR INSPECTIONS – ENSURE A HASSLE-FREE PROPERTY SALE</span>
                    <h1>VENDOR INSPECTIONS – ENSURE A HASSLE-FREE PROPERTY SALE</h1>
                    <p class="v-hero-sub">
                        Get Peace of Mind with Professional Vendor Inspections in Melbourne
                    </p>
                    <a href="tel:0466001551" class="v-btn-green">
                        <i class="bi bi-telephone-fill"></i>
                        0466 001 551
                    </a>
                </div>

                {{-- Right Quick Quote Form --}}
                <div class="v-hero-form" id="quote-form">
                    <h3>GET QUICK QUOTE</h3>
                    <form action="{{ route('quote.store') }}" method="POST">
                        @csrf
                        <div class="v-form-row">
                            <input type="text" name="name" placeholder="Your Name *" required>
                            <input type="tel" name="phone" placeholder="Phone Number *" required>
                        </div>
                        <div class="v-form-row">
                            <input type="email" name="email" placeholder="Email Address *" required>
                            <input type="text" name="suburb" placeholder="Property Suburb *" required>
                        </div>
                        <div style="margin-bottom: 12px;">
                            <select name="service" required>
                                <option value="">Select Service *</option>
                                <option value="pre-purchase">Pre-purchase Building and Pest Inspection</option>
                                <option value="stage-by-stage">Building Stage by Stage Inspection</option>
                                <option value="new-build-handover">New Build Handover Inspection</option>
                                <option value="rising-damp">Rising Damp Inspection</option>
                                <option value="pool-barrier">Pool Barrier Inspection</option>
                                <option value="apartment">Apartment Building Inspection</option>
                                <option value="vendor" selected>Vendor Inspection</option>
                                <option value="dilapidation-report">Dilapidation Report</option>
                                <option value="builders-warranty">Builders Warranty Inspection</option>
                            </select>
                        </div>
                        <div>
                            <textarea name="message" placeholder="Your Message / Inspection Details"></textarea>
                        </div>
                        <button type="submit" class="v-submit-btn">
                            Get My Quote
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </section>


    {{-- =====================================================
         2. WELCOME SECTION + INSPECTOR CARD
    ====================================================== --}}
    <section class="v-section v-welcome">
        <div class="v-container">
            <div class="v-welcome-grid">

                {{-- Left Content --}}
                <div class="v-welcome-content">
                    <span class="v-badge">WELCOME TO PREMIUM BUILDING & PEST INSPECTIONS</span>
                    <h2>Welcome to Premium Building & Pest Inspections</h2>

                    <p>
                        A Vendor Inspection, also known as a Pre-Sale Building Inspection, provides property owners with a clear understanding of their property’s condition before it is listed for sale. Identifying defects, maintenance concerns, and potential issues early allows sellers to make informed decisions, address important repairs, and present their property with greater confidence. Our comprehensive inspection helps reduce uncertainty during the sales process and provides valuable insight into the overall condition of the home.
                    </p>

                    <p style="font-weight: 700; color: var(--v-navy); margin-bottom: 12px;">We Offer:</p>

                    <div class="v-feature-list">
                        <div class="v-feature-item">
                            <div class="v-feature-icon">
                                <i class="bi bi-search"></i>
                            </div>
                            <div>
                                <h4>FULL PROPERTY INSPECTION</h4>
                                <p>We conduct a thorough assessment of accessible internal and external areas of the property, including structural elements, roofing, walls, floors, ceilings, plumbing, and other visible building components.</p>
                            </div>
                        </div>

                        <div class="v-feature-item">
                            <div class="v-feature-icon">
                                <i class="bi bi-search"></i>
                            </div>
                            <div>
                                <h4>DETAILED REPORT WITH RECOMMENDATIONS</h4>
                                <p>Following the inspection, you will receive a comprehensive report outlining visible defects, maintenance concerns, and areas that may benefit from repair or further assessment before listing the property.</p>
                            </div>
                        </div>

                        <div class="v-feature-item">
                            <div class="v-feature-icon">
                                <i class="bi bi-search"></i>
                            </div>
                            <div>
                                <h4>PHOTOGRAPHIC DOCUMENTATION</h4>
                                <p>Our reports include clear photographic evidence of identified issues and building conditions, providing a visual reference to support inspection findings and recommendations.</p>
                            </div>
                        </div>
                    </div>

                    <div>
                        <a href="#quote-form" class="v-btn-green">
                            Schedule Inspection Now
                        </a>
                    </div>
                </div>

                {{-- Right Inspector Card --}}
                <div class="v-welcome-card-col">
                    <div class="v-inspector-card">
                        <div class="v-inspector-header">
                            YOUR INSPECTOR
                        </div>

                        <img src="{{ asset('images/ronak gami.jpeg') }}" alt="Ronak Gami - Registered Building Inspector" title="Ronak Gami - Registered Building Inspector">

                        <div class="v-inspector-body">
                            <h4>Ronak Gami, vba lic No: IN-PS 74654, Builder Lic No: DB-L 100200</h4>
                            <a href="tel:0466001551" class="v-inspector-call">
                                <i class="bi bi-telephone-fill me-2"></i>
                                0466 001 551
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    {{-- =====================================================
         3. WHY IMPORTANT (2x2 GRID)
    ====================================================== --}}
    <section class="v-section" style="background: #fafbfc; border-top: 1px solid #edf2f7; border-bottom: 1px solid #edf2f7;">
        <div class="v-container">

            <div class="v-heading-center">
                <h2>WHY VENDOR INSPECTIONS ARE IMPORTANT?</h2>
            </div>

            <div class="v-why-grid">

                <div class="v-why-card">
                    <i class="bi bi-check-circle-fill v-why-icon"></i>
                    <div class="v-why-text">
                        <strong>Increases Buyer Confidence:</strong>
                        <span> Buyers are more likely to make an offer when they know the property has been professionally inspected. The inspection report can be shared with potential buyers to reassure them that there are no hidden issues.</span>
                    </div>
                </div>

                <div class="v-why-card">
                    <i class="bi bi-check-circle-fill v-why-icon"></i>
                    <div class="v-why-text">
                        <strong>Helps You Set a Realistic Price:</strong>
                        <span> A pre-sale building inspection gives you a clear understanding of your property's condition, helping you set a fair asking price. Fixing issues before listing can increase buyer confidence and may help you achieve a higher sale price.</span>
                    </div>
                </div>

                <div class="v-why-card">
                    <i class="bi bi-check-circle-fill v-why-icon"></i>
                    <div class="v-why-text">
                        <strong>Avoid Last-Minute Surprises:</strong>
                        <span> Discovering issues during the buyer’s inspection can lead to negotiations, delays, or even deal cancellations. A pre-sale inspection allows you to address any problems upfront, ensuring a smoother transaction.</span>
                    </div>
                </div>

                <div class="v-why-card">
                    <i class="bi bi-check-circle-fill v-why-icon"></i>
                    <div class="v-why-text">
                        <strong>Compliance with Local Regulations:</strong>
                        <span> In Melbourne, vendor inspections ensure that your property complies with the guidelines set by the Victorian Building Authority (VBA), minimizing any potential legal issues.</span>
                    </div>
                </div>

            </div>

        </div>
    </section>


    {{-- =====================================================
         4. COMMON ISSUES FOUND (LIST + RIGHT IMAGE)
    ====================================================== --}}
    <section class="v-section">
        <div class="v-container">

            <div class="v-heading-center" style="text-align: left; margin-bottom: 25px;">
                <h2>COMMON ISSUES FOUND DURING VENDOR INSPECTIONS</h2>
                <p style="margin: 8px 0 0; text-align: left;">During Vendor Inspections, our inspectors frequently identify a range of issues that sellers may want to address before listing their property, including:</p>
            </div>

            <div class="v-issues-grid">

                {{-- Left Issue Points --}}
                <div class="v-issues-list">

                    <div class="v-issue-item">
                        <i class="bi bi-check-circle-fill"></i>
                        <div>
                            <strong>Structural Cracks:</strong> Cracks in walls or foundations that could indicate settling or more serious structural issues.
                        </div>
                    </div>

                    <div class="v-issue-item">
                        <i class="bi bi-check-circle-fill"></i>
                        <div>
                            <strong>Roof Leaks:</strong> Existing or potential leaks in the roof, gutters, or downpipes that could result in water damage.
                        </div>
                    </div>

                    <div class="v-issue-item">
                        <i class="bi bi-check-circle-fill"></i>
                        <div>
                            <strong>Electrical Faults:</strong> Outdated or faulty wiring, which could pose a safety risk and may need to be brought up to code.
                        </div>
                    </div>

                    <div class="v-issue-item">
                        <i class="bi bi-check-circle-fill"></i>
                        <div>
                            <strong>Plumbing Issues:</strong> Leaks, blockages, or outdated plumbing systems that may require maintenance or replacement.
                        </div>
                    </div>

                    <div class="v-issue-item">
                        <i class="bi bi-check-circle-fill"></i>
                        <div>
                            <strong>Pest Damage:</strong> Termite infestations or other pest issues that could affect the property’s structural integrity and value.
                        </div>
                    </div>

                </div>

                {{-- Right Image Carousel --}}
                <div class="v-issues-img">
                    <x-service-issues-carousel
                        id="vendorIssuesCarousel"
                        :images="[
                            [
                                'src' => asset('images/vendor.jpg'),
                                'alt' => 'Vendor Inspection Melbourne - Pre-Sale Property Structural Inspection',
                                'title' => 'Vendor Inspection Melbourne - Pre-Sale Property Structural Inspection'
                            ],
                            [
                                'src' => asset('images/g2.jpg'),
                                'alt' => 'Vendor Inspection - Comprehensive Building Defect Identification',
                                'title' => 'Vendor Inspection - Comprehensive Building Defect Identification'
                            ],
                            [
                                'src' => asset('images/g10.jpeg'),
                                'alt' => 'Vendor Inspection - Roof Cavity and Structural Check',
                                'title' => 'Vendor Inspection - Roof Cavity and Structural Check'
                            ],
                        ]"
                    />
                </div>

            </div>

        </div>
    </section>


    {{-- =====================================================
         5. WHY CHOOSE US (MINT GREEN CONTAINER)
    ====================================================== --}}
    <section class="v-section" style="padding-top: 0;">
        <div class="v-container">

            <div class="v-choose-box">

                <div class="v-heading-center">
                    <span class="v-badge">WHY CHOOSE US</span>
                    <h2>WHY CHOOSE US FOR YOUR VENDOR INSPECTION?</h2>
                </div>

                <div class="v-choose-grid">

                    <div class="v-choose-card">
                        <div class="v-choose-icon">
                            <i class="bi bi-award-fill"></i>
                        </div>
                        <h4>Experienced Inspectors</h4>
                        <p>Our team consists of fully licensed and certified inspectors with extensive knowledge of Melbourne's real estate market and local building regulations.</p>
                    </div>

                    <div class="v-choose-card">
                        <div class="v-choose-icon">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <h4>Independent and Unbiased</h4>
                        <p>We provide an objective, unbiased assessment of your property, ensuring that the report is accurate and can be used confidently during negotiations.</p>
                    </div>

                    <div class="v-choose-card">
                        <div class="v-choose-icon">
                            <i class="bi bi-file-earmark-text-fill"></i>
                        </div>
                        <h4>Clear, Detailed Reports</h4>
                        <p>Our inspection reports are comprehensive but easy to understand, providing you with all the information you need to make informed decisions.</p>
                    </div>

                    <div class="v-choose-card">
                        <div class="v-choose-icon">
                            <i class="bi bi-tag-fill"></i>
                        </div>
                        <h4>Cost-Effective</h4>
                        <p>A vendor inspection can help you avoid costly repairs and delays in the sale process, providing excellent value for your investment.</p>
                    </div>

                </div>

            </div>

        </div>
    </section>


    {{-- =====================================================
         6. CHOOSE PACKAGE / ENSURE SAFETY AND COMPLIANCE (PRICING)
    ====================================================== --}}
    <section class="v-section">
        <div class="v-container">

            <div class="v-heading-center">
                <span class="v-badge">CHOOSE PACKAGE</span>
                <h2>ENSURE SAFETY AND COMPLIANCE</h2>
            </div>

            <div class="v-price-grid">

                {{-- CARD 1: 2 BEDROOM --}}
                <div class="v-price-card">
                    <div>
                        <div class="v-price-icon">
                            <i class="bi bi-house-door"></i>
                        </div>
                        <h3>2 bed room</h3>

                        <div class="v-price-amount">$400</div>
                        <div class="v-price-suffix">+GST /Starting</div>

                        <ul class="v-price-features">
                            <li><i class="bi bi-check-square-fill"></i> Comprehensive Inspection</li>
                            <li><i class="bi bi-check-square-fill"></i> Report &amp; Consultation</li>
                        </ul>
                    </div>

                    <a href="#quote-form" class="v-price-btn">
                        GET STARTED
                    </a>
                </div>

                {{-- CARD 2: 3 BEDROOM --}}
                <div class="v-price-card">
                    <div>
                        <div class="v-price-icon">
                            <i class="bi bi-house-door"></i>
                        </div>
                        <h3>3 bed room</h3>

                        <div class="v-price-amount">$450</div>
                        <div class="v-price-suffix">+GST /Starting</div>

                        <ul class="v-price-features">
                            <li><i class="bi bi-check-square-fill"></i> Comprehensive Inspection</li>
                            <li><i class="bi bi-check-square-fill"></i> Report &amp; Consultation</li>
                        </ul>
                    </div>

                    <a href="#quote-form" class="v-price-btn">
                        GET STARTED
                    </a>
                </div>

                {{-- CARD 3: 4 BEDROOM --}}
                <div class="v-price-card">
                    <div>
                        <div class="v-price-icon">
                            <i class="bi bi-building"></i>
                        </div>
                        <h3>4 bed room</h3>

                        <div class="v-price-amount">$525</div>
                        <div class="v-price-suffix">+GST /Starting</div>

                        <ul class="v-price-features">
                            <li><i class="bi bi-check-square-fill"></i> Comprehensive Inspection</li>
                            <li><i class="bi bi-check-square-fill"></i> Report &amp; Consultation</li>
                        </ul>
                    </div>

                    <a href="#quote-form" class="v-price-btn">
                        GET STARTED
                    </a>
                </div>

            </div>

        </div>
    </section>


    {{-- =====================================================
         7. SCHEDULE CTA (ENLARGED)
    ====================================================== --}}
    <section class="v-cta">
        <div class="v-container">
            <div class="v-cta-content">
                <h2>SELL WITH CONFIDENCE – BOOK YOUR VENDOR INSPECTION TODAY</h2>

                <p>
                    A Vendor Inspection can help you avoid costly surprises and make your property more appealing to potential buyers. With our detailed inspections and comprehensive reports, you’ll have all the information you need to ensure a smooth, stress-free sale. Contact us today to schedule your inspection and take the first step toward a successful sale.
                </p>

                <a href="#quote-form" class="v-btn-green">
                    Schedule your inspection now
                </a>
            </div>
        </div>
    </section>


    {{-- =====================================================
         8. CLIENT FEEDBACK & REVIEWS
    ====================================================== --}}
    <section class="v-section v-reviews">
        <div class="v-container">

            <div class="v-heading-center">
                <span class="v-badge">TESTIMONIAL</span>
                <h2>CLIENT FEEDBACK & REVIEWS</h2>
            </div>

            <div class="v-review-grid">

                <div class="v-review-card">
                    <div class="v-review-icon">
                        <i class="bi bi-chat-quote"></i>
                    </div>
                    <p>
                        Very professional and approachable. The property inspection was done thoroughly, and even minor defects were identified. Really appreciate the attention to detail and commitment to the job. Highly recommended for any building inspection.
                    </p>
                    <div class="v-review-stars">★★★★★</div>
                    <h4>Swathi Tarini</h4>
                </div>

                <div class="v-review-card">
                    <div class="v-review-icon">
                        <i class="bi bi-chat-quote"></i>
                    </div>
                    <p>
                        Took generous time to answer all my questions regarding the property's condition and report. Very kind, humble, and helpful. Highly recommended for anyone needing a building and pest inspection
                    </p>
                    <div class="v-review-stars">★★★★★</div>
                    <h4>Luxmy</h4>
                </div>

                <div class="v-review-card">
                    <div class="v-review-icon">
                        <i class="bi bi-chat-quote"></i>
                    </div>
                    <p>
                        Provided an excellent inspection for the property I'm purchasing. All findings were explained clearly, and the report was prepared on the same day. Warm, professional, and efficient. Highly recommended to friends and family.
                    </p>
                    <div class="v-review-stars">★★★★★</div>
                    <h4>Shaleen De Silva</h4>
                </div>

                <div class="v-review-card">
                    <div class="v-review-icon">
                        <i class="bi bi-chat-quote"></i>
                    </div>
                    <p>
                        Extremely helpful and responsive. The building and pest inspection was completed quickly, and the report was delivered exactly as requested. Smooth and professional experience overall— great service!
                    </p>
                    <div class="v-review-stars">★★★★★</div>
                    <h4>Niresh Wijesiri</h4>
                </div>

                <div class="v-review-card">
                    <div class="v-review-icon">
                        <i class="bi bi-chat-quote"></i>
                    </div>
                    <p>
                        Very thorough and professional during my pre-purchase building and pest inspection. Strongly recommended.
                    </p>
                    <div class="v-review-stars">★★★★★</div>
                    <h4>Max</h4>
                </div>

                <div class="v-review-card">
                    <div class="v-review-icon">
                        <i class="bi bi-chat-quote"></i>
                    </div>
                    <p>
                        Amazing experience. Quick replies, prompt actions, and a positive attitude. Would definitely recommend 👏👏👏
                    </p>
                    <div class="v-review-stars">★★★★★</div>
                    <h4>Heena Bhavsar</h4>
                </div>

            </div>

        </div>
    </section>


    {{-- =====================================================
         9. FAQS (MOST POPULAR QUESTIONS)
    ====================================================== --}}
    <section class="v-section v-faqs">
        <div class="v-container">

            <div class="v-heading-center">
                <span class="v-badge">COMMON QUESTIONS</span>
                <h2>MOST POPULAR QUESTIONS</h2>
            </div>

            <div class="v-faq-grid">

                {{-- Left Column (Questions 1 - 3) --}}
                <div class="v-faq-col">

                    {{-- FAQ 1 (Active by default) --}}
                    <div class="v-faq-item active">
                        <button class="v-faq-question" type="button" onclick="toggleVFaq(this)">
                            <span>1. What is a Vendor Inspection?</span>
                            <i class="bi bi-chevron-down v-faq-icon"></i>
                        </button>
                        <div class="v-faq-answer">
                            A vendor inspection is a pre-sale inspection conducted by a qualified inspector to identify any issues or defects in a property before it is listed for sale. This helps the seller address any concerns beforehand, leading to a smoother sale process.
                        </div>
                    </div>

                    {{-- FAQ 2 --}}
                    <div class="v-faq-item">
                        <button class="v-faq-question" type="button" onclick="toggleVFaq(this)">
                            <span>2. Why should I get a vendor inspection before selling my home?</span>
                            <i class="bi bi-chevron-down v-faq-icon"></i>
                        </button>
                        <div class="v-faq-answer">
                            A vendor inspection helps you identify and fix any potential issues before listing your property, making it more attractive to buyers and reducing the risk of last-minute negotiations or deal failures.
                        </div>
                    </div>

                    {{-- FAQ 3 --}}
                    <div class="v-faq-item">
                        <button class="v-faq-question" type="button" onclick="toggleVFaq(this)">
                            <span>3. How long does a vendor inspection take?</span>
                            <i class="bi bi-chevron-down v-faq-icon"></i>
                        </button>
                        <div class="v-faq-answer">
                            The inspection typically takes between 1 to 2 hours depending on the size and condition of the property. The report is usually delivered within 24 to 48 hours after the inspection.
                        </div>
                    </div>

                </div>

                {{-- Right Column (Questions 4 - 6) --}}
                <div class="v-faq-col">

                    {{-- FAQ 4 (Active by default) --}}
                    <div class="v-faq-item active">
                        <button class="v-faq-question" type="button" onclick="toggleVFaq(this)">
                            <span>4. What does the vendor inspection report include?</span>
                            <i class="bi bi-chevron-down v-faq-icon"></i>
                        </button>
                        <div class="v-faq-answer">
                            The report includes a detailed summary of the property’s condition, high-resolution photographs of any issues, and recommendations for repairs or improvements that could enhance the property's value.
                        </div>
                    </div>

                    {{-- FAQ 5 --}}
                    <div class="v-faq-item">
                        <button class="v-faq-question" type="button" onclick="toggleVFaq(this)">
                            <span>5. Is a vendor inspection legally required?</span>
                            <i class="bi bi-chevron-down v-faq-icon"></i>
                        </button>
                        <div class="v-faq-answer">
                            While not legally required, a vendor inspection can be a valuable tool for protecting sellers from unexpected issues during the buyer's inspection. It also helps ensure compliance with local building regulations.
                        </div>
                    </div>

                    {{-- FAQ 6 --}}
                    <div class="v-faq-item">
                        <button class="v-faq-question" type="button" onclick="toggleVFaq(this)">
                            <span>6. Can the inspection report be used to negotiate with buyers?</span>
                            <i class="bi bi-chevron-down v-faq-icon"></i>
                        </button>
                        <div class="v-faq-answer">
                            Yes, sharing the vendor inspection report with potential buyers can help build trust and transparency, potentially speeding up negotiations and helping to close the sale faster.
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section>

</div>

<script>
// FAQ Accordion Toggle
function toggleVFaq(btn) {
    const item = btn.closest('.v-faq-item');
    const col = item.closest('.v-faq-col');
    const allInCol = col.querySelectorAll('.v-faq-item');
    const wasActive = item.classList.contains('active');

    // Close other items in the same column
    allInCol.forEach(el => el.classList.remove('active'));

    // Toggle clicked item
    if (!wasActive) {
        item.classList.add('active');
    }
}
</script>

@endsection