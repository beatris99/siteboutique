<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreSubscriberRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $locale = (string) $this->input(
            'locale',
            session('locale', app()->getLocale())
        );

        if (! in_array($locale, ['ro', 'en'], true)) {
            $locale = 'ro';
        }

        $this->merge([
            'email' => Str::lower(
                trim((string) $this->input('email'))
            ),
            'locale' => $locale,
        ]);
    }

    public function rules(): array
    {
        return [
            'email' => [
                'required',
                'email:rfc,dns',
                'max:255',
            ],
            'privacyAccepted' => [
                'required',
                'accepted',
            ],
            'sourcePage' => [
                'nullable',
                'string',
                'max:2048',
            ],
            'locale' => [
                'required',
                'in:ro,en',
            ],
            'website' => [
                'nullable',
                'max:0',
            ],
        ];
    }

    public function messages(): array
    {
        $locale = (string) $this->input('locale', 'ro');

        return [
            'email.required' => trans(
                'newsletter.validation.email_required',
                [],
                $locale
            ),
            'email.email' => trans(
                'newsletter.validation.email_invalid',
                [],
                $locale
            ),
            'email.max' => trans(
                'newsletter.validation.email_invalid',
                [],
                $locale
            ),
            'privacyAccepted.required' => trans(
                'newsletter.validation.consent_required',
                [],
                $locale
            ),
            'privacyAccepted.accepted' => trans(
                'newsletter.validation.consent_required',
                [],
                $locale
            ),
            'locale.in' => trans(
                'newsletter.validation.invalid_locale',
                [],
                $locale
            ),
            'website.max' => trans(
                'newsletter.validation.request_rejected',
                [],
                $locale
            ),
        ];
    }
}
