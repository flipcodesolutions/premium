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
     * Display all services.
     */
    public function index()
    {
        $services = Service::latest()->paginate(10);

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

            'status' => [
                'nullable',
                'boolean',
            ],
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

            'status' => [
                'nullable',
                'boolean',
            ],
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