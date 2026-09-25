{{-- =========================================================
     MAIN FOOTER
========================================================= --}}



{{-- =========================================================
     MAIN FOOTER
========================================================= --}}

<footer class="premium-footer">

    <div class="container">

        <div class="row gy-5">


            {{-- =================================================
                 COMPANY INFORMATION
            ================================================== --}}

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">

                <div class="footer-widget footer-about">


                    <a
                        href="{{ route('home') }}"
                        class="footer-logo-link"
                    >

                        <img
                            src="{{ asset('images/logo.png') }}"
                            alt="Premium Building & Pest Inspection"
                            class="footer-logo"
                        >

                    </a>


                    <p class="footer-description">

                        Premium Building & Pest Inspections provides
                        professional building and pest inspection services
                        to help property buyers, owners and builders make
                        informed decisions.

                    </p>


                    <div class="footer-inspector">

                        <strong>
                            Ronak Gami
                        </strong>

                        <span>
                            Licensed Building Inspector
                        </span>

                    </div>


                    <div class="footer-social">

                        <a
                            href="#"
                            aria-label="Facebook"
                        >
                            <i class="bi bi-facebook"></i>
                        </a>

                        <a
                            href="#"
                            aria-label="Instagram"
                        >
                            <i class="bi bi-instagram"></i>
                        </a>

                        <a
                            href="#"
                            aria-label="LinkedIn"
                        >
                            <i class="bi bi-linkedin"></i>
                        </a>

                    </div>

                </div>

            </div>



            {{-- =================================================
                 QUICK LINKS
            ================================================== --}}

            <div class="col-lg-2 col-md-6" data-aos="fade-up" data-aos-delay="200">

                <div class="footer-widget">

                    <h4>
                        Quick Links
                    </h4>


                    <ul class="footer-links">

                        <li>
                            <a href="{{ route('home') }}">
                                <i class="bi bi-chevron-right"></i>
                                Home
                            </a>
                        </li>


                        <li>
                            <a href="{{ route('about') }}">
                                <i class="bi bi-chevron-right"></i>
                                About Us
                            </a>
                        </li>


                        <li>
                            <a href="{{ route('services.index') }}">
                                <i class="bi bi-chevron-right"></i>
                                Our Services
                            </a>
                        </li>


                        <li>
                            <a href="{{ route('gallery.index') }}">
                                <i class="bi bi-chevron-right"></i>
                                Gallery
                            </a>
                        </li>


                        <li>
                            <a href="{{ route('blog.index') }}">
                                <i class="bi bi-chevron-right"></i>
                                Blog
                            </a>
                        </li>


                        <li>
                            <a href="{{ route('contact') }}">
                                <i class="bi bi-chevron-right"></i>
                                Contact Us
                            </a>
                        </li>

                    </ul>

                </div>

            </div>



            {{-- =================================================
                 SERVICES
            ================================================== --}}

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">

                <div class="footer-widget">

                    <h4>
                        Our Services
                    </h4>


                    <ul class="footer-links">


                        <li>
                            <a
                                href="{{ route('services.pre-purchase') }}"
                            >
                                <i class="bi bi-chevron-right"></i>
                                Pre-Purchase Building & Pest
                            </a>
                        </li>


                        <li>
                            <a
                                href="{{ route('services.building-stage') }}"
                            >
                                <i class="bi bi-chevron-right"></i>
                                Stage by Stage Inspection
                            </a>
                        </li>


                        <li>
                            <a
                                href="{{ route('services.apartment') }}"
                            >
                                <i class="bi bi-chevron-right"></i>
                                Apartment Building Inspection
                            </a>
                        </li>


                        <li>
                            <a
                                href="{{ route('services.rising-damp') }}"
                            >
                                <i class="bi bi-chevron-right"></i>
                                Rising Damp Inspection
                            </a>
                        </li>


                        <li>
                            <a
                                href="{{ route('services.pool-barrier') }}"
                            >
                                <i class="bi bi-chevron-right"></i>
                                Pool Barrier Inspection
                            </a>
                        </li>


                        <li>
                            <a
                                href="{{ route('services.dilapidation') }}"
                            >
                                <i class="bi bi-chevron-right"></i>
                                Dilapidation Inspection
                            </a>
                        </li>


                        <li>
                            <a
                                href="{{ route('services.new-build-handover') }}"
                            >
                                <i class="bi bi-chevron-right"></i>
                                New Build Handover
                            </a>
                        </li>


                        <li>
                            <a
                                href="{{ route('services.vendor') }}"
                            >
                                <i class="bi bi-chevron-right"></i>
                                Vendor Inspection
                            </a>
                        </li>


                        <li>
                            <a
                                href="{{ route('services.builders-warranty') }}"
                            >
                                <i class="bi bi-chevron-right"></i>
                                Builders Warranty Inspection
                            </a>
                        </li>

                    </ul>

                </div>

            </div>



            {{-- =================================================
                 CONTACT INFORMATION
            ================================================== --}}

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">

                <div class="footer-widget">

                    <h4>
                        Contact Us
                    </h4>


                    {{-- Address --}}

                    <div class="footer-contact-item">

                        <div class="footer-contact-icon">

                            <i class="bi bi-geo-alt"></i>

                        </div>


                        <div class="footer-contact-text">

                            <span>
                                Address
                            </span>

                            <p>
                                37 Burlina Boulevard,<br>
                                Clyde North VIC 3978,<br>
                                Australia
                            </p>

                        </div>

                    </div>



                    {{-- Phone --}}

                    <div class="footer-contact-item">

                        <div class="footer-contact-icon">

                            <i class="bi bi-telephone"></i>

                        </div>


                        <div class="footer-contact-text">

                            <span>
                                Phone
                            </span>

                            <a href="tel:0466001551">
                                0466 001 551
                            </a>

                        </div>

                    </div>



                    {{-- Email --}}

                    <div class="footer-contact-item">

                        <div class="footer-contact-icon">

                            <i class="bi bi-envelope"></i>

                        </div>


                        <div class="footer-contact-text">

                            <span>
                                Email
                            </span>

                            <a
                                href="mailto:info@premiumbuildinginspections.com.au"
                            >
                                info@premiumbuildinginspections.com.au
                            </a>

                        </div>

                    </div>



                    {{-- Service Area --}}

                    <div class="footer-contact-item">

                        <div class="footer-contact-icon">

                            <i class="bi bi-map"></i>

                        </div>


                        <div class="footer-contact-text">

                            <span>
                                Service Area
                            </span>

                            <p>
                                Melbourne & Victoria
                            </p>

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

                        © {{ date('Y') }}

                        <strong>
                            Premium Building & Pest Inspections
                        </strong>

                        . All Rights Reserved.

                    </p>

                </div>


                <div class="footer-bottom-links">

                    <a href="#">
                        Privacy Policy
                    </a>

                    <span>|</span>

                    <a href="#">
                        Terms & Conditions
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
   FOOTER CTA
