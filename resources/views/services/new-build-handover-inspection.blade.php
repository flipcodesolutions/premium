@extends('layouts.app')

@section('title', 'New Build Handover Inspection Melbourne | PB Inspections')
@section('meta_description', 'Thorough new home handover (PCI) inspections in Melbourne. Identify builder defects, non-compliant work, and cosmetic flaws before paying your final construction invoice.')

@section('content')

<style>
/* =========================================================
   NEW BUILD HANDOVER INSPECTION PAGE STYLES
   1:1 Pixel-Perfect Match with Reference Screenshot & Live Site
========================================================= */

:root {
    --nb-navy: #073763;
    --nb-navy-dark: #052646;
    --nb-green: #42a900;
    --nb-green-dark: #358c00;
    --nb-light-green: #eef7ed;
    --nb-text: #333333;
    --nb-muted: #555555;
    --nb-border: #e2e8f0;
}

.nb-page {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
    color: var(--nb-text);
    overflow-x: hidden;
    position: relative;
    background: #ffffff;
}

.nb-container {
    width: 92%;
    max-width: 1180px;
    margin: 0 auto;
}

.nb-section {
    padding: 70px 0;
}

/* Headings */
.nb-badge {
    display: inline-block;
    color: var(--nb-green);
    font-size: 13.5px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 1.2px;
    margin-bottom: 8px;
}

.nb-heading-center {
    text-align: center;
    margin-bottom: 40px;
}

