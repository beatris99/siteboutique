<?php

namespace App\Http\Requests;

use App\Enums\LeadStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateLeadStatusRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'status' => ['required', 'string', Rule::in(LeadStatus::values())],
        ];
    }

    public function messages(): array
    {
        return [
            'status.required' => 'Statusul este obligatoriu.',
            'status.in' => 'Statusul selectat nu este valid.',
        ];
    }
}