========================================================= */

.footer-cta-section {
    background: #123F67;
    padding: 60px 0;
}

.footer-cta-wrapper {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 40px;
}

.footer-cta-label {
    color: #FF6B00;
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 2px;
    display: inline-block;
    margin-bottom: 10px;
}

.footer-cta-content h2 {
    color: #fff;
    font-family: 'Montserrat', sans-serif;
    font-size: 36px;
    font-weight: 700;
    margin: 0 0 12px;
}

.footer-cta-content p {
    color: rgba(255,255,255,.78);
    font-size: 15px;
    margin: 0;
    max-width: 650px;
}

.footer-cta-button {
    display: inline-flex;
    align-items: center;
    gap: 10px;

    background: #FF6B00;
    color: #fff;

    padding: 15px 28px;

    border-radius: 4px;
    border: 2px solid #FF6B00;

    font-family: 'Montserrat', sans-serif;
    font-size: 14px;
    font-weight: 700;

    white-space: nowrap;
    text-decoration: none;
}

.footer-cta-button:hover {
    background: #fff;
    color: #0B1F3A;
    border-color: #fff;
}


/* =========================================================
   MAIN FOOTER
========================================================= */

.premium-footer {
    background: #0B1F3A;
    color: #fff;
    padding-top: 65px;
}

.footer-widget {
    height: 100%;
}

.footer-widget h4 {
    color: #fff;
    font-family: 'Montserrat', sans-serif;
    font-size: 18.5px;
    font-weight: 700;
    margin-bottom: 25px;
    padding-bottom: 13px;
    position: relative;
}

.footer-widget h4::after {
    content: "";

    position: absolute;
    left: 0;
    bottom: 0;

    width: 42px;
    height: 3px;

    background: #43A900;
}


/* =========================================================
   LOGO
========================================================= */

.footer-logo-link {
    display: inline-block;
    background: transparent !important;
    padding: 0 !important;
    border: none !important;
    box-shadow: none !important;
    margin-bottom: 22px;
    transition: all .25s ease;
    text-decoration: none;
}

.footer-logo-link:hover {
    transform: translateY(-2px);
    opacity: .85;
}

.footer-logo {
    height: 82px;
    width: auto;
    max-width: 100%;
    object-fit: contain;
    display: block;
    filter: brightness(0) invert(1);
    transition: all .25s ease;
}


/* =========================================================
   DESCRIPTION
========================================================= */

.footer-description {
    color: rgba(255,255,255,.75);
    font-size: 13.5px;
    line-height: 1.7;
    margin-bottom: 18px;
    max-width: 360px;
}


