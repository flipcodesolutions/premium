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
            ->ordered()
            ->get();

        return view('services.index', compact('services'));
    }

    /**
     * Display a single service (handles both predefined dedicated views and dynamic database services).
     */
    public function show($slug)
    {
        $service = Service::where('slug', $slug)->first();

        $customView = "services.{$slug}";
        $hasCustomView = view()->exists($customView);

        // If neither the database record nor the custom blade view exists, 404
        if (!$service && !$hasCustomView) {
            abort(404);
        }

        // If service exists but is inactive and user is not admin, 404
        if ($service && !$service->status && !auth()->check()) {
            abort(404);
        }

        $relatedServices = Service::where('status', true)
            ->when($service, fn($q) => $q->where('id', '!=', $service->id))
            ->latest()
            ->take(3)
            ->get();

        $viewName = $hasCustomView ? $customView : 'services.show';

        return view($viewName, compact('service', 'relatedServices'));
    }

    /**
     * Pre-purchase building and pest inspection.
     */
    public function showPrePurchase()
    {
        return $this->show('pre-purchase-building-and-pest-inspection');
    }

    /**
     * Building stage by stage inspection.
     */
    public function showBuildingStage()
    {
        return $this->show('building-stage-by-stage-inspection');
    }

    /**
     * Apartment building inspection.
     */
    public function showApartment()
    {
        return $this->show('apartment-building-inspection');
    }

    /**
     * Rising damp inspection.
     */
    public function showRisingDamp()
    {
        return $this->show('rising-damp-inspection');
    }

    /**
     * Pool barrier inspection.
     */
    public function showPoolBarrier()
    {
        return $this->show('pool-barrier-inspection');
    }

    /**
     * Dilapidation report inspection.
     */
    public function showDilapidation()
    {
        return $this->show('dilapidation-inspection');
    }

    /**
     * New build handover inspection.
     */
    public function showNewBuildHandover()
    {
        return $this->show('new-build-handover-inspection');
    }

    /**
     * Vendor building inspection.
     */
    public function showVendor()
    {
        return $this->show('vendor-inspection');
    }

    /**
     * Builders warranty inspection.
     */
    public function showBuildersWarranty()
    {
        return $this->show('builders-warranty-inspection');
    }
}
