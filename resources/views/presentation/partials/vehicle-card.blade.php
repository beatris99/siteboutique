@php
    $weeklyPlan = $vehicle->relationLoaded('activeRentalPlans')
        ? $vehicle->activeRentalPlans->firstWhere('duration_unit', 'week')
        : null;

    if ($weeklyPlan && method_exists($weeklyPlan, 'formattedPrice')) {
        $displayPrice = $weeklyPlan->formattedPrice() . ' / ' . $weeklyPlan->durationLabel();
    } elseif ($vehicle->weekly_price) {
        $displayPrice = __('site.common.from') . ' ' . number_format((float) $vehicle->weekly_price, 0) . ' ' . __('site.offers.per_week');
    } else {
        $displayPrice = __('site.pricing.to_be_confirmed');
    }
@endphp

<a
    href="{{ route('vehicle.show', $vehicle->slug) }}"
    class="group block overflow-hidden rounded-3xl border border-slate-200 bg-white p-4 shadow-sm transition hover:border-sky-300 hover:shadow-md"
>
    <div class="overflow-hidden rounded-2xl bg-slate-100">
        <img
            src="{{ $vehicle->primary_image_url }}"
            alt="{{ $vehicle->name }}"
            class="h-44 w-full object-cover transition duration-300 group-hover:scale-105 sm:h-56"
        >
    </div>

    <div class="mt-4">
        <div class="text-lg font-extrabold text-sky-700">
            {{ $displayPrice }}
        </div>

        <h3 class="mt-2 text-xl font-bold text-slate-900">
            {{ $vehicle->name }}
        </h3>

        @if($vehicle->short_description)
            <p class="mt-2 text-sm leading-6 text-slate-600">
                {{ $vehicle->short_description }}
            </p>
        @endif

        <div class="mt-5 inline-flex w-full items-center justify-center rounded-full bg-sky-600 px-4 py-3 font-semibold text-white group-hover:bg-sky-700">
            {{ __('site.common.see_details') }}
        </div>
    </div>
</a>
