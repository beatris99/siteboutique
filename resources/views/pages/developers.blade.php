@extends('pages.layout')

@section('title', 'Pentru developeri')
@section('description', 'Template-uri Laravel, Vue și Tailwind pentru developeri care vor să construiască mai rapid site-uri pentru clienți.')
@section('page-title', 'Template-uri și componente pentru developeri')
@section('page-intro', 'Cumperi modele de site și funcționalități comune, apoi le adaptezi tu pentru proiectele tale.')

@section('content')
    <section class="grid gap-6 lg:grid-cols-3">
        @foreach([
            ['Template simplu', '490 lei', 'Un model de site gata construit, cu structură responsive.'],
            ['Template + componente', '890 lei', 'Modelul plus componente pentru funcționalități comune.'],
            ['Starter kit complet', '1.290 lei', 'Template, componente, structură, checklist și documentație.'],
        ] as [$name, $price, $description])
            <article class="rounded-[2rem] bg-[#f7f4ef] p-6">
                <h2 class="text-2xl font-semibold">{{ $name }}</h2>
                <p class="mt-4 text-3xl font-semibold text-[#8b6f47]">{{ $price }}</p>
                <p class="mt-4 text-black/60">{{ $description }}</p>
            </article>
        @endforeach
    </section>

    <section class="mt-12">
        <h2 class="text-3xl font-semibold">Ce primești</h2>

        <div class="mt-6 grid gap-4 md:grid-cols-2">
            @foreach([
                'Structură Laravel + Vue + Tailwind',
                'Componente reutilizabile',
                'Modele de site pe domenii',
                'Fișiere ușor de modificat',
                'Starter kit pentru proiecte de client',
                'Checklist materiale client',
            ] as $item)
                <div class="rounded-2xl bg-[#f7f4ef] p-5">
                    ✓ {{ $item }}
                </div>
            @endforeach
        </div>
    </section>

    <section class="mt-12 rounded-[2rem] bg-black p-8 text-white">
        <h2 class="text-3xl font-semibold">Cumperi template-ul, îl adaptezi tu.</h2>

        <p class="mt-4 text-white/60">
            Potrivit pentru developeri care vor să livreze mai rapid site-uri pentru clienți fără să pornească fiecare proiect de la zero.
        </p>

        <a href="/#templates" class="mt-6 inline-flex rounded-full bg-white px-6 py-4 text-sm font-semibold text-black">
            Vezi modelele
        </a>
    </section>
@endsection