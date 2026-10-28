<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Service;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    /**
     * Generate dynamic XML sitemap from database & static routes.
     */
    public function index(): Response
    {
        $host = request()->getHost();
        if ($host && !in_array($host, ['localhost', '127.0.0.1'])) {
            $baseUrl = rtrim(request()->getSchemeAndHttpHost(), '/');
        } else {
            // Default to canonical production URL for search engines and CLI
            $baseUrl = 'https://premiumbuildinginspections.com.au';
        }

        // Static pages
        $staticUrls = [
            ['loc' => $baseUrl . '/', 'priority' => '1.0', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl . '/about', 'priority' => '0.8', 'changefreq' => 'monthly'],
            ['loc' => $baseUrl . '/services', 'priority' => '0.9', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl . '/services/pre-purchase-building-and-pest-inspection', 'priority' => '0.9', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl . '/services/building-stage-by-stage-inspection', 'priority' => '0.9', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl . '/services/apartment-building-inspection', 'priority' => '0.8', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl . '/services/rising-damp-inspection', 'priority' => '0.8', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl . '/services/pool-barrier-inspection', 'priority' => '0.8', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl . '/services/dilapidation-inspection', 'priority' => '0.8', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl . '/services/new-build-handover-inspection', 'priority' => '0.8', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl . '/services/vendor-inspection', 'priority' => '0.8', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl . '/services/builders-warranty-inspection', 'priority' => '0.8', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl . '/blog', 'priority' => '0.8', 'changefreq' => 'daily'],
            ['loc' => $baseUrl . '/contact', 'priority' => '0.8', 'changefreq' => 'monthly'],
            ['loc' => $baseUrl . '/gallery', 'priority' => '0.7', 'changefreq' => 'monthly'],
            ['loc' => $baseUrl . '/inspection-agreement', 'priority' => '0.6', 'changefreq' => 'monthly'],
            ['loc' => $baseUrl . '/booking', 'priority' => '0.8', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl . '/privacy-policy', 'priority' => '0.3', 'changefreq' => 'yearly'],
        ];

        // Active dynamic services from DB
        $services = Service::where('status', true)
            ->whereNotNull('slug')
            ->where('slug', '!=', '')
            ->orderBy('id', 'asc')
            ->get();

        // Published dynamic blog posts from DB
        $posts = BlogPost::where('status', true)
            ->whereNotNull('slug')
            ->where('slug', '!=', '')
            ->orderBy('id', 'desc')
            ->get();

        $content = view('sitemap', [
            'staticUrls' => $staticUrls,
            'services'   => $services,
            'posts'      => $posts,
            'baseUrl'    => $baseUrl,
        ])->render();

        return response($content, 200)
            ->header('Content-Type', 'application/xml; charset=utf-8');
    }
}
