<?php

namespace App\Http\Controllers;

use App\Models\Service;

class ServiceController extends Controller
{
    /**
     * Display all active services.
     */
    public function index()
    {
        $services = Service::where('status', true)
            ->latest()
            ->get();

        return view('services.index', compact('services'));
    }

    /**
     * Display a single service.
     */
    public function show($slug)
    {
        $service = Service::where('slug', $slug)
            ->where('status', true)
            ->firstOrFail();

        $relatedServices = Service::where('status', true)
            ->where('id', '!=', $service->id)
            ->latest()
            ->take(3)
            ->get();

        return view(
            'services.show',
            compact('service', 'relatedServices')
        );
    }
}