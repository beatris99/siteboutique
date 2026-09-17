@extends('pages.layout')

@php
    $pricing = config('sitego-pricing');
    $content = __('pages.pricing');
    $currencyLabel = $pricing['currency_label'];
    $formatPrice = static fn(int $value): string => number_format($value, 0, ',', '.');
    $packageCards = $content['packages'];
    $maintenanceCards = $content['maintenance'];
    $extraCards = $content['extras'];

    $serviceSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'Service',
        'name' => $content['page_title'],
        'description' => $content['description'],
        'url' => url()->current(),
        'provider' => [
            '@type' => 'Organization',
            '@id' => rtrim(config('app.url'), '/') . '/#organization',
            'name' => 'SiteGo',
            'url' => rtrim(config('app.url'), '/') . '/',
        ],
        'areaServed' => [
            '@type' => 'Country',
            'name' => 'Romania',
        ],
        'hasOfferCatalog' => [
            '@type' => 'OfferCatalog',
            'name' => $content['project_title'],
            'itemListElement' => collect($packageCards)
                ->filter(static fn(array $package, string $key): bool => $key !== 'custom')
                ->map(
                    static fn(array $package, string $key): array => [
                        '@type' => 'Offer',
                        'name' => $package['name'],
                        'description' => $package['description'],
                        'price' => $pricing['packages'][$key],
                        'priceCurrency' => $pricing['currency'],
                        'url' => url()->current(),
                        'availability' => 'https://schema.org/InStock',
                    ],
                )
                ->values()
                ->all(),
        ],
    ];

    $faqSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'mainEntity' => collect($content['faq_items'])
            ->map(
                static fn(array $item): array => [
                    '@type' => 'Question',
                    'name' => $item['question'],
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => $item['answer'],
                    ],
                ],
            )
            ->values()
            ->all(),
    ];

    $breadcrumbSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => [
            [
                '@type' => 'ListItem',
                'position' => 1,
                'name' => $content['breadcrumb_home'],
                'item' => rtrim(config('app.url'), '/') . '/',
            ],
            [
                '@type' => 'ListItem',
                'position' => 2,
                'name' => $content['breadcrumb_current'],
                'item' => url()->current(),
            ],
        ],
    ];
@endphp

@section('title', $content['title'])
@section('description', $content['description'])
@section('page-title', $content['page_title'])
@section('page-intro', $content['page_intro'])

