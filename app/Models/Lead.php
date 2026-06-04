<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lead extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'selected_template',
        'selected_category_key',
        'selected_category_label',
        'selected_package_key',
        'selected_package_name',
        'selected_features',
        'total_price',
        'message',
        'status',
        'follow_up_at',
        'priority',
        'business_type',
        'has_logo',
        'has_photos',
        'has_domain',
        'budget_range',
        'urgency',
        'launch_deadline',
        'source_page',
        'request_type',
        'site_goal',
    ];

    protected $casts = [
        'selected_features' => 'array',
        'follow_up_at' => 'datetime',
        'has_logo' => 'boolean',
        'has_photos' => 'boolean',
        'has_domain' => 'boolean',
        'launch_deadline' => 'date',
    ];

    public function getWhatsappUrlAttribute(): ?string
    {
        if (! $this->phone) {
            return null;
        }

        $number = preg_replace('/\D+/', '', $this->phone);

        if (! $number) {
            return null;
        }

        if (str_starts_with($number, '0')) {
            $number = '40' . substr($number, 1);
        }

        if (strlen($number) < 8) {
            return null;
        }

        return 'https://wa.me/' . $number;
    }

    public function getEmailUrlAttribute(): ?string
    {
        if (! $this->email) {
            return null;
        }

        $subject = rawurlencode('SiteBoutique - cererea ta pentru ' . $this->selected_template);
        $body = rawurlencode("Bună,\n\nAm primit cererea ta pentru proiectul web și revin cu câteva detalii.");

        return "mailto:{$this->email}?subject={$subject}&body={$body}";
    }

    public function notes(): HasMany
    {
        return $this->hasMany(LeadNote::class)->latest();
    }
}
