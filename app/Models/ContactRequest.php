<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactRequest extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'email',
        'vehicle_type',
        'message',
        'source',
    ];
}
