<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vehicle extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'type',
        'use_case',
        'brand',
        'model',
        'weekly_price',
        'deposit',
        'fuel_type',
        'license_required',
        'short_description',
        'description',
        'is_available',
        'is_active',
    ];

    protected $casts = [
        'weekly_price' => 'decimal:2',
        'deposit' => 'decimal:2',
        'is_available' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function images(): HasMany
    {
        return $this->hasMany(VehicleImage::class)->orderBy('sort_order');
    }

    public function getPrimaryImageUrlAttribute(): string
    {
        $image = $this->relationLoaded('images')
            ? $this->images->first()
            : $this->images()->first();

        return $image?->image_url ?? asset('images/brand/rentride-brand.png');
    }

    public function isForFun(): bool
    {
        return in_array($this->use_case, ['fun', 'both'], true);
    }

    public function isForDelivery(): bool
    {
        return in_array($this->use_case, ['delivery', 'both'], true);
    }

    public function rentalPlans(): HasMany
    {
        return $this->hasMany(VehicleRentalPlan::class)->orderBy('sort_order');
    }

    public function activeRentalPlans(): HasMany
    {
        return $this->rentalPlans()->where('is_active', true);
    }

    public function funRentalPlans(): HasMany
    {
        return $this->activeRentalPlans()->whereIn('use_case', ['fun', 'both']);
    }

    public function deliveryRentalPlans(): HasMany
    {
        return $this->activeRentalPlans()->whereIn('use_case', ['delivery', 'both']);
    }
}
