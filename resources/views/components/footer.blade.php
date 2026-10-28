{{-- =========================================================
     MAIN FOOTER
========================================================= --}}

<footer class="premium-footer">

    <div class="container">

        <div class="row gy-5">

            {{-- =================================================
                 COLUMN 1: BRAND & ABOUT
            ================================================== --}}
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">

                <div class="footer-widget footer-about">

                    <a href="{{ route('home') }}" class="footer-logo-link">
                        <img
                            src="{{ asset('images/logo.png') }}"
                            alt="Premium Building &amp; Pest Inspection"
                            class="footer-logo"
                        >
                    </a>

                    <p class="footer-description">
                        Premium Building &amp; Pest Inspections - Your trusted partner for comprehensive and reliable property evaluations. Contact us today for peace of mind and expert service.
                    </p>

                    <div class="footer-social">
                        <a
                            href="https://www.facebook.com/people/Premium-Building-Pest-Inspections/61554166887114/"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="Facebook"
                        >
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a
                            href="https://www.instagram.com/bpibuildingpestinspection"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="Instagram"
                        >
                            <i class="bi bi-instagram"></i>
                        </a>
                    </div>

                </div>

            </div>


            {{-- =================================================
                 COLUMN 2: SERVICES
            ================================================== --}}
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">

                <div class="footer-widget">

                    <h4 class="footer-title">
                        SERVICES
                    </h4>

                    <ul class="footer-links">
                        <li>
                            <a href="{{ route('services.pre-purchase') }}">
                                Pre-Purchase Building and Pest Inspections
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('services.building-stage') }}">
                                Building Stage-by-Stage Inspection
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('services.pool-barrier') }}">
                                Pool Barrier Inspection
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('services.apartment') }}">
                                Apartment Building Inspections
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('services.rising-damp') }}">
                                Rising Damp Inspection
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('services.dilapidation') }}">
                                Dilapidation Inspection
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('services.new-build-handover') }}">
                                New Build Handover Inspection
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('services.vendor') }}">
                                Vendor Inspections
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('services.builders-warranty') }}">
                                Builders Warranty Inspection
                            </a>
                        </li>
                    </ul>

                </div>

            </div>


            {{-- =================================================
                 COLUMN 3: COMPANY
            ================================================== --}}
            <div class="col-lg-2 col-md-6" data-aos="fade-up" data-aos-delay="300">

                <div class="footer-widget">

                    <h4 class="footer-title">
                        COMPANY
                    </h4>

                    <ul class="footer-links">
                        <li>
                            <a href="{{ route('home') }}">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('about') }}">
                                About us
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('services.index') }}">
                                Our Services
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('contact') }}">
                                Contact Us
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('gallery.index') }}">
                                Gallery
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('blog.index') }}">
                                Blogs
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('privacy-policy') }}">
                                Privacy Policy
                            </a>
                        </li>
                    </ul>

                </div>

            </div>


            {{-- =================================================
                 COLUMN 4: MAP & CONTACT
            ================================================== --}}
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">

                <div class="footer-widget">

                    {{-- Map Embed at Top of Column 4 --}}
                    <div class="footer-map-container">
                        <iframe
                            src="https://maps.google.com/maps?q=37%20Burlina%20Boulevard%2C%20Clyde%20North%20VIC%203978%2C%20Australia&t=m&z=10&output=embed&iwloc=near"
                            width="100%"
                            height="180"
                            style="border:0;"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"
                            title="37 Burlina Boulevard, Clyde North VIC 3978, Australia"
                            aria-label="37 Burlina Boulevard, Clyde North VIC 3978, Australia"
                        ></iframe>
                    </div>

                    {{-- Contact Items below Map --}}
                    <div class="footer-contact-list">

                        {{-- Company Name --}}
                        <div class="footer-contact-row">
                            <div class="footer-contact-badge">
                                <i class="bi bi-briefcase-fill"></i>
                            </div>
                            <div class="footer-contact-info">
                                <p>Premium Building &amp; Pest Inspections</p>
                            </div>
                        </div>

                        {{-- Address --}}
                        <div class="footer-contact-row">
                            <div class="footer-contact-badge">
                                <i class="bi bi-geo-alt-fill"></i>
                            </div>
                            <div class="footer-contact-info">
                                <p>37 Burlina Boulevard, Clyde North VIC 3978, Australia</p>
                            </div>
                        </div>

                        {{-- Phone --}}
                        <div class="footer-contact-row">
                            <div class="footer-contact-badge">
                                <i class="bi bi-telephone-fill"></i>
                            </div>
                            <div class="footer-contact-info">
                                <a href="tel:0466001551">0466 001 551</a>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- =========================================================
         FOOTER BOTTOM
    ========================================================== --}}
    <div class="footer-bottom">
        <div class="container">
            <div class="footer-bottom-wrapper">
                <div class="footer-copyright">
                    <p>
                        © {{ date('Y') }} <strong>Premium Building &amp; Pest Inspections</strong>. All Rights Reserved.
                    </p>
                </div>
                <div class="footer-bottom-links">
                    <a href="{{ route('privacy-policy') }}">
                        Privacy Policy
                    </a>
                </div>
            </div>
        </div>
    </div>

</footer>


{{-- =========================================================
     FOOTER CSS
========================================================= --}}
<style>
/* =========================================================
   MAIN FOOTER CONTAINER & BACKGROUND OVERLAY
========================================================= */

