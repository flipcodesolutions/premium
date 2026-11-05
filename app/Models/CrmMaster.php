<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CrmMaster extends Model
{
    protected $table = 'crm_masters';

    protected $fillable = [
        'title',
        'slug',
        'image',
        'description',
        'publish_date',
        'status',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'og_image',
        'author',
    ];

    protected $casts = [
        'status' => 'boolean',
        'publish_date' => 'date',
    ];

    /**
     * Get the resolved URL for the main image.
     */
    public function getImageUrlAttribute(): ?string
    {
        if (empty($this->image)) {
            return null;
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

        return asset('storage/' . $cleanPath);
    }

    /**
     * Get the resolved URL for the OG image.
     */
    public function getOgImageUrlAttribute(): ?string
    {
        if (empty($this->og_image)) {
            return null;
        }

        if (str_starts_with($this->og_image, 'http://') || str_starts_with($this->og_image, 'https://')) {
            return $this->og_image;
        }

        $cleanPath = ltrim($this->og_image, '/');

        if (str_starts_with($cleanPath, 'storage/')) {
            return asset($cleanPath);
        }

        if (file_exists(public_path($cleanPath))) {
            return asset($cleanPath);
        }

        return asset('storage/' . $cleanPath);
    }
}
