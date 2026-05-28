@extends('presentation.layout')

@section('title', 'Politica cookies | RentRide')
@section('description', 'Informații despre cookie-urile folosite de site-ul RentRide.')

@section('content')

    <section class="bg-gradient-to-br from-sky-50 via-white to-cyan-50 py-10 sm:py-14 md:py-16">
        <div class="mx-auto max-w-4xl px-4">
            <div class="inline-flex rounded-full border border-sky-200 bg-white px-4 py-2 text-sm font-medium text-sky-700 shadow-sm">
                RentRide
            </div>

            <h1 class="mt-5 text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl md:text-5xl">
                Politica cookies
            </h1>

            <p class="mt-4 text-base leading-7 text-slate-600 sm:text-lg sm:leading-8">
                Această pagină explică modul în care site-ul folosește cookie-uri și tehnologii similare.
            </p>
        </div>
    </section>

    <section class="py-10 sm:py-14 md:py-16">
        <div class="mx-auto max-w-4xl px-4">
            <div class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm sm:p-8 md:p-10">
                <div class="prose prose-slate max-w-none prose-headings:font-extrabold prose-h2:text-2xl prose-p:leading-7 prose-li:leading-7">
                    <p class="text-sm text-slate-500">
                        Ultima actualizare: {{ date('d.m.Y') }}
                    </p>

                    <h2>1. Ce sunt cookie-urile</h2>

                    <p>
                        Cookie-urile sunt fișiere mici salvate pe dispozitivul tău atunci când accesezi un site.
                        Acestea pot ajuta site-ul să funcționeze corect, să păstreze anumite setări și să îmbunătățească experiența de navigare.
                    </p>

                    <h2>2. Ce cookie-uri folosim</h2>

                    <p>
                        Site-ul RentRide folosește în principal cookie-uri necesare pentru funcționarea site-ului.
                        Acestea pot include cookie-uri pentru sesiune, securitate și protecția formularului de contact.
                    </p>

                    <ul>
                        <li><strong>Cookie-uri de sesiune:</strong> ajută site-ul să funcționeze corect în timpul navigării.</li>
                        <li><strong>Cookie-uri de securitate:</strong> ajută la protejarea formularelor și a cererilor transmise prin site.</li>
                        <li><strong>Cookie-uri de preferință:</strong> pot reține limba aleasă, unde este cazul.</li>
                    </ul>

                    <h2>3. Cookie-uri de analiză sau marketing</h2>

                    <p>
                        În forma actuală, site-ul nu folosește cookie-uri de marketing sau tracking publicitar.
                        Dacă în viitor vom introduce servicii precum Google Analytics, Meta Pixel sau alte instrumente similare, această politică va fi actualizată și, dacă este necesar, va fi afișat un banner de consimțământ.
                    </p>

                    <h2>4. Cookie-uri de la terți</h2>

                    <p>
                        Site-ul poate conține linkuri către servicii externe, cum ar fi WhatsApp.
                        Accesarea acestor servicii poate implica prelucrarea datelor conform politicilor proprii ale furnizorilor respectivi.
                    </p>

                    <h2>5. Cum poți controla cookie-urile</h2>

                    <p>
                        Poți șterge sau bloca cookie-urile din setările browserului tău.
                        Blocarea cookie-urilor strict necesare poate afecta funcționarea anumitor părți ale site-ului, inclusiv formularul de contact.
                    </p>

                    <h2>6. Contact</h2>

                    <p>
                        Pentru întrebări despre această politică, ne poți contacta la:
                    </p>

                    <ul>
                        <li><strong>Email:</strong> {{ config('rentride.email') }}</li>
                        <li><strong>Telefon / WhatsApp:</strong> {{ config('rentride.phone_display') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

@endsection
