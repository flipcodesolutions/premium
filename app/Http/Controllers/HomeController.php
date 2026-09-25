<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\PricingPackage;
use App\Models\Review;
use App\Models\Faq;
use App\Models\BlogPost;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::where('status', true)
            ->latest()
            ->take(6)
            ->get();

        $pricingPackages = PricingPackage::where('status', true)
            ->latest()
            ->take(3)
            ->get();

        $reviews = Review::where('status', true)
            ->latest()
            ->take(6)
            ->get();

        $faqs = Faq::where('status', true)
            ->orderBy('sort_order')
            ->take(6)
            ->get();

        $blogs = BlogPost::where('status', true)
            ->latest()
            ->take(3)
            ->get();

        return view('home.index', compact(
            'services',
            'pricingPackages',
            'reviews',
            'faqs',
            'blogs'
        ));
    }
}