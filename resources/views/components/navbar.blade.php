<!-- =========================================================
     TOP CONTACT BAR
========================================================= -->

<div class="top-contact-bar">

    <div class="container">

        <div class="top-contact-inner">

            <!-- EMAIL - LEFT -->

            <div class="top-contact-email">

                <a href="mailto:info@premiumbuildinginspections.com.au">

                    <i class="bi bi-envelope-fill"></i>

                    <span>
                        info@premiumbuildinginspections.com.au
                    </span>

                </a>

            </div>


            <!-- PHONE - RIGHT -->

            <div class="top-contact-phone">

                <a href="tel:0466001551">

                    <i class="bi bi-telephone-fill"></i>

                    <span>
                        0466 001 551
                    </span>

                </a>

            </div>

        </div>

    </div>

</div>



<!-- =========================================================
     MAIN NAVBAR
========================================================= -->

<nav class="navbar navbar-expand-lg premium-navbar">

    <div class="container">


        <!-- =================================================
             LOGO
        ================================================== -->

        <a
            class="navbar-brand premium-logo"
            href="{{ route('home') }}"
        >

            <img
                src="{{ asset('images/logo.png') }}"
                alt="Premium Building & Pest Inspections"
            >

        </a>



        <!-- =================================================
             MOBILE TOGGLE
        ================================================== -->

        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#premiumNavbar"
            aria-controls="premiumNavbar"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >

            <span class="navbar-toggler-icon"></span>

        </button>



        <!-- =================================================
             NAVIGATION
        ================================================== -->

        <div
            class="collapse navbar-collapse"
            id="premiumNavbar"
        >

            <ul class="navbar-nav ms-auto align-items-lg-center">


                <!-- =================================================
                     HOME
                ================================================== -->

                <li class="nav-item">

                    <a
                        class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                        href="{{ route('home') }}"
                    >
                        Home
                    </a>

                </li>



                <!-- =================================================
                     ABOUT US
                ================================================== -->

                <li class="nav-item">

                    <a
                        class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}"
                        href="{{ route('about') }}"
                    >
                        About Us
                    </a>

                </li>



                <!-- =================================================
                     OUR SERVICES
                     
                     TEXT CLICK
                     -> SERVICES PAGE

                     ARROW CLICK
                     -> DROPDOWN
                ================================================== -->

                <li class="nav-item services-nav-item">

                    <div class="services-nav-wrapper">

                        <!-- MAIN SERVICES LINK -->

                        <a
                            class="nav-link services-main-link
                            {{ request()->routeIs('services.*') ? 'active' : '' }}"
                            href="{{ route('services.index') }}"
                        >
                            Our Services
                        </a>


                        <!-- DROPDOWN ARROW -->

                        <button
                            type="button"
                            class="services-dropdown-btn"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                            aria-label="Open Services Menu"
                        >

                            <i class="bi bi-chevron-down"></i>

                        </button>


                        <!-- =================================================
                             SERVICES DROPDOWN
                        ================================================== -->

                        <ul class="dropdown-menu premium-services-menu">


                            <!-- 01 PRE-PURCHASE -->

                            <li>

                                <a
                                    class="dropdown-item"
                                    href="{{ route('services.pre-purchase') }}"
                                >

                                    <i class="bi bi-house-check"></i>

                                    <span>
                                        Pre-Purchase Building & Pest Inspection
                                    </span>

                                </a>

                            </li>



                            <!-- 02 BUILDING STAGE -->

                            <li>

                                <a
                                    class="dropdown-item"
                                    href="{{ route('services.building-stage') }}"
                                >

                                    <i class="bi bi-building"></i>

                                    <span>
                                        Building Stage by Stage Inspection
                                    </span>

                                </a>

                            </li>



                            <!-- 03 APARTMENT -->

                            <li>

                                <a
                                    class="dropdown-item"
                                    href="{{ route('services.apartment') }}"
                                >

                                    <i class="bi bi-buildings"></i>

                                    <span>
                                        Apartment Building Inspection
                                    </span>

                                </a>

                            </li>



                            <!-- 04 RISING DAMP -->

                            <li>

                                <a
                                    class="dropdown-item"
                                    href="{{ route('services.rising-damp') }}"
                                >

                                    <i class="bi bi-droplet-half"></i>

                                    <span>
                                        Rising Damp Inspection
                                    </span>

                                </a>

                            </li>



                            <!-- 05 POOL BARRIER -->

                            <li>

                                <a
                                    class="dropdown-item"
                                    href="{{ route('services.pool-barrier') }}"
                                >

                                    <i class="bi bi-water"></i>

                                    <span>
                                        Pool Barrier Inspection
                                    </span>

                                </a>

                            </li>



                            <!-- 06 DILAPIDATION -->

                            <li>

                                <a
                                    class="dropdown-item"
                                    href="{{ route('services.dilapidation') }}"
                                >

                                    <i class="bi bi-file-earmark-text"></i>

                                    <span>
                                        Dilapidation Inspection / Report
                                    </span>

                                </a>

                            </li>



                            <!-- 07 NEW BUILD HANDOVER -->

                            <li>

                                <a
                                    class="dropdown-item"
                                    href="{{ route('services.new-build-handover') }}"
                                >

                                    <i class="bi bi-house-check-fill"></i>

                                    <span>
                                        New Build Handover Inspection
                                    </span>

                                </a>

                            </li>



                            <!-- 08 VENDOR -->

                            <li>

                                <a
                                    class="dropdown-item"
                                    href="{{ route('services.vendor') }}"
                                >

                                    <i class="bi bi-person-check"></i>

                                    <span>
                                        Vendor Inspection
                                    </span>

                                </a>

                            </li>



                            <!-- 09 BUILDERS WARRANTY -->

                            <li>

                                <a
                                    class="dropdown-item"
                                    href="{{ route('services.builders-warranty') }}"
                                >

                                    <i class="bi bi-shield-check"></i>

                                    <span>
                                        Builders Warranty Inspection
                                    </span>

                                </a>

                            </li>

                        </ul>

                    </div>

                </li>



                <!-- =================================================
                     CONTACT
                ================================================== -->

                <li class="nav-item">

                    <a
                        class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}"
                        href="{{ route('contact') }}"
                    >
                        Contact Us
                    </a>

                </li>



                <!-- =================================================
                     GALLERY
                ================================================== -->

                <li class="nav-item">

                    <a
                        class="nav-link {{ request()->routeIs('gallery.index') ? 'active' : '' }}"
                        href="{{ route('gallery.index') }}"
                    >
                        Gallery
                    </a>

                </li>






                <!-- =================================================
                     INSPECTION AGREEMENT
                ================================================== -->

                <li class="nav-item">

                    <a
                        class="nav-link {{ request()->routeIs('inspection.agreement') ? 'active' : '' }}"
                        href="{{ route('inspection.agreement') }}"
                    >
                        Inspection Agreement
                    </a>

                </li>



                <!-- =================================================
                     BOOK INSPECTION
                ================================================== -->

                <li class="nav-item">

                    <a
                        class="nav-link {{ request()->routeIs('booking.*') ? 'active' : '' }}"
                        href="{{ route('booking.create') }}"
                        style="color: var(--premium-green); font-weight: 600;"
                    >
                        <i class="bi bi-calendar-check me-1"></i> Book Now
                    </a>

                </li>



                <!-- =================================================
                     GET AN ESTIMATE
                ================================================== -->

                <li class="nav-item estimate-item">

                    <a
                        class="nav-link estimate-btn btn-glow"
                        href="{{ route('contact') }}"
                    >
                        Get an Estimate
                    </a>

                </li>


            </ul>

        </div>

    </div>

