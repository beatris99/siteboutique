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

            'website' => ['nullable', 'max:0'],
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Te rugăm să introduci adresa de email.',
            'email.email' => 'Te rugăm să introduci o adresă de email validă.',
            'website.max' => 'Cererea nu a putut fi trimisă.',
        ];
    }
}
