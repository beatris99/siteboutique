<?php

namespace App\Http\Requests;

use App\Enums\LeadStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateLeadRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $featuresText = (string) $this->input('features_text', '');

        $features = collect(preg_split('/[\r\n,]+/', $featuresText))
            ->map(fn ($feature) => trim($feature))
            ->filter()
            ->values()
            ->all();

        $this->merge([
            'total_price' => (int) $this->input('total_price', 0),
            'selected_features' => $features,
        ]);
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],

            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],

            'status' => ['required', 'string', Rule::in(LeadStatus::values())],

            'selected_category_key' => ['nullable', 'string', 'max:255'],
            'selected_category_label' => ['nullable', 'string', 'max:255'],

            'selected_template' => ['required', 'string', 'max:255'],

            'selected_package_key' => ['nullable', 'string', 'max:255'],
            'selected_package_name' => ['nullable', 'string', 'max:255'],

            'selected_features' => ['nullable', 'array'],
            'selected_features.*' => ['string', 'max:255'],

            'total_price' => ['required', 'integer', 'min:0'],

            'message' => ['nullable', 'string', 'max:5000'],

            'follow_up_at' => ['nullable', 'date'],
            'priority' => ['required', 'string', Rule::in(['low', 'normal', 'high'])],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Numele este obligatoriu.',
            'email.email' => 'Emailul nu este valid.',
            'status.required' => 'Statusul este obligatoriu.',
            'status.in' => 'Statusul selectat nu este valid.',
            'selected_template.required' => 'Template-ul este obligatoriu.',
            'total_price.required' => 'Prețul este obligatoriu.',
            'total_price.integer' => 'Prețul trebuie să fie un număr.',
            'follow_up_at.date' => 'Data de follow-up nu este validă.',
            'priority.required' => 'Prioritatea este obligatorie.',
            'priority.in' => 'Prioritatea selectată nu este validă.',
        ];
    }
}
