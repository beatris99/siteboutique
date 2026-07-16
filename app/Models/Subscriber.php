<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Subscriber extends Model
{
    protected $fillable = [
        'email',
        'locale',
        'is_active',
        'subscribed_at',
        'discount_code',
        'discount_percent',
        'discount_expires_at',
        'used_at',
        'unsubscribe_token',
        'unsubscribed_at',
        'privacy_accepted_at',
        'last_requested_at',
        'last_sent_at',
        'request_count',
        'source_page',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'subscribed_at' => 'datetime',
        'discount_percent' => 'integer',
        'discount_expires_at' => 'datetime',
        'used_at' => 'datetime',
        'unsubscribed_at' => 'datetime',
        'privacy_accepted_at' => 'datetime',
        'last_requested_at' => 'datetime',
        'last_sent_at' => 'datetime',
        'request_count' => 'integer',
    ];

    public static function generateUniqueDiscountCode(): string
    {
        $alphabet = 'ABCDEFGHJKMNPQRSTUVWXYZ23456789';

        do {
            $code = 'SG-';

            for ($i = 0; $i < 6; $i++) {
                $code .= $alphabet[\random_int(0, \strlen($alphabet) - 1)];
            }
        } while (self::query()->where('discount_code', $code)->exists());

        return $code;
    }

    public static function generateUniqueUnsubscribeToken(): string
    {
        do {
            $token = Str::random(64);
        } while (self::query()->where('unsubscribe_token', $token)->exists());

        return $token;
    }

    public function isActive(): bool
    {
        return $this->is_active && $this->unsubscribed_at === null;
    }

    public function hasValidDiscountCode(): bool
    {
        if (! $this->discount_code || $this->used_at || ! $this->isActive()) {
            return false;
        }

        return $this->discount_expires_at === null
            || $this->discount_expires_at->isFuture();
    }

    public function campaignStatus(): string
    {
        if (! $this->isActive()) {
            return 'unsubscribed';
        }

        if ($this->used_at) {
            return 'used';
        }

        if ($this->discount_expires_at?->isPast()) {
            return 'expired';
        }

        return 'valid';
    }
}
