<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubscriberRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => ['required', 'email', 'max:255'],
            'privacyAccepted' => ['accepted'],
            'sourcePage' => ['nullable', 'string', 'max:255'],

            // Honeypot — must stay empty.
            'website' => ['nullable', 'max:0'],
        ];
    }
}
