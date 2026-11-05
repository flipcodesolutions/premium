<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogPostController extends Controller
{
    /**
     * Display a listing of blog posts.
     */
    public function index(Request $request)
    {
        $query = BlogPost::with('category')->latest();

        // Filter by status
        if ($request->filled('status')) {
            if ($request->status === 'published') {
                $query->published();
            } elseif ($request->status === 'scheduled') {
                $query->scheduled();
            } elseif ($request->status === 'draft') {
                $query->where('status', false);
            }
        }

        // Search by title or content
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('excerpt', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }

        $perPage = (int) $request->input('per_page', 10);
        $perPage = in_array($perPage, [5, 10, 25, 50]) ? $perPage : 10;

        $posts = $query->paginate($perPage)->withQueryString();

        $counts = [
            'all' => BlogPost::count(),
            'published' => BlogPost::published()->count(),
            'scheduled' => BlogPost::scheduled()->count(),
            'draft' => BlogPost::where('status', false)->count(),
        ];

        return view('admin.blogs.index', compact('posts', 'counts'));
    }

    /**
     * Show form to create a new blog post.
     */
    public function create()
    {
        return view('admin.blogs.create');
    }

    /**
     * Store a newly created blog post.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blog_posts,slug',
            'excerpt' => 'nullable|string|max:1000',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'meta_title' => 'nullable|string|max:70',
            'meta_description' => 'nullable|string|max:160',
            'meta_keywords' => 'nullable|string|max:255',
            'og_title' => 'nullable|string|max:255',
            'og_description' => 'nullable|string|max:1000',
            'og_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'og_url' => 'nullable|string|max:500',
            'author' => 'nullable|string|max:100',
            'is_scheduled' => 'nullable|boolean',
            'scheduled_at' => 'nullable|required_if:is_scheduled,1|date',
            'status' => 'nullable|boolean',
        ], [
            'meta_title.max' => 'Meta Title should not exceed 70 characters (optimal for Google search is 50–60 characters).',
            'meta_description.max' => 'Meta Description should not exceed 160 characters (optimal length is 140–160 characters).',
            'meta_keywords.max' => 'Meta Keywords must not exceed 255 characters.',
            'og_image.max' => 'Og Image size must not exceed 2MB for optimal SEO loading speed.',
            'author.max' => 'Author name must not exceed 100 characters.',
        ]);

        // Auto-generate slug if not provided
        $slug = $validated['slug'] ?? Str::slug($validated['title']);
        $originalSlug = $slug;
        $counter = 1;

        while (BlogPost::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        // Upload image
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('blogs', 'public');
        }

        // Upload OG image
        $ogImagePath = null;
        if ($request->hasFile('og_image')) {
            $ogImagePath = $request->file('og_image')->store('blogs/meta', 'public');
        }

        $isScheduled = $request->boolean('is_scheduled');
        $isActive = $request->boolean('status', true);

        if ($isScheduled && $request->filled('scheduled_at')) {
            $status = true;
            $userTz = $request->input('user_timezone') ?: config('app.display_timezone', 'Australia/Melbourne');
            try {
                $publishedAt = \Carbon\Carbon::parse($request->input('scheduled_at'), $userTz)
                    ->setTimezone(config('app.timezone', 'UTC'));
            } catch (\Exception $e) {
                $publishedAt = \Carbon\Carbon::parse($request->input('scheduled_at'));
            }
            $displayDate = (clone $publishedAt)->setTimezone($userTz)->format('d M Y, h:i A');
            $message = 'Blog post scheduled successfully for ' . $displayDate . '.';
        } elseif (!$isActive) {
            $status = false;
            $publishedAt = null;
            $message = 'Blog post saved as draft successfully.';
        } else {
            $status = true;
            $publishedAt = now();
            $message = 'Blog post published successfully.';
        }

        BlogPost::create([
            'title' => $validated['title'],
            'slug' => $slug,
            'blog_category_id' => null,
            'excerpt' => $validated['excerpt'] ?? null,
            'content' => $validated['content'],
            'image' => $imagePath,
            'meta_title' => $validated['meta_title'] ?? $validated['og_title'] ?? null,
            'meta_description' => $validated['meta_description'] ?? null,
            'meta_keywords' => $validated['meta_keywords'] ?? null,
            'og_title' => $validated['og_title'] ?? $validated['meta_title'] ?? null,
            'og_description' => $validated['og_description'] ?? null,
            'og_image' => $ogImagePath,
            'og_url' => $validated['og_url'] ?? null,
            'author' => $validated['author'] ?? null,
            'status' => $status,
            'published_at' => $publishedAt,
        ]);

        return redirect()
            ->route('admin.blogs.index')
            ->with('success', $message);
    }

    /**
     * Show form to edit an existing blog post.
     */
    public function edit(BlogPost $post)
    {
        return view('admin.blogs.edit', compact('post'));
    }

    /**
     * Update an existing blog post.
     */
    public function update(Request $request, BlogPost $post)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blog_posts,slug,' . $post->id,
            'excerpt' => 'nullable|string|max:1000',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'meta_title' => 'nullable|string|max:70',
            'meta_description' => 'nullable|string|max:160',
            'meta_keywords' => 'nullable|string|max:255',
            'og_title' => 'nullable|string|max:255',
            'og_description' => 'nullable|string|max:1000',
            'og_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'og_url' => 'nullable|string|max:500',
            'author' => 'nullable|string|max:100',
            'is_scheduled' => 'nullable|boolean',
            'scheduled_at' => 'nullable|required_if:is_scheduled,1|date',
            'status' => 'nullable|boolean',
        ], [
            'meta_title.max' => 'Meta Title should not exceed 70 characters (optimal for Google search is 50–60 characters).',
            'meta_description.max' => 'Meta Description should not exceed 160 characters (optimal length is 140–160 characters).',
            'meta_keywords.max' => 'Meta Keywords must not exceed 255 characters.',
            'og_image.max' => 'Og Image size must not exceed 2MB for optimal SEO loading speed.',
            'author.max' => 'Author name must not exceed 100 characters.',
        ]);

        $slug = $validated['slug'] ?? Str::slug($validated['title']);

        $imagePath = $post->image;
        if ($request->hasFile('image')) {
            if ($post->image && Storage::disk('public')->exists($post->image)) {
                Storage::disk('public')->delete($post->image);
            }
            $imagePath = $request->file('image')->store('blogs', 'public');
        }

        $ogImagePath = $post->og_image;
        if ($request->hasFile('og_image')) {
            if ($post->og_image && Storage::disk('public')->exists($post->og_image)) {
                Storage::disk('public')->delete($post->og_image);
            }
            $ogImagePath = $request->file('og_image')->store('blogs/meta', 'public');
        }

        $isScheduled = $request->boolean('is_scheduled');
        $isActive = $request->boolean('status', true);

        if ($isScheduled && $request->filled('scheduled_at')) {
            $status = true;
            $userTz = $request->input('user_timezone') ?: config('app.display_timezone', 'Australia/Melbourne');
            try {
                $publishedAt = \Carbon\Carbon::parse($request->input('scheduled_at'), $userTz)
                    ->setTimezone(config('app.timezone', 'UTC'));
            } catch (\Exception $e) {
                $publishedAt = \Carbon\Carbon::parse($request->input('scheduled_at'));
            }
            $displayDate = (clone $publishedAt)->setTimezone($userTz)->format('d M Y, h:i A');
            $message = 'Blog post scheduled successfully for ' . $displayDate . '.';
        } elseif (!$isActive) {
            $status = false;
            $publishedAt = null;
            $message = 'Blog post moved to draft successfully.';
        } else {
            $status = true;
            $publishedAt = ($post->published_at && $post->published_at->isPast()) ? $post->published_at : now();
            $message = 'Blog post updated and published successfully.';
        }

        $post->update([
            'title' => $validated['title'],
            'slug' => $slug,
            'blog_category_id' => null,
            'excerpt' => $validated['excerpt'] ?? null,
            'content' => $validated['content'],
            'image' => $imagePath,
            'meta_title' => $validated['meta_title'] ?? $validated['og_title'] ?? null,
            'meta_description' => $validated['meta_description'] ?? null,
            'meta_keywords' => $validated['meta_keywords'] ?? null,
            'og_title' => $validated['og_title'] ?? $validated['meta_title'] ?? null,
            'og_description' => $validated['og_description'] ?? null,
            'og_image' => $ogImagePath,
            'og_url' => $validated['og_url'] ?? null,
            'author' => $validated['author'] ?? null,
            'status' => $status,
            'published_at' => $publishedAt,
        ]);

        return redirect()
            ->route('admin.blogs.index')
            ->with('success', $message);
    }

    /**
     * Delete blog post.
     */
    public function destroy(BlogPost $post)
    {
        if ($post->image && Storage::disk('public')->exists($post->image)) {
            Storage::disk('public')->delete($post->image);
        }

        if ($post->og_image && Storage::disk('public')->exists($post->og_image)) {
            Storage::disk('public')->delete($post->og_image);
        }

        $post->delete();

        return redirect()
            ->route('admin.blogs.index')
            ->with('success', 'Blog post deleted successfully.');
    }

    /**
     * Toggle status (Published / Draft).
     */
    public function toggleStatus(BlogPost $post)
    {
        $newStatus = !$post->status;
        $post->update([
            'status' => $newStatus,
            'published_at' => $newStatus && !$post->published_at ? now() : $post->published_at,
        ]);

        $statusLabel = $newStatus ? 'published' : 'moved to draft';

        return redirect()
            ->back()
            ->with('success', "Blog post {$statusLabel} successfully.");
    }
}