@push('structured-data')
    <script type="application/ld+json">{!! json_encode($serviceSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}</script>
    <script type="application/ld+json">{!! json_encode($breadcrumbSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}</script>
    <script type="application/ld+json">{!! json_encode($faqSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}</script>
@endpush

@section('content')
    <section
        class="relative overflow-hidden rounded-[2rem] bg-[#11100f] px-6 py-10 text-white sm:px-10 sm:py-14 lg:px-14 lg:py-16">
        <div class="absolute -right-20 -top-24 h-72 w-72 rounded-full bg-[#b28a52]/20 blur-3xl"></div>
        <div class="absolute -bottom-28 left-1/3 h-72 w-72 rounded-full bg-white/5 blur-3xl"></div>

        <div class="relative grid gap-10 lg:grid-cols-[1.15fr_0.85fr] lg:items-end">
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.34em] text-[#d8c3a5]">{{ $content['hero_eyebrow'] }}
                </p>
                <h2 class="mt-5 max-w-3xl font-serif text-4xl font-medium leading-[1.05] sm:text-5xl lg:text-6xl">
                    {{ $content['hero_title'] }}</h2>
                <p class="mt-6 max-w-2xl text-base leading-8 text-white/65 sm:text-lg">{{ $content['hero_text'] }}</p>
            </div>

            <div class="rounded-[1.5rem] border border-white/10 bg-white/[0.06] p-6 backdrop-blur">
                <p class="text-xs font-semibold uppercase tracking-[0.25em] text-white/45">{{ $content['hero_badge'] }}</p>
                <p class="mt-5 text-sm font-medium text-white/60">{{ $content['hero_price_label'] }}</p>

                <div class="mt-2 flex items-end gap-3">
                    <span
                        class="font-serif text-5xl leading-none text-[#e6d6bd]">{{ $formatPrice($pricing['packages']['start']) }}</span>
                    <span class="pb-1 text-sm text-white/55">{{ $currencyLabel }}</span>
                </div>

                <p class="mt-3 text-sm text-white/45">{{ $content['hero_price_note'] }}</p>
            </div>
        </div>
    </section>

    <section class="mt-16">
        <div class="max-w-3xl">
            <p class="text-xs font-semibold uppercase tracking-[0.32em] text-[#9a7440]">{{ $content['project_eyebrow'] }}
            </p>
            <h2 class="mt-4 font-serif text-4xl font-medium leading-tight sm:text-5xl">{{ $content['project_title'] }}</h2>
            <p class="mt-5 text-base leading-8 text-black/60">{{ $content['project_text'] }}</p>
        </div>

        <div class="mt-8 grid gap-2.5 sm:hidden">
            @foreach ($packageCards as $key => $package)
                @php
                    $isCustom = $key === 'custom';
                    $isRecommended = $key === 'pro';
                    $packagePrice = $pricing['packages'][$key] ?? null;
                @endphp

                <details
                    class="group overflow-hidden rounded-[1.25rem] border transition {{ $isRecommended ? 'border-[#a67c3a] bg-[#171614] text-white shadow-[0_14px_35px_rgba(0,0,0,0.1)]' : 'border-black/10 bg-[#faf8f4]' }}">
                    <summary class="flex cursor-pointer list-none items-center justify-between gap-4 px-4 py-4">
                        <h3 class="min-w-0 font-serif text-xl font-medium leading-none">{{ $package['name'] }}</h3>

                        <div class="ml-auto flex shrink-0 items-center gap-3">
                            @if ($isCustom)
                                <p
                                    class="max-w-[7rem] text-right text-[10px] font-semibold leading-4 {{ $isRecommended ? 'text-white/80' : 'text-black/75' }}">
                                    {{ $content['custom_price'] }}</p>
                            @else
                                <div class="text-right">
                                    <p
                                        class="text-[8px] leading-none {{ $isRecommended ? 'text-white/40' : 'text-black/40' }}">
                                        {{ $content['price_from'] }}</p>
                                    <div class="mt-1 flex items-end justify-end gap-1">
                                        <strong
                                            class="font-serif text-xl font-medium leading-none {{ $isRecommended ? 'text-[#eadbc4]' : 'text-black' }}">{{ $formatPrice($packagePrice) }}</strong>
                                        <span
                                            class="pb-[1px] text-[8px] {{ $isRecommended ? 'text-white/40' : 'text-black/40' }}">{{ $currencyLabel }}</span>
                                    </div>
                                </div>
                            @endif

                            <span
                                class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full border text-base leading-none transition-all duration-300 group-open:rotate-45 {{ $isRecommended ? 'border-[#d8c3a5]/25 text-[#d8c3a5]' : 'border-black/10 text-[#9a7440]' }}">+</span>
                        </div>
                    </summary>

                    <div class="border-t px-4 pb-5 pt-4 {{ $isRecommended ? 'border-white/10' : 'border-black/10' }}">
                        <p
                            class="text-[10px] font-semibold uppercase tracking-[0.2em] {{ $isRecommended ? 'text-[#d8c3a5]' : 'text-[#9a7440]' }}">
                            {{ $package['eyebrow'] }}</p>
                        <p class="mt-3 text-xs leading-6 {{ $isRecommended ? 'text-white/60' : 'text-black/60' }}">
                            {{ $package['description'] }}</p>

                        <ul class="mt-4 grid gap-2.5 text-xs {{ $isRecommended ? 'text-white/75' : 'text-black/70' }}">
                            @foreach ($package['features'] as $feature)
                                <li class="flex gap-2.5">
                                    <span class="mt-[2px] shrink-0 text-[#b28a52]">◆</span>
                                    <span class="leading-5">{{ $feature }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </details>
            @endforeach
        </div>

        <div class="mt-9 hidden gap-5 sm:grid sm:grid-cols-2 xl:grid-cols-4">
            @foreach ($packageCards as $key => $package)
                @php
                    $isCustom = $key === 'custom';
                    $isRecommended = $key === 'pro';
                    $packagePrice = $pricing['packages'][$key] ?? null;
                    $packageBadge = $package['badge'] ?? null;
                @endphp

                <article
                    class="flex h-full min-w-0 flex-col overflow-hidden rounded-[1.75rem] border p-6 {{ $isRecommended ? 'border-[#a67c3a] bg-[#171614] text-white shadow-[0_24px_70px_rgba(0,0,0,0.14)]' : 'border-black/10 bg-[#faf8f4]' }}">
                    <div class="flex min-h-[3rem] items-start justify-between gap-3">
                        <p
                            class="min-w-0 text-[11px] font-semibold uppercase leading-5 tracking-[0.25em] {{ $isRecommended ? 'text-[#d8c3a5]' : 'text-[#9a7440]' }}">
                            {{ $package['eyebrow'] }}</p>

                        @if ($packageBadge)
                            <span
                                class="inline-flex shrink-0 whitespace-nowrap rounded-full border border-[#d8c3a5]/30 bg-[#d8c3a5]/10 px-3 py-1 text-[9px] font-semibold uppercase tracking-[0.18em] text-[#e6d6bd]">{{ $packageBadge }}</span>
                        @endif
                    </div>

                    <h3 class="mt-4 font-serif text-3xl font-medium">{{ $package['name'] }}</h3>

                    <div class="mt-6 min-h-14">
                        @if ($isCustom)
                            <p class="text-xl font-semibold {{ $isRecommended ? 'text-white' : 'text-black' }}">
                                {{ $content['custom_price'] }}</p>
                        @else
                            <p class="text-sm {{ $isRecommended ? 'text-white/50' : 'text-black/45' }}">
                                {{ $content['price_from'] }}</p>

                            <div class="mt-1 flex items-end gap-2">
                                <strong
                                    class="font-serif text-4xl font-medium {{ $isRecommended ? 'text-[#eadbc4]' : 'text-black' }}">{{ $formatPrice($packagePrice) }}</strong>
                                <span
                                    class="pb-1 text-xs {{ $isRecommended ? 'text-white/45' : 'text-black/45' }}">{{ $currencyLabel }}</span>
                            </div>
                        @endif
                    </div>

                    <p class="mt-5 text-sm leading-7 {{ $isRecommended ? 'text-white/60' : 'text-black/60' }}">
                        {{ $package['description'] }}</p>

                    <ul class="mt-6 grid gap-3 text-sm {{ $isRecommended ? 'text-white/75' : 'text-black/70' }}">
                        @foreach ($package['features'] as $feature)
                            <li class="flex gap-3">
                                <span class="mt-1 shrink-0 text-[#b28a52]">◆</span>
                                <span>{{ $feature }}</span>
                            </li>
                        @endforeach
                    </ul>
                </article>
            @endforeach
        </div>
    </section>

    <section class="mt-16 rounded-[2rem] bg-[#f6f1e8] p-6 sm:p-9 lg:p-12">
        <div class="grid gap-10 lg:grid-cols-[0.8fr_1.2fr]">
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.32em] text-[#9a7440]">
                    {{ $content['included_eyebrow'] }}</p>
                <h2 class="mt-4 font-serif text-4xl font-medium leading-tight">{{ $content['included_title'] }}</h2>
                <p class="mt-5 leading-8 text-black/60">{{ $content['included_text'] }}</p>
            </div>

            <div class="grid gap-4 sm:grid-cols-2">
                @foreach ($content['included'] as $item)
                    <article class="rounded-[1.35rem] border border-black/10 bg-white/75 p-5">
                        <h3 class="font-semibold">{{ $item['title'] }}</h3>
                        <p class="mt-2 text-sm leading-6 text-black/55">{{ $item['description'] }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="mt-16">
        <div class="max-w-3xl">
            <p class="text-xs font-semibold uppercase tracking-[0.32em] text-[#9a7440]">{{ $content['extras_eyebrow'] }}
            </p>
            <h2 class="mt-4 font-serif text-4xl font-medium leading-tight">{{ $content['extras_title'] }}</h2>
            <p class="mt-5 leading-8 text-black/60">{{ $content['extras_text'] }}</p>
        </div>

        <div class="mt-8 grid gap-4 md:grid-cols-2 xl:grid-cols-3">
            @foreach ($extraCards as $key => $extra)
                <article
                    class="group rounded-[1.4rem] border border-black/10 bg-white p-5 transition duration-300 hover:-translate-y-1 hover:border-[#b28a52]/50 hover:shadow-[0_18px_45px_rgba(0,0,0,0.06)]">
                    <div class="flex items-start justify-between gap-5">
                        <h3 class="font-semibold">{{ $extra['name'] }}</h3>

                        <div class="shrink-0 text-right">
                            <p class="text-[10px] font-semibold uppercase tracking-[0.2em] text-black/35">
                                {{ $content['price_from'] }}</p>
                            <p class="mt-1 font-serif text-xl font-medium text-[#8d6938]">
                                {{ $formatPrice($pricing['extras'][$key]) }} <span
                                    class="text-xs">{{ $currencyLabel }}</span></p>
                        </div>
                    </div>

                    <p class="mt-4 text-sm leading-6 text-black/55">{{ $extra['description'] }}</p>
                </article>
            @endforeach
        </div>
    </section>

    <section id="mentenanta"
        class="mt-16 scroll-mt-28 overflow-hidden rounded-[2rem] bg-[#11100f] p-6 text-white sm:p-9 lg:p-12">
        <div class="max-w-3xl">
            <p class="text-xs font-semibold uppercase tracking-[0.32em] text-[#d8c3a5]">
                {{ $content['maintenance_eyebrow'] }}</p>
            <h2 class="mt-4 font-serif text-4xl font-medium leading-tight sm:text-5xl">{{ $content['maintenance_title'] }}
            </h2>
            <p class="mt-5 leading-8 text-white/60">{{ $content['maintenance_text'] }}</p>
        </div>

        <div class="mt-9 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($maintenanceCards as $key => $plan)
                @php($isFeatured = $key === 'business')

                <article
                    class="flex min-w-0 flex-col rounded-[1.6rem] border p-5 sm:p-6 {{ $isFeatured ? 'border-[#d8c3a5]/50 bg-[#d8c3a5]/10' : 'border-white/10 bg-white/[0.04]' }}">
                    <p
                        class="text-xs font-semibold uppercase tracking-[0.24em] {{ $isFeatured ? 'text-[#eadbc4]' : 'text-white/40' }}">
                        {{ $plan['label'] }}</p>
                    <h3 class="mt-4 font-serif text-3xl font-medium">{{ $plan['name'] }}</h3>

                    <div class="mt-5 flex flex-wrap items-end gap-2">
                        <strong
                            class="font-serif text-4xl font-medium text-[#eadbc4]">{{ $formatPrice($pricing['maintenance'][$key]) }}</strong>
                        <span class="pb-1 text-sm text-white/45">{{ $currencyLabel }} / {{ $content['per_month'] }}</span>
                    </div>

                    <p class="mt-5 text-sm leading-7 text-white/60">{{ $plan['description'] }}</p>

                    <ul class="mt-6 grid gap-3 text-sm text-white/70">
                        @foreach ($plan['features'] as $feature)
                            <li class="flex gap-3">
                                <span class="mt-1 shrink-0 text-[#d8c3a5]">◆</span>
                                <span>{{ $feature }}</span>
                            </li>
                        @endforeach
                    </ul>
                </article>
            @endforeach
        </div>

        <p class="mt-6 text-xs leading-6 text-white/40">{{ $content['maintenance_note'] }}</p>
    </section>

    <section class="mt-16 grid gap-8 lg:grid-cols-[0.8fr_1.2fr]">
        <div>
            <p class="text-xs font-semibold uppercase tracking-[0.32em] text-[#9a7440]">
                {{ $content['transparency_eyebrow'] }}</p>
            <h2 class="mt-4 font-serif text-4xl font-medium leading-tight">{{ $content['transparency_title'] }}</h2>
        </div>

        <div class="grid gap-4 sm:grid-cols-2">
            @foreach ($content['transparency'] as $item)
                <article class="border-t border-black/10 pt-5">
                    <h3 class="font-semibold">{{ $item['title'] }}</h3>
                    <p class="mt-2 text-sm leading-6 text-black/55">{{ $item['description'] }}</p>
                </article>
            @endforeach
        </div>
    </section>

    <section class="mt-16 grid gap-8 lg:grid-cols-[0.72fr_1.28fr]">
        <div>
            <p class="text-xs font-semibold uppercase tracking-[0.32em] text-[#9a7440]">{{ $content['faq_eyebrow'] }}</p>
            <h2 class="mt-4 font-serif text-4xl font-medium leading-tight">{{ $content['faq_title'] }}</h2>
        </div>

        <div class="grid gap-3">
            @foreach ($content['faq_items'] as $item)
                <details class="group rounded-[1.3rem] border border-black/10 bg-[#faf8f4] p-5">
                    <summary class="flex cursor-pointer list-none items-center justify-between gap-5 font-semibold">
                        <span>{{ $item['question'] }}</span>
                        <span class="shrink-0 text-[#9a7440] transition group-open:rotate-45">+</span>
                    </summary>

                    <p class="mt-4 max-w-3xl text-sm leading-7 text-black/60">{{ $item['answer'] }}</p>
                </details>
            @endforeach
        </div>
    </section>

    <section
        class="mt-16 overflow-hidden rounded-[2rem] border border-[#b28a52]/25 bg-gradient-to-br from-[#f5ede0] via-white to-[#f7f4ef] p-7 sm:p-10 lg:p-12">
        <div class="grid gap-8 lg:grid-cols-[1fr_auto] lg:items-end">
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.32em] text-[#9a7440]">{{ $content['cta_eyebrow'] }}
                </p>
                <h2 class="mt-4 max-w-3xl font-serif text-4xl font-medium leading-tight sm:text-5xl">
                    {{ $content['cta_title'] }}</h2>
                <p class="mt-5 max-w-2xl leading-8 text-black/60">{{ $content['cta_text'] }}</p>
            </div>

            <div class="flex flex-col gap-3 sm:flex-row lg:flex-col">
                <a href="{{ $content['cta_primary_href'] }}"
                    class="inline-flex justify-center rounded-full bg-[#171717] px-7 py-4 text-sm font-semibold text-white transition hover:bg-[#9a7440]">{{ $content['cta_primary'] }}</a>
                <a href="{{ $content['cta_secondary_href'] }}"
                    class="inline-flex justify-center rounded-full border border-black/15 bg-white px-7 py-4 text-sm font-semibold text-black transition hover:border-[#9a7440] hover:text-[#8d6938]">{{ $content['cta_secondary'] }}</a>
            </div>
        </div>
    </section>
@endsection
