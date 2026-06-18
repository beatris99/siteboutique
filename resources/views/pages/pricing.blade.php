@extends('pages.layout')

@section('title', 'Prețuri realizare site')
@section('description', 'Prețuri orientative pentru realizare site de prezentare, landing page, magazin online simplu sau platformă personalizată.')
@section('page-title', 'Prețuri clare pentru site-ul tău')
@section('page-intro', 'Alegi direcția potrivită pentru afacerea ta, iar după ce trimiți cererea primești o ofertă finală, adaptată exact la ce ai nevoie.')

@section('content')
    <section class="grid gap-6 lg:grid-cols-[0.9fr_1.1fr]">
        <article class="rounded-[2rem] bg-black p-6 text-white sm:p-8">
            <p class="text-sm uppercase tracking-[0.25em] text-white/40">
                Realizare site la cheie
            </p>

            <h2 class="mt-4 text-3xl font-semibold sm:text-4xl">
                Site construit, adaptat și pregătit pentru lansare.
            </h2>

            <p class="mt-4 leading-8 text-white/60">
                Prețurile sunt orientative. După ce alegi modelul, pachetul și funcționalitățile, discutăm detaliile și primești oferta finală.
            </p>

            <div class="mt-8 grid gap-4">
                @foreach([
                    [
                        'name' => 'Start',
                        'price' => 'de la 2.500 lei',
                        'description' => 'Pentru un site simplu de prezentare sau landing page, potrivit pentru început.',
                        'features' => ['Model de site adaptat', '4-5 secțiuni principale', 'Formular de contact', 'Variantă mobil și desktop', 'SEO basic']
                    ],
                    [
                        'name' => 'Pro',
                        'price' => 'de la 4.500 lei',
                        'description' => 'Pentru o afacere care are nevoie de un site complet, mai convingător și mai bine structurat.',
                        'features' => ['Tot ce include Start', 'Mai multe secțiuni personalizate', 'Funcționalități extra', 'Texte structurate mai clar', 'Pregătire pentru promovare']
                    ],
                    [
                        'name' => 'Premium',
                        'price' => 'de la 7.500 lei',
                        'description' => 'Pentru proiecte mai complexe, imagine premium, rezervări, catalog sau magazin online simplu.',
                        'features' => ['Tot ce include Pro', 'Pagini extra', 'Funcționalități avansate', 'Admin sau panou cereri', 'Suport la lansare']
                    ],
                    [
                        'name' => 'Custom',
                        'price' => 'ofertă personalizată',
                        'description' => 'Pentru platforme, magazine online complexe, conturi de client, integrări sau funcții speciale.',
                        'features' => ['Analiză cerințe', 'Structură custom', 'Funcții personalizate', 'Estimare separată', 'Livrare pe etape']
                    ],
                ] as $package)
                    <div class="rounded-2xl bg-white/10 p-5">
                        <div class="flex flex-col gap-2 sm:flex-row sm:items-start sm:justify-between">
                            <h3 class="text-2xl font-semibold">{{ $package['name'] }}</h3>
                            <p class="text-xl font-semibold">{{ $package['price'] }}</p>
                        </div>

                        <p class="mt-3 leading-7 text-white/60">
                            {{ $package['description'] }}
                        </p>

                        <ul class="mt-4 grid gap-2 text-sm text-white/70">
                            @foreach($package['features'] as $feature)
                                <li>✓ {{ $feature }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </article>

        <article class="rounded-[2rem] bg-[#f7f4ef] p-6 sm:p-8">
            <p class="text-sm uppercase tracking-[0.25em] text-[#8b6f47]">
                Ce include prețul
            </p>

            <h2 class="mt-4 text-3xl font-semibold">
                Nu plătești doar un design. Primești o structură funcțională.
            </h2>

            <p class="mt-4 leading-8 text-black/60">
                Scopul este ca site-ul să fie clar pentru client, ușor de parcurs și pregătit pentru cereri reale.
            </p>

            <div class="mt-8 grid gap-4">
                @foreach([
                    ['Design responsive', 'Site-ul este adaptat pentru telefon, tabletă și desktop.'],
                    ['Structură clară', 'Secțiuni logice pentru servicii, beneficii, prețuri, întrebări și contact.'],
                    ['Formular de contact', 'Vizitatorul poate trimite rapid o cerere direct din site.'],
                    ['SEO basic', 'Titluri, descrieri, structură și sitemap pentru indexare mai bună.'],
                    ['Configurare lansare', 'Te pot ajuta cu domeniul, hostingul, publicarea și verificările de bază.'],
                    ['Posibilitate de extindere', 'Poți începe simplu și adăuga ulterior rezervări, blog, magazin sau admin.'],
                ] as [$title, $description])
                    <div class="rounded-2xl bg-white p-5">
                        <h3 class="font-semibold">{{ $title }}</h3>

                        <p class="mt-2 text-sm leading-6 text-black/60">
                            {{ $description }}
                        </p>
                    </div>
                @endforeach
            </div>
        </article>
    </section>

    <section class="mt-12">
        <h2 class="text-3xl font-semibold">
            Funcționalități extra
        </h2>

        <p class="mt-4 max-w-3xl leading-8 text-black/60">
            Poți porni cu un site simplu și poți adăuga doar funcționalitățile de care ai nevoie. Prețurile sunt orientative și pot varia în funcție de complexitate.
        </p>

        <div class="mt-6 grid gap-4 md:grid-cols-2 lg:grid-cols-3">
            @foreach([
                ['Buton WhatsApp', 'de la 150 lei', 'Contact rapid pentru clienți.'],
                ['Formular contact', 'de la 300 lei', 'Cererile ajung direct în email sau în panou.'],
                ['Galerie foto / video', 'de la 400 lei', 'Potrivită pentru portofoliu, lucrări, camere sau produse.'],
                ['Listă servicii și prețuri', 'de la 350 lei', 'Prezinți clar ce oferi și cât costă.'],
                ['Google Maps', 'de la 250 lei', 'Clientul vede rapid locația afacerii.'],
                ['Formular rezervare', 'de la 600 lei', 'Pentru programări, perioade sau cereri de disponibilitate.'],
                ['Catalog produse', 'de la 900 lei', 'Produse afișate cu poză, preț și descriere.'],
                ['Panou cereri clienți', 'de la 1.200 lei', 'Vezi cererile primite într-un admin simplu.'],
                ['Site RO/EN', 'de la 1.500 lei', 'Site în română și engleză.'],
                ['Plată online', 'ofertă personalizată', 'Integrare plată cu cardul, în funcție de provider.'],
                ['Magazin online simplu', 'de la 7.500 lei', 'Produse, categorii, coș și cerere/comandă.'],
                ['Funcții custom', 'ofertă personalizată', 'Pentru idei speciale sau logică specifică businessului.'],
            ] as [$feature, $price, $description])
                <article class="rounded-2xl bg-white p-5">
                    <div class="flex items-start justify-between gap-4">
                        <h3 class="font-semibold">{{ $feature }}</h3>
                        <strong class="text-right text-[#8b6f47]">{{ $price }}</strong>
                    </div>

                    <p class="mt-3 text-sm leading-6 text-black/60">
                        {{ $description }}
                    </p>
                </article>
            @endforeach
        </div>
    </section>

    <section class="mt-12 rounded-[2rem] bg-black p-6 text-white sm:p-8">
        <div class="grid gap-6 lg:grid-cols-[1fr_0.6fr] lg:items-center">
            <div>
                <h2 class="text-3xl font-semibold">
                    Nu știi ce variantă ți se potrivește?
                </h2>

                <p class="mt-4 leading-8 text-white/60">
                    Alege un model de site și trimite cererea cu ce ai în minte. Îți spun ce pachet este potrivit, ce poți simplifica și unde merită să investești.
                </p>
            </div>

            <div class="flex flex-col gap-3 sm:flex-row lg:flex-col">
                <a href="/#templates" class="inline-flex justify-center rounded-full bg-white px-6 py-4 text-sm font-semibold text-black">
                    Alege un model
                </a>

                <a href="/intrebari-frecvente" class="inline-flex justify-center rounded-full border border-white/20 px-6 py-4 text-sm font-semibold text-white">
                    Vezi întrebări frecvente
                </a>
            </div>
        </div>
    </section>
@endsection
