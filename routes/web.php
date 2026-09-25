<?php

use Illuminate\Support\Facades\Route;


// =========================================================
// FRONTEND CONTROLLERS
// =========================================================

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\InspectionAgreementController;


// =========================================================
// ADMIN CONTROLLERS
// =========================================================

use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\Admin\QuoteRequestController as AdminQuoteController;
use App\Http\Controllers\Admin\ContactMessageController as AdminMessageController;
use App\Http\Controllers\Admin\BlogPostController as AdminBlogPostController;


// =========================================================
// HOME
// =========================================================

Route::get('/', [HomeController::class, 'index'])
    ->name('home');


// =========================================================
// ABOUT US
// =========================================================

Route::get('/about', function () {

    return view('about.index');

})->name('about');


// =========================================================
// SERVICES
// =========================================================

// ---------------------------------------------------------
// Services Listing
// ---------------------------------------------------------

Route::get(
    '/services',
    [ServiceController::class, 'index']
)->name('services.index');


// =========================================================
// SERVICE DETAIL PAGES
// =========================================================


// ---------------------------------------------------------
// 01. PRE-PURCHASE BUILDING & PEST INSPECTION
// ---------------------------------------------------------

Route::get(
    '/services/pre-purchase-building-and-pest-inspection',
    function () {

        return view(
            'services.pre-purchase-building-and-pest-inspection'
        );

    }
)->name('services.pre-purchase');


// ---------------------------------------------------------
// 02. BUILDING STAGE BY STAGE INSPECTION
// ---------------------------------------------------------

Route::get(
    '/services/building-stage-by-stage-inspection',
    function () {

        return view(
            'services.building-stage-by-stage-inspection'
        );

    }
)->name('services.building-stage');


// ---------------------------------------------------------
// 03. APARTMENT BUILDING INSPECTION
// ---------------------------------------------------------

Route::get(
    '/services/apartment-building-inspection',
    function () {

        return view(
            'services.apartment-building-inspection'
        );

    }
)->name('services.apartment');


// ---------------------------------------------------------
// 04. RISING DAMP INSPECTION
// ---------------------------------------------------------

Route::get(
    '/services/rising-damp-inspection',
    function () {

        return view(
            'services.rising-damp-inspection'
        );

    }
)->name('services.rising-damp');


// ---------------------------------------------------------
// 05. POOL BARRIER INSPECTION
// ---------------------------------------------------------

Route::get(
    '/services/pool-barrier-inspection',
    function () {

        return view(
            'services.pool-barrier-inspection'
        );

    }
)->name('services.pool-barrier');


// ---------------------------------------------------------
// 06. DILAPIDATION INSPECTION
// ---------------------------------------------------------

Route::get(
    '/services/dilapidation-inspection',
    function () {

        return view(
            'services.dilapidation-inspection'
        );

    }
)->name('services.dilapidation');


// ---------------------------------------------------------
// 07. NEW BUILD HANDOVER INSPECTION
// ---------------------------------------------------------

Route::get(
    '/services/new-build-handover-inspection',
    function () {

        return view(
            'services.new-build-handover-inspection'
        );

    }
)->name('services.new-build-handover');


// ---------------------------------------------------------
// 08. VENDOR INSPECTION
// ---------------------------------------------------------

Route::get(
    '/services/vendor-inspection',
    function () {

        return view(
            'services.vendor-inspection'
        );

    }
)->name('services.vendor');


// ---------------------------------------------------------
// 09. BUILDERS WARRANTY INSPECTION
// ---------------------------------------------------------

Route::get(
    '/services/builders-warranty-inspection',
    function () {

        return view(
            'services.builders-warranty-inspection'
        );

    }
)->name('services.builders-warranty');


// =========================================================
// DATABASE SERVICE DETAIL
// =========================================================
//
// IMPORTANT:
// This dynamic route MUST stay after all fixed service
// routes above.
//
// Example:
// /services/custom-service
//
// =========================================================

Route::get(
    '/services/{slug}',
    [ServiceController::class, 'show']
)->name('services.show');


// =========================================================
// BLOG
// =========================================================


