<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of gallery images with filtering and pagination.
     */
    public function index(Request $request)
    {
        // Auto-seed default gallery photos if database is empty
        if (Gallery::count() === 0) {
            (new \Database\Seeders\GallerySeeder())->run();
        }

        $query = Gallery::query();

        // Search filter
        if ($request->filled('search')) {
            $search = trim($request->input('search'));
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Status filter
        if ($request->filled('status') && in_array($request->input('status'), ['active', 'inactive'])) {
            $query->where('status', $request->input('status') === 'active');
        }

        // Stats summary counts
        $totalGalleries = Gallery::count();
        $activeGalleries = Gallery::where('status', true)->count();
        $inactiveGalleries = Gallery::where('status', false)->count();

        // Sorting & pagination
        $perPage = (int) $request->input('per_page', 12);
        $perPage = in_array($perPage, [12, 24, 48]) ? $perPage : 12;

        $galleries = $query->orderBy('sort_order', 'asc')
            ->latest('id')
            ->paginate($perPage)
            ->withQueryString();

        return view('admin.galleries.index', compact(
            'galleries',
            'totalGalleries',
            'activeGalleries',
            'inactiveGalleries'
        ));
    }

    /**
     * Show the form for creating a new gallery item.
     */
    public function create()
    {
        $nextSortOrder = ((int) Gallery::max('sort_order')) + 1;

        return view('admin.galleries.create', compact('nextSortOrder'));
    }

    /**
     * Store a newly created gallery image in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['nullable', 'string', 'max:255'],
            'image' => ['required', 'image', 'mimes:jpeg,jpg,png,webp', 'max:5120'],
            'description' => ['nullable', 'string', 'max:1000'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'status' => ['nullable', 'boolean'],
        ]);

        $imagePath = $request->file('image')->store('gallery', 'public');

        Gallery::create([
            'title' => $validated['title'] ?? 'Building Inspection in Melbourne',
            'image' => $imagePath,
            'description' => $validated['description'] ?? null,
            'sort_order' => $validated['sort_order'] ?? (((int) Gallery::max('sort_order')) + 1),
            'status' => $request->boolean('status', true),
        ]);

        return redirect()
            ->route('admin.galleries.index')
            ->with('success', 'Gallery photo uploaded successfully.');
    }

    /**
     * Show the form for editing the specified gallery image.
     */
    public function edit(Gallery $gallery)
    {
        return view('admin.galleries.edit', compact('gallery'));
    }

    /**
     * Update the specified gallery image in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        $validated = $request->validate([
            'title' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpeg,jpg,png,webp', 'max:5120'],
            'description' => ['nullable', 'string', 'max:1000'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'status' => ['nullable', 'boolean'],
        ]);

        $imagePath = $gallery->image;

        if ($request->hasFile('image')) {
            // Remove old uploaded file if it exists on public disk
            if ($gallery->image && Storage::disk('public')->exists($gallery->image)) {
                Storage::disk('public')->delete($gallery->image);
            }

            $imagePath = $request->file('image')->store('gallery', 'public');
        }

        $gallery->update([
            'title' => $validated['title'] ?? $gallery->title,
            'image' => $imagePath,
            'description' => $validated['description'] ?? null,
            'sort_order' => $validated['sort_order'] ?? $gallery->sort_order,
            'status' => $request->boolean('status'),
        ]);

        return redirect()
            ->route('admin.galleries.index')
            ->with('success', 'Gallery photo updated successfully.');
    }

    /**
     * Remove the specified gallery item from storage.
     */
    public function destroy(Gallery $gallery)
    {
        if ($gallery->image && Storage::disk('public')->exists($gallery->image)) {
            Storage::disk('public')->delete($gallery->image);
        }

        $gallery->delete();

        return redirect()
            ->route('admin.galleries.index')
            ->with('success', 'Gallery photo deleted successfully.');
    }

    /**
     * Toggle active/inactive status of a gallery item.
     */
    public function toggleStatus(Gallery $gallery)
    {
        $gallery->update([
            'status' => !$gallery->status,
        ]);

        $statusText = $gallery->status ? 'Active' : 'Inactive';

        return redirect()
            ->back()
            ->with('success', "Gallery photo status updated to {$statusText}.");
    }

    /**
     * Optional utility to import existing static images into the database for admin management.
     */
    public function syncDefaults()
    {
        $beforeCount = Gallery::count();
        (new \Database\Seeders\GallerySeeder())->run();
        $afterCount = Gallery::count();
        $newCount = $afterCount - $beforeCount;

        if ($newCount > 0) {
            return redirect()
                ->route('admin.galleries.index')
                ->with('success', "{$newCount} default gallery photos synced into the database successfully!");
        }

        return redirect()
            ->route('admin.galleries.index')
            ->with('info', 'All default gallery photos have already been synced.');
    }
}
