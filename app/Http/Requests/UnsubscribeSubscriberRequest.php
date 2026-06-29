<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UnsubscribeSubscriberRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => ['required', 'email', 'max:255'],

            // Honeypot — must stay empty.
            'website' => ['nullable', 'max:0'],
        ];
    }
}