/* =========================================================
   INSPECTOR
========================================================= */

.footer-inspector {
    border-left: 3px solid #43A900;
    padding-left: 13px;
    margin: 20px 0;
}

.footer-inspector strong {
    display: block;
    color: #fff;
    font-family: 'Montserrat', sans-serif;
    font-size: 15px;
    margin-bottom: 3px;
}

.footer-inspector span {
    color: rgba(255,255,255,.65);
    font-size: 12.5px;
}


/* =========================================================
   SOCIAL
========================================================= */

.footer-social {
    display: flex;
    align-items: center;
    gap: 10px;
}

.footer-social a {
    width: 36px;
    height: 36px;

    display: flex;
    align-items: center;
    justify-content: center;

    border: 1px solid rgba(255,255,255,.2);

    color: #fff;
    font-size: 14px;

    transition: all .3s ease;
}

.footer-social a:hover {
    background: #43A900;
    border-color: #43A900;
    color: #fff;
    transform: translateY(-3px);
}


/* =========================================================
   FOOTER LINKS
========================================================= */

.footer-links {
    padding: 0;
    margin: 0;
    list-style: none;
}

.footer-links li {
    margin-bottom: 10px;
}

.footer-links a {
    color: rgba(255,255,255,.72);
    font-size: 13.5px;

    display: flex;
    align-items: flex-start;

    line-height: 1.5;

    transition: all .3s ease;

    text-decoration: none;
}

.footer-links a i {
    color: #43A900;
    font-size: 11px;
    margin-right: 9px;
    margin-top: 5px;
}

.footer-links a:hover {
    color: #43A900;
    padding-left: 4px;
}


/* =========================================================
   CONTACT
========================================================= */

.footer-contact-item {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    margin-bottom: 19px;
}

.footer-contact-icon {
    width: 36px;
    min-width: 36px;
    height: 36px;

    background: #43A900;
    color: #fff;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 14px;
}

.footer-contact-text span {
    display: block;

    color: #fff;

    font-family: 'Montserrat', sans-serif;
    font-size: 13.5px;
    font-weight: 600;

    margin-bottom: 3px;
}

.footer-contact-text p {
    color: rgba(255,255,255,.72);
    font-size: 13px;
    line-height: 1.6;
    margin: 0;
}

.footer-contact-text a {
    color: rgba(255,255,255,.75);
    font-size: 13px;
    word-break: break-word;
    text-decoration: none;
}

.footer-contact-text a:hover {
    color: #43A900;
}


/* =========================================================
   FOOTER BOTTOM
========================================================= */

.footer-bottom {
    margin-top: 50px;
    background: #07162A;
    padding: 18px 0;
}

.footer-bottom-wrapper {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
}

.footer-copyright p {
    color: rgba(255,255,255,.65);
    font-size: 12.5px;
    margin: 0;
}

.footer-copyright strong {
    color: rgba(255,255,255,.9);
    font-weight: 600;
}

.footer-bottom-links {
    display: flex;
    align-items: center;
    gap: 12px;
}

.footer-bottom-links a {
    color: rgba(255,255,255,.65);
    font-size: 12.5px;
    text-decoration: none;
}

.footer-bottom-links a:hover {
    color: #43A900;
}

.footer-bottom-links span {
    color: rgba(255,255,255,.35);
}


/* =========================================================
   TABLET
========================================================= */

@media (max-width: 991px) {

    .footer-cta-section {
        padding: 50px 0;
    }

    .footer-cta-content h2 {
        font-size: 30px;
    }

    .premium-footer {
        padding-top: 55px;
    }
}


/* =========================================================
   MOBILE
========================================================= */

@media (max-width: 767px) {

    .footer-cta-wrapper {
        display: block;
    }

    .footer-cta-content h2 {
        font-size: 27px;
    }

    .footer-cta-content p {
        font-size: 14px;
    }

    .footer-cta-action {
        margin-top: 25px;
    }

    .footer-cta-button {
        padding: 13px 23px;
    }

    .premium-footer {
        padding-top: 50px;
    }

    .footer-logo {
        height: 70px;
        width: auto;
    }

    .footer-bottom {
        margin-top: 40px;
    }

    .footer-bottom-wrapper {
        display: block;
        text-align: center;
    }

    .footer-bottom-links {
        justify-content: center;
        margin-top: 10px;
    }
}


/* =========================================================
   VERY SMALL MOBILE
========================================================= */

@media (max-width: 400px) {

    .footer-cta-content h2 {
        font-size: 24px;
    }

    .footer-logo {
        height: 58px;
        width: auto;
    }

    .footer-bottom-links {
        flex-wrap: wrap;
    }
}

</style>