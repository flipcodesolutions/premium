<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    protected $fillable = [
        'blog_category_id',
        'title',
        'slug',
        'image',
        'excerpt',
        'content',
        'status',
        'published_at',
    ];

    protected $casts = [
        'status' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function category()
    {
        return $this->belongsTo(
            BlogCategory::class,
            'blog_category_id'
        );
    }

    /**
     * Scope a query to only include published posts (status = true and published_at <= now or null).
     */
    public function scopePublished($query)
    {
        return $query->where('status', true)
            ->where(function ($q) {
                $q->whereNull('published_at')
                  ->orWhere('published_at', '<=', now());
            });
    }

    /**
     * Scope a query to only include scheduled posts (status = true and published_at > now).
     */
    public function scopeScheduled($query)
    {
        return $query->where('status', true)
            ->whereNotNull('published_at')
            ->where('published_at', '>', now());
    }

    /**
     * Determine if the post is scheduled for future publication.
     */
    public function isScheduled(): bool
    {
        return (bool) ($this->status && $this->published_at && $this->published_at->isFuture());
    }

    /**
     * Determine if the post is currently published.
     */
    public function isPublished(): bool
    {
        return (bool) ($this->status && (!$this->published_at || $this->published_at->isPast()));
    }

    /**
     * Get the resolved URL for the post's featured image.
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
}