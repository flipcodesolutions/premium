<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    /**
     * Display all services with pagination.
     */
    public function index(Request $request)
    {
        $perPage = (int) $request->input('per_page', 10);
        $perPage = in_array($perPage, [5, 10, 25, 50]) ? $perPage : 10;

        $services = Service::latest()->paginate($perPage)->withQueryString();

        return view('admin.services.index', compact('services'));
    }


    /**
     * Show create service form.
     */
    public function create()
    {
        return view('admin.services.create');
    }


    /**
     * Store a new service.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'slug' => [
                'nullable',
                'string',
                'max:255',
                'unique:services,slug',
            ],

            'short_description' => [
                'required',
                'string',
                'max:500',
            ],

            'description' => [
                'required',
                'string',
            ],

            'starting_price' => [
                'nullable',
                'numeric',
                'min:0',
            ],

            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            'meta_title' => [
                'nullable',
                'string',
                'max:70',
            ],

            'meta_description' => [
                'nullable',
                'string',
                'max:160',
            ],

            'meta_keywords' => [
                'nullable',
                'string',
                'max:255',
            ],

            'og_title' => [
                'nullable',
                'string',
                'max:255',
            ],

            'og_description' => [
                'nullable',
                'string',
                'max:1000',
            ],

            'og_image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            'og_url' => [
                'nullable',
                'string',
                'max:500',
            ],

            'author' => [
                'nullable',
                'string',
                'max:100',
            ],

            'status' => [
                'nullable',
                'boolean',
            ],
        ], [
            'meta_title.max' => 'Meta Title should not exceed 70 characters (optimal for Google search is 50–60 characters).',
            'meta_description.max' => 'Meta Description should not exceed 160 characters (optimal length is 140–160 characters).',
            'meta_keywords.max' => 'Meta Keywords must not exceed 255 characters.',
            'og_image.max' => 'Og Image size must not exceed 2MB for optimal SEO loading speed.',
            'author.max' => 'Author name must not exceed 100 characters.',
        ]);


        /*
        |--------------------------------------------------------------------------
        | Generate slug automatically
        |--------------------------------------------------------------------------
        */

        $slug = $validated['slug']
            ?? Str::slug($validated['name']);


        /*
        |--------------------------------------------------------------------------
        | Make sure slug is unique
        |--------------------------------------------------------------------------
        */

        $originalSlug = $slug;
        $counter = 1;

        while (Service::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }


        /*
        |--------------------------------------------------------------------------
        | Upload image
        |--------------------------------------------------------------------------
        */

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request
                ->file('image')
                ->store('services', 'public');
        }

        $ogImagePath = null;

        if ($request->hasFile('og_image')) {
            $ogImagePath = $request
                ->file('og_image')
                ->store('services/meta', 'public');
        }


        /*
        |--------------------------------------------------------------------------
        | Create service
        |--------------------------------------------------------------------------
        */

        Service::create([
            'name' => $validated['name'],

            'slug' => $slug,

            'short_description' =>
                $validated['short_description'],

            'description' =>
                $validated['description'],

            'starting_price' =>
                $validated['starting_price'] ?? null,

            'image' => $imagePath,

            'meta_title' =>
                $validated['meta_title'] ?? $validated['og_title'] ?? null,

            'meta_description' =>
                $validated['meta_description'] ?? null,

            'meta_keywords' =>
                $validated['meta_keywords'] ?? null,

            'og_title' =>
                $validated['og_title'] ?? $validated['meta_title'] ?? null,

            'og_description' =>
                $validated['og_description'] ?? null,

            'og_image' => $ogImagePath,

            'og_url' =>
                $validated['og_url'] ?? null,

            'author' =>
                $validated['author'] ?? null,

            'status' =>
                $request->boolean('status'),
        ]);


        return redirect()
            ->route('admin.services.index')
            ->with(
                'success',
                'Service created successfully.'
            );
    }


    /**
     * Show edit service form.
     */
    public function edit(Service $service)
    {
        return view(
            'admin.services.edit',
            compact('service')
        );
    }


    /**
     * Update existing service.
     */
    public function update(
        Request $request,
        Service $service
    ) {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'slug' => [
                'nullable',
                'string',
                'max:255',
                'unique:services,slug,' . $service->id,
            ],

            'short_description' => [
                'required',
                'string',
                'max:500',
            ],

            'description' => [
                'required',
                'string',
            ],

            'starting_price' => [
                'nullable',
                'numeric',
                'min:0',
            ],

            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            'meta_title' => [
                'nullable',
                'string',
                'max:70',
            ],

            'meta_description' => [
                'nullable',
                'string',
                'max:160',
            ],

            'meta_keywords' => [
                'nullable',
                'string',
                'max:255',
            ],

            'og_title' => [
                'nullable',
                'string',
                'max:255',
            ],

            'og_description' => [
                'nullable',
                'string',
                'max:1000',
            ],

            'og_image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            'og_url' => [
                'nullable',
                'string',
                'max:500',
            ],

            'author' => [
                'nullable',
                'string',
                'max:100',
            ],

            'status' => [
                'nullable',
                'boolean',
            ],
        ], [
            'meta_title.max' => 'Meta Title should not exceed 70 characters (optimal for Google search is 50–60 characters).',
            'meta_description.max' => 'Meta Description should not exceed 160 characters (optimal length is 140–160 characters).',
            'meta_keywords.max' => 'Meta Keywords must not exceed 255 characters.',
            'og_image.max' => 'Og Image size must not exceed 2MB for optimal SEO loading speed.',
            'author.max' => 'Author name must not exceed 100 characters.',
        ]);


        /*
        |--------------------------------------------------------------------------
        | Slug
        |--------------------------------------------------------------------------
        */

        $slug = $validated['slug']
            ?? Str::slug($validated['name']);


        /*
        |--------------------------------------------------------------------------
        | Image
        |--------------------------------------------------------------------------
        */

        $imagePath = $service->image;

        if ($request->hasFile('image')) {

            // Delete old image
            if (
                $service->image &&
                Storage::disk('public')->exists($service->image)
            ) {
                Storage::disk('public')
                    ->delete($service->image);
            }


            // Upload new image
            $imagePath = $request
                ->file('image')
                ->store('services', 'public');
        }

        $ogImagePath = $service->og_image;

        if ($request->hasFile('og_image')) {
            if (
                $service->og_image &&
                Storage::disk('public')->exists($service->og_image)
            ) {
                Storage::disk('public')
                    ->delete($service->og_image);
            }

            $ogImagePath = $request
                ->file('og_image')
                ->store('services/meta', 'public');
        }


        /*
        |--------------------------------------------------------------------------
        | Update service
        |--------------------------------------------------------------------------
        */

        $service->update([
            'name' => $validated['name'],

            'slug' => $slug,

            'short_description' =>
                $validated['short_description'],

            'description' =>
                $validated['description'],

            'starting_price' =>
                $validated['starting_price'] ?? null,

            'image' => $imagePath,

            'meta_title' =>
                $validated['meta_title'] ?? $validated['og_title'] ?? null,

            'meta_description' =>
                $validated['meta_description'] ?? null,

            'meta_keywords' =>
                $validated['meta_keywords'] ?? null,

            'og_title' =>
                $validated['og_title'] ?? $validated['meta_title'] ?? null,

            'og_description' =>
                $validated['og_description'] ?? null,

            'og_image' => $ogImagePath,

            'og_url' =>
                $validated['og_url'] ?? null,

            'author' =>
                $validated['author'] ?? null,

            'status' =>
                $request->boolean('status'),
        ]);


        return redirect()
            ->route('admin.services.index')
            ->with(
                'success',
                'Service updated successfully.'
            );
    }


    /**
     * Delete service.
     */
    public function destroy(Service $service)
    {
        /*
        |--------------------------------------------------------------------------
        | Delete service image
        |--------------------------------------------------------------------------
        */

        if (
            $service->image &&
            Storage::disk('public')->exists($service->image)
        ) {
            Storage::disk('public')
                ->delete($service->image);
        }

        if (
            $service->og_image &&
            Storage::disk('public')->exists($service->og_image)
        ) {
            Storage::disk('public')
                ->delete($service->og_image);
        }


        /*
        |--------------------------------------------------------------------------
        | Delete service
        |--------------------------------------------------------------------------
        */

        $service->delete();


        return redirect()
            ->route('admin.services.index')
            ->with(
                'success',
                'Service deleted successfully.'
            );
    }


    /**
     * Toggle service status.
     */
    public function toggleStatus(Service $service)
    {
        $service->update([
            'status' => !$service->status,
        ]);


        return redirect()
            ->back()
            ->with(
                'success',
                'Service status updated successfully.'
            );
    }
}