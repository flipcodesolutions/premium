@extends('layouts.app')

@section('title', 'Privacy Policy | Premium Building & Pest Inspections')
@section('meta_description', 'Privacy Policy for Premium Building & Pest Inspections. Learn how we collect, handle, and protect your personal information in compliance with Australian privacy laws.')

@section('content')

<div class="privacy-policy-page">
    <div class="container privacy-container">

        {{-- Main Page Title --}}
        <h1 class="privacy-main-heading">
            PRIVACY POLICY
        </h1>

        <div class="privacy-content-card">

            <p class="privacy-intro">
                <strong>Premium Building Inspections</strong> respects your privacy and is committed to protecting your personal information. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you use our services, including building, pest, and property inspections, as well as interactions with our website: <a href="{{ route('home') }}" class="privacy-link">premiumbuildinginspections.com.au</a>.
            </p>

            {{-- 1. PERSONAL INFORMATION WE COLLECT --}}
            <div class="privacy-section">
                <h2>1. PERSONAL INFORMATION WE COLLECT</h2>
                <p>We may collect the following personal information:</p>
                <ul class="privacy-list">
                    <li>
                        <strong>Contact details:</strong> Name, email address, phone number
                    </li>
                    <li>
                        <strong>Property details:</strong> Address, type, and size of property
                    </li>
                    <li>
                        <strong>Inspection information:</strong> Type of inspection (e.g., pre-purchase, dilapidation, pool barrier, warranty), inspection date and time
                    </li>
                    <li>
                        <strong>Payment details:</strong> Payment method, billing information
                    </li>
                    <li>
                        <strong>Website usage data:</strong> IP address, browser type, device information, cookies, and analytics data
                    </li>
                </ul>
            </div>

            {{-- 2. HOW WE COLLECT INFORMATION --}}
            <div class="privacy-section">
                <h2>2. HOW WE COLLECT INFORMATION</h2>
                <p>We collect personal information:</p>
                <ul class="privacy-list">
                    <li>
                        <strong>Directly from you</strong> when you:
                        <ul class="privacy-sublist">
                            <li>Book or request an inspection</li>
                            <li>Contact us via phone, email, or website forms</li>
                            <li>Provide details during in-person inspections</li>
                        </ul>
                    </li>
                    <li>
                        <strong>Automatically via our website:</strong>
                        <ul class="privacy-sublist">
                            <li>Through cookies, analytics tools, and tracking technologies to improve site functionality and user experience</li>
                        </ul>
                    </li>
                </ul>
            </div>

            {{-- 3. HOW WE USE YOUR INFORMATION --}}
            <div class="privacy-section">
                <h2>3. HOW WE USE YOUR INFORMATION</h2>
                <p>We use your personal information to:</p>
                <ul class="privacy-list">
                    <li>Schedule and provide inspections (building, pest, property)</li>
                    <li>Prepare and deliver inspection reports</li>
                    <li>Communicate with you regarding bookings, inspections, or follow-ups</li>
                    <li>Process payments and invoices</li>
                    <li>Maintain and improve our website and services</li>
                    <li>Comply with legal and regulatory obligations</li>
                </ul>
            </div>

            {{-- 4. DISCLOSURE OF YOUR INFORMATION --}}
            <div class="privacy-section">
                <h2>4. DISCLOSURE OF YOUR INFORMATION</h2>
                <p>We may disclose personal information to:</p>
                <ul class="privacy-list">
                    <li>
                        <strong>Third-party inspectors or contractors</strong> performing inspections on our behalf
                    </li>
                    <li>
                        <strong>Payment processors</strong> for billing purposes
                    </li>
                    <li>
                        <strong>Regulatory authorities</strong> when required by law
                    </li>
                    <li>
                        <strong>Other third parties</strong> only with your consent
                    </li>
                </ul>
                <p>
                    All third parties are required to handle personal information securely and in accordance with privacy laws.
                </p>
            </div>

            {{-- 5. DATA SECURITY --}}
            <div class="privacy-section">
                <h2>5. DATA SECURITY</h2>
                <p>We implement reasonable measures to protect your personal information, including:</p>
                <ul class="privacy-list">
                    <li>Secure storage and encrypted electronic records</li>
                    <li>Restricted access to authorized staff and contractors only</li>
                    <li>Regular review of security procedures</li>
                </ul>
            </div>

            {{-- 6. DATA RETENTION --}}
            <div class="privacy-section">
                <h2>6. DATA RETENTION</h2>
                <p>
                    We retain personal information only as long as necessary to fulfill the purposes described, meet legal obligations, or resolve disputes. Information no longer required is securely deleted or anonymized.
                </p>
            </div>

            {{-- 7. ACCESS AND CORRECTION --}}
            <div class="privacy-section">
                <h2>7. ACCESS AND CORRECTION</h2>
                <p>
                    You have the right to access your personal information or request corrections. Verification of identity may be required before making updates. Contact us using the details below.
                </p>
            </div>

            {{-- 8. COOKIES AND TRACKING --}}
            <div class="privacy-section">
                <h2>8. COOKIES AND TRACKING</h2>
                <p>Our website uses cookies and similar technologies to:</p>
                <ul class="privacy-list">
                    <li>Analyze user activity and website performance</li>
                    <li>Improve functionality and user experience</li>
                    <li>Remember preferences</li>
                </ul>
                <p>
                    You can manage cookies through your browser settings; however, disabling cookies may limit some website features.
                </p>
            </div>

            {{-- 9. MARKETING COMMUNICATIONS --}}
            <div class="privacy-section">
                <h2>9. MARKETING COMMUNICATIONS</h2>
                <p>
                    We may send marketing emails regarding our services if you opt-in. You can unsubscribe at any time via the “unsubscribe” link or by contacting us directly.
                </p>
            </div>

            {{-- 10. CHANGES TO THIS PRIVACY POLICY --}}
            <div class="privacy-section">
                <h2>10. CHANGES TO THIS PRIVACY POLICY</h2>
                <p>
                    We may update this Privacy Policy to reflect changes in our services, legal requirements, or business practices. Updates will be posted on our website with the <strong>Effective Date</strong> updated.
                </p>
            </div>

            {{-- 11. CONTACT US --}}
            <div class="privacy-section privacy-contact-section">
                <h2>11. CONTACT US</h2>
                <p>
                    For questions about this Privacy Policy, or to access, correct, or delete your personal information, contact us at:
                </p>
                <div class="privacy-contact-card">
                    <p class="mb-1"><strong>Premium Building Inspections</strong></p>
                    <p class="mb-1">Phone: <a href="tel:0466001551" class="privacy-link">0466 001 551</a></p>
                    <p class="mb-0">Address: 37 Burlina Boulevard, Clyde North VIC 3978, Australia</p>
                </div>
            </div>

        </div>

    </div>
