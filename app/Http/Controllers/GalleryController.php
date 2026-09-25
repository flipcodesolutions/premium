<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
{
    /**
     * Display gallery images.
     */
    public function index()
    {
        $localImages = [];
        $files = File::glob(public_path('images/g*.*'));

        if (!empty($files)) {
            usort($files, function ($a, $b) {
                preg_match('/(\d+)/', basename($a), $mA);
                preg_match('/(\d+)/', basename($b), $mB);
                $numA = isset($mA[1]) ? (int)$mA[1] : 0;
                $numB = isset($mB[1]) ? (int)$mB[1] : 0;
                if ($numA === $numB) {
                    return strcmp(basename($a), basename($b));
                }
                return $numA <=> $numB;
            });

            foreach ($files as $file) {
                $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                if (in_array($ext, ['jpg', 'jpeg', 'png', 'webp'])) {
                    $localImages[] = basename($file);
                }
            }
        }

        $galleries = Gallery::where('status', true)
            ->whereNotNull('image')
            ->orderBy('sort_order', 'asc')
            ->latest()
            ->get()
            ->filter(function ($item) {
                return !empty($item->image) && file_exists(public_path('storage/' . $item->image));
            });

        return view('gallery.index', compact('localImages', 'galleries'));
    }
}