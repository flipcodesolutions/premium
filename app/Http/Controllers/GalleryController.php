<?php

namespace App\Http\Controllers;

use App\Models\Gallery;

class GalleryController extends Controller
{
    /**
     * Display gallery images with titles and descriptions.
     * Synchronized directly with the admin-managed Gallery database.
     */
    public function index()
    {
        // If database table is completely unseeded, auto-seed defaults once
        if (Gallery::count() === 0) {
            (new \Database\Seeders\GallerySeeder())->run();
        }

        // Fetch all active gallery items ordered as configured in admin
        $galleries = Gallery::active()
            ->whereNotNull('image')
            ->orderBy('sort_order', 'asc')
            ->latest('id')
            ->get();

        $galleryItems = [];

        foreach ($galleries as $gallery) {
            $galleryItems[] = [
                'id' => $gallery->id,
                'image' => $gallery->image_url,
                'filename' => basename($gallery->image),
                'title' => $gallery->title ?: 'Building Inspection in Melbourne',
                'description' => $gallery->description ?: 'Comprehensive property inspections by certified building inspectors in Melbourne.',
            ];
        }

        return view('gallery.index', compact('galleryItems', 'galleries'));
    }
}
