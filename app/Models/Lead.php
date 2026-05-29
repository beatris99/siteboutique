<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'selected_template',
        'selected_features',
        'total_price',
        'message',
        'status',
        'selected_category_key',
        'selected_category_label',
    ];

    protected $casts = [
        'selected_features' => 'array',
    ];
}
