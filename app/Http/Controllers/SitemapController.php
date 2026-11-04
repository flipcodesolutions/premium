<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Service;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    /**
     * Generate dynamic XML sitemap from database & static routes,
     * categorized with comments matching the XML structure specification.
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

        $today = now()->tz('UTC')->toDateString();

        // 1. Core Company & Service Landing Pages
        $corePages = [
            ['loc' => $baseUrl . '/', 'lastmod' => $today, 'priority' => '1.0', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl . '/services', 'lastmod' => $today, 'priority' => '0.9', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl . '/about', 'lastmod' => $today, 'priority' => '0.8', 'changefreq' => 'monthly'],
            ['loc' => $baseUrl . '/contact', 'lastmod' => $today, 'priority' => '0.9', 'changefreq' => 'monthly'],
            ['loc' => $baseUrl . '/gallery', 'lastmod' => $today, 'priority' => '0.7', 'changefreq' => 'monthly'],
            ['loc' => $baseUrl . '/booking', 'lastmod' => $today, 'priority' => '0.8', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl . '/blog', 'lastmod' => $today, 'priority' => '0.8', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl . '/inspection-agreement', 'lastmod' => $today, 'priority' => '0.6', 'changefreq' => 'monthly'],
            ['loc' => $baseUrl . '/privacy-policy', 'lastmod' => $today, 'priority' => '0.3', 'changefreq' => 'yearly'],
        ];

        // 2. Core Inspection Services
        $defaultServices = [
            ['loc' => $baseUrl . '/services/pre-purchase-building-and-pest-inspection', 'lastmod' => $today, 'priority' => '0.9', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl . '/services/building-stage-by-stage-inspection', 'lastmod' => $today, 'priority' => '0.9', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl . '/services/new-build-handover-inspection', 'lastmod' => $today, 'priority' => '0.9', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl . '/services/rising-damp-inspection', 'lastmod' => $today, 'priority' => '0.8', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl . '/services/pool-barrier-inspection', 'lastmod' => $today, 'priority' => '0.8', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl . '/services/apartment-building-inspection', 'lastmod' => $today, 'priority' => '0.8', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl . '/services/dilapidation-inspection', 'lastmod' => $today, 'priority' => '0.8', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl . '/services/vendor-inspection', 'lastmod' => $today, 'priority' => '0.8', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl . '/services/builders-warranty-inspection', 'lastmod' => $today, 'priority' => '0.8', 'changefreq' => 'weekly'],
        ];

        $servicePages = [];
        try {
            $dbServices = Service::where('status', true)
                ->whereNotNull('slug')
                ->where('slug', '!=', '')
                ->orderBy('id', 'asc')
                ->get();

            if ($dbServices->isNotEmpty()) {
                foreach ($dbServices as $service) {
                    $servicePages[] = [
                        'loc' => $baseUrl . '/services/' . ltrim($service->slug, '/'),
                        'lastmod' => ($service->updated_at ?? now())->tz('UTC')->toDateString(),
                        'changefreq' => 'weekly',
                        'priority' => '0.8',
                    ];
                }
            } else {
                $servicePages = $defaultServices;
            }
        } catch (\Throwable $e) {
            $servicePages = $defaultServices;
        }

        // 3. Published Blog Articles & Inspection Guides
        $defaultBlogs = [
            ['loc' => $baseUrl . '/blog/why-you-should-inspect-a-property-before-buying', 'lastmod' => $today, 'priority' => '0.7', 'changefreq' => 'monthly'],
            ['loc' => $baseUrl . '/blog/common-problems-found-during-building-inspections', 'lastmod' => $today, 'priority' => '0.7', 'changefreq' => 'monthly'],
            ['loc' => $baseUrl . '/blog/signs-of-termites-you-should-know-about', 'lastmod' => $today, 'priority' => '0.7', 'changefreq' => 'monthly'],
        ];

        $blogPages = [];
        try {
            $dbPosts = BlogPost::published()
                ->whereNotNull('slug')
                ->where('slug', '!=', '')
                ->orderBy('id', 'desc')
                ->get();

            if ($dbPosts->isNotEmpty()) {
                foreach ($dbPosts as $post) {
                    $blogPages[] = [
                        'loc' => $baseUrl . '/blog/' . ltrim($post->slug, '/'),
                        'lastmod' => ($post->updated_at ?? $post->published_at ?? now())->tz('UTC')->toDateString(),
                        'changefreq' => 'monthly',
                        'priority' => '0.7',
                    ];
                }
            } else {
                $blogPages = $defaultBlogs;
            }
        } catch (\Throwable $e) {
            $blogPages = $defaultBlogs;
        }

        $content = view('sitemap', [
            'corePages'    => $corePages,
            'servicePages' => $servicePages,
            'blogPages'    => $blogPages,
        ])->render();

        return response($content, 200)
            ->header('Content-Type', 'text/xml; charset=utf-8');
    }
}
