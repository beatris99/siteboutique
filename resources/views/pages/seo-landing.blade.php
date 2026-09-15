@extends('pages.layout')

@php
    $locale = app()->getLocale() === 'en' ? 'en' : 'ro';
    $localizedPage = $page;

    if ($locale === 'en' && isset($page['en']) && is_array($page['en'])) {
        $localizedPage = array_replace_recursive($page, $page['en']);
    }

    unset($localizedPage['en']);

    $ui = [
        'ro' => [
            'what_get' => 'Ce construim pentru tine',
            'for_who' => 'Potrivit pentru',
            'benefits_title' => 'Un proiect bun trebuie să facă mai mult decât să arate bine.',
            'process_title' => 'Proces simplu, fără pași inutili.',
            'process_label' => 'Cum lucrăm',
            'proof_eyebrow' => 'Proiecte live',
            'proof_title' => 'Vezi ce am construit deja.',
            'faq_eyebrow' => 'Întrebări',
            'faq_title' => 'Răspunsuri scurte înainte să discutăm.',
            'related_title' => 'Poate cauți mai exact',
            'cta_eyebrow' => 'Ai un proiect?',
            'cta_title' => 'Spune-ne ce trebuie să facă site-ul tău.',
            'cta_text' => 'Nu ai nevoie de un brief tehnic. Trimite ideea, obiectivul și ce vrei să poată face utilizatorul, iar noi stabilim direcția potrivită.',
            'contact' => 'Hai să vorbim',
            'portfolio' => 'Vezi portofoliul',
            'all_services' => 'Creare site web',
            'steps' => [
                ['01', 'Clarificăm'],
                ['02', 'Structurăm'],
                ['03', 'Construim'],
                ['04', 'Publicăm'],
            ],
        ],
        'en' => [
            'what_get' => 'What we can build for you',
            'for_who' => 'A good fit for',
            'benefits_title' => 'A good website should do more than look good.',
            'process_title' => 'A simple process, without unnecessary steps.',
            'process_label' => 'How we work',
            'proof_eyebrow' => 'Live projects',
            'proof_title' => 'See what we have already built.',
            'faq_eyebrow' => 'Questions',
            'faq_title' => 'Short answers before we talk.',
            'related_title' => 'You may be looking for',
            'cta_eyebrow' => 'Have a project?',
            'cta_title' => 'Tell us what your website needs to do.',
            'cta_text' => 'You do not need a technical brief. Send the idea, the goal and what users should be able to do, and we will define the right direction.',
            'contact' => 'Let’s talk',
            'portfolio' => 'View portfolio',
            'all_services' => 'Website development',
            'steps' => [
                ['01', 'Clarify'],
                ['02', 'Structure'],
                ['03', 'Build'],
                ['04', 'Launch'],
            ],
        ],
    ][$locale];

    $title = $localizedPage['title'] ?? ($locale === 'en' ? 'Website development | SiteGo' : 'Creare site web | SiteGo');
    $description = $localizedPage['description'] ?? ($locale === 'en'
        ? 'Websites and custom web solutions for businesses.'
        : 'Site-uri și soluții web personalizate pentru afaceri.');
    $h1 = $localizedPage['h1'] ?? $title;
    $intro = $localizedPage['intro'] ?? $description;
    $canonicalUrl = url()->current();
    $baseUrl = rtrim(config('app.url'), '/');
    $contact = config('sitego.contact');
    $isLocalPage = ($localizedPage['area_served'] ?? '') === 'Brașov';

    $serviceArea = $isLocalPage
        ? [
            '@type' => 'City',
            'name' => 'Brașov',
        ]
        : [
            '@type' => 'Country',
            'name' => 'Romania',
        ];

    $schemaGraph = [
        [
            '@type' => 'Organization',
            '@id' => $baseUrl . '/#organization',
            'name' => 'SiteGo',
            'url' => $baseUrl . '/',
            'logo' => [
                '@type' => 'ImageObject',
                'url' => $baseUrl . '/images/sitego-icon.svg',
            ],
            'email' => $contact['email'] ?? 'sitegobv@gmail.com',
            'telephone' => $contact['phone'] ?? '+40747084861',
            'areaServed' => [
                [
                    '@type' => 'Country',
                    'name' => 'Romania',
                ],
                [
                    '@type' => 'Place',
                    'name' => 'Remote / international online collaboration',
                ],
            ],
            'sameAs' => [
                'https://www.facebook.com/share/1BQ9mzPgqy/',
            ],
        ],
        [
            '@type' => 'Service',
            '@id' => $canonicalUrl . '#service',
            'name' => $localizedPage['service_type'] ?? $title,
            'serviceType' => $localizedPage['service_type'] ?? 'Web development',
            'description' => $description,
            'url' => $canonicalUrl,
            'provider' => [
                '@id' => $baseUrl . '/#organization',
            ],
            'areaServed' => $serviceArea,
        ],
        [
            '@type' => 'BreadcrumbList',
            '@id' => $canonicalUrl . '#breadcrumb',
            'itemListElement' => [
                [
                    '@type' => 'ListItem',
                    'position' => 1,
                    'name' => 'SiteGo',
                    'item' => $baseUrl . '/',
                ],
                [
                    '@type' => 'ListItem',
                    'position' => 2,
                    'name' => $title,
                    'item' => $canonicalUrl,
                ],
            ],
        ],
    ];

    if (!empty($localizedPage['faqs'])) {
        $schemaGraph[] = [
            '@type' => 'FAQPage',
            '@id' => $canonicalUrl . '#faq',
            'mainEntity' => array_map(
                static fn (array $faq): array => [
                    '@type' => 'Question',
                    'name' => $faq['question'],
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => $faq['answer'],
                    ],
                ],
                $localizedPage['faqs']
            ),
        ];
    }

    $schema = [
        '@context' => 'https://schema.org',
        '@graph' => $schemaGraph,
    ];
