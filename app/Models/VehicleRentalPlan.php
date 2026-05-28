<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VehicleRentalPlan extends Model
{
    protected $fillable = [
        'vehicle_id',
        'title',
        'label',
        'use_case',
        'duration_unit',
        'duration_value',
        'price',
        'price_note',
        'description',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'is_active' => 'boolean',
        'duration_value' => 'integer',
        'sort_order' => 'integer',
    ];

    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function formattedPrice(): string
    {
        if ($this->price === null) {
            return $this->price_note ?: __('site.pricing.to_be_confirmed');
        }

        return number_format((float) $this->price, 0) . ' ' . __('site.pricing.currency');
    }

    public function durationLabel(): string
    {
        return match ($this->duration_unit) {
            'hour' => trans_choice('site.pricing.hours', $this->duration_value, ['count' => $this->duration_value]),
            'day' => trans_choice('site.pricing.days', $this->duration_value, ['count' => $this->duration_value]),
            'week' => trans_choice('site.pricing.weeks', $this->duration_value, ['count' => $this->duration_value]),
            'month' => trans_choice('site.pricing.months', $this->duration_value, ['count' => $this->duration_value]),
            default => (string) $this->duration_value,
        };
    }
}
