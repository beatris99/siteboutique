@extends('pages.layout')

@section('title', 'Site făcut pentru tine')
@section('description', 'Alegi un model de site, alegi funcțiile dorite, iar eu îl adaptez și îl pregătesc pentru lansare.')
@section('page-title', 'Site făcut pentru tine')
@section('page-intro', 'Nu trebuie să știi partea tehnică. Alegi modelul, îmi spui ce vrei, iar eu îl adaptez pentru afacerea ta.')

@section('content')
    <section class="grid gap-6">
        @foreach([
            ['01', 'Alegi un model de site', 'Pornești de la un model vizual real: salon, magazin, pensiune, închirieri, servicii sau landing page.'],
            ['02', 'Adaugi funcțiile dorite', 'WhatsApp, formular, rezervare, produse, galerie, hartă, setări Google sau alte funcții.'],
            ['03', 'Îmi trimiți detalii simple', 'Nume, telefon, ce fel de afacere ai, dacă ai logo, poze, domeniu și ce vrei să obții.'],
            ['04', 'Primești recomandarea finală', 'Îți spun ce pachet se potrivește și ce materiale mai sunt necesare.'],
            ['05', 'Îți construiesc site-ul', 'Adaptez textele, imaginile, culorile, secțiunile și îl pregătesc pentru lansare.'],
        ] as [$number, $title, $description])
            <article class="rounded-[2rem] bg-[#f7f4ef] p-6">
                <p class="text-sm font-semibold text-[#8b6f47]">{{ $number }}</p>
                <h2 class="mt-3 text-2xl font-semibold">{{ $title }}</h2>
                <p class="mt-3 text-black/60">{{ $description }}</p>
            </article>
        @endforeach
    </section>

    <section class="mt-12 rounded-[2rem] bg-black p-8 text-white">
        <h2 class="text-3xl font-semibold">Începe cu alegerea modelului.</h2>

        <p class="mt-4 text-white/60">
            Alege modelul care seamănă cel mai mult cu ce ai nevoie. După aceea poți adăuga funcții.
        </p>

        <a href="/#templates" class="mt-6 inline-flex rounded-full bg-white px-6 py-4 text-sm font-semibold text-black">
            Alege modelul
        </a>
    </section>
@endsection