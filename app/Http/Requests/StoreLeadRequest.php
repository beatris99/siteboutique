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

            // Clientul trebuie să lase măcar email sau telefon.
            'email' => ['nullable', 'required_without:phone', 'email', 'max:255'],
            'phone' => ['nullable', 'required_without:email', 'string', 'max:50'],

            'message' => ['nullable', 'string', 'max:5000'],

            'template' => ['required', 'string', 'max:255'],

            'features' => ['nullable', 'array'],
            'features.*' => ['string', 'max:255'],

            'totalPrice' => ['required', 'integer', 'min:0'],
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
            'features' => 'funcționalități',
            'totalPrice' => 'preț total',
        ];
    }
}
