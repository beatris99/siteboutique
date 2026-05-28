<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class ContactSendRequest extends FormRequest
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
        ];
    }

    public function isBotSubmission(): bool
    {
        if ($this->filled('website')) {
            return true;
        }

        $startedAt = Carbon::createFromTimestamp((int) $this->input('form_started_at'));

        return $startedAt->diffInSeconds(now()) < 3;
    }

    public function contactData(): array
    {
        $data = $this->validated();

        unset($data['website'], $data['form_started_at']);

        $data['source'] = 'website';

        return $data;
    }
}
