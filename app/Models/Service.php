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
}