.nb-heading-center h2 {
    margin: 0;
    color: var(--nb-navy);
    font-size: clamp(24px, 3.2vw, 34px);
    line-height: 1.25;
    font-weight: 900;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.nb-heading-center p {
    max-width: 720px;
    margin: 12px auto 0;
    color: var(--nb-muted);
    font-size: 15px;
    line-height: 1.7;
}

/* Buttons */
.nb-btn-green {
    display: inline-flex;
    justify-content: center;
    align-items: center;
    gap: 8px;
    padding: 13px 28px;
    background: var(--nb-green);
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

.nb-btn-green:hover {
    background: var(--nb-green-dark);
    transform: translateY(-2px);
    box-shadow: 0 8px 22px rgba(66, 169, 0, 0.35);
}

/* =========================================================
   1. HERO SECTION
========================================================= */
.nb-hero {
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

.nb-hero-inner {
    display: grid;
    grid-template-columns: 1.15fr 0.85fr;
    gap: 45px;
    align-items: center;
    padding: 50px 0 60px;
}

.nb-hero-content .nb-hero-badge {
    color: rgba(255, 255, 255, 0.9);
    font-size: 13px;
    font-weight: 800;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    display: block;
    margin-bottom: 12px;
}

.nb-hero-content h1 {
    font-size: clamp(26px, 3.5vw, 40px);
    line-height: 1.2;
    font-weight: 900;
    color: #ffffff;
    margin: 0 0 16px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.nb-hero-content .nb-hero-sub {
    color: rgba(255, 255, 255, 0.95);
    font-size: 17px;
    line-height: 1.6;
    margin: 0 0 26px;
    font-weight: 500;
}

/* Hero Form */
.nb-hero-form {
    background: #ffffff;
    border-radius: 8px;
    padding: 26px 24px;
    box-shadow: 0 12px 35px rgba(0, 0, 0, 0.28);
    color: var(--nb-text);
}

.nb-hero-form h3 {
    margin: 0 0 16px;
    color: var(--nb-navy);
    font-size: 19px;
    font-weight: 900;
    text-transform: uppercase;
    text-align: center;
    letter-spacing: 0.5px;
}

.nb-form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px;
    margin-bottom: 12px;
}

.nb-hero-form input,
.nb-hero-form select,
.nb-hero-form textarea {
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

.nb-hero-form input:focus,
.nb-hero-form select:focus,
.nb-hero-form textarea:focus {
    border-color: var(--nb-green);
    box-shadow: 0 0 0 3px rgba(66, 169, 0, 0.15);
}

.nb-hero-form textarea {
    height: 75px;
    resize: none;
    margin-bottom: 14px;
}

.nb-submit-btn {
    width: 100%;
    padding: 13px;
    background: var(--nb-green);
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

.nb-submit-btn:hover {
    background: var(--nb-green-dark);
}

/* =========================================================
   2. WELCOME SECTION + INSPECTOR CARD
========================================================= */
.nb-welcome-grid {
    display: grid;
    grid-template-columns: 1.25fr 0.75fr;
    gap: 45px;
    align-items: flex-start;
}

.nb-welcome-content h2 {
    color: var(--nb-navy);
    font-size: clamp(24px, 2.8vw, 32px);
    font-weight: 900;
    line-height: 1.3;
    margin: 0 0 16px;
    text-transform: uppercase;
}

.nb-welcome-content p {
    color: var(--nb-muted);
    font-size: 15px;
    line-height: 1.7;
    margin: 0 0 16px;
}

.nb-feature-list {
    margin: 22px 0 28px;
    display: flex;
    flex-direction: column;
    gap: 18px;
}

.nb-feature-item {
    display: flex;
    gap: 15px;
    align-items: flex-start;
}

.nb-feature-icon {
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

.nb-feature-item h4 {
    margin: 0 0 4px;
    color: var(--nb-navy);
    font-size: 15px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.3px;
}

.nb-feature-item p {
    margin: 0;
    color: var(--nb-muted);
    font-size: 14px;
    line-height: 1.6;
}

/* Inspector Card */
.nb-inspector-card {
    background: #ffffff;
    border: 1px solid #dce2e8;
    border-radius: 6px;
    overflow: hidden;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
    position: sticky;
    top: 90px;
}

.nb-inspector-header {
    background: #000000;
    color: #ffffff;
    padding: 12px 18px;
    font-size: 15px;
    font-weight: 900;
    text-align: center;
    letter-spacing: 1px;
    text-transform: uppercase;
}

.nb-inspector-card img {
    width: 100%;
    height: 340px;
    object-fit: cover;
    object-position: center top;
    display: block;
}

.nb-inspector-body {
    padding: 18px 20px 22px;
    text-align: center;
    background: #ffffff;
}

.nb-inspector-body h4 {
    margin: 0 0 14px;
    color: var(--nb-navy);
    font-size: 14px;
    font-weight: 800;
    line-height: 1.5;
}

.nb-inspector-call {
    display: inline-flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    padding: 12px;
    background: var(--nb-green);
    color: #ffffff !important;
    text-decoration: none;
    font-size: 15px;
    font-weight: 900;
    border-radius: 4px;
    transition: background 0.2s ease;
}

.nb-inspector-call:hover {
    background: var(--nb-green-dark);
}

/* =========================================================
   3. WHY IMPORTANT (2x2 GRID)
========================================================= */
.nb-why-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 22px;
    margin-top: 15px;
}

.nb-why-card {
    background: #ffffff;
    border: 1px solid #e1e7ed;
    border-radius: 6px;
    padding: 24px 22px;
    display: flex;
    gap: 15px;
    align-items: flex-start;
    transition: transform 0.25s ease, box-shadow 0.25s ease;
}

.nb-why-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.06);
}

.nb-why-icon {
    flex-shrink: 0;
    font-size: 20px;
    color: var(--nb-green);
    margin-top: 2px;
}

.nb-why-text strong {
    color: var(--nb-navy);
    font-size: 15px;
    font-weight: 800;
    display: inline;
}

.nb-why-text span {
    color: var(--nb-muted);
    font-size: 14px;
    line-height: 1.65;
}

/* =========================================================
   4. COMMON DEFECTS / ISSUES (LIST + RIGHT CAROUSEL)
========================================================= */
.nb-issues-grid {
    display: grid;
    grid-template-columns: 1.15fr 0.85fr;
    gap: 40px;
    align-items: center;
    margin-top: 20px;
}

.nb-issues-list {
    display: flex;
    flex-direction: column;
    gap: 14px;
}

.nb-issue-item {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    font-size: 14.5px;
    line-height: 1.6;
    color: var(--nb-muted);
}

.nb-issue-item i {
    color: var(--nb-green);
    font-size: 16px;
    margin-top: 3px;
    flex-shrink: 0;
}

.nb-issue-item strong {
    color: var(--nb-navy);
    font-weight: 800;
}

/* Carousel */
.nb-carousel-container {
    position: relative;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
}

.nb-carousel-slide {
    display: none;
    width: 100%;
    height: 420px;
}

.nb-carousel-slide.active {
    display: block;
}

.nb-carousel-slide img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

.nb-carousel-btn {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(0, 0, 0, 0.4);
    color: #fff;
    border: none;
    width: 38px;
    height: 38px;
    border-radius: 50%;
    cursor: pointer;
    font-size: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background 0.2s ease;
    z-index: 2;
}

.nb-carousel-btn:hover {
    background: rgba(0, 0, 0, 0.75);
}

.nb-carousel-prev {
    left: 12px;
}

.nb-carousel-next {
    right: 12px;
}

/* =========================================================
   5. WHY CHOOSE US (MINT CONTAINER + 4 WHITE CARDS)
========================================================= */
.nb-choose-box {
    background: var(--nb-light-green);
    border-radius: 18px;
    padding: 55px 40px;
    margin: 20px 0;
}

.nb-choose-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 22px;
    margin-top: 35px;
}

.nb-choose-card {
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

.nb-choose-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 10px 24px rgba(0, 0, 0, 0.09);
}

.nb-choose-icon {
    width: 58px;
    height: 58px;
    border-radius: 50%;
    background: var(--nb-green);
    color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    margin-bottom: 18px;
}

.nb-choose-card h4 {
    margin: 0 0 10px;
    color: var(--nb-navy);
    font-size: 16px;
    font-weight: 800;
    line-height: 1.35;
}

.nb-choose-card p {
    margin: 0;
    color: var(--nb-muted);
    font-size: 13.5px;
    line-height: 1.6;
}

/* =========================================================
   6. PRICING PACKAGES (3 CARDS)
========================================================= */
.nb-price-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 25px;
    max-width: 1020px;
    margin: 0 auto;
}

.nb-price-card {
    background: #ffffff;
    border: 1px solid #e4e7eb;
    border-top: 3px solid var(--nb-green);
    border-radius: 6px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
    padding: 30px 22px;
    text-align: center;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    transition: transform 0.25s ease, box-shadow 0.25s ease;
}

.nb-price-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 10px 28px rgba(0, 0, 0, 0.1);
}

