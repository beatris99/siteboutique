<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLeadRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'totalPrice' => (int) $this->input('totalPrice', 0),
        ]);
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],

            'email' => ['nullable', 'required_without:phone', 'email', 'max:255'],
            'phone' => ['nullable', 'required_without:email', 'string', 'max:50'],

            'message' => ['nullable', 'string', 'max:5000'],

            'template' => ['required', 'string', 'max:255'],

            'categoryKey' => ['nullable', 'string', 'max:255'],
            'categoryLabel' => ['nullable', 'string', 'max:255'],

            'packageKey' => ['nullable', 'string', 'max:255'],
            'packageName' => ['nullable', 'string', 'max:255'],

            'features' => ['nullable', 'array'],
            'features.*' => ['string', 'max:255'],

            'totalPrice' => ['required', 'integer', 'min:0'],

            'privacyAccepted' => ['accepted'],

            // Honeypot antispam.
            // Utilizatorii reali nu văd câmpul acesta.
            // Boții îl completează des, iar atunci cererea pică.
            'website' => ['nullable', 'max:0'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Numele este obligatoriu.',

            'email.required_without' => 'Completează emailul sau telefonul.',
            'email.email' => 'Emailul nu este valid.',

            'phone.required_without' => 'Completează telefonul sau emailul.',

            'template.required' => 'Trebuie selectat un template.',

            'totalPrice.required' => 'Prețul estimativ este obligatoriu.',
            'totalPrice.integer' => 'Prețul trebuie să fie un număr.',

            'privacyAccepted.accepted' => 'Trebuie să fii de acord să fii contactat/ă pentru această cerere.',

            'website.max' => 'Cererea nu a putut fi trimisă.',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'nume',
            'email' => 'email',
            'phone' => 'telefon',
            'message' => 'mesaj',
            'template' => 'template',
            'categoryKey' => 'categorie',
            'categoryLabel' => 'categorie',
            'packageKey' => 'pachet',
            'packageName' => 'pachet',
            'features' => 'funcționalități',
            'totalPrice' => 'preț total',
            'privacyAccepted' => 'acord contact',
            'website' => 'website',
        ];
    }
}
