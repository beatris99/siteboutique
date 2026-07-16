<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminLoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email:rfc', 'max:254'],
            'password' => ['required', 'string', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' =>  __('admin_auth.validation.email_required'),

            'email.email' => __('admin_auth.validation.email_invalid'),

            'email.max' => __('admin_auth.validation.email_invalid'),

            'password.required' => __('admin_auth.validation.password_required'),

            'password.max' => __('admin_auth.validation.password_invalid'),
        ];
    }
}
