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

        // Filter by category
        if ($request->filled('category_id') && $request->category_id !== 'all') {
            $query->where('blog_category_id', $request->category_id);
        }

        // Filter by status
        if ($request->filled('status')) {
            if ($request->status === 'published') {
                $query->where('status', true);
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

        $posts = $query->paginate(10)->withQueryString();
        $categories = BlogCategory::orderBy('name')->get();

        return view('admin.blogs.index', compact('posts', 'categories'));
    }

    /**
     * Show form to create a new blog post.
     */
    public function create()
    {
        $categories = BlogCategory::orderBy('name')->get();

        return view('admin.blogs.create', compact('categories'));
    }

    /**
     * Store a newly created blog post.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blog_posts,slug',
            'blog_category_id' => 'nullable|exists:blog_categories,id',
            'excerpt' => 'nullable|string|max:1000',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'status' => 'nullable|boolean',
            'published_at' => 'nullable|date',
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

        $status = $request->boolean('status');
        $publishedAt = $validated['published_at'] ?? ($status ? now() : null);

        BlogPost::create([
            'title' => $validated['title'],
            'slug' => $slug,
            'blog_category_id' => $validated['blog_category_id'] ?? null,
            'excerpt' => $validated['excerpt'] ?? null,
            'content' => $validated['content'],
            'image' => $imagePath,
            'status' => $status,
            'published_at' => $publishedAt,
        ]);

        return redirect()
            ->route('admin.blogs.index')
            ->with('success', 'Blog post created successfully.');
    }

    /**
     * Show form to edit an existing blog post.
     */
    public function edit(BlogPost $post)
    {
        $categories = BlogCategory::orderBy('name')->get();

        return view('admin.blogs.edit', compact('post', 'categories'));
    }

    /**
     * Update an existing blog post.
     */
    public function update(Request $request, BlogPost $post)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blog_posts,slug,' . $post->id,
            'blog_category_id' => 'nullable|exists:blog_categories,id',
            'excerpt' => 'nullable|string|max:1000',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'status' => 'nullable|boolean',
            'published_at' => 'nullable|date',
        ]);

        $slug = $validated['slug'] ?? Str::slug($validated['title']);

        $imagePath = $post->image;
        if ($request->hasFile('image')) {
            if ($post->image && Storage::disk('public')->exists($post->image)) {
                Storage::disk('public')->delete($post->image);
            }
            $imagePath = $request->file('image')->store('blogs', 'public');
        }

        $status = $request->boolean('status');
        $publishedAt = $validated['published_at'] ?? $post->published_at;
        if ($status && !$publishedAt) {
            $publishedAt = now();
        }

        $post->update([
            'title' => $validated['title'],
            'slug' => $slug,
            'blog_category_id' => $validated['blog_category_id'] ?? null,
            'excerpt' => $validated['excerpt'] ?? null,
            'content' => $validated['content'],
            'image' => $imagePath,
            'status' => $status,
            'published_at' => $publishedAt,
        ]);

        return redirect()
            ->route('admin.blogs.index')
            ->with('success', 'Blog post updated successfully.');
    }

    /**
     * Delete blog post.
     */
    public function destroy(BlogPost $post)
    {
        if ($post->image && Storage::disk('public')->exists($post->image)) {
            Storage::disk('public')->delete($post->image);
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
