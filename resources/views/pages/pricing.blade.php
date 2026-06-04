@extends('pages.layout')

@section('title', 'Prețuri')
@section('description', 'Prețuri pentru site-uri gata făcute, template-uri pentru developeri și funcționalități extra.')
@section('page-title', 'Prețuri clare pentru site-ul tău')
@section('page-intro', 'Poți alege să îți fac eu site-ul complet sau poți cumpăra template-ul și îl folosești tu, dacă ești developer.')

@section('content')
    <section class="grid gap-6 lg:grid-cols-2">
        <article class="rounded-[2rem] bg-black p-6 text-white sm:p-8">
            <p class="text-sm uppercase tracking-[0.25em] text-white/40">
                Pentru antreprenori
            </p>

            <h2 class="mt-4 text-3xl font-semibold">
                Vreau să îmi faci tu site-ul
            </h2>

            <p class="mt-4 text-white/60">
                Alegi un model de site, alegi funcțiile dorite, iar eu îl adaptez pentru afacerea ta.
            </p>

            <div class="mt-8 grid gap-4">
                @foreach([
                    ['Start', '2.500 lei', 'Site simplu, clar, potrivit pentru început.'],
                    ['Pro', '4.500 lei', 'Site complet, cu funcții extra și structură mai bună.'],
                    ['Premium', '7.500 lei', 'Site mai avansat, imagine premium și mai multe pagini.'],
                    ['Custom', 'de la 10.000 lei', 'Platformă, magazin complex, admin sau funcții speciale.'],
                ] as [$name, $price, $description])
                    <div class="rounded-2xl bg-white/10 p-5">
                        <div class="flex flex-col gap-2 sm:flex-row sm:items-start sm:justify-between">
                            <h3 class="text-2xl font-semibold">{{ $name }}</h3>
                            <p class="text-xl font-semibold">{{ $price }}</p>
                        </div>

                        <p class="mt-3 text-white/60">
                            {{ $description }}
                        </p>
                    </div>
                @endforeach
            </div>
        </article>

        <article class="rounded-[2rem] bg-[#f7f4ef] p-6 sm:p-8">
            <p class="text-sm uppercase tracking-[0.25em] text-[#8b6f47]">
                Pentru developeri
            </p>

            <h2 class="mt-4 text-3xl font-semibold">
                Cumpăr template-ul și îl folosesc eu
            </h2>

            <p class="mt-4 text-black/60">
                Primești template-ul și componentele, apoi îl adaptezi tu pentru clientul tău.
            </p>

            <div class="mt-8 grid gap-4">
                @foreach([
                    ['Template simplu', '490 lei', 'Un model de site gata construit.'],
                    ['Template + componente', '890 lei', 'Modelul plus funcționalități comune.'],
                    ['Starter kit complet', '1.290 lei', 'Template, componente, structură și documentație.'],
                    ['Toate template-urile', '2.900 lei', 'Pachet pentru developeri care vor mai multe modele.'],
                ] as [$name, $price, $description])
                    <div class="rounded-2xl bg-white p-5">
                        <div class="flex flex-col gap-2 sm:flex-row sm:items-start sm:justify-between">
                            <h3 class="text-2xl font-semibold">{{ $name }}</h3>
                            <p class="text-xl font-semibold text-[#8b6f47]">{{ $price }}</p>
                        </div>

                        <p class="mt-3 text-black/60">
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

        <p class="mt-4 text-black/60">
            Poți porni simplu și adaugi doar ce ai nevoie.
        </p>

        <div class="mt-6 grid gap-4 md:grid-cols-2">
            @foreach([
                ['Buton WhatsApp', '150 lei', '49 lei'],
                ['Formular contact', '300 lei', '99 lei'],
                ['Galerie foto', '300 lei', '99 lei'],
                ['Listă servicii / prețuri', '350 lei', '149 lei'],
                ['Google Maps', '200 lei', '79 lei'],
                ['Formular rezervare', '600 lei', '199 lei'],
                ['Catalog produse', '900 lei', '299 lei'],
                ['Panou cereri clienți', '1.200 lei', '399 lei'],
                ['Site RO/EN', '1.500 lei', '499 lei'],
                ['Plată online', '1.800 lei', '699 lei'],
                ['Magazin online simplu', '2.500 lei', '899 lei'],
            ] as [$feature, $clientPrice, $developerPrice])
                <article class="rounded-2xl bg-white p-5">
                    <h3 class="font-semibold">{{ $feature }}</h3>

                    <div class="mt-4 grid gap-2 text-sm text-black/60">
                        <div class="flex justify-between gap-4">
                            <span>Pentru client</span>
                            <strong class="text-black">{{ $clientPrice }}</strong>
                        </div>

                        <div class="flex justify-between gap-4">
                            <span>Pentru developer</span>
                            <strong class="text-black">{{ $developerPrice }}</strong>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </section>

    <section class="mt-12 rounded-[2rem] bg-black p-6 text-white sm:p-8">
        <h2 class="text-3xl font-semibold">
            Nu știi ce variantă să alegi?
        </h2>

        <p class="mt-4 text-white/60">
            Alege un model de site, selectează pachetul Pro și trimite cererea. Îți spun eu dacă ai nevoie de mai mult sau dacă poți începe mai simplu.
        </p>

        <a href="/#templates" class="mt-6 inline-flex rounded-full bg-white px-6 py-4 text-sm font-semibold text-black">
            Alege un model de site
        </a>
    </section>
@endsection