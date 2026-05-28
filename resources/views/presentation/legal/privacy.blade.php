@extends('presentation.layout')

@section('title', 'Politica de confidențialitate | RentRide')
@section('description', 'Informații despre modul în care RentRide prelucrează datele personale.')

@section('content')

    <section class="bg-gradient-to-br from-sky-50 via-white to-cyan-50 py-10 sm:py-14 md:py-16">
        <div class="mx-auto max-w-4xl px-4">
            <div class="inline-flex rounded-full border border-sky-200 bg-white px-4 py-2 text-sm font-medium text-sky-700 shadow-sm">
                RentRide
            </div>

            <h1 class="mt-5 text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl md:text-5xl">
                Politica de confidențialitate
            </h1>

            <p class="mt-4 text-base leading-7 text-slate-600 sm:text-lg sm:leading-8">
                Aici explicăm ce date colectăm, de ce le colectăm și ce drepturi ai.
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

                    <h2>1. Operatorul de date</h2>

                    <p>
                        Operatorul datelor personale este:
                    </p>

                    <ul>
                        <li><strong>Denumire:</strong> {{ config('rentride.pfa.name') }}</li>
                        <li><strong>CUI:</strong> {{ config('rentride.pfa.cui') }}</li>
                        <li><strong>Nr. Reg. Com.:</strong> {{ config('rentride.pfa.registration_number') }}</li>
                        <li><strong>Sediu:</strong> {{ config('rentride.pfa.address') }}</li>
                        <li><strong>Email:</strong> {{ config('rentride.email') }}</li>
                        <li><strong>Telefon / WhatsApp:</strong> {{ config('rentride.phone_display') }}</li>
                    </ul>

                    <h2>2. Ce date colectăm</h2>

                    <p>
                        Prin formularul de contact sau prin comunicarea directă cu noi, putem colecta următoarele date:
                    </p>

                    <ul>
                        <li>nume și prenume;</li>
                        <li>număr de telefon;</li>
                        <li>adresă de email, dacă este completată;</li>
                        <li>tipul vehiculului de interes;</li>
                        <li>mesajul transmis;</li>
                        <li>detalii necesare pentru rezervare sau închiriere;</li>
                        <li>date tehnice minime generate de folosirea site-ului, cum ar fi adresa IP sau informații despre browser.</li>
                    </ul>

                    <h2>3. Scopurile prelucrării</h2>

                    <p>
                        Folosim datele pentru:
                    </p>

                    <ul>
                        <li>a răspunde cererilor transmise prin formular, telefon, WhatsApp sau email;</li>
                        <li>a verifica disponibilitatea vehiculelor;</li>
                        <li>a comunica detalii despre prețuri, perioade și condiții de închiriere;</li>
                        <li>a pregăti sau administra o rezervare ori un contract de închiriere;</li>
                        <li>a îmbunătăți funcționarea site-ului și siguranța acestuia;</li>
                        <li>a respecta obligațiile legale aplicabile.</li>
                    </ul>

                    <h2>4. Temeiul legal</h2>

                    <p>
                        Prelucrarea datelor se poate baza pe:
                    </p>

                    <ul>
                        <li>demersuri precontractuale, atunci când soliciți informații sau o rezervare;</li>
                        <li>executarea unui contract, dacă se încheie un contract de închiriere;</li>
                        <li>obligații legale, unde este cazul;</li>
                        <li>interes legitim, pentru securitatea site-ului și gestionarea comunicărilor;</li>
                        <li>consimțământ, dacă acesta este necesar pentru anumite prelucrări.</li>
                    </ul>

                    <h2>5. Cât timp păstrăm datele</h2>

                    <p>
                        Datele transmise prin formularul de contact sunt păstrate atât timp cât este necesar pentru gestionarea solicitării și pentru eventuale comunicări ulterioare.
                        Datele aferente contractelor, facturilor sau documentelor financiar-contabile se păstrează conform termenelor legale aplicabile.
                    </p>

                    <h2>6. Cui putem transmite datele</h2>

                    <p>
                        Datele pot fi accesate sau transmise, atunci când este necesar, către:
                    </p>

                    <ul>
                        <li>furnizori de hosting și servicii tehnice;</li>
                        <li>furnizori de email sau comunicare;</li>
                        <li>contabilitate, consultanți sau autorități, dacă legea impune acest lucru;</li>
                        <li>alți parteneri strict necesari pentru prestarea serviciilor solicitate.</li>
                    </ul>

                    <p>
                        Nu vindem datele tale personale către terți.
                    </p>

                    <h2>7. Drepturile tale</h2>

                    <p>
                        În condițiile legislației aplicabile, ai dreptul să soliciți:
                    </p>

                    <ul>
                        <li>acces la datele tale personale;</li>
                        <li>rectificarea datelor incorecte;</li>
                        <li>ștergerea datelor, atunci când este posibil legal;</li>
                        <li>restricționarea prelucrării;</li>
                        <li>opoziția față de anumite prelucrări;</li>
                        <li>portabilitatea datelor, unde este aplicabil;</li>
                        <li>retragerea consimțământului, dacă prelucrarea se bazează pe consimțământ.</li>
                    </ul>

                    <h2>8. Cum ne poți contacta</h2>

                    <p>
                        Pentru orice solicitare legată de datele personale, ne poți contacta la:
                    </p>

                    <ul>
                        <li><strong>Email:</strong> {{ config('rentride.email') }}</li>
                        <li><strong>Telefon / WhatsApp:</strong> {{ config('rentride.phone_display') }}</li>
                    </ul>

                    <h2>9. Securitatea datelor</h2>

                    <p>
                        Aplicăm măsuri rezonabile de securitate pentru protejarea datelor personale împotriva accesului neautorizat, pierderii, modificării sau divulgării nepermise.
                    </p>

                    <h2>10. Modificări</h2>

                    <p>
                        Această politică poate fi actualizată periodic. Versiunea actualizată va fi disponibilă pe această pagină.
                    </p>
                </div>
            </div>
        </div>
    </section>

@endsection
