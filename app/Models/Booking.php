<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'property_address',
        'service_type',
        'inspection_date',
        'inspection_time',
        'message',
        'status',
    ];

    protected $casts = [
        'inspection_date' => 'date',
    ];
}