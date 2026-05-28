<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:30'],
            'email' => ['nullable', 'email', 'max:255'],
            'vehicle_type' => ['nullable', 'string', 'max:100'],
            'message' => ['nullable', 'string', 'max:2000'],
            'website' => ['nullable', 'string', 'max:255'],
            'form_started_at' => ['required', 'integer'],
            'privacy_accepted' => ['accepted'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Te rugăm să completezi numele.',
            'phone.required' => 'Te rugăm să completezi numărul de telefon.',
            'email.email' => 'Te rugăm să introduci o adresă de email validă.',
            'form_started_at.required' => 'Formularul nu a putut fi validat. Te rugăm să reîncerci.',
            'privacy_accepted.accepted' => 'Trebuie să confirmi că ai citit Politica de confidențialitate.',
        ];
    }
}