</nav>



<!-- =========================================================
     FLOATING GET FREE QUOTE BUTTON
========================================================= -->

<a
    href="{{ route('contact') }}"
    class="floating-quote animate-float"
    aria-label="Get Free Quote"
>

    <span>
        Get Free Quote
    </span>

    <i class="bi bi-arrow-right"></i>

</a>



<!-- =========================================================
     NAVBAR CSS
========================================================= -->

<style>

/* =========================================================
   PREMIUM VARIABLES
========================================================= */

:root {

    --premium-navy: #0B1F3A;

    --premium-blue: #123F67;

    --premium-green: #48A900;

    --premium-green-dark: #398600;

    --premium-orange: #FF6B00;

    --premium-light: #F7F9FB;

}



/* =========================================================
   TOP CONTACT BAR
========================================================= */

.top-contact-bar {

    background: var(--premium-navy);

    color: #fff;

    font-family: 'Poppins', sans-serif;

    font-size: 13px;

}


.top-contact-inner {

    min-height: 38px;

    width: 100%;

    display: flex;

    align-items: center;

    justify-content: space-between;

    gap: 20px;

}



/* =========================================================
   EMAIL
========================================================= */

.top-contact-email {

    display: flex;

    align-items: center;

    justify-content: flex-start;

}


.top-contact-email a {

    display: flex;

    align-items: center;

    color: rgba(255, 255, 255, .88);

    text-decoration: none;

    transition: .2s ease;

}