</div>

<style>
.privacy-policy-page {
    background-color: #ffffff;
    padding: 60px 0 90px;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    color: #1a1a1a;
}

.privacy-container {
    max-width: 1140px;
}

.privacy-main-heading {
    font-size: 34px;
    font-weight: 800;
    color: #071f38;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 28px;
    font-family: 'Inter', sans-serif;
}

.privacy-content-card {
    background: #ffffff;
}

.privacy-intro {
    font-size: 15.5px;
    line-height: 1.75;
    color: #2b2b2b;
    margin-bottom: 30px;
}

.privacy-section {
    margin-bottom: 28px;
}

.privacy-section h2 {
    font-size: 18px;
    font-weight: 700;
    color: #071f38;
    text-transform: uppercase;
    margin-top: 0;
    margin-bottom: 12px;
    font-family: 'Inter', sans-serif;
    letter-spacing: 0.2px;
}

.privacy-section p {
    font-size: 15px;
    line-height: 1.75;
    color: #333333;
    margin-bottom: 12px;
}

.privacy-list {
    list-style-type: disc;
    padding-left: 24px;
    margin-bottom: 16px;
}

.privacy-list > li {
    font-size: 15px;
    line-height: 1.7;
    color: #333333;
    margin-bottom: 8px;
}

.privacy-list strong {
    color: #111111;
    font-weight: 700;
}

.privacy-sublist {
    list-style-type: circle;
    padding-left: 22px;
    margin-top: 6px;
    margin-bottom: 6px;
}

.privacy-sublist > li {
    font-size: 14.5px;
    line-height: 1.65;
    color: #444444;
    margin-bottom: 5px;
}

.privacy-link {
    color: #0d6efd;
    text-decoration: underline;
    transition: color 0.2s ease;
}

.privacy-link:hover {
    color: #0a58ca;
    text-decoration: underline;
}

.privacy-contact-card {
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    border-left: 4px solid var(--premium-green, #42a900);
    padding: 16px 20px;
    border-radius: 6px;
    margin-top: 14px;
    display: inline-block;
    min-width: 320px;
}

.privacy-contact-card p {
    font-size: 15px;
    line-height: 1.6;
    color: #333333;
}

@media (max-width: 767px) {
    .privacy-policy-page {
        padding: 40px 0 60px;
    }

    .privacy-main-heading {
        font-size: 26px;
        margin-bottom: 20px;
    }

    .privacy-section h2 {
        font-size: 16px;
    }

    .privacy-intro,
    .privacy-section p,
    .privacy-list > li {
        font-size: 14px;
    }

    .privacy-contact-card {
        min-width: 100%;
    }
}
</style>

@endsection
