<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CrmMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CrmMasterController extends Controller
{
    /**
     * Display a listing of CRM Master records.
     */
    public function index(Request $request)
    {
        $query = CrmMaster::latest();

        // Filter by status
        if ($request->filled('status')) {
            if ($request->status === 'active') {
                $query->where('status', true);
            } elseif ($request->status === 'inactive') {
                $query->where('status', false);
            }
        }

        // Search by title, author, or description
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('author', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $perPage = (int) $request->input('per_page', 10);
        $perPage = in_array($perPage, [5, 10, 25, 50]) ? $perPage : 10;

        $records = $query->paginate($perPage)->withQueryString();

        $counts = [
            'all' => CrmMaster::count(),
            'active' => CrmMaster::where('status', true)->count(),
            'inactive' => CrmMaster::where('status', false)->count(),
        ];

        return view('admin.crm-masters.index', compact('records', 'counts'));
    }

    /**
     * Show the form for creating a new CRM Master.
     */
    public function create()
    {
        return view('admin.crm-masters.create');
    }

    /**
     * Store a newly created CRM Master.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:crm_masters,slug',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'description' => 'nullable|string',
            'publish_date' => 'nullable|date',
            'status' => 'nullable|boolean',
            'meta_title' => 'nullable|string|max:70',
            'meta_description' => 'nullable|string|max:160',
            'meta_keywords' => 'nullable|string|max:255',
            'og_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'author' => 'nullable|string|max:100',
        ], [
            'meta_title.max' => 'Meta Title should not exceed 70 characters (optimal length is 50–60 characters).',
            'meta_description.max' => 'Meta Description should not exceed 160 characters (optimal length is 140–160 characters).',
            'meta_keywords.max' => 'Meta Keywords must not exceed 255 characters.',
            'og_image.image' => 'Og Image must be a valid image file.',
            'og_image.mimes' => 'Og Image must be JPG, JPEG, PNG, or WEBP format.',
            'og_image.max' => 'Og Image size must not exceed 2MB for fast loading and social share.',
            'author.max' => 'Author name must not exceed 100 characters.',
        ]);

        // Auto-generate unique slug
        $slug = $validated['slug'] ?? Str::slug($validated['title']);
        $originalSlug = $slug;
        $counter = 1;

        while (CrmMaster::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        // Upload Main Image
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('crm-masters', 'public');
        }

        // Upload OG Image
        $ogImagePath = null;
        if ($request->hasFile('og_image')) {
            $ogImagePath = $request->file('og_image')->store('crm-masters/meta', 'public');
        }

        CrmMaster::create([
            'title' => $validated['title'],
            'slug' => $slug,
            'image' => $imagePath,
            'description' => $validated['description'] ?? null,
            'publish_date' => $validated['publish_date'] ?? null,
            'status' => $request->boolean('status', true),
            'meta_title' => $validated['meta_title'] ?? null,
            'meta_description' => $validated['meta_description'] ?? null,
            'meta_keywords' => $validated['meta_keywords'] ?? null,
            'og_image' => $ogImagePath,
            'author' => $validated['author'] ?? null,
        ]);

        return redirect()
            ->route('admin.crm-masters.index')
            ->with('success', 'CRM Master record created successfully.');
    }

    /**
     * Show the form for editing an existing CRM Master.
     */
    public function edit(CrmMaster $crmMaster)
    {
        return view('admin.crm-masters.edit', compact('crmMaster'));
    }

    /**
     * Update an existing CRM Master.
     */
    public function update(Request $request, CrmMaster $crmMaster)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:crm_masters,slug,' . $crmMaster->id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'description' => 'nullable|string',
            'publish_date' => 'nullable|date',
            'status' => 'nullable|boolean',
            'meta_title' => 'nullable|string|max:70',
            'meta_description' => 'nullable|string|max:160',
            'meta_keywords' => 'nullable|string|max:255',
            'og_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'author' => 'nullable|string|max:100',
        ], [
            'meta_title.max' => 'Meta Title should not exceed 70 characters (optimal length is 50–60 characters).',
            'meta_description.max' => 'Meta Description should not exceed 160 characters (optimal length is 140–160 characters).',
            'meta_keywords.max' => 'Meta Keywords must not exceed 255 characters.',
            'og_image.image' => 'Og Image must be a valid image file.',
            'og_image.mimes' => 'Og Image must be JPG, JPEG, PNG, or WEBP format.',
            'og_image.max' => 'Og Image size must not exceed 2MB for fast loading and social share.',
            'author.max' => 'Author name must not exceed 100 characters.',
        ]);

        $slug = $validated['slug'] ?? Str::slug($validated['title']);

        // Upload/replace Main Image
        $imagePath = $crmMaster->image;
        if ($request->hasFile('image')) {
            if ($crmMaster->image && Storage::disk('public')->exists($crmMaster->image)) {
                Storage::disk('public')->delete($crmMaster->image);
            }
            $imagePath = $request->file('image')->store('crm-masters', 'public');
        }

        // Upload/replace OG Image
        $ogImagePath = $crmMaster->og_image;
        if ($request->hasFile('og_image')) {
            if ($crmMaster->og_image && Storage::disk('public')->exists($crmMaster->og_image)) {
                Storage::disk('public')->delete($crmMaster->og_image);
            }
            $ogImagePath = $request->file('og_image')->store('crm-masters/meta', 'public');
        }

        $crmMaster->update([
            'title' => $validated['title'],
            'slug' => $slug,
            'image' => $imagePath,
            'description' => $validated['description'] ?? null,
            'publish_date' => $validated['publish_date'] ?? null,
            'status' => $request->boolean('status', true),
            'meta_title' => $validated['meta_title'] ?? null,
            'meta_description' => $validated['meta_description'] ?? null,
            'meta_keywords' => $validated['meta_keywords'] ?? null,
            'og_image' => $ogImagePath,
            'author' => $validated['author'] ?? null,
        ]);

        return redirect()
            ->route('admin.crm-masters.index')
            ->with('success', 'CRM Master record updated successfully.');
    }

    /**
     * Delete CRM Master.
     */
    public function destroy(CrmMaster $crmMaster)
    {
        if ($crmMaster->image && Storage::disk('public')->exists($crmMaster->image)) {
            Storage::disk('public')->delete($crmMaster->image);
        }

        if ($crmMaster->og_image && Storage::disk('public')->exists($crmMaster->og_image)) {
            Storage::disk('public')->delete($crmMaster->og_image);
        }

        $crmMaster->delete();

        return redirect()
            ->route('admin.crm-masters.index')
            ->with('success', 'CRM Master record deleted successfully.');
    }

    /**
     * Toggle active/inactive status.
     */
    public function toggleStatus(CrmMaster $crmMaster)
    {
        $newStatus = !$crmMaster->status;
        $crmMaster->update(['status' => $newStatus]);

        $label = $newStatus ? 'activated' : 'deactivated';

        return redirect()
            ->back()
            ->with('success', "CRM Master {$label} successfully.");
    }
}
