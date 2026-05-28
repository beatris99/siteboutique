@extends('presentation.layout')

@section('title', 'Termeni și condiții | RentRide')
@section('description', 'Termenii și condițiile de utilizare pentru serviciile RentRide.')

@section('content')

    <section class="bg-gradient-to-br from-sky-50 via-white to-cyan-50 py-10 sm:py-14 md:py-16">
        <div class="mx-auto max-w-4xl px-4">
            <div class="inline-flex rounded-full border border-sky-200 bg-white px-4 py-2 text-sm font-medium text-sky-700 shadow-sm">
                RentRide
            </div>

            <h1 class="mt-5 text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl md:text-5xl">
                Termeni și condiții
            </h1>

            <p class="mt-4 text-base leading-7 text-slate-600 sm:text-lg sm:leading-8">
                Această pagină stabilește condițiile generale de utilizare a site-ului și a serviciilor RentRide.
            </p>
        </div>
    </section>

    <section class="py-10 sm:py-14 md:py-16">
        <div class="mx-auto max-w-4xl px-4">
            <div class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm sm:p-8 md:p-10">
                <article class="space-y-8 text-slate-700">
                    <p class="text-sm text-slate-500">
                        Ultima actualizare: {{ date('d.m.Y') }}
                    </p>

                    <section>
                        <h2 class="text-2xl font-extrabold text-slate-900">1. Datele operatorului</h2>
                        <p class="mt-4 leading-7">
                            Site-ul <strong>rentride.ro</strong> este administrat de PFA:
                        </p>

                        <ul class="mt-4 space-y-2 leading-7">
                            <li><strong>Denumire PFA:</strong> {{ config('rentride.pfa.name') }}</li>
                            <li><strong>CUI:</strong> {{ config('rentride.pfa.cui') }}</li>
                            <li><strong>Nr. Reg. Com.:</strong> {{ config('rentride.pfa.registration_number') }}</li>
                            <li><strong>Sediu profesional:</strong> {{ config('rentride.pfa.address') }}</li>
                            <li><strong>Oraș:</strong> {{ config('rentride.pfa.city') }}</li>
                            <li><strong>Țară:</strong> {{ config('rentride.pfa.country') }}</li>
                            <li><strong>Email:</strong> {{ config('rentride.email') }}</li>
                            <li><strong>Telefon / WhatsApp:</strong> {{ config('rentride.phone_display') }}</li>
                        </ul>
                    </section>

                    <section>
                        <h2 class="text-2xl font-extrabold text-slate-900">2. Descrierea serviciilor</h2>
                        <p class="mt-4 leading-7">
                            RentRide oferă servicii de închiriere pentru scutere, biciclete electrice și alte vehicule de mobilitate urbană, în principal în Brașov și împrejurimi.
                            Serviciile pot fi destinate plimbărilor urbane, deplasărilor de scurtă durată sau activității de livrare.
                        </p>
                        <p class="mt-4 leading-7">
                            Informațiile afișate pe site au scop informativ. Disponibilitatea vehiculelor, prețul final, condițiile de predare și condițiile de închiriere se confirmă direct cu RentRide, prin telefon, WhatsApp, email sau formularul de contact.
                        </p>
                    </section>

                    <section>
                        <h2 class="text-2xl font-extrabold text-slate-900">3. Rezervări și disponibilitate</h2>
                        <p class="mt-4 leading-7">
                            Trimiterea unei cereri prin formularul de contact sau prin WhatsApp nu reprezintă automat o rezervare confirmată.
                            Rezervarea devine valabilă doar după confirmarea expresă din partea RentRide și, unde este cazul, după semnarea contractului de închiriere și achitarea sumelor stabilite.
                        </p>
                    </section>

                    <section>
                        <h2 class="text-2xl font-extrabold text-slate-900">4. Condiții generale de închiriere</h2>
                        <p class="mt-4 leading-7">
                            Pentru închirierea unui vehicul pot fi solicitate, în funcție de tipul vehiculului și perioada de închiriere:
                        </p>

                        <ul class="mt-4 list-disc space-y-2 pl-6 leading-7">
                            <li>act de identitate valabil;</li>
                            <li>permis de conducere, acolo unde vehiculul sau legislația aplicabilă îl impune;</li>
                            <li>semnarea unui contract de închiriere;</li>
                            <li>achitarea prețului de închiriere;</li>
                            <li>achitarea unei garanții, dacă este cazul;</li>
                            <li>acceptarea condițiilor de utilizare și returnare a vehiculului.</li>
                        </ul>
                    </section>

                    <section>
                        <h2 class="text-2xl font-extrabold text-slate-900">5. Prețuri</h2>
                        <p class="mt-4 leading-7">
                            Prețurile afișate pe site pot include oferte pentru perioade diferite, precum 4 ore, o zi, o săptămână sau închiriere pentru activitate de livrare.
                            Prețurile pot varia în funcție de vehicul, perioadă, disponibilitate, sezon, garanție și condițiile concrete ale închirierii.
                        </p>
                        <p class="mt-4 leading-7">
                            RentRide își rezervă dreptul de a modifica prețurile afișate pe site. Prețul aplicabil este cel confirmat clientului înainte de închiriere.
                        </p>
                    </section>

                    <section>
                        <h2 class="text-2xl font-extrabold text-slate-900">6. Obligațiile clientului</h2>
                        <ul class="mt-4 list-disc space-y-2 pl-6 leading-7">
                            <li>să folosească vehiculul cu grijă și responsabilitate;</li>
                            <li>să respecte legislația rutieră aplicabilă;</li>
                            <li>să nu folosească vehiculul în scopuri ilegale sau periculoase;</li>
                            <li>să nu subînchirieze sau să înstrăineze vehiculul;</li>
                            <li>să anunțe imediat RentRide în caz de accident, defecțiune, furt, pierdere sau deteriorare;</li>
                            <li>să returneze vehiculul la data, ora și locul stabilite;</li>
                            <li>să returneze vehiculul și accesoriile în starea în care le-a primit, cu uzura normală acceptată.</li>
                        </ul>
                    </section>

                    <section>
                        <h2 class="text-2xl font-extrabold text-slate-900">7. Daune, amenzi și răspundere</h2>
                        <p class="mt-4 leading-7">
                            Clientul răspunde pentru folosirea vehiculului pe durata închirierii.
                            Amenzile, daunele, pierderea accesoriilor, deteriorările produse din culpa clientului sau alte costuri rezultate din utilizarea necorespunzătoare pot fi suportate de client, conform contractului de închiriere și legislației aplicabile.
                        </p>
                        <p class="mt-4 leading-7">
                            Condițiile exacte privind garanția, daunele, accidentele, furtul, pierderea documentelor sau întârzierea la returnare vor fi stabilite în contractul de închiriere.
                        </p>
                    </section>

                    <section>
                        <h2 class="text-2xl font-extrabold text-slate-900">8. Anulări și modificări</h2>
                        <p class="mt-4 leading-7">
                            Cererile de anulare sau modificare a unei rezervări trebuie comunicate cât mai rapid prin telefon, WhatsApp sau email.
                            Condițiile de anulare pot depinde de perioada rezervată, tipul vehiculului și momentul anulării.
                        </p>
                    </section>

                    <section>
                        <h2 class="text-2xl font-extrabold text-slate-900">9. Reclamații și soluționarea litigiilor</h2>
                        <p class="mt-4 leading-7">
                            Pentru reclamații, întrebări sau sesizări privind serviciile RentRide, clientul ne poate contacta la
                            <strong>{{ config('rentride.email') }}</strong> sau la <strong>{{ config('rentride.phone_display') }}</strong>.
                            Vom încerca soluționarea amiabilă a oricărei sesizări.
                        </p>
                        <p class="mt-4 leading-7">
                            Consumatorii se pot adresa și autorităților competente în domeniul protecției consumatorilor, conform legislației aplicabile.
                        </p>
                    </section>

                    <section>
                        <h2 class="text-2xl font-extrabold text-slate-900">10. Limitarea răspunderii</h2>
                        <p class="mt-4 leading-7">
                            RentRide depune eforturi pentru ca informațiile de pe site să fie corecte și actualizate, însă pot exista erori, întârzieri de actualizare sau diferențe față de disponibilitatea reală.
                            RentRide nu garantează că toate vehiculele afișate sunt disponibile în orice moment.
                        </p>
                    </section>

                    <section>
                        <h2 class="text-2xl font-extrabold text-slate-900">11. Proprietate intelectuală</h2>
                        <p class="mt-4 leading-7">
                            Textele, imaginile, structura site-ului, elementele grafice și materialele afișate pe site aparțin RentRide sau partenerilor săi, cu excepția cazurilor în care este indicat altfel.
                            Copierea sau folosirea acestora fără acordul RentRide este interzisă.
                        </p>
                    </section>

                    <section>
                        <h2 class="text-2xl font-extrabold text-slate-900">12. Modificarea termenilor</h2>
                        <p class="mt-4 leading-7">
                            RentRide poate modifica acești termeni și condiții atunci când este necesar. Versiunea aplicabilă este cea publicată pe site la data accesării.
                        </p>
                    </section>
                </article>
            </div>
        </div>
    </section>

@endsection
