<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    // =========================================================
    // BLOG LIST
    // =========================================================

    public function index(Request $request)
    {
        // Ensure default blog articles matching the design exist
        $defaultArticles = [
            [
                'title' => "BUYING AN OLDER HOME? HERE'S WHAT REQUIRES EXTRA ATTENTION",
                'slug' => 'buying-an-older-home-heres-what-requires-extra-attention',
                'image' => 'https://images.unsplash.com/photo-1581578731548-c64695cc6952?auto=format&fit=crop&w=900&q=80',
                'excerpt' => "Older Homes Have Character—But They Also Have a Story. There's a reason older homes continue to attract buyers across Melbourne and Victoria. From established suburbs and generous block sizes to unique architectural features, they often offer qualities that are difficult to find in newer developments. However, every older property also carries years of history...",
                'content' => "Older homes have character, charm, and established locations, but they also require diligent inspection. From aging electrical wiring and galvanized plumbing to hidden foundation settling, subfloor dampness, and roof degradation, older properties require specialized assessment before purchase.",
                'published_at' => '2026-07-23 10:00:00',
                'status' => true,
            ],
            [
                'title' => "TOP DEFECTS FOUND DURING NEW HOME HANDOVER INSPECTIONS",
                'slug' => 'top-defects-found-during-new-home-handover-inspections',
                'image' => 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?auto=format&fit=crop&w=900&q=80',
                'excerpt' => "A new home handover inspection is one of the most important steps before taking ownership of a newly built property. Many homeowners assume that a newly completed property will be free from defects; however, construction projects involve multiple trades, materials, and workmanship standards, making minor and sometimes significant defects relatively common...",
                'content' => "During new home handover inspections, common defects include paint blemishes, unsealed wet areas, roof tile misalignment, non-compliant stair nosings, and drainage issues. Independent verification ensures your builder rectifies these issues under warranty.",
                'published_at' => '2026-06-22 10:00:00',
                'status' => true,
            ],
            [
                'title' => "EXTREME WEATHER REVEALS HIDDEN BUILDING DEFECTS IN AUSTRALIA",
                'slug' => 'extreme-weather-reveals-hidden-building-defects-in-australia',
                'image' => 'https://images.unsplash.com/photo-1515694346937-94d85e41e6f0?auto=format&fit=crop&w=900&q=80',
                'excerpt' => "Australia is no stranger to challenging weather conditions. From intense summer heatwaves and severe storms to prolonged periods of heavy rainfall and flooding, homes across the country are regularly exposed to environmental conditions that can test their durability. While most homeowners expect extreme weather to cause visible damage, many are surprised by hidden defects...",
                'content' => "Extreme heat and heavy storm rainfall can stress building envelopes, causing flashings to fail, gutters to overflow, and expansion joints to crack. Discover the critical areas our inspectors assess following severe weather events.",
                'published_at' => '2026-06-05 10:00:00',
                'status' => true,
            ],
            [
                'title' => "HOW MOISTURE PROBLEMS INCREASE TERMITE RISKS IN PROPERTIES",
                'slug' => 'how-moisture-problems-increase-termite-risks-in-properties',
                'image' => 'https://images.unsplash.com/photo-1544984243-ec57ea16fe25?auto=format&fit=crop&w=900&q=80',
                'excerpt' => "When people think about termites, they usually imagine old timber or visible pest damage. But one of the biggest hidden causes of termite activity is moisture. When people think about termite infestations, they often imagine old timber, neglected buildings, or visible pest damage. However, one of the most common hidden causes of termite infestations is untreated moisture...",
                'content' => "Subterranean termites require constant moisture to survive. Leaking pipes, poorly drained subfloors, and dripping air conditioning units create prime conditions for termite colonies to thrive silently inside wall cavities.",
                'published_at' => '2026-05-23 10:00:00',
                'status' => true,
            ],
            [
                'title' => "WHY NEW HOMES STILL NEED INSPECTIONS BEFORE HANDOVER",
                'slug' => 'why-new-homes-still-need-inspections-before-handover',
                'image' => 'https://images.unsplash.com/photo-1560518883-ce09059eeffa?auto=format&fit=crop&w=900&q=80',
                'excerpt' => "Buying a newly built home is an exciting milestone. After months of planning, construction, and waiting, most homeowners expect their property to be completed perfectly and ready for immediate move-in. A brand-new home often gives the impression that everything will be flawless, modern, and built to the highest standard. However, expert independent inspections often reveal...",
                'content' => "Even with municipal surveyor certifications, cosmetic and workmanship oversights frequently slip through fast-paced building schedules. Our independent handover inspections give you full peace of mind before signing final payments.",
                'published_at' => '2026-05-09 10:00:00',
                'status' => true,
            ],
            [
                'title' => "THE HIDDEN LANGUAGE OF BUILDINGS: WHAT EXPERTS HEAR THAT OTHERS MISS",
                'slug' => 'the-hidden-language-of-buildings-what-experts-hear-that-others-miss',
                'image' => 'https://images.unsplash.com/photo-1513694203232-719a280e022f?auto=format&fit=crop&w=900&q=80',
                'excerpt' => "Buildings are more than walls, roofs, and foundations. Every property carries the story of its design, construction, environment, and care over time. For most people, these stories remain silent, hidden in plain sight. But for seasoned building professionals, every detail speaks — and understanding that language can prevent costly mistakes, structural failures, and future repairs...",
                'content' => "Hairline foundation cracks, slight floor bounce, microscopic water stains, and hollow wall resonances tell seasoned inspectors precisely how a building is performing. Learning to read these signals early saves thousands in future repair bills.",
                'published_at' => '2026-04-23 10:00:00',
                'status' => true,
            ],
        ];

        foreach ($defaultArticles as $article) {
            BlogPost::updateOrCreate(
                ['slug' => $article['slug']],
                $article
            );
        }

        $query = BlogPost::with('category')
            ->where('status', true)
            ->where(function ($q) {
                $q->whereNull('published_at')
                  ->orWhere('published_at', '<=', now());
            })
            ->latest('published_at');

        // Category filter
        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        $posts = $query
            ->paginate(6)
            ->withQueryString();

        // Blog categories
        $categories = BlogCategory::withCount([
            'posts' => function ($q) {
                $q->where('status', true)
                  ->where(function ($query) {
                      $query->whereNull('published_at')
                            ->orWhere('published_at', '<=', now());
                  });
            }
        ])
        ->orderBy('name')
        ->get();

        return view('blog.index', compact(
            'posts',
            'categories'
        ));
    }


    // =========================================================
    // BLOG DETAIL
    // =========================================================

    public function show($slug)
    {
        // Current blog post
        $post = BlogPost::with('category')
            ->where('slug', $slug)
            ->where('status', true)
            ->where(function ($q) {
                $q->whereNull('published_at')
                  ->orWhere('published_at', '<=', now());
            })
            ->firstOrFail();


        // Latest blog posts
        $latestPosts = BlogPost::with('category')
            ->where('status', true)
            ->where('id', '!=', $post->id)
            ->where(function ($q) {
                $q->whereNull('published_at')
                  ->orWhere('published_at', '<=', now());
            })
            ->latest()
            ->take(5)
            ->get();


        // Related blog posts
        $relatedPosts = BlogPost::with('category')
            ->where('status', true)
            ->where('id', '!=', $post->id)
            ->when($post->blog_category_id, function ($q) use ($post) {
                $q->where(
                    'blog_category_id',
                    $post->blog_category_id
                );
            })
            ->where(function ($q) {
                $q->whereNull('published_at')
                  ->orWhere('published_at', '<=', now());
            })
            ->latest()
            ->take(3)
            ->get();


        // All categories
        $categories = BlogCategory::orderBy('name')->get();


        return view('blog.show', compact(
            'post',
            'latestPosts',
            'relatedPosts',
            'categories'
        ));
    }
}