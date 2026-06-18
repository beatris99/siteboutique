@extends('pages.layout')

@section('title', 'Întrebări frecvente')
@section('description', 'Întrebări frecvente despre realizarea unui site, prețuri, durată, domeniu, hosting, mentenanță și funcționalități.')
@section('page-title', 'Întrebări frecvente')
@section('page-intro', 'Răspunsuri clare înainte să pornești un proiect de site. Fără termeni tehnici inutili.')

@section('content')
    <section class="grid gap-10 lg:grid-cols-[0.8fr_1.2fr]">
        <div>
            <p class="text-sm uppercase tracking-[0.25em] text-[#8b6f47]">
                FAQ
            </p>

            <h2 class="mt-4 text-4xl font-semibold leading-tight">
                Ce este bine să știi înainte să ceri un site.
            </h2>

            <p class="mt-5 leading-8 text-black/60">
                Am strâns cele mai importante întrebări despre prețuri, proces, materiale necesare, durată și lansare.
            </p>

            <a href="/#templates" class="mt-8 inline-flex rounded-full bg-black px-7 py-4 text-sm font-semibold text-white">
                Alege un model de site
            </a>
        </div>

        <div class="grid gap-4">
            @foreach([
                [
                    'question' => 'Prețul afișat este final?',
                    'answer' => 'Nu. Prețul afișat este orientativ. Oferta finală se stabilește după ce îmi spui exact ce ai nevoie: pagini, funcționalități, conținut, termen și nivel de complexitate.'
                ],
                [
                    'question' => 'Cât durează realizarea unui site?',
                    'answer' => 'Un site simplu poate fi gata în 5-7 zile lucrătoare, dacă materialele sunt pregătite. Un site mai complex, cu mai multe pagini, rezervări, catalog sau admin poate dura între 10 și 21+ zile.'
                ],
                [
                    'question' => 'Domeniul și hostingul sunt incluse?',
                    'answer' => 'Domeniul și hostingul pot fi configurate separat. Te pot ajuta să alegi varianta potrivită și să conectăm site-ul la domeniul tău.'
                ],
                [
                    'question' => 'Trebuie să am textele și imaginile pregătite?',
                    'answer' => 'Ideal, da. Dar dacă nu le ai perfect pregătite, pot lucra cu informațiile pe care le ai și te ajut să le structurăm mai clar pentru site.'
                ],
                [
                    'question' => 'Pot modifica singură conținutul după lansare?',
                    'answer' => 'Da, dacă proiectul include un panou de administrare sau o structură editabilă. Pentru site-urile simple, modificările se pot face și printr-un pachet de mentenanță.'
                ],
                [
                    'question' => 'Se poate face site în română și engleză?',
                    'answer' => 'Da. Site-ul poate fi făcut în română și engleză, iar costul depinde de numărul de pagini și de cât conținut trebuie tradus sau adaptat.'
                ],
                [
                    'question' => 'Se poate face și magazin online?',
                    'answer' => 'Da. Se poate face magazin online simplu sau magazin cu funcționalități mai complexe. Pentru plăți, curieri, facturare, stocuri sau cont client, oferta se face personalizat.'
                ],
                [
                    'question' => 'Pot adăuga ulterior funcționalități?',
                    'answer' => 'Da. Poți începe cu un site simplu și adăuga ulterior rezervări, blog, catalog produse, plată online, cont client, formulare avansate sau alte funcții.'
                ],
                [
                    'question' => 'Oferi și mentenanță după lansare?',
                    'answer' => 'Da. Poți alege un pachet de mentenanță pentru actualizări de text, imagini, verificări, backup și suport.'
                ],
                [
                    'question' => 'Trebuie să plătesc avans?',
                    'answer' => 'Pentru începerea proiectului se poate solicita avans, iar restul se achită la livrare sau pe etape, în funcție de complexitate.'
                ],
                [
                    'question' => 'Ce se întâmplă după ce trimit cererea?',
                    'answer' => 'Analizez modelul ales, pachetul, funcționalitățile și mesajul tău. Revin cu întrebări de clarificare și apoi cu o ofertă finală.'
                ],
                [
                    'question' => 'Pot vedea un exemplu real?',
                    'answer' => 'Da. RentRide este un exemplu real de site lansat, construit pentru închiriere scutere în Brașov.'
                ],
            ] as $item)
                <details class="group rounded-2xl border border-black/10 bg-white p-5">
                    <summary class="flex cursor-pointer list-none items-center justify-between gap-4 font-semibold">
                        <span>{{ $item['question'] }}</span>
                        <span class="transition group-open:rotate-45">+</span>
                    </summary>

                    <p class="mt-4 leading-7 text-black/60">
                        {{ $item['answer'] }}
                    </p>
                </details>
            @endforeach
        </div>
    </section>
@endsection
