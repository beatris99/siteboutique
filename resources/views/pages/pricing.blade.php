@extends('pages.layout')

@section('title', 'Prețuri')
@section('description', 'Prețuri orientative pentru site-uri de prezentare, landing page-uri, site-uri cu rezervări, magazine online simple și platforme custom.')
@section('page-title', 'Prețuri pentru realizare site-uri')
@section('page-intro', 'Prețurile sunt orientative. Costul final depinde de template, numărul de pagini, funcționalități, conținut și termenul dorit.')

@section('content')
    <section class="grid gap-6 md:grid-cols-2">
        @foreach([
            [
                'name' => 'Start',
                'price' => 'de la 1.800 lei',
                'description' => 'Pentru site-uri simple de prezentare sau landing page-uri de bază.',
                'features' => [
                    'Design responsive',
                    'Structură simplă',
                    'Formular contact',
                    'SEO basic',
                    'Lansare rapidă',
                ],
            ],
            [
                'name' => 'Pro',
                'price' => 'de la 3.000 lei',
                'description' => 'Pentru afaceri care au nevoie de un site mai complet și mai convingător.',
                'features' => [
                    'Mai multe secțiuni / pagini',
                    'Structură orientată spre conversie',
                    'SEO basic extins',
                    'Optimizare viteză',
                    'Suport lansare',
                ],
            ],
            [
                'name' => 'Premium',
                'price' => 'de la 5.000 lei',
                'description' => 'Pentru proiecte cu imagine premium, strategie și funcționalități mai avansate.',
                'features' => [
                    'Design premium',
                    'Structură personalizată',
                    'Funcționalități extra',
                    'Pregătire pentru reclame',
                    'Suport prioritar',
                ],
            ],
            [
                'name' => 'Custom',
                'price' => 'ofertă personalizată',
                'description' => 'Pentru magazine online avansate, platforme, dashboard-uri sau aplicații web.',
                'features' => [
                    'Funcționalități custom',
                    'Panou administrare',
                    'Autentificare utilizatori',
                    'Exporturi / rapoarte',
                    'Integrare servicii externe',
                ],
            ],
        ] as $plan)
            <article class="rounded-[2rem] bg-[#f7f4ef] p-6">
                <h2 class="text-3xl font-semibold">{{ $plan['name'] }}</h2>

                <p class="mt-4 text-2xl font-semibold text-[#8b6f47]">
                    {{ $plan['price'] }}
                </p>

                <p class="mt-4 text-black/60">
                    {{ $plan['description'] }}
                </p>

                <ul class="mt-6 grid gap-3">
                    @foreach($plan['features'] as $feature)
                        <li class="flex gap-3">
                            <span class="text-[#8b6f47]">✓</span>
                            <span>{{ $feature }}</span>
                        </li>
                    @endforeach
                </ul>
            </article>
        @endforeach
    </section>

    <section class="mt-12 rounded-[2rem] bg-black p-8 text-white">
        <h2 class="text-3xl font-semibold">Cel mai simplu mod de a estima prețul</h2>

        <p class="mt-4 text-white/60">
            Alege un template real, selectează pachetul și extra-urile dorite, iar configuratorul îți calculează un preț estimativ.
        </p>

        <a href="/#templates" class="mt-6 inline-flex rounded-full bg-white px-6 py-4 text-sm font-semibold text-black">
            Configurează site-ul
        </a>
    </section>
@endsection
