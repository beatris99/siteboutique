<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateLeadFollowUpRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'follow_up_at' => ['nullable', 'date'],
            'priority' => ['required', 'string', Rule::in(['low', 'normal', 'high'])],
        ];
    }

    public function messages(): array
    {
        return [
            'follow_up_at.date' => 'Data de follow-up nu este validă.',
            'priority.required' => 'Prioritatea este obligatorie.',
            'priority.in' => 'Prioritatea selectată nu este validă.',
        ];
    }
}
