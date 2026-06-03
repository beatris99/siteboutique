@extends('pages.layout')

@section('title', 'Cum lucrăm')
@section('description', 'Proces clar pentru realizarea unui site: alegere template, configurare, ofertă, dezvoltare și lansare.')
@section('page-title', 'Cum lucrăm')
@section('page-intro', 'Procesul este gândit ca să reducem discuțiile inutile și să pornim de la o structură clară.')

@section('content')
    <div class="grid gap-6">
        @foreach([
            ['01', 'Alegi template-ul', 'Pornești de la un demo real, nu de la o idee vagă. Alegi structura care se potrivește afacerii tale.'],
            ['02', 'Configurezi site-ul', 'Alegi pachetul, extra-urile și trimiți detalii despre business.'],
            ['03', 'Primești lista de materiale', 'Îți spun exact ce trebuie să îmi trimiți: logo, poze, servicii, prețuri, date de contact.'],
            ['04', 'Primești oferta finală', 'După ce verific cererea, primești prețul final și termenul estimativ.'],
            ['05', 'Începem dezvoltarea', 'După confirmare și avans, adaptez template-ul cu datele și identitatea ta.'],
            ['06', 'Revizuim împreună', 'Verificăm textele, secțiunile, imaginile și facem ajustările necesare.'],
            ['07', 'Lansăm site-ul', 'Conectăm domeniul, verificăm formularele, build-ul de producție și indexarea basic.'],
            ['08', 'Poți alege mentenanță', 'După lansare, poți avea suport lunar pentru actualizări, modificări și optimizări.'],
        ] as [$number, $title, $description])
            <article class="rounded-[2rem] bg-[#f7f4ef] p-6">
                <p class="text-sm font-semibold text-[#8b6f47]">{{ $number }}</p>
                <h2 class="mt-3 text-2xl font-semibold">{{ $title }}</h2>
                <p class="mt-3 text-black/60">{{ $description }}</p>
            </article>
        @endforeach
    </div>

    <div class="mt-10 rounded-[2rem] bg-black p-8 text-white">
        <h2 class="text-3xl font-semibold">Vrei să pornim de la un template?</h2>
        <p class="mt-4 text-white/60">
            Alege un demo, configurează-l și trimite cererea. Așa putem porni cu o direcție clară.
        </p>

        <a href="/#templates" class="mt-6 inline-flex rounded-full bg-white px-6 py-4 text-sm font-semibold text-black">
            Vezi template-uri
        </a>
    </div>
@endsection