// ---------------------------------------------------------
// Blog Listing
// ---------------------------------------------------------

Route::get(
    '/blog',
    [BlogPostController::class, 'index']
)->name('blog.index');


// ---------------------------------------------------------
// Blog Detail
// ---------------------------------------------------------

Route::get(
    '/blog/{slug}',
    [BlogPostController::class, 'show']
)->name('blog.show');


// =========================================================
// CONTACT
// =========================================================


// ---------------------------------------------------------
// Contact Page
// ---------------------------------------------------------

Route::get('/contact', function () {

    return view('contact.index');

})->name('contact');


// ---------------------------------------------------------
// Contact Form Submit
// ---------------------------------------------------------

Route::post(
    '/contact',
    [ContactController::class, 'store']
)->name('contact.store');


// =========================================================
// GALLERY
// =========================================================

Route::get(
    '/gallery',
    [GalleryController::class, 'index']
)->name('gallery.index');


// =========================================================
// INSPECTION AGREEMENT
// =========================================================

Route::get(
    '/inspection-agreement',
    [InspectionAgreementController::class, 'index']
)->name('inspection.agreement');

Route::post(
    '/inspection-agreement',
    [InspectionAgreementController::class, 'store']
)->name('inspection.agreement.store');


// =========================================================
// QUOTE / GET AN ESTIMATE
// =========================================================
//
// IMPORTANT:
//
// GET  /quote
//       ↓
// Redirect to /contact
//
// POST /quote
//       ↓
// QuoteController@store
//
// This prevents:
//
// "The GET method is not supported for route quote."
//
// =========================================================


// ---------------------------------------------------------
// GET /quote
// ---------------------------------------------------------
//
// If an old button/link opens:
//
// http://127.0.0.1:8000/quote
//
// it will redirect to Contact page.
//

Route::get('/quote', function () {

    return redirect()->route('contact');

})->name('quote');


// ---------------------------------------------------------
// POST /quote
// ---------------------------------------------------------
//
// Actual quote form submission.
//

Route::post(
    '/quote',
    [QuoteController::class, 'store']
)->name('quote.store');


// =========================================================
// BOOKING / SCHEDULE INSPECTION
// =========================================================

Route::get(
    '/booking',
    [BookingController::class, 'create']
)->name('booking.create');

Route::post(
    '/booking',
    [BookingController::class, 'store']
)->name('booking.store');


// =========================================================
// ADMIN AUTHENTICATION
// =========================================================


// ---------------------------------------------------------
// Admin Login Page
// ---------------------------------------------------------

Route::get(
    '/login',
    [AdminLoginController::class, 'showLogin']
)->name('login');


// ---------------------------------------------------------
// Admin Login Submit
// ---------------------------------------------------------

Route::post(
    '/login',
    [AdminLoginController::class, 'login']
)->name('login.submit');


// ---------------------------------------------------------
// Admin Register Page
// ---------------------------------------------------------

Route::get(
    '/register',
    [AdminLoginController::class, 'showRegister']
)->name('register');


// ---------------------------------------------------------
// Admin Register Submit
// ---------------------------------------------------------

Route::post(
    '/register',
    [AdminLoginController::class, 'register']
)->name('register.submit');


// ---------------------------------------------------------
// Admin Logout
// ---------------------------------------------------------

Route::post(
    '/logout',
    [AdminLoginController::class, 'logout']
)
->middleware('auth')
->name('logout');


// =========================================================
// ADMIN PANEL
// =========================================================
//
// All routes inside this group require:
//
// 1. User must be logged in
// 2. User role must be "admin"
//
// =========================================================

