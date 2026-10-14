<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuoteRequest extends Model
{
    /**
     * Default Australian timezone (Melbourne / Victoria - AEST/AEDT).
     */
    public const DEFAULT_TIMEZONE = 'Australia/Melbourne';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'property_address',
        'service_type',
        'message',
        'status',
    ];

    /**
     * Get created_at converted to the Australian timezone.
     *
     * @return \Illuminate\Support\Carbon|null
     */
    public function getCreatedAtAustraliaAttribute()
    {
        $tz = config('app.display_timezone', self::DEFAULT_TIMEZONE);
        return $this->created_at ? $this->created_at->copy()->setTimezone($tz) : null;
    }

    /**
     * Get formatted Australian received time (e.g. "13 Oct 2026, 09:36 PM").
     *
     * @return string
     */
    public function getAustralianReceivedTimeAttribute()
    {
        return $this->created_at_australia ? $this->created_at_australia->format('d M Y, h:i A') : 'N/A';
    }

    /**
     * Get Australian timezone abbreviation (e.g. "AEDT" or "AEST").
     *
     * @return string
     */
    public function getAustralianTimezoneAbbrAttribute()
    {
        return $this->created_at_australia ? $this->created_at_australia->format('T') : '';
    }
}