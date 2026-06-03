@extends('pages.layout')

@section('title', 'Realizare site-uri')
@section('description', 'Realizare site-uri moderne pentru afaceri mici și medii: site-uri de prezentare, saloane, pensiuni, închirieri, magazine online simple și landing page-uri.')
@section('page-title', 'Realizare site-uri pentru afaceri mici și medii')
@section('page-intro', 'Construiesc site-uri moderne pornind de la template-uri reale, astfel încât să reducem timpul de discuție, să ai o direcție clară și să lansăm mai repede.')

@section('content')
    <section>
        <h2 class="text-3xl font-semibold">Pentru cine sunt potrivite site-urile</h2>

        <div class="mt-6 grid gap-4 md:grid-cols-2">
            @foreach([
                'Saloane beauty, cosmetică, nails și wellness',
                'Firme locale de servicii',
                'Cabinete, terapeuți, consultanți și freelanceri',
                'Pensiuni, cabane și apartamente în regim hotelier',
                'Închirieri scutere, biciclete, echipamente sau vehicule',
                'Magazine mici, produse locale și branduri handmade',
                'Cursuri, campanii, servicii premium și landing page-uri',
                'Afaceri care vor o prezență online clară și profesionistă',
            ] as $item)
                <div class="rounded-2xl bg-[#f7f4ef] p-5">
                    {{ $item }}
                </div>
            @endforeach
        </div>
    </section>

    <section class="mt-12">
        <h2 class="text-3xl font-semibold">Ce tipuri de site-uri putem construi</h2>

        <div class="mt-6 grid gap-4">
            @foreach([
                ['Site de prezentare', 'Pentru firme care vor să explice clar serviciile și să primească cereri de ofertă.'],
                ['Site pentru salon beauty', 'Pentru programări, servicii, prețuri, galerie și imagine premium.'],
                ['Site pentru pensiune sau cazare', 'Pentru camere, facilități, galerie, recenzii și cereri de rezervare.'],
                ['Site pentru închirieri', 'Pentru listare produse, tarife, condiții, garanție și rezervări.'],
                ['Magazin online simplu', 'Pentru produse locale, handmade, cosmetice, accesorii sau catalog online.'],
                ['Landing page de campanie', 'Pentru promovare prin reclame, cursuri, servicii premium sau lead-uri.'],
                ['Platformă custom', 'Pentru dashboard-uri, portaluri clienți, CRM-uri sau funcționalități personalizate.'],
            ] as [$title, $description])
                <article class="rounded-[2rem] bg-[#f7f4ef] p-6">
                    <h3 class="text-2xl font-semibold">{{ $title }}</h3>
                    <p class="mt-3 text-black/60">{{ $description }}</p>
                </article>
            @endforeach
        </div>
    </section>

    <section class="mt-12">
        <h2 class="text-3xl font-semibold">De ce pornim de la template-uri reale</h2>

        <div class="mt-6 grid gap-4 md:grid-cols-2">
            @foreach([
                'Clientul vede dinainte cum poate arăta site-ul.',
                'Reducem discuțiile inutile despre structură.',
                'Oferta este mai clară încă de la început.',
                'Timpul de producție scade pentru că nu pornim de la zero.',
                'Template-ul se adaptează cu textele, culorile și imaginile business-ului.',
                'Poți începe simplu și poți extinde site-ul ulterior.',
            ] as $item)
                <div class="flex gap-3 rounded-2xl bg-[#f7f4ef] p-5">
                    <span class="text-[#8b6f47]">✓</span>
                    <span>{{ $item }}</span>
                </div>
            @endforeach
        </div>
    </section>

    <section class="mt-12 rounded-[2rem] bg-black p-8 text-white">
        <h2 class="text-3xl font-semibold">Vrei să vezi ce template ți se potrivește?</h2>

        <p class="mt-4 text-white/60">
            Alege un demo real, configurează pachetul și funcționalitățile dorite, apoi trimite cererea. Pornim de la o direcție clară, nu de la o discuție vagă.
        </p>

        <a href="/#templates" class="mt-6 inline-flex rounded-full bg-white px-6 py-4 text-sm font-semibold text-black">
            Alege un template
        </a>
    </section>
@endsection
