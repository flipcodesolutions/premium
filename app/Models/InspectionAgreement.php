<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InspectionAgreement extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'first_name',
        'last_name',
        'name',
        'phone',
        'email',
        'property_address',
        'agent_mobile',
        'service_type',
        'agreement_version',
        'status',
        'ip_address',
        'user_agent',
        'accepted_at',
        'notes',
    ];

    protected $casts = [
        'accepted_at' => 'datetime',
    ];

    /**
     * Relationship with Booking model.
     */
    public function booking()
    {
        return $this->belongsTo(Booking::class, 'booking_id');
    }

    /**
     * Formatted agreement reference code, e.g. AGR-00042.
     */
    public function getReferenceCodeAttribute(): string
    {
        return 'AGR-' . str_pad($this->id, 5, '0', STR_PAD_LEFT);
    }
}
