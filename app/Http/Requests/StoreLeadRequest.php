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

            'requestType' => ['nullable', 'string', 'max:255'],
            'siteGoal' => ['nullable', 'string', 'max:255'],

            'businessType' => ['nullable', 'string', 'max:255'],
            'hasLogo' => ['nullable', 'boolean'],
            'hasPhotos' => ['nullable', 'boolean'],
            'hasDomain' => ['nullable', 'boolean'],
            'budgetRange' => ['nullable', 'string', 'max:255'],
            'urgency' => ['nullable', 'string', 'max:255'],
            'launchDeadline' => ['nullable', 'date'],
            'sourcePage' => ['nullable', 'string', 'max:255'],

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
            'template.required' => 'Trebuie selectat un model de site.',
            'totalPrice.required' => 'Prețul estimativ este obligatoriu.',
            'privacyAccepted.accepted' => 'Trebuie să fii de acord să fii contactat/ă pentru această cerere.',
            'website.max' => 'Cererea nu a putut fi trimisă.',
        ];
    }
}