.top-contact-email a:hover {

    color: #fff;

}


.top-contact-email i {

    color: var(--premium-green);

    margin-right: 6px;

    font-size: 13px;

}


.top-contact-email span {

    line-height: 1;

}



/* =========================================================
   PHONE
========================================================= */

.top-contact-phone {

    display: flex;

    align-items: center;

    justify-content: flex-end;

}


.top-contact-phone a {

    display: flex;

    align-items: center;

    color: rgba(255, 255, 255, .88);

    text-decoration: none;

    transition: .2s ease;

}


.top-contact-phone a:hover {

    color: #fff;

}


.top-contact-phone i {

    color: var(--premium-green);

    margin-right: 6px;

    font-size: 13px;

}


.top-contact-phone span {

    line-height: 1;

}



/* =========================================================
   MAIN NAVBAR
========================================================= */

.premium-navbar {

    background: #fff;

    min-height: 82px;

    padding: 0;

    border-bottom: 1px solid #e9edf1;

    box-shadow: 0 3px 14px rgba(11, 31, 58, .06);

    position: relative;

    z-index: 1000;

}



/* =========================================================
   LOGO
========================================================= */

.premium-logo {

    display: inline-flex;

    align-items: center;

    padding: 6px 0;

    text-decoration: none;

}


.premium-logo img {

    height: 62px;

    width: auto;

    max-width: 100%;

    object-fit: contain;

    display: block;

    transition: transform .25s ease;

}

.premium-logo:hover img {

    transform: scale(1.02);

}



/* =========================================================
   NAV LINKS
========================================================= */

.premium-navbar .navbar-nav {

    gap: 2px;

}


.premium-navbar .nav-link {

    position: relative;

    color: var(--premium-navy);

    font-family: 'Poppins', sans-serif;

    font-size: 13.5px;

    font-weight: 700;

    padding: 31px 11px !important;

    white-space: nowrap;

    transition: .25s ease;

}


.premium-navbar .nav-link:hover {

    color: var(--premium-green);

}


.premium-navbar .nav-link.active {

    color: var(--premium-green);

}



/* =========================================================
   NAV UNDERLINE ANIMATION
========================================================= */

.premium-navbar .nav-link::after {

    content: "";

    position: absolute;

    left: 50%;

    right: 50%;

    bottom: 18px;

    height: 2px;

    background: var(--premium-green);

    transition: left .28s cubic-bezier(0.165, 0.84, 0.44, 1), right .28s cubic-bezier(0.165, 0.84, 0.44, 1);

}

.premium-navbar .nav-link:hover::after,
.premium-navbar .nav-link.active::after {

    left: 12px;

    right: 12px;

}



/* =========================================================
   SERVICES NAV WRAPPER
========================================================= */

.services-nav-item {

    position: relative;

}


.services-nav-wrapper {

    display: flex;

    align-items: stretch;

    position: relative;

}



/* =========================================================
   SERVICES MAIN LINK
========================================================= */

.services-main-link {

    padding-right: 4px !important;

}



