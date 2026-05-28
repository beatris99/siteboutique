@php
    $plans = old('rental_plans');

    if ($plans === null) {
        $plans = $vehicle->exists
            ? $vehicle->rentalPlans->map(fn ($plan) => [
                'id' => $plan->id,
                'title' => $plan->title,
                'label' => $plan->label,
                'use_case' => $plan->use_case,
                'duration_unit' => $plan->duration_unit,
                'duration_value' => $plan->duration_value,
                'price' => $plan->price,
                'price_note' => $plan->price_note,
                'description' => $plan->description,
                'is_active' => $plan->is_active,
                'sort_order' => $plan->sort_order,
            ])->toArray()
            : ($defaultRentalPlans ?? collect())->toArray();
    }

    $plans = array_values($plans);
@endphp

@if ($errors->any())
    <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 p-4 text-red-700">
        <div class="font-bold">Verifică datele introduse.</div>
        <ul class="mt-2 list-disc pl-5 text-sm">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="grid md:grid-cols-2 gap-6">
    <label class="block">
        <span class="text-sm font-medium text-slate-600">{{ __('site.admin.fields.name') }} *</span>
        <input
            name="name"
            value="{{ old('name', $vehicle->name) }}"
            class="mt-2 w-full rounded-2xl border border-slate-300 bg-white px-4 py-3 outline-none focus:border-sky-400"
        >
    </label>

    <label class="block">
        <span class="text-sm font-medium text-slate-600">{{ __('site.admin.fields.slug') }}</span>
        <input
            name="slug"
            value="{{ old('slug', $vehicle->slug) }}"
            placeholder="sym-xpro-50cc"
            class="mt-2 w-full rounded-2xl border border-slate-300 bg-white px-4 py-3 outline-none focus:border-sky-400"
        >
    </label>

    <label class="block">
        <span class="text-sm font-medium text-slate-600">{{ __('site.admin.fields.type') }}</span>
        <select name="type" class="mt-2 w-full rounded-2xl border border-slate-300 bg-white px-4 py-3 outline-none focus:border-sky-400">
            <option value="scooter" @selected(old('type', $vehicle->type) === 'scooter')>{{ __('site.admin.vehicle_types.scooter') }}</option>
            <option value="electric_bike" @selected(old('type', $vehicle->type) === 'electric_bike')>{{ __('site.admin.vehicle_types.electric_bike') }}</option>
            <option value="bike" @selected(old('type', $vehicle->type) === 'bike')>{{ __('site.admin.vehicle_types.bike') }}</option>
            <option value="other" @selected(old('type', $vehicle->type) === 'other')>{{ __('site.admin.vehicle_types.other') }}</option>
        </select>
    </label>

    <label class="block">
        <span class="text-sm font-medium text-slate-600">{{ __('site.admin.fields.use_case') }}</span>
        <select name="use_case" class="mt-2 w-full rounded-2xl border border-slate-300 bg-white px-4 py-3 outline-none focus:border-sky-400">
            <option value="fun" @selected(old('use_case', $vehicle->use_case) === 'fun')>{{ __('site.admin.use_cases.fun') }}</option>
            <option value="delivery" @selected(old('use_case', $vehicle->use_case) === 'delivery')>{{ __('site.admin.use_cases.delivery') }}</option>
            <option value="both" @selected(old('use_case', $vehicle->use_case) === 'both')>{{ __('site.admin.use_cases.both') }}</option>
        </select>
    </label>

    <label class="block">
        <span class="text-sm font-medium text-slate-600">{{ __('site.admin.fields.brand') }}</span>
        <input
            name="brand"
            value="{{ old('brand', $vehicle->brand) }}"
            class="mt-2 w-full rounded-2xl border border-slate-300 bg-white px-4 py-3 outline-none focus:border-sky-400"
        >
    </label>

    <label class="block">
        <span class="text-sm font-medium text-slate-600">{{ __('site.admin.fields.model') }}</span>
        <input
            name="model"
            value="{{ old('model', $vehicle->model) }}"
            class="mt-2 w-full rounded-2xl border border-slate-300 bg-white px-4 py-3 outline-none focus:border-sky-400"
        >
    </label>

    <label class="block">
        <span class="text-sm font-medium text-slate-600">{{ __('site.admin.fields.weekly_price') }}</span>
        <input
            name="weekly_price"
            type="number"
            step="0.01"
            min="0"
            value="{{ old('weekly_price', $vehicle->weekly_price) }}"
            class="mt-2 w-full rounded-2xl border border-slate-300 bg-white px-4 py-3 outline-none focus:border-sky-400"
        >
    </label>

    <label class="block">
        <span class="text-sm font-medium text-slate-600">{{ __('site.admin.fields.deposit') }}</span>
        <input
            name="deposit"
            type="number"
            step="0.01"
            min="0"
            value="{{ old('deposit', $vehicle->deposit) }}"
            class="mt-2 w-full rounded-2xl border border-slate-300 bg-white px-4 py-3 outline-none focus:border-sky-400"
        >
    </label>

    <label class="block">
        <span class="text-sm font-medium text-slate-600">{{ __('site.admin.fields.fuel') }}</span>
        <input
            name="fuel_type"
            value="{{ old('fuel_type', $vehicle->fuel_type) }}"
            class="mt-2 w-full rounded-2xl border border-slate-300 bg-white px-4 py-3 outline-none focus:border-sky-400"
        >
    </label>

    <label class="block md:col-span-2">
        <span class="text-sm font-medium text-slate-600">{{ __('site.admin.fields.license') }}</span>
        <input
            name="license_required"
            value="{{ old('license_required', $vehicle->license_required) }}"
            class="mt-2 w-full rounded-2xl border border-slate-300 bg-white px-4 py-3 outline-none focus:border-sky-400"
        >
    </label>

    <label class="block md:col-span-2">
        <span class="text-sm font-medium text-slate-600">{{ __('site.admin.fields.short_description') }}</span>
        <textarea
            name="short_description"
            rows="3"
            class="mt-2 w-full rounded-2xl border border-slate-300 bg-white px-4 py-3 outline-none focus:border-sky-400"
        >{{ old('short_description', $vehicle->short_description) }}</textarea>
    </label>

    <label class="block md:col-span-2">
        <span class="text-sm font-medium text-slate-600">{{ __('site.admin.fields.description') }}</span>
        <textarea
            name="description"
            rows="7"
            class="mt-2 w-full rounded-2xl border border-slate-300 bg-white px-4 py-3 outline-none focus:border-sky-400"
        >{{ old('description', $vehicle->description) }}</textarea>
    </label>

    <div class="md:col-span-2 rounded-3xl border border-slate-200 bg-slate-50 p-6">
        <label class="block">
            <span class="text-sm font-medium text-slate-600">{{ __('site.admin.fields.images') }}</span>
            <input
                name="images[]"
                type="file"
                multiple
                accept="image/jpeg,image/png,image/webp"
                class="mt-2 w-full rounded-2xl border border-slate-300 bg-white px-4 py-3"
            >
        </label>

        <p class="mt-2 text-sm text-slate-500">{{ __('site.admin.fields.images_hint') }}</p>

        @if($vehicle->exists && $vehicle->images->isNotEmpty())
            <div class="mt-6 grid sm:grid-cols-2 md:grid-cols-4 gap-4">
                @foreach($vehicle->images as $image)
                    <label class="block rounded-2xl border border-slate-200 bg-white p-3">
                        <img src="{{ $image->image_url }}" alt="{{ $vehicle->name }}" class="h-32 w-full rounded-xl object-cover">

                        <div class="mt-3 flex items-center gap-2 text-sm text-slate-600">
                            <input type="checkbox" name="remove_images[]" value="{{ $image->id }}">
                            <span>{{ __('site.admin.fields.remove_image') }}</span>
                        </div>
                    </label>
                @endforeach
            </div>
        @endif
    </div>

    <label class="flex items-center gap-3 rounded-2xl border border-slate-200 bg-white p-4">
        <input type="checkbox" name="is_available" value="1" @checked(old('is_available', $vehicle->is_available))>
        <span class="font-medium text-slate-700">{{ __('site.admin.fields.available') }}</span>
    </label>

    <label class="flex items-center gap-3 rounded-2xl border border-slate-200 bg-white p-4">
        <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $vehicle->is_active))>
        <span class="font-medium text-slate-700">{{ __('site.admin.fields.active') }}</span>
    </label>
