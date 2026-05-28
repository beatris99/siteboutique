<?php

namespace App\Http\Requests\Admin;

use App\Models\Vehicle;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VehicleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        /** @var Vehicle|null $vehicle */
        $vehicle = $this->route('vehicle');

        return [
            'name' => ['required', 'string', 'max:255'],
            'slug' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('vehicles', 'slug')->ignore($vehicle?->id),
            ],
            'type' => ['required', 'string', 'max:50'],
            'use_case' => ['required', Rule::in(['fun', 'delivery', 'both'])],
            'brand' => ['nullable', 'string', 'max:255'],
            'model' => ['nullable', 'string', 'max:255'],
            'weekly_price' => ['nullable', 'numeric', 'min:0'],
            'deposit' => ['nullable', 'numeric', 'min:0'],
            'fuel_type' => ['nullable', 'string', 'max:255'],
            'license_required' => ['nullable', 'string', 'max:255'],
            'short_description' => ['nullable', 'string', 'max:1000'],
            'description' => ['nullable', 'string'],

            'rental_plans' => ['nullable', 'array', 'max:20'],
            'rental_plans.*.id' => ['nullable', 'integer'],
            'rental_plans.*.title' => ['nullable', 'string', 'max:255'],
            'rental_plans.*.label' => ['nullable', 'string', 'max:255'],
            'rental_plans.*.use_case' => ['nullable', Rule::in(['fun', 'delivery', 'both'])],
            'rental_plans.*.duration_unit' => ['nullable', Rule::in(['hour', 'day', 'week', 'month'])],
            'rental_plans.*.duration_value' => ['nullable', 'integer', 'min:1', 'max:365'],
            'rental_plans.*.price' => ['nullable', 'numeric', 'min:0'],
            'rental_plans.*.price_note' => ['nullable', 'string', 'max:255'],
            'rental_plans.*.description' => ['nullable', 'string', 'max:2000'],
            'rental_plans.*.is_active' => ['nullable'],
            'rental_plans.*.sort_order' => ['nullable', 'integer', 'min:0'],

            'images' => ['nullable', 'array', 'max:10'],
            'images.*' => ['file', 'image', 'mimes:jpg,jpeg,png,webp', 'max:10240'],
            'remove_images' => ['nullable', 'array'],
            'remove_images.*' => ['integer'],
        ];
    }

    public function messages(): array
    {
        return [
            'images.array' => 'Imaginile trebuie trimise într-un format valid.',
            'images.max' => 'Poți încărca maximum 10 imagini pentru un vehicul.',

            'images.*.file' => 'Fiecare imagine încărcată trebuie să fie un fișier valid.',
            'images.*.image' => 'Fișierele încărcate trebuie să fie imagini valide.',
            'images.*.mimes' => 'Imaginile trebuie să fie în format JPG, JPEG, PNG sau WEBP.',
            'images.*.max' => 'Fiecare imagine poate avea maximum 10 MB.',

            'name.required' => 'Numele vehiculului este obligatoriu.',
            'name.max' => 'Numele vehiculului nu poate depăși 255 de caractere.',

            'slug.unique' => 'Acest URL este deja folosit de alt vehicul.',
            'slug.max' => 'URL-ul nu poate depăși 255 de caractere.',

            'type.required' => 'Tipul vehiculului este obligatoriu.',
            'type.max' => 'Tipul vehiculului nu poate depăși 50 de caractere.',

            'use_case.required' => 'Selectează pentru ce este potrivit vehiculul.',
            'use_case.in' => 'Valoarea selectată pentru utilizare nu este validă.',

            'weekly_price.numeric' => 'Prețul săptămânal trebuie să fie un număr.',
            'weekly_price.min' => 'Prețul săptămânal nu poate fi negativ.',

            'deposit.numeric' => 'Garanția trebuie să fie un număr.',
            'deposit.min' => 'Garanția nu poate fi negativă.',

            'short_description.max' => 'Descrierea scurtă nu poate depăși 1000 de caractere.',

            'rental_plans.array' => 'Planurile de închiriere trebuie trimise într-un format valid.',
            'rental_plans.max' => 'Poți adăuga maximum 20 de planuri de închiriere.',

            'rental_plans.*.title.max' => 'Titlul planului nu poate depăși 255 de caractere.',
            'rental_plans.*.label.max' => 'Eticheta planului nu poate depăși 255 de caractere.',
            'rental_plans.*.use_case.in' => 'Utilizarea selectată pentru plan nu este validă.',
            'rental_plans.*.duration_unit.in' => 'Unitatea de durată selectată nu este validă.',
            'rental_plans.*.duration_value.integer' => 'Durata trebuie să fie un număr întreg.',
            'rental_plans.*.duration_value.min' => 'Durata trebuie să fie cel puțin 1.',
            'rental_plans.*.duration_value.max' => 'Durata nu poate depăși 365.',
            'rental_plans.*.price.numeric' => 'Prețul planului trebuie să fie un număr.',
            'rental_plans.*.price.min' => 'Prețul planului nu poate fi negativ.',
            'rental_plans.*.price_note.max' => 'Nota de preț nu poate depăși 255 de caractere.',
            'rental_plans.*.description.max' => 'Descrierea planului nu poate depăși 2000 de caractere.',
            'rental_plans.*.sort_order.integer' => 'Ordinea de afișare trebuie să fie un număr întreg.',
            'rental_plans.*.sort_order.min' => 'Ordinea de afișare nu poate fi negativă.',

            'remove_images.array' => 'Lista imaginilor de șters trebuie să fie validă.',
            'remove_images.*.integer' => 'Imaginea selectată pentru ștergere nu este validă.',
        ];
    }

    public function vehicleData(): array
    {
        $data = $this->validated();

        $data['is_available'] = $this->boolean('is_available');
        $data['is_active'] = $this->boolean('is_active');

        unset($data['images'], $data['remove_images'], $data['rental_plans']);

        return $data;
    }

    public function rentalPlansData(): array
    {
        $plans = $this->validated('rental_plans', []);

        return collect($plans)
            ->filter(fn (array $plan) => filled($plan['title'] ?? null))
            ->values()
            ->map(function (array $plan, int $index) {
                return [
                    'id' => $plan['id'] ?? null,
                    'title' => $plan['title'],
                    'label' => $plan['label'] ?? null,
                    'use_case' => $plan['use_case'] ?? 'both',
                    'duration_unit' => $plan['duration_unit'] ?? 'week',
                    'duration_value' => (int) ($plan['duration_value'] ?? 1),
                    'price' => filled($plan['price'] ?? null) ? $plan['price'] : null,
                    'price_note' => $plan['price_note'] ?? null,
                    'description' => $plan['description'] ?? null,
                    'is_active' => isset($plan['is_active']),
                    'sort_order' => (int) ($plan['sort_order'] ?? $index),
                ];
            })
            ->all();
    }
}