.nb-price-icon {
    font-size: 32px;
    color: var(--nb-navy);
    margin-bottom: 12px;
}

.nb-price-card h3 {
    margin: 0 0 10px;
    color: var(--nb-navy);
    font-size: 17px;
    font-weight: 800;
    text-transform: capitalize;
}

.nb-price-amount {
    color: var(--nb-green);
    font-size: 36px;
    font-weight: 900;
    line-height: 1;
    margin-bottom: 4px;
}

.nb-price-suffix {
    color: #666666;
    font-size: 13px;
    font-weight: 600;
    margin-bottom: 20px;
}

.nb-price-features {
    list-style: none;
    padding: 0;
    margin: 0 0 24px;
    text-align: left;
    flex-grow: 1;
}

.nb-price-features li {
    padding: 9px 0;
    border-bottom: 1px solid #f0f2f5;
    color: #444444;
    font-size: 13.5px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.nb-price-features li i {
    color: var(--nb-green);
    font-size: 15px;
}

.nb-price-btn {
    display: block;
    width: 100%;
    padding: 12px;
    background: var(--nb-green);
    color: #ffffff !important;
    text-decoration: none;
    font-size: 14px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    border-radius: 4px;
    transition: background 0.2s ease;
}

.nb-price-btn:hover {
    background: var(--nb-green-dark);
}

/* =========================================================
   7. SCHEDULE CTA (ENLARGED)
========================================================= */
.nb-cta {
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

.nb-cta-content {
    max-width: 820px;
    color: #fff;
    padding: 0;
}

.nb-cta-content h2 {
    margin: 0 0 20px;
    font-size: clamp(26px, 3.4vw, 38px);
    font-weight: 900;
    line-height: 1.25;
    color: #ffffff;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.nb-cta-content p {
    font-size: 16px;
    line-height: 1.75;
    color: rgba(255, 255, 255, 0.92);
    margin: 0 0 30px;
}

/* =========================================================
   8. CLIENT FEEDBACK & REVIEWS
========================================================= */
.nb-reviews {
    background: #ffffff;
}

.nb-review-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 25px;
}

.nb-review-card {
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

.nb-review-card:hover {
    transform: translateY(-3px);
}

.nb-review-icon {
    font-size: 32px;
    color: #1b9eea;
    margin-bottom: 12px;
    line-height: 1;
}

.nb-review-card p {
    color: var(--nb-muted);
    font-size: 14px;
    line-height: 1.7;
    margin: 0 0 18px;
    flex-grow: 1;
}

.nb-review-stars {
    color: #ffb400;
    font-size: 16px;
    margin-bottom: 8px;
    letter-spacing: 2px;
}

.nb-review-card h4 {
    margin: 0;
    color: var(--nb-navy);
    font-size: 15px;
    font-weight: 800;
}

/* =========================================================
   9. FAQS (ACCORDION)
========================================================= */
.nb-faqs {
    background: #fbfcfd;
}

.nb-faq-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 24px;
    align-items: flex-start;
}

.nb-faq-col {
    display: flex;
    flex-direction: column;
    gap: 14px;
}

.nb-faq-item {
    background: #f4f6f8;
    border: 1px solid #e5eaef;
    border-radius: 4px;
    overflow: hidden;
    transition: all 0.25s ease;
}

.nb-faq-item.active {
    background: #ffffff;
    border-color: var(--nb-green);
    box-shadow: 0 4px 14px rgba(66, 169, 0, 0.12);
}

.nb-faq-question {
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
    color: var(--nb-navy);
    gap: 12px;
    transition: color 0.2s ease, background 0.2s ease;
}

.nb-faq-item.active .nb-faq-question {
    background: var(--nb-green);
    color: #ffffff;
}

.nb-faq-icon {
    font-size: 14px;
    transition: transform 0.25s ease;
    flex-shrink: 0;
}

.nb-faq-item.active .nb-faq-icon {
    transform: rotate(180deg);
    color: #ffffff;
}

.nb-faq-answer {
    padding: 0 20px;
    max-height: 0;
    overflow: hidden;
    color: var(--nb-muted);
    font-size: 14px;
    line-height: 1.7;
    transition: max-height 0.3s ease, padding 0.3s ease;
}

.nb-faq-item.active .nb-faq-answer {
    padding: 16px 20px 20px;
    max-height: 500px;
}

/* Responsive */
@media (max-width: 991px) {
    .nb-hero-inner,
    .nb-welcome-grid,
    .nb-issues-grid {
        grid-template-columns: 1fr;
        gap: 35px;
    }

    .nb-choose-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .nb-price-grid {
        grid-template-columns: 1fr;
        max-width: 420px;
    }

    .nb-review-grid {
        grid-template-columns: 1fr;
    }

    .nb-faq-grid {
        grid-template-columns: 1fr;
    }

    .nb-inspector-card {
        position: static;
        max-width: 420px;
        margin: 0 auto;
    }
}

@media (max-width: 767px) {
    .nb-section {
        padding: 50px 0;
    }

    .nb-why-grid {
        grid-template-columns: 1fr;
    }

    .nb-choose-grid {
        grid-template-columns: 1fr;
    }

    .nb-choose-box {
        padding: 35px 20px;
    }

    .nb-cta {
        min-height: 440px;
        padding: 70px 0;
    }

    .nb-form-row {
        grid-template-columns: 1fr;
    }
}
</style>

<div class="nb-page">

    {{-- =====================================================
         1. HERO SECTION
    ====================================================== --}}
    <section class="nb-hero">
        <div class="nb-container">
            <div class="nb-hero-inner">

                {{-- Left Text --}}
                <div class="nb-hero-content">
                    <span class="nb-hero-badge">NEW BUILD HANDOVER INSPECTION IN MELBOURNE</span>
                    <h1>NEW BUILD HANDOVER INSPECTION IN MELBOURNE</h1>
                    <p class="nb-hero-sub">
                        Get Peace of Mind with Professional New Build Handover Inspections in Melbourne
                    </p>
                    <a href="tel:0466001551" class="nb-btn-green">
                        <i class="bi bi-telephone-fill"></i>
                        0466 001 551
                    </a>
                </div>

                {{-- Right Quick Quote Form --}}
                <div class="nb-hero-form" id="quote-form">
                    <h3>GET QUICK QUOTE</h3>
                    <form action="{{ route('quote.store') }}" method="POST">
                        @csrf
                        <div class="nb-form-row">
                            <input type="text" name="name" placeholder="Your Name *" required>
                            <input type="tel" name="phone" placeholder="Phone Number *" required>
                        </div>
                        <div class="nb-form-row">
                            <input type="email" name="email" placeholder="Email Address *" required>
                            <input type="text" name="suburb" placeholder="Property Suburb *" required>
                        </div>
                        <div style="margin-bottom: 12px;">
                            <select name="service" required>
                                <option value="">Select Service *</option>
                                <option value="pre-purchase">Pre-purchase Building and Pest Inspection</option>
                                <option value="stage-by-stage">Building Stage by Stage Inspection</option>
                                <option value="new-build-handover" selected>New Build Handover Inspection</option>
                                <option value="rising-damp">Rising Damp Inspection</option>
                                <option value="pool-barrier">Pool Barrier Inspection</option>
                                <option value="apartment">Apartment Building Inspection</option>
                                <option value="vendor">Vendor Inspection</option>
                                <option value="dilapidation-report">Dilapidation Report</option>
                                <option value="builders-warranty">Builders Warranty Inspection</option>
                            </select>
                        </div>
                        <div>
                            <textarea name="message" placeholder="Your Message / Inspection Details"></textarea>
                        </div>
                        <button type="submit" class="nb-submit-btn">
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
    <section class="nb-section nb-welcome">
        <div class="nb-container">
            <div class="nb-welcome-grid">

                {{-- Left Content --}}
                <div class="nb-welcome-content">
                    <span class="nb-badge">WELCOME TO PREMIUM BUILDING & PEST INSPECTIONS</span>
                    <h2>Welcome to Premium Building & Pest Inspections</h2>

                    <p>
                        Purchasing a newly built home is a major investment, and the handover stage is your final opportunity to identify defects, incomplete work, and workmanship issues before taking ownership. Our New Build Handover Inspection service provides an independent assessment of your property’s condition, helping ensure the home has been completed to an acceptable standard. We carefully inspect visible building elements, finishes, fixtures, and installations to identify issues that may require attention before settlement or handover.
                    </p>

                    <p style="font-weight: 700; color: var(--nb-navy); margin-bottom: 12px;">We Offer:</p>

                    <div class="nb-feature-list">
                        <div class="nb-feature-item">
                            <div class="nb-feature-icon">
                                <i class="bi bi-search"></i>
                            </div>
                            <div>
                                <h4>COMPREHENSIVE PROPERTY INSPECTION</h4>
                                <p>Our inspection covers accessible internal and external areas of the property, assessing workmanship, finishes, fittings, fixtures, and visible defects that may impact the quality or functionality of the home.</p>
                            </div>
                        </div>

                        <div class="nb-feature-item">
                            <div class="nb-feature-icon">
                                <i class="bi bi-search"></i>
                            </div>
                            <div>
                                <h4>STRUCTURAL INTEGRITY CHECK</h4>
                                <p>We inspect visible structural elements, including walls, ceilings, floors, roofing components, and other accessible building features for signs of cracking, movement, damage, or incomplete work.</p>
                            </div>
                        </div>

                        <div class="nb-feature-item">
                            <div class="nb-feature-icon">
                                <i class="bi bi-search"></i>
                            </div>
                            <div>
                                <h4>SAFETY AND COMPLIANCE</h4>
                                <p>The inspection identifies visible safety concerns, building defects, and workmanship issues that may require rectification before the property is handed over.</p>
                            </div>
                        </div>
                    </div>

                    <div>
                        <a href="#quote-form" class="nb-btn-green">
                            Schedule Inspection Now
                        </a>
                    </div>
                </div>

                {{-- Right Inspector Card --}}
                <div class="nb-welcome-card-col">
                    <div class="nb-inspector-card">
                        <div class="nb-inspector-header">
                            YOUR INSPECTOR
                        </div>

                        <img src="{{ asset('images/ronak gami.jpeg') }}" alt="Ronak Gami - Registered Building Inspector" title="Ronak Gami - Registered Building Inspector">

                        <div class="nb-inspector-body">
                            <h4>Ronak Gami, vba lic No: IN-PS 74654, Builder Lic No: DB-L 100200</h4>
                            <a href="tel:0466001551" class="nb-inspector-call">
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
    <section class="nb-section" style="background: #fafbfc; border-top: 1px solid #edf2f7; border-bottom: 1px solid #edf2f7;">
        <div class="nb-container">

            <div class="nb-heading-center">
                <h2>WHY A NEW BUILD HANDOVER INSPECTION IS IMPORTANT</h2>
            </div>

            <div class="nb-why-grid">

                <div class="nb-why-card">
                    <i class="bi bi-check-circle-fill nb-why-icon"></i>
                    <div class="nb-why-text">
                        <strong>Uncover Hidden Defects:</strong>
                        <span> Even new builds can have defects or incomplete work that may not be immediately obvious. Our inspections identify these issues before they become costly repairs.</span>
                    </div>
                </div>

                <div class="nb-why-card">
                    <i class="bi bi-check-circle-fill nb-why-icon"></i>
                    <div class="nb-why-text">
                        <strong>Leverage for Rectification:</strong>
                        <span> The inspection report provides a documented record of any issues that need rectification. This allows you to request the builder to fix problems before final payment or possession.</span>
                    </div>
                </div>

                <div class="nb-why-card">
                    <i class="bi bi-check-circle-fill nb-why-icon"></i>
                    <div class="nb-why-text">
                        <strong>Ensure Compliance:</strong>
                        <span> Melbourne's building standards are strict. We ensure your new home complies with all relevant building codes and regulations, avoiding future legal complications.</span>
                    </div>
                </div>

                <div class="nb-why-card">
                    <i class="bi bi-check-circle-fill nb-why-icon"></i>
                    <div class="nb-why-text">
                        <strong>Peace of Mind:</strong>
                        <span> Moving into a new home is exciting, but it can also be stressful if you’re unsure about the quality of the build. Our inspection ensures everything has been done to the highest standard, giving you peace of mind.</span>
                    </div>
                </div>

            </div>

        </div>
    </section>


    {{-- =====================================================
         4. COMMON ISSUES FOUND (LIST + RIGHT CAROUSEL)
    ====================================================== --}}
    <section class="nb-section">
        <div class="nb-container">

            <div class="nb-heading-center" style="text-align: left; margin-bottom: 25px;">
                <h2>COMMON ISSUES WE FIND IN NEW BUILD HANDOVER INSPECTIONS</h2>
                <p style="margin: 8px 0 0; text-align: left;">During our inspections, we commonly find the following defects in new builds:</p>
            </div>

            <div class="nb-issues-grid">

                {{-- Left Issue Points --}}
                <div class="nb-issues-list">

                    <div class="nb-issue-item">
                        <i class="bi bi-check-circle-fill"></i>
                        <div>
                            <strong>Surface Imperfections:</strong> Scratches, dents, or paint drips on walls and surfaces are common issues that builders may overlook in the final stages of construction.
                        </div>
                    </div>

                    <div class="nb-issue-item">
                        <i class="bi bi-check-circle-fill"></i>
                        <div>
                            <strong>Plumbing Issues:</strong> Leaks, poorly installed fittings, or low water pressure are common problems that can lead to long-term damage if not addressed early.
                        </div>
                    </div>

                    <div class="nb-issue-item">
                        <i class="bi bi-check-circle-fill"></i>
                        <div>
                            <strong>Electrical Deficiencies:</strong> We often find problems with light fixtures, faulty wiring, or inadequate socket placement.
                        </div>
                    </div>

                    <div class="nb-issue-item">
                        <i class="bi bi-check-circle-fill"></i>
                        <div>
                            <strong>Poorly Fitted Doors and Windows:</strong> Ill-fitting doors and windows can cause drafts, moisture issues, or security concerns.
                        </div>
                    </div>

                    <div class="nb-issue-item">
                        <i class="bi bi-check-circle-fill"></i>
                        <div>
                            <strong>Uneven Flooring:</strong> Uneven or improperly installed flooring can cause both cosmetic and safety concerns over time.
                        </div>
                    </div>

                    <div class="nb-issue-item">
                        <i class="bi bi-check-circle-fill"></i>
                        <div>
                            <strong>Incomplete or Missing Fixtures:</strong> Missing light switches, unfinished cabinetry, or uninstalled appliances are frequent oversights that need attention before handover.
                        </div>
                    </div>

                </div>

                {{-- Right Image Carousel --}}
                <div class="nb-carousel-container" style="height: 420px;">
                    <x-service-issues-carousel
                        id="handoverIssuesCarousel"
                        :images="[
                            [
                                'src' => asset('images/handover-inspection-1.jpeg'),
                                'alt' => 'New Build Handover Inspection - Ceiling Thermal Imaging Defect Detection',
                                'title' => 'New Build Handover Inspection - Ceiling Thermal Imaging Defect Detection'
                            ],
                            [
                                'src' => asset('images/handover-inspection-2.jpeg'),
                                'alt' => 'New Build Handover Inspection - Quality Finishes and Room Inspection',
                                'title' => 'New Build Handover Inspection - Quality Finishes and Room Inspection'
                            ],
                            [
                                'src' => asset('images/new-build-handover.jpg'),
                                'alt' => 'New Build Handover Final Practical Completion Inspection',
                                'title' => 'New Build Handover Final Practical Completion Inspection'
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
    <section class="nb-section" style="padding-top: 0;">
        <div class="nb-container">

            <div class="nb-choose-box">

                <div class="nb-heading-center">
                    <span class="nb-badge">WHY CHOOSE US</span>
                    <h2>WHY CHOOSE US FOR YOUR NEW BUILD HANDOVER INSPECTION?</h2>
                </div>

                <div class="nb-choose-grid">

                    <div class="nb-choose-card">
                        <div class="nb-choose-icon">
                            <i class="bi bi-award-fill"></i>
                        </div>
                        <h4>Licensed and Experienced Inspectors</h4>
                        <p>Our team consists of fully qualified inspectors. With years of experience in Melbourne’s construction industry, we know exactly what to look for.</p>
                    </div>

                    <div class="nb-choose-card">
                        <div class="nb-choose-icon">
                            <i class="bi bi-file-earmark-text-fill"></i>
                        </div>
                        <h4>Comprehensive and Easy-to-Understand Reports</h4>
                        <p>Our detailed yet straightforward reports give you all the information you need to address any issues with your builder, ensuring a smooth handover process.</p>
                    </div>

                    <div class="nb-choose-card">
                        <div class="nb-choose-icon">
                            <i class="bi bi-headset"></i>
                        </div>
                        <h4>Customer Support</h4>
                        <p>Beyond just the inspection, we offer ongoing support to answer any questions you may have and ensure your builder resolves any issues before you move in.</p>
                    </div>

                    <div class="nb-choose-card">
                        <div class="nb-choose-icon">
                            <i class="bi bi-tag-fill"></i>
                        </div>
                        <h4>Affordable Pricing</h4>
                        <p>We offer competitive rates for new build inspections, ensuring that you get excellent value without compromising on quality.</p>
                    </div>

                </div>

            </div>

        </div>
    </section>


    {{-- =====================================================
         6. CHOOSE PACKAGE / ENSURE SAFETY AND COMPLIANCE (PRICING)
    ====================================================== --}}
    <section class="nb-section">
        <div class="nb-container">

            <div class="nb-heading-center">
                <span class="nb-badge">CHOOSE PACKAGE</span>
                <h2>ENSURE SAFETY AND COMPLIANCE</h2>
            </div>

            <div class="nb-price-grid">

                {{-- CARD 1: 2 BEDROOM --}}
                <div class="nb-price-card">
                    <div>
                        <div class="nb-price-icon">
                            <i class="bi bi-house-door"></i>
                        </div>
                        <h3>2 bed room</h3>

                        <div class="nb-price-amount">$500</div>
                        <div class="nb-price-suffix">+GST /Starting</div>

                        <ul class="nb-price-features">
                            <li><i class="bi bi-check-square-fill"></i> Comprehensive Inspection</li>
                            <li><i class="bi bi-check-square-fill"></i> Report &amp; Consultation</li>
                        </ul>
                    </div>

                    <a href="#quote-form" class="nb-price-btn">
                        GET STARTED
                    </a>
                </div>

                {{-- CARD 2: 3 BEDROOM --}}
                <div class="nb-price-card">
                    <div>
                        <div class="nb-price-icon">
                            <i class="bi bi-house-door"></i>
                        </div>
                        <h3>3 bed room</h3>

                        <div class="nb-price-amount">$550</div>
                        <div class="nb-price-suffix">+GST /Starting</div>

                        <ul class="nb-price-features">
                            <li><i class="bi bi-check-square-fill"></i> Comprehensive Inspection</li>
                            <li><i class="bi bi-check-square-fill"></i> Report &amp; Consultation</li>
                        </ul>
                    </div>

                    <a href="#quote-form" class="nb-price-btn">
                        GET STARTED
                    </a>
                </div>

                {{-- CARD 3: 4 BEDROOM --}}
                <div class="nb-price-card">
                    <div>
                        <div class="nb-price-icon">
                            <i class="bi bi-building"></i>
                        </div>
                        <h3>4 bed room</h3>

                        <div class="nb-price-amount">$600</div>
                        <div class="nb-price-suffix">+GST /Starting</div>

                        <ul class="nb-price-features">
                            <li><i class="bi bi-check-square-fill"></i> Comprehensive Inspection</li>
                            <li><i class="bi bi-check-square-fill"></i> Report &amp; Consultation</li>
                        </ul>
                    </div>

                    <a href="#quote-form" class="nb-price-btn">
                        GET STARTED
                    </a>
                </div>

            </div>

        </div>
    </section>


    {{-- =====================================================
         7. SCHEDULE CTA (ENLARGED)
    ====================================================== --}}
    <section class="nb-cta">
        <div class="nb-container">
            <div class="nb-cta-content">
                <h2>ENSURE YOUR NEW HOME IS PERFECT</h2>

                <p>
                    Buying a new home is a major investment, and our New Build Handover Inspection ensures you’re getting exactly what you’ve paid for. Avoid future problems and unexpected costs by letting our experts provide you with a detailed and professional inspection. Book your inspection today and move into your new home with peace of mind.
                </p>

                <a href="#quote-form" class="nb-btn-green">
                    Schedule your inspection now
                </a>
            </div>
        </div>
    </section>


    {{-- =====================================================
         8. CLIENT FEEDBACK & REVIEWS
    ====================================================== --}}
    <section class="nb-section nb-reviews">
        <div class="nb-container">

            <div class="nb-heading-center">
                <span class="nb-badge">TESTIMONIAL</span>
                <h2>CLIENT FEEDBACK & REVIEWS</h2>
            </div>

            <div class="nb-review-grid">

                <div class="nb-review-card">
                    <div class="nb-review-icon">
                        <i class="bi bi-chat-quote"></i>
                    </div>
                    <p>
                        Very professional and approachable. The property inspection was done thoroughly, and even minor defects were identified. Really appreciate the attention to detail and commitment to the job. Highly recommended for any building inspection.
                    </p>
                    <div class="nb-review-stars">★★★★★</div>
                    <h4>Swathi Tarini</h4>
                </div>

                <div class="nb-review-card">
                    <div class="nb-review-icon">
                        <i class="bi bi-chat-quote"></i>
                    </div>
                    <p>
                        Took generous time to answer all my questions regarding the property's condition and report. Very kind, humble, and helpful. Highly recommended for anyone needing a building and pest inspection
                    </p>
                    <div class="nb-review-stars">★★★★★</div>
                    <h4>Luxmy</h4>
                </div>

                <div class="nb-review-card">
                    <div class="nb-review-icon">
                        <i class="bi bi-chat-quote"></i>
                    </div>
                    <p>
                        Provided an excellent inspection for the property I'm purchasing. All findings were explained clearly, and the report was prepared on the same day. Warm, professional, and efficient. Highly recommended to friends and family.
                    </p>
                    <div class="nb-review-stars">★★★★★</div>
                    <h4>Shaleen De Silva</h4>
                </div>

                <div class="nb-review-card">
                    <div class="nb-review-icon">
                        <i class="bi bi-chat-quote"></i>
                    </div>
                    <p>
                        Extremely helpful and responsive. The building and pest inspection was completed quickly, and the report was delivered exactly as requested. Smooth and professional experience overall— great service!
                    </p>
                    <div class="nb-review-stars">★★★★★</div>
                    <h4>Niresh Wijesiri</h4>
                </div>

                <div class="nb-review-card">
                    <div class="nb-review-icon">
                        <i class="bi bi-chat-quote"></i>
                    </div>
                    <p>
                        Very thorough and professional during my pre-purchase building and pest inspection. Strongly recommended.
                    </p>
                    <div class="nb-review-stars">★★★★★</div>
                    <h4>Max</h4>
                </div>

                <div class="nb-review-card">
                    <div class="nb-review-icon">
                        <i class="bi bi-chat-quote"></i>
                    </div>
                    <p>
                        Amazing experience. Quick replies, prompt actions, and a positive attitude. Would definitely recommend 👏👏👏
                    </p>
                    <div class="nb-review-stars">★★★★★</div>
                    <h4>Heena Bhavsar</h4>
                </div>

            </div>

        </div>
    </section>


    {{-- =====================================================
         9. FAQS (MOST POPULAR QUESTIONS)
    ====================================================== --}}
    <section class="nb-section nb-faqs">
        <div class="nb-container">

            <div class="nb-heading-center">
                <span class="nb-badge">COMMON QUESTIONS</span>
                <h2>MOST POPULAR QUESTIONS</h2>
            </div>

            <div class="nb-faq-grid">

                {{-- Left Column (Questions 1 - 3) --}}
                <div class="nb-faq-col">

                    {{-- FAQ 1 (Active by default) --}}
                    <div class="nb-faq-item active">
                        <button class="nb-faq-question" type="button" onclick="toggleNbFaq(this)">
                            <span>1. What is a New Build Handover Inspection?</span>
                            <i class="bi bi-chevron-down nb-faq-icon"></i>
                        </button>
                        <div class="nb-faq-answer">
                            A New Build Handover Inspection is a thorough review of your newly built property, designed to identify any defects or unfinished work before you take possession. This ensures your builder addresses all issues before final handover.
                        </div>
                    </div>

                    {{-- FAQ 2 --}}
                    <div class="nb-faq-item">
                        <button class="nb-faq-question" type="button" onclick="toggleNbFaq(this)">
                            <span>2. Why do I need a handover inspection?</span>
                            <i class="bi bi-chevron-down nb-faq-icon"></i>
                        </button>
                        <div class="nb-faq-answer">
                            Even new homes can have hidden defects. An independent inspection helps uncover these issues, ensuring your builder rectifies them before you move in. This can save you time, stress, and money in the long run.
                        </div>
                    </div>

                    {{-- FAQ 3 --}}
                    <div class="nb-faq-item">
                        <button class="nb-faq-question" type="button" onclick="toggleNbFaq(this)">
                            <span>3. How much does a new build handover inspection cost?</span>
                            <i class="bi bi-chevron-down nb-faq-icon"></i>
                        </button>
                        <div class="nb-faq-answer">
                            The cost of a new build handover inspection depends on the size and complexity of the property. Our rates start at $500, and we offer transparent pricing with no hidden fees.
                        </div>
                    </div>

                </div>

                {{-- Right Column (Questions 4 - 6) --}}
                <div class="nb-faq-col">

                    {{-- FAQ 4 (Active by default) --}}
                    <div class="nb-faq-item active">
                        <button class="nb-faq-question" type="button" onclick="toggleNbFaq(this)">
                            <span>4. How long does the inspection take, and when will I receive the report?</span>
                            <i class="bi bi-chevron-down nb-faq-icon"></i>
                        </button>
                        <div class="nb-faq-answer">
                            Most inspections take between 2 to 3 hours, depending on the size of the property. You will receive a detailed report within 24 hours of the inspection.
                        </div>
                    </div>

                    {{-- FAQ 5 --}}
                    <div class="nb-faq-item">
                        <button class="nb-faq-question" type="button" onclick="toggleNbFaq(this)">
                            <span>5. What happens if defects are found during the inspection?</span>
                            <i class="bi bi-chevron-down nb-faq-icon"></i>
                        </button>
                        <div class="nb-faq-answer">
                            If defects are found, we’ll list them clearly in the report. You can then present this to your builder, who should fix these issues before the final handover. We offer follow-up inspections to confirm the corrections have been made.
                        </div>
                    </div>

                    {{-- FAQ 6 --}}
                    <div class="nb-faq-item">
                        <button class="nb-faq-question" type="button" onclick="toggleNbFaq(this)">
                            <span>6. What areas do you inspect in a new build handover inspection?</span>
                            <i class="bi bi-chevron-down nb-faq-icon"></i>
                        </button>
                        <div class="nb-faq-answer">
                            We inspect all key areas of your home, including structural integrity, plumbing, electrical systems, doors and windows, flooring, finishes, and fixtures. Our goal is to ensure everything is built and installed correctly.
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section>

</div>

<script>
// Carousel Logic
let currentNbSlide = 0;
const nbSlides = document.querySelectorAll('.nb-carousel-slide');

function showNbSlide(index) {
    if (nbSlides.length === 0) return;
    if (index >= nbSlides.length) currentNbSlide = 0;
    else if (index < 0) currentNbSlide = nbSlides.length - 1;
    else currentNbSlide = index;

    nbSlides.forEach((slide, i) => {
        slide.classList.toggle('active', i === currentNbSlide);
    });
}

function moveNbSlide(step) {
    showNbSlide(currentNbSlide + step);
}

// Auto advance every 5s
setInterval(() => {
    moveNbSlide(1);
}, 5000);

// FAQ Accordion Toggle
function toggleNbFaq(btn) {
    const item = btn.closest('.nb-faq-item');
    const col = item.closest('.nb-faq-col');
    const allInCol = col.querySelectorAll('.nb-faq-item');
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