</div>

<div class="mt-8 rounded-3xl border border-slate-200 bg-white p-6">
    <div>
        <h2 class="text-xl font-bold text-slate-900">
            {{ __('site.admin.pricing.title') }}
        </h2>
        <p class="mt-1 text-sm text-slate-500">
            {{ __('site.admin.pricing.subtitle') }}
        </p>
    </div>

    <div class="mt-6 space-y-5">
        @for($i = 0; $i < 6; $i++)
            @php
                $plan = $plans[$i] ?? [];
            @endphp

            <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4">
                <input type="hidden" name="rental_plans[{{ $i }}][id]" value="{{ $plan['id'] ?? '' }}">

                <div class="grid md:grid-cols-4 gap-4">
                    <label class="block">
                        <span class="text-sm font-medium text-slate-600">{{ __('site.admin.pricing.fields.title') }}</span>
                        <input
                            type="text"
                            name="rental_plans[{{ $i }}][title]"
                            value="{{ $plan['title'] ?? '' }}"
                            placeholder="Ex: 4 ore"
                            class="mt-2 w-full rounded-2xl border border-slate-300 bg-white px-4 py-3 outline-none focus:border-sky-400"
                        >
                    </label>

                    <label class="block">
                        <span class="text-sm font-medium text-slate-600">{{ __('site.admin.pricing.fields.label') }}</span>
                        <input
                            type="text"
                            name="rental_plans[{{ $i }}][label]"
                            value="{{ $plan['label'] ?? '' }}"
                            placeholder="Ex: Plimbare scurtă"
                            class="mt-2 w-full rounded-2xl border border-slate-300 bg-white px-4 py-3 outline-none focus:border-sky-400"
                        >
                    </label>

                    <label class="block">
                        <span class="text-sm font-medium text-slate-600">{{ __('site.admin.pricing.fields.use_case') }}</span>
                        <select
                            name="rental_plans[{{ $i }}][use_case]"
                            class="mt-2 w-full rounded-2xl border border-slate-300 bg-white px-4 py-3 outline-none focus:border-sky-400"
                        >
                            @foreach(['fun', 'delivery', 'both'] as $useCase)
                                <option value="{{ $useCase }}" @selected(($plan['use_case'] ?? 'both') === $useCase)>
                                    {{ __('site.admin.use_cases.' . $useCase) }}
                                </option>
                            @endforeach
                        </select>
                    </label>

                    <label class="block">
                        <span class="text-sm font-medium text-slate-600">{{ __('site.admin.pricing.fields.active') }}</span>
                        <div class="mt-4">
                            <label class="inline-flex items-center gap-2">
                                <input
                                    type="checkbox"
                                    name="rental_plans[{{ $i }}][is_active]"
                                    value="1"
                                    @checked((bool)($plan['is_active'] ?? false))
                                >
                                <span class="text-sm text-slate-700">{{ __('site.admin.common.yes') }}</span>
                            </label>
                        </div>
                    </label>
                </div>

                <div class="mt-4 grid md:grid-cols-5 gap-4">
                    <label class="block">
                        <span class="text-sm font-medium text-slate-600">{{ __('site.admin.pricing.fields.duration_value') }}</span>
                        <input
                            type="number"
                            min="1"
                            name="rental_plans[{{ $i }}][duration_value]"
                            value="{{ $plan['duration_value'] ?? 1 }}"
                            class="mt-2 w-full rounded-2xl border border-slate-300 bg-white px-4 py-3 outline-none focus:border-sky-400"
                        >
                    </label>

                    <label class="block">
                        <span class="text-sm font-medium text-slate-600">{{ __('site.admin.pricing.fields.duration_unit') }}</span>
                        <select
                            name="rental_plans[{{ $i }}][duration_unit]"
                            class="mt-2 w-full rounded-2xl border border-slate-300 bg-white px-4 py-3 outline-none focus:border-sky-400"
                        >
                            @foreach(['hour', 'day', 'week', 'month'] as $unit)
                                <option value="{{ $unit }}" @selected(($plan['duration_unit'] ?? 'week') === $unit)>
                                    {{ __('site.admin.pricing.units.' . $unit) }}
                                </option>
                            @endforeach
                        </select>
                    </label>

                    <label class="block">
                        <span class="text-sm font-medium text-slate-600">{{ __('site.admin.pricing.fields.price') }}</span>
                        <input
                            type="number"
                            step="0.01"
                            min="0"
                            name="rental_plans[{{ $i }}][price]"
                            value="{{ $plan['price'] ?? '' }}"
                            placeholder="300"
                            class="mt-2 w-full rounded-2xl border border-slate-300 bg-white px-4 py-3 outline-none focus:border-sky-400"
                        >
                    </label>

                    <label class="block">
                        <span class="text-sm font-medium text-slate-600">{{ __('site.admin.pricing.fields.price_note') }}</span>
                        <input
                            type="text"
                            name="rental_plans[{{ $i }}][price_note]"
                            value="{{ $plan['price_note'] ?? '' }}"
                            placeholder="Ex: de stabilit"
                            class="mt-2 w-full rounded-2xl border border-slate-300 bg-white px-4 py-3 outline-none focus:border-sky-400"
                        >
                    </label>

                    <label class="block">
                        <span class="text-sm font-medium text-slate-600">{{ __('site.admin.pricing.fields.sort_order') }}</span>
                        <input
                            type="number"
                            min="0"
                            name="rental_plans[{{ $i }}][sort_order]"
                            value="{{ $plan['sort_order'] ?? $i }}"
                            class="mt-2 w-full rounded-2xl border border-slate-300 bg-white px-4 py-3 outline-none focus:border-sky-400"
                        >
                    </label>
                </div>

                <label class="mt-4 block">
                    <span class="text-sm font-medium text-slate-600">{{ __('site.admin.pricing.fields.description') }}</span>
                    <textarea
                        name="rental_plans[{{ $i }}][description]"
                        rows="2"
                        class="mt-2 w-full rounded-2xl border border-slate-300 bg-white px-4 py-3 outline-none focus:border-sky-400"
                    >{{ $plan['description'] ?? '' }}</textarea>
                </label>
            </div>
        @endfor
    </div>
</div>
