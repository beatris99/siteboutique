<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Subscriber extends Model
{
    protected $fillable = [
        'email',
        'discount_code',
        'discount_percent',
        'discount_expires_at',
        'used_at',
        'unsubscribe_token',
        'unsubscribed_at',
        'privacy_accepted_at',
        'last_sent_at',
        'source_page',
    ];

    protected $casts = [
        'discount_percent' => 'integer',
        'discount_expires_at' => 'datetime',
        'used_at' => 'datetime',
        'unsubscribed_at' => 'datetime',
        'privacy_accepted_at' => 'datetime',
        'last_sent_at' => 'datetime',
    ];

    /**
     * Cod unic, ușor de citit. Evită caracterele confuze: 0/O/1/I.
     * Exemple: SG-7K2QXM, SG-M8P4RA.
     */
    public static function generateUniqueDiscountCode(): string
    {
        $alphabet = 'ABCDEFGHJKMNPQRSTUVWXYZ23456789';

        do {
            $code = 'SG-';

            for ($i = 0; $i < 6; $i++) {
                $code .= $alphabet[random_int(0, strlen($alphabet) - 1)];
            }
        } while (self::where('discount_code', $code)->exists());

        return $code;
    }

    public static function generateUniqueUnsubscribeToken(): string
    {
        do {
            $token = Str::random(64);
        } while (self::where('unsubscribe_token', $token)->exists());

        return $token;
    }

    public function isActive(): bool
    {
        return $this->unsubscribed_at === null;
    }

    public function hasValidDiscountCode(): bool
    {
        if (! $this->discount_code || $this->used_at) {
            return false;
        }

        return $this->discount_expires_at === null || $this->discount_expires_at->isFuture();
    }
}