/* =========================================================
   SERVICES DROPDOWN ARROW BUTTON
========================================================= */

.services-dropdown-btn {

    width: 24px;

    border: 0;

    background: transparent;

    color: var(--premium-green);

    display: flex;

    align-items: center;

    justify-content: center;

    padding: 0;

    margin: 0;

    cursor: pointer;

    transition: .25s ease;

}


.services-dropdown-btn i {

    font-size: 11px;

    transition: transform .25s ease;

}


.services-dropdown-btn:hover {

    color: var(--premium-navy);

}



/* =========================================================
   ARROW ROTATION WHEN DROPDOWN OPEN
========================================================= */

.services-dropdown-btn[aria-expanded="true"] i {

    transform: rotate(180deg);

}



/* =========================================================
   SERVICES DROPDOWN
========================================================= */

.premium-services-menu {

    width: 375px;

    padding: 9px 0;

    margin-top: 0;

    border: 0;

    border-top: 3px solid var(--premium-orange);

    border-radius: 0 0 5px 5px;

    box-shadow: 0 15px 35px rgba(11, 31, 58, .16);

    background: #fff;

}



/* =========================================================
   DROPDOWN ITEM
========================================================= */

.premium-services-menu .dropdown-item {

    display: flex;

    align-items: center;

    gap: 11px;

    color: var(--premium-navy);

    font-family: 'Poppins', sans-serif;

    font-size: 13.5px;

    font-weight: 600;

    padding: 11px 17px;

    white-space: normal;

    transition: .2s ease;

}


.premium-services-menu .dropdown-item i {

    width: 20px;

    flex: 0 0 20px;

    color: var(--premium-orange);

    font-size: 16px;

    text-align: center;

}


.premium-services-menu .dropdown-item span {

    line-height: 1.35;

}


.premium-services-menu .dropdown-item:hover {

    background: #f4f8f1;

    color: var(--premium-green);

    padding-left: 21px;

}


.premium-services-menu .dropdown-item:hover i {

    color: var(--premium-green);

}



/* =========================================================
   GET AN ESTIMATE
========================================================= */

.estimate-item {

    margin-left: 7px;

}


.premium-navbar .estimate-btn {

    background: var(--premium-green);

    color: #fff !important;

    padding: 11px 17px !important;

    border-radius: 2px;

    font-weight: 800;

    margin-top: 0;

    position: relative;

    overflow: hidden;

    transition: all .32s cubic-bezier(0.165, 0.84, 0.44, 1);

}

.premium-navbar .estimate-btn::before {

    content: '';

    position: absolute;

    top: 0;

    left: -130%;

    width: 60%;

    height: 100%;

    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.35), transparent);

    transform: skewX(-25deg);

    transition: left .85s ease;

    pointer-events: none;

}

.premium-navbar .estimate-btn:hover::before {

    left: 210%;

}

.premium-navbar .estimate-btn:hover {

    background: var(--premium-green-dark);

    color: #fff !important;

    transform: translateY(-2px);

    box-shadow: 0 6px 18px rgba(67, 169, 0, 0.35);

}


.premium-navbar .estimate-btn.active::after {

    display: none;

}



/* =========================================================
   MOBILE TOGGLE
========================================================= */

.premium-navbar .navbar-toggler {

    border: 1px solid #dfe5ea;

    border-radius: 3px;

    padding: 7px 9px;

}


.premium-navbar .navbar-toggler:focus {

    box-shadow: 0 0 0 2px rgba(72, 169, 0, .12);

}


.premium-navbar .navbar-toggler-icon {

    width: 20px;

    height: 20px;

}



/* =========================================================
   FLOATING QUOTE
========================================================= */

.floating-quote {

    position: fixed;

    right: 0;

    top: 40%;

    z-index: 999;

    width: 58px;

    min-height: 240px;

    padding: 24px 0;

    border-radius: 10px 0 0 10px;

    background: var(--premium-green);

    color: #fff;

    text-decoration: none;

    display: flex;

    align-items: center;

    justify-content: center;

    flex-direction: column;

    gap: 14px;

    box-shadow: 0 5px 22px rgba(0, 0, 0, .25);

    transition: .25s ease;

}