Route::middleware(['admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {


        // =================================================
        // ADMIN DASHBOARD
        // =================================================

        Route::get(
            '/dashboard',
            [AdminDashboardController::class, 'index']
        )->name('dashboard');


        // =================================================
        // ADMIN SERVICES
        // =================================================

        Route::get(
            '/services',
            [AdminServiceController::class, 'index']
        )->name('services.index');

        Route::get(
            '/services/create',
            [AdminServiceController::class, 'create']
        )->name('services.create');

        Route::post(
            '/services',
            [AdminServiceController::class, 'store']
        )->name('services.store');

        Route::get(
            '/services/{service}/edit',
            [AdminServiceController::class, 'edit']
        )->name('services.edit');

        Route::put(
            '/services/{service}',
            [AdminServiceController::class, 'update']
        )->name('services.update');

        Route::delete(
            '/services/{service}',
            [AdminServiceController::class, 'destroy']
        )->name('services.destroy');

        Route::patch(
            '/services/{service}/toggle-status',
            [AdminServiceController::class, 'toggleStatus']
        )->name('services.toggle-status');


        // =================================================
        // ADMIN BOOKINGS
        // =================================================

        Route::get(
            '/bookings',
            [AdminBookingController::class, 'index']
        )->name('bookings.index');

        Route::get(
            '/bookings/create',
            [AdminBookingController::class, 'create']
        )->name('bookings.create');

        Route::post(
            '/bookings',
            [AdminBookingController::class, 'store']
        )->name('bookings.store');

        Route::get(
            '/bookings/{booking}',
            [AdminBookingController::class, 'show']
        )->name('bookings.show');

        Route::patch(
            '/bookings/{booking}/status',
            [AdminBookingController::class, 'updateStatus']
        )->name('bookings.update-status');

        Route::post(
            '/bookings/{booking}/send-email',
            [AdminBookingController::class, 'sendEmail']
        )->name('bookings.send-email');

        Route::delete(
            '/bookings/{booking}',
            [AdminBookingController::class, 'destroy']
        )->name('bookings.destroy');


        // =================================================
        // ADMIN QUOTE REQUESTS
        // =================================================

        Route::get(
            '/quotes',
            [AdminQuoteController::class, 'index']
        )->name('quotes.index');

        Route::get(
            '/quotes/{quote}',
            [AdminQuoteController::class, 'show']
        )->name('quotes.show');

        Route::patch(
            '/quotes/{quote}/status',
            [AdminQuoteController::class, 'updateStatus']
        )->name('quotes.update-status');

        Route::post(
            '/quotes/{quote}/send-email',
            [AdminQuoteController::class, 'sendEmail']
        )->name('quotes.send-email');

        Route::delete(
            '/quotes/{quote}',
            [AdminQuoteController::class, 'destroy']
        )->name('quotes.destroy');


        // =================================================
        // ADMIN CONTACT MESSAGES
        // =================================================

        Route::get(
            '/messages',
            [AdminMessageController::class, 'index']
        )->name('messages.index');

        Route::get(
            '/messages/{message}',
            [AdminMessageController::class, 'show']
        )->name('messages.show');

        Route::patch(
            '/messages/{message}/toggle-read',
            [AdminMessageController::class, 'toggleRead']
        )->name('messages.toggle-read');

        Route::post(
            '/messages/{message}/reply',
            [AdminMessageController::class, 'reply']
        )->name('messages.reply');

        Route::delete(
            '/messages/{message}',
            [AdminMessageController::class, 'destroy']
        )->name('messages.destroy');


        // =================================================
        // ADMIN BLOG POSTS
        // =================================================

        Route::get(
            '/blogs',
            [AdminBlogPostController::class, 'index']
        )->name('blogs.index');

        Route::get(
            '/blogs/create',
            [AdminBlogPostController::class, 'create']
        )->name('blogs.create');

        Route::post(
            '/blogs',
            [AdminBlogPostController::class, 'store']
        )->name('blogs.store');

        Route::get(
            '/blogs/{post}/edit',
            [AdminBlogPostController::class, 'edit']
        )->name('blogs.edit');

        Route::put(
            '/blogs/{post}',
            [AdminBlogPostController::class, 'update']
        )->name('blogs.update');

        Route::delete(
            '/blogs/{post}',
            [AdminBlogPostController::class, 'destroy']
        )->name('blogs.destroy');

        Route::patch(
            '/blogs/{post}/toggle-status',
            [AdminBlogPostController::class, 'toggleStatus']
        )->name('blogs.toggle-status');

    });