@endphp

@section('title', $title)
@section('description', $description)
@section('page-title', $h1)
@section('page-intro', $intro)

@push('structured-data')
    <script type="application/ld+json">
        {!! json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
    </script>
@endpush

@section('content')
    <div class="flex flex-wrap gap-3 border-t border-black/10 pt-6">
        <a href="/contact" class="inline-flex items-center gap-2 rounded-full bg-black px-6 py-3.5 text-sm font-semibold text-white transition hover:bg-[#8b6f47]">
            {{ $ui['contact'] }} <span>→</span>
        </a>
        <a href="/portofoliu" class="inline-flex rounded-full border border-black/10 bg-white px-6 py-3.5 text-sm font-semibold text-black transition hover:border-black/25">
            {{ $ui['portfolio'] }}
        </a>
    </div>

    <section class="mt-8 grid gap-5 lg:grid-cols-[1.08fr_0.92fr]">
        <article class="rounded-[1.75rem] bg-[#f7f4ef] p-6 sm:p-8">
            <p class="text-xs font-semibold uppercase tracking-[0.28em] text-[#8b6f47]">
                {{ $localizedPage['eyebrow'] ?? 'SiteGo' }}
            </p>
            <h2 class="mt-4 text-3xl font-semibold tracking-[-0.03em] sm:text-4xl">
                {{ $ui['what_get'] }}
            </h2>
            <div class="mt-6 grid gap-2 sm:grid-cols-2">
                @foreach($localizedPage['includes'] ?? [] as $item)
                    <div class="flex gap-3 rounded-2xl bg-white px-4 py-3.5 text-sm leading-6 text-black/70 ring-1 ring-black/[0.04]">
                        <span class="mt-0.5 text-[#8b6f47]">✓</span>
                        <span>{{ $item }}</span>
                    </div>
                @endforeach
            </div>
        </article>

        <article class="flex flex-col justify-between rounded-[1.75rem] bg-black p-6 text-white sm:p-8">
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.28em] text-white/40">
                    {{ $ui['for_who'] }}
                </p>
                <p class="mt-5 text-lg leading-8 text-white/72">
                    {{ $localizedPage['for_who'] ?? '' }}
                </p>
            </div>
            <a href="/contact" class="mt-7 inline-flex w-full justify-between rounded-full bg-white px-5 py-3.5 text-sm font-semibold text-black transition hover:bg-[#d8c3a5]">
                <span>{{ $ui['contact'] }}</span><span>→</span>
            </a>
        </article>
    </section>

    @if(!empty($localizedPage['benefits']))
        <section class="mt-10">
            <h2 class="max-w-3xl text-3xl font-semibold tracking-[-0.03em] sm:text-4xl">
                {{ $ui['benefits_title'] }}
            </h2>
            <div class="mt-5 grid gap-4 md:grid-cols-3">
                @foreach($localizedPage['benefits'] as $benefit)
                    <article class="rounded-[1.5rem] border border-black/[0.07] bg-white p-5">
                        <h3 class="text-lg font-semibold">{{ $benefit['title'] }}</h3>
                        <p class="mt-2 text-sm leading-6 text-black/58">{{ $benefit['text'] }}</p>
                    </article>
                @endforeach
            </div>
        </section>
    @endif

    <section class="mt-10 rounded-[1.75rem] border border-black/10 bg-[#171717] p-6 text-white sm:p-8">
        <div class="grid gap-6 lg:grid-cols-[1fr_1.35fr] lg:items-end">
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.28em] text-[#d8c3a5]">
                    {{ $ui['process_label'] }}
                </p>
                <h2 class="mt-3 text-3xl font-semibold tracking-[-0.03em]">
                    {{ $ui['process_title'] }}
                </h2>
                <p class="mt-4 max-w-xl text-sm leading-7 text-white/58">
                    {{ $localizedPage['process'] ?? '' }}
                </p>
            </div>

            <div class="grid grid-cols-2 gap-2 sm:grid-cols-4">
                @foreach($ui['steps'] as [$number, $label])
                    <div class="rounded-2xl border border-white/10 bg-white/[0.06] p-4">
                        <span class="text-xs font-semibold text-[#d8c3a5]">{{ $number }}</span>
                        <p class="mt-3 text-sm font-semibold">{{ $label }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    @if(!empty($localizedPage['proof']))
        <section class="mt-10">
            <div class="flex flex-wrap items-end justify-between gap-4">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-[0.28em] text-[#8b6f47]">{{ $ui['proof_eyebrow'] }}</p>
                    <h2 class="mt-2 text-3xl font-semibold tracking-[-0.03em] sm:text-4xl">{{ $ui['proof_title'] }}</h2>
                </div>
                <a href="/portofoliu" class="text-sm font-semibold text-black/60 transition hover:text-black">
                    {{ $ui['portfolio'] }} →
                </a>
            </div>

            <div class="mt-5 grid gap-3 sm:grid-cols-2">
                @foreach($localizedPage['proof'] as $project)
                    <a href="{{ $project['href'] }}" class="group flex items-start justify-between gap-5 rounded-[1.5rem] border border-black/[0.07] bg-[#f7f4ef] p-5 transition hover:-translate-y-0.5 hover:bg-white hover:shadow-md">
                        <div>
                            <h3 class="text-lg font-semibold">{{ $project['title'] }}</h3>
                            <p class="mt-2 text-sm leading-6 text-black/56">{{ $project['text'] }}</p>
                        </div>
                        <span class="shrink-0 text-xl text-black/30 transition group-hover:translate-x-1 group-hover:text-black">→</span>
                    </a>
                @endforeach
            </div>
        </section>
    @endif

    <section class="mt-10 grid gap-5 lg:grid-cols-[1fr_0.75fr]">
        @if(!empty($localizedPage['faqs']))
            <div class="rounded-[1.75rem] bg-[#f7f4ef] p-6 sm:p-8">
                <p class="text-xs font-semibold uppercase tracking-[0.28em] text-[#8b6f47]">{{ $ui['faq_eyebrow'] }}</p>
                <h2 class="mt-2 text-2xl font-semibold tracking-[-0.02em] sm:text-3xl">{{ $ui['faq_title'] }}</h2>
                <div class="mt-5 grid gap-2">
                    @foreach($localizedPage['faqs'] as $faq)
                        <details class="group rounded-2xl bg-white px-5 py-4 ring-1 ring-black/[0.04]">
                            <summary class="flex cursor-pointer list-none items-center justify-between gap-4 text-sm font-semibold">
                                <span>{{ $faq['question'] }}</span>
                                <span class="text-lg text-[#8b6f47] transition group-open:rotate-45">+</span>
                            </summary>
                            <p class="mt-3 text-sm leading-6 text-black/58">{{ $faq['answer'] }}</p>
                        </details>
                    @endforeach
                </div>
            </div>
        @endif

        <div class="rounded-[1.75rem] border border-black/10 bg-white p-6 sm:p-8">
            <p class="text-xs font-semibold uppercase tracking-[0.28em] text-[#8b6f47]">{{ $ui['related_title'] }}</p>
            <div class="mt-5 grid gap-2">
                <a href="/creare-site-web" class="flex items-center justify-between rounded-2xl bg-[#f7f4ef] px-5 py-4 text-sm font-semibold transition hover:bg-black hover:text-white">
                    {{ $ui['all_services'] }} <span>→</span>
                </a>
                @foreach($localizedPage['related'] ?? [] as $related)
                    <a href="{{ $related['href'] }}" class="flex items-center justify-between rounded-2xl border border-black/[0.07] px-5 py-4 text-sm font-semibold transition hover:border-black/25">
                        {{ $related['title'] }} <span class="text-black/35">→</span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <section class="mt-10 rounded-[1.75rem] bg-black p-6 text-white sm:p-8">
        <div class="grid gap-6 lg:grid-cols-[1fr_auto] lg:items-center">
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.28em] text-[#d8c3a5]">{{ $ui['cta_eyebrow'] }}</p>
                <h2 class="mt-3 text-3xl font-semibold tracking-[-0.03em] sm:text-4xl">{{ $ui['cta_title'] }}</h2>
                <p class="mt-3 max-w-3xl text-sm leading-7 text-white/60">{{ $ui['cta_text'] }}</p>
            </div>
            <a href="/contact" class="inline-flex justify-center rounded-full bg-white px-7 py-4 text-sm font-semibold text-black transition hover:bg-[#d8c3a5]">
                {{ $ui['contact'] }} →
            </a>
        </div>
    </section>
@endsection
