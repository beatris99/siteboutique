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
            'email' => ['required', 'email:rfc,dns', 'max:255'],
            'privacyAccepted' => ['required', 'accepted'],
            'sourcePage' => ['nullable', 'string', 'max:255'],
            'website' => ['nullable', 'max:0'],
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Te rugăm să introduci adresa de email.',
            'email.email' => 'Te rugăm să introduci o adresă de email validă.',
            'privacyAccepted.accepted' => 'Este nevoie de acordul tău pentru a primi emailurile SiteGo.',
            'website.max' => 'Cererea nu a putut fi trimisă.',
        ];
    }
}