.floating-quote span {

    font-family: 'Poppins', sans-serif;

    font-size: 14px;

    font-weight: 800;

    writing-mode: vertical-rl;

    transform: rotate(180deg);

    letter-spacing: 1px;

    text-transform: uppercase;

}


.floating-quote i {

    font-size: 19px;

}


.floating-quote:hover {

    width: 66px;

    background: var(--premium-green-dark);

    color: #fff;

    box-shadow: 0 8px 26px rgba(0, 0, 0, .32);

}



/* =========================================================
   TABLET / SMALL LAPTOP
========================================================= */

@media (max-width: 1199px) {

    .premium-navbar .nav-link {

        font-size: 12px;

        padding-left: 8px !important;

        padding-right: 8px !important;

    }


    .premium-logo img {

        height: 56px;

        width: auto;

    }


    .premium-services-menu {

        width: 350px;

    }


    .services-main-link {

        padding-right: 2px !important;

    }


    .services-dropdown-btn {

        width: 20px;

    }

}



/* =========================================================
   MOBILE NAVBAR
========================================================= */

@media (max-width: 991px) {


    /* TOP CONTACT */

    .top-contact-inner {

        min-height: 32px;

        justify-content: space-between;

        gap: 10px;

    }


    .top-contact-email a,
    .top-contact-phone a {

        font-size: 12px;

    }



    /* NAVBAR */

    .premium-navbar {

        min-height: 70px;

        padding: 8px 0;

    }


    .premium-logo img {

        height: 50px;

        width: auto;

    }


    .premium-navbar .navbar-collapse {

        background: #fff;

        margin-top: 10px;

        border-top: 1px solid #e9edf1;

        box-shadow: 0 10px 20px rgba(11, 31, 58, .08);

    }


    .premium-navbar .navbar-nav {

        padding: 10px 0;

        gap: 0;

    }


    .premium-navbar .nav-link {

        padding: 12px 18px !important;

        font-size: 14px;

    }


    .premium-navbar .nav-link.active::after {

        display: none;

    }



    /* =================================================
       MOBILE SERVICES
    ================================================= */

    .services-nav-item {

        width: 100%;

    }


    .services-nav-wrapper {

        width: 100%;

        display: flex;

        align-items: center;

    }


    .services-main-link {

        flex: 1;

        padding: 12px 18px !important;

    }


    .services-dropdown-btn {

        width: 48px;

        min-height: 44px;

        border-left: 1px solid #edf0f2;

        color: var(--premium-green);

        background: #fff;

    }


    .services-dropdown-btn:hover {

        background: #f4f8f1;

        color: var(--premium-green);

    }


    .premium-services-menu {

        position: static !important;

        transform: none !important;

        width: 100%;

        border-top: 2px solid var(--premium-orange);

        border-radius: 0;

        box-shadow: none;

        margin: 0;

    }


    .premium-services-menu .dropdown-item {

        padding: 10px 30px;

        font-size: 13px;

    }


    .premium-services-menu .dropdown-item:hover {

        padding-left: 34px;

    }



    /* ESTIMATE */

    .estimate-item {

        margin: 7px 15px 5px;

    }


    .premium-navbar .estimate-btn {

        text-align: center;

        padding: 12px 17px !important;

    }

}



/* =========================================================
   SMALL MOBILE
========================================================= */

@media (max-width: 575px) {


    /* TOP CONTACT */

    .top-contact-inner {

        min-height: 32px;

        gap: 8px;

    }


    .top-contact-email a,
    .top-contact-phone a {

        font-size: 11px;

    }


    .top-contact-email i,
    .top-contact-phone i {

        font-size: 11px;

        margin-right: 4px;

    }



    /* LOGO */

    .premium-logo img {

        height: 44px;

        width: auto;

    }



    /* FLOATING BUTTON */

    .floating-quote {

        width: 48px;

        min-height: 190px;

        padding: 18px 0;

    }


    .floating-quote span {

        font-size: 12px;

    }

    .floating-quote i {

        font-size: 16px;

    }

}

</style>