<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'short_description',
        'description',
        'image',
        'starting_price',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
        'starting_price' => 'decimal:2',
    ];

    /**
     * Get the resolved URL for the service image.
     */
    public function getImageUrlAttribute(): ?string
    {
        if (empty($this->image)) {
            return asset('images/service banner.jpg');
        }

        if (str_starts_with($this->image, 'http://') || str_starts_with($this->image, 'https://')) {
            return $this->image;
        }

        $cleanPath = ltrim($this->image, '/');

        if (str_starts_with($cleanPath, 'storage/')) {
            return asset($cleanPath);
        }

        if (file_exists(public_path($cleanPath))) {
            return asset($cleanPath);
        }

        if (file_exists(public_path('images/' . $cleanPath))) {
            return asset('images/' . $cleanPath);
        }

        if (file_exists(storage_path('app/public/' . $cleanPath))) {
            return asset('storage/' . $cleanPath);
        }

        if (file_exists(public_path('storage/' . $cleanPath))) {
            return asset('storage/' . $cleanPath);
        }

        if (str_starts_with($cleanPath, 'services/')) {
            return asset('storage/' . $cleanPath);
        }

        return asset('images/service banner.jpg');
    }

    /**
     * Order services so standard services appear in their canonical order,
     * followed by any custom-added services by creation order.
     */
    public function scopeOrdered($query)
    {
        $orderedSlugs = [
            'pre-purchase-building-and-pest-inspection',
            'building-stage-by-stage-inspection',
            'new-build-handover-inspection',
            'rising-damp-inspection',
            'pool-barrier-inspection',
            'apartment-building-inspection',
            'dilapidation-inspection',
            'vendor-inspection',
            'builders-warranty-inspection',
        ];

        $cases = [];
        $params = [];
        foreach ($orderedSlugs as $i => $slug) {
            $cases[] = "WHEN slug = ? THEN " . ($i + 1);
            $params[] = $slug;
        }
        $caseSql = "CASE " . implode(" ", $cases) . " ELSE 999 END, id ASC";

        return $query->orderByRaw($caseSql, $params);
    }
}