.premium-footer {
    background-color: #063464;
    background-image: linear-gradient(rgba(6, 52, 100, 0.92), rgba(6, 52, 100, 0.92)), url('{{ asset('images/footer-bg.jpeg') }}');
    background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;
    color: #ffffff;
    padding-top: 65px;
    position: relative;
}

.footer-widget {
    height: 100%;
}

.footer-title {
    color: #ffffff;
    font-family: 'Inter', sans-serif;
    font-size: 19px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 22px;
}

/* =========================================================
   LOGO & DESCRIPTION
========================================================= */

.footer-logo-link {
    display: inline-block;
    background: transparent !important;
    padding: 0 !important;
    border: none !important;
    box-shadow: none !important;
    margin-bottom: 20px;
    transition: all .25s ease;
    text-decoration: none;
}

.footer-logo-link:hover {
    transform: translateY(-2px);
    opacity: .88;
}

.footer-logo {
    height: 78px;
    width: auto;
    max-width: 100%;
    object-fit: contain;
    display: block;
    filter: brightness(0) invert(1);
    transition: all .25s ease;
}

.footer-description {
    color: #ffffff;
    font-size: 14.5px;
    line-height: 1.65;
    margin-bottom: 24px;
    max-width: 320px;
}

/* =========================================================
   ROUND GREEN SOCIAL ICONS
========================================================= */

.footer-social {
    display: flex;
    align-items: center;
    gap: 12px;
}

.footer-social a {
    width: 38px;
    height: 38px;
    border-radius: 50%;
    background-color: #499B08;
    color: #ffffff;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 15px;
    text-decoration: none;
    border: none;
    transition: all .3s ease;
    box-shadow: 0 4px 10px rgba(73, 155, 8, 0.3);
}

.footer-social a:hover {
    background-color: #3d8206;
    color: #ffffff;
    transform: translateY(-3px) scale(1.08);
    box-shadow: 0 6px 16px rgba(73, 155, 8, 0.5);
}

/* =========================================================
   FOOTER TEXT LINKS
========================================================= */

.footer-links {
    padding: 0;
    margin: 0;
    list-style: none;
}

.footer-links li {
    margin-bottom: 11px;
}

.footer-links a {
    color: rgba(255, 255, 255, 0.88);
    font-size: 14px;
    line-height: 1.5;
    text-decoration: none;
    display: inline-block;
    transition: all .25s ease;
}

.footer-links a:hover {
    color: #499B08;
    transform: translateX(4px);
}

/* =========================================================
   MAP & CONTACT LIST (COLUMN 4)
========================================================= */

.footer-map-container {
    position: relative;
    width: 100%;
    height: 180px;
    border-radius: 8px;
    overflow: hidden;
    background: #031b33;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.25);
    margin-bottom: 20px;
}

.footer-map-container iframe {
    width: 100%;
    height: 100%;
    border: 0;
    display: block;
}

.footer-contact-list {
    display: flex;
    flex-direction: column;
    gap: 14px;
}

.footer-contact-row {
    display: flex;
    align-items: center;
    gap: 14px;
}

.footer-contact-badge {
    width: 38px;
    min-width: 38px;
    height: 38px;
    background-color: #499B08;
    color: #ffffff;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
    flex-shrink: 0;
    transition: transform 0.25s ease, background-color 0.25s ease;
}

.footer-contact-row:hover .footer-contact-badge {
    transform: scale(1.06);
    background-color: #3d8206;
}

.footer-contact-info p {
    color: #ffffff;
    font-size: 13.5px;
    line-height: 1.45;
    margin: 0;
    font-weight: 500;
}

.footer-contact-info a {
    color: #ffffff;
    font-size: 14px;
    font-weight: 600;
    text-decoration: none;
    transition: color 0.2s ease;
}

.footer-contact-info a:hover {
    color: #499B08;
}

/* =========================================================
   FOOTER BOTTOM
========================================================= */

.footer-bottom {
    margin-top: 55px;
    background: rgba(3, 22, 43, 0.85);
    border-top: 1px solid rgba(255, 255, 255, 0.08);
    padding: 18px 0;
}

.footer-bottom-wrapper {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
}

.footer-copyright p {
    color: rgba(255, 255, 255, 0.7);
    font-size: 13px;
    margin: 0;
}

.footer-copyright strong {
    color: #ffffff;
    font-weight: 600;
}

.footer-bottom-links {
    display: flex;
    align-items: center;
    gap: 12px;
}

.footer-bottom-links a {
    color: rgba(255, 255, 255, 0.7);
    font-size: 13px;
    text-decoration: none;
}

.footer-bottom-links a:hover {
    color: #499B08;
}

/* =========================================================
   RESPONSIVE (MOBILE & TABLET)
========================================================= */

@media (max-width: 991px) {
    .premium-footer {
        padding-top: 50px;
    }

    .footer-description {
        max-width: 100%;
    }
}

@media (max-width: 767px) {
    .premium-footer {
        padding-top: 45px;
    }

    .footer-logo {
        height: 65px;
    }

    .footer-map-container {
        height: 190px;
    }

    .footer-bottom {
        margin-top: 35px;
    }

    .footer-bottom-wrapper {
        flex-direction: column;
        text-align: center;
        gap: 10px;
    }

    .footer-bottom-links {
        justify-content: center;
    }
}
</style>