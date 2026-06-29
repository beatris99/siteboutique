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
        'unsubscribe_token',
        'used_at',
        'unsubscribed_at',
        'privacy_accepted_at',
        'last_sent_at',
        'source_page',
    ];

    protected $casts = [
        'used_at' => 'datetime',
        'unsubscribed_at' => 'datetime',
        'privacy_accepted_at' => 'datetime',
        'last_sent_at' => 'datetime',
        'discount_percent' => 'integer',
    ];

    /**
     * Generate a unique, human-friendly discount code (e.g. "SG-7K2QXM").
     * Ambiguous characters (0/O/1/I) are excluded so codes are easy to type.
     */
    public static function generateUniqueCode(): string
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

    public function isUnsubscribed(): bool
    {
        return $this->unsubscribed_at !== null;
    }
}
