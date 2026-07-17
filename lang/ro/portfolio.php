<?php

return [
    'meta' => [
        'index' => [
            'title' => 'Portofoliu SiteGo - proiecte web live pentru afaceri reale',
            'description' => 'Vezi proiecte SiteGo live: RentRide, platformă de închirieri în Brașov, și site-ul de prezentare Access Bars Beatris.',
        ],
        'rentride' => [
            'title' => 'RentRide în portofoliul SiteGo - platformă de închirieri în Brașov',
            'description' => 'Studiu de proiect SiteGo pentru RentRide: site live pentru închirieri de scutere și biciclete electrice în Brașov.',
        ],
        'access-bars-beatris' => [
            'title' => 'Access Bars Beatris în portofoliul SiteGo - site de prezentare',
            'description' => 'Studiu de proiect SiteGo pentru Beatris Lupuleț: site de prezentare pentru sesiuni Access Bars în Brașov, cu programare prin WhatsApp.',
        ],
    ],

    'hero' => [
        'eyebrow' => 'Portofoliu SiteGo',
        'title' => 'Proiecte reale, construite pentru obiective diferite.',
        'description' => 'De la o platformă locală de închirieri la un site personal de prezentare, fiecare proiect pornește de la afacere, public și acțiunea pe care vrem să o facă vizitatorul.',
        'stats' => [
            ['value' => '2', 'label' => 'proiecte live'],
            ['value' => '2', 'label' => 'direcții vizuale distincte'],
            ['value' => '100%', 'label' => 'gândite pentru mobil'],
        ],
    ],

    'labels' => [
        'view_case' => 'Vezi proiectul',
        'view_live' => 'Deschide site-ul live',
        'back' => 'Înapoi la portofoliu',
        'delivered' => 'Ce am livrat',
        'result' => 'Rezultatul proiectului',
        'technology' => 'Tehnologii și implementare',
        'next_project' => 'Următorul proiect',
        'external_note' => 'Site extern · se deschide într-o filă nouă',
    ],

    'cta' => [
        'eyebrow' => 'Următorul proiect poate fi al tău',
        'title' => 'Ai nevoie de un site care să explice clar ce faci și să ducă oamenii spre contact?',
        'description' => 'Pornim de la obiectivul afacerii tale, alegem structura potrivită și construim o prezență online coerentă, ușor de folosit și pregătită pentru promovare.',
        'button' => 'Discută proiectul tău',
    ],

    'projects' => [
        'rentride' => [
            'slug' => 'rentride',
            'name' => 'RentRide',
            'category' => 'Platformă locală de închirieri',
            'headline' => 'Mobilitate urbană pe două roți, prezentată clar și ușor de rezervat.',
            'short_description' => 'Un site complet pentru închirierea de scutere și biciclete electrice în Brașov, cu trasee clare pentru plimbări urbane și activitate de livrare.',
            'description' => 'RentRide avea nevoie de mai mult decât o pagină de prezentare: o structură care să separe tipurile de utilizatori, să prezinte vehiculele și să ducă rapid vizitatorul către verificarea disponibilității și contact.',
            'image' => '/images/portfolio/rentride-portfolio.webp',
            'image_alt' => 'Prezentare vizuală RentRide Brașov cu scuter și bicicletă electrică',
            'url' => 'https://rentride.ro',
            'status' => 'Site live',
            'year' => '2026',
            'accent' => '#087f8c',
            'accent_soft' => '#ddf7f7',

            'features' => [
                'Prezentarea modelelor și a serviciilor de închiriere',
                'Pagini distincte pentru plimbări urbane și livratori',
                'Contact rapid și verificarea disponibilității prin WhatsApp',
                'Administrarea vehiculelor, imaginilor și ofertelor',
                'Versiuni în limba română și engleză',
                'SEO local, Analytics și Search Console',
            ],

            'result' => 'Un site live care explică rapid oferta, diferențiază nevoile clienților și transformă interesul într-o cerere concretă de disponibilitate.',

            'implementation' => 'Aplicație Laravel cu bază de date MySQL, panou de administrare, interfață responsive și publicare pe infrastructură Docker.',

            'tags' => [
                'Laravel',
                'MySQL',
                'Tailwind CSS',
                'Docker',
                'SEO local',
                'RO / EN',
                'Administrare flotă',
            ],
        ],

        'access-bars-beatris' => [
            'slug' => 'access-bars-beatris',
            'name' => 'Access Bars Beatris',
            'category' => 'Site personal de prezentare',
            'headline' => 'Un site calm și clar pentru prezentarea sesiunilor și programare.',
            'short_description' => 'O pagină de prezentare pentru Beatris Lupuleț, practician Access Bars în Brașov, construită pentru explicații clare, încredere și contact rapid.',
            'description' => 'Proiectul avea nevoie de o identitate vizuală diferită de SiteGo și de o structură simplă, care să explice ce este serviciul, cum se desfășoară o sesiune, cine este practicianul și cum se face programarea.',
            'image' => '/images/portfolio/access-bars-portfolio.webp',
            'image_alt' => 'Pagina principală a site-ului Beatris Lupuleț pentru sesiuni Access Bars în Brașov',
            'url' => 'https://access-bars.pages.dev/',
            'status' => 'Site live',
            'year' => '2026',
            'accent' => '#4b2f68',
            'accent_soft' => '#eee9fa',

            'features' => [
                'Identitate vizuală personală, calmă și distinctă',
                'Prezentarea clară a serviciului și a modului de desfășurare',
                'Secțiune despre practician și informații de programare',
                'Prețuri și pachete prezentate transparent',
                'Programare directă prin WhatsApp',
                'Meta date SEO și publicare pe Cloudflare Pages',
            ],

            'result' => 'O prezență online personală, coerentă și ușor de parcurs, care răspunde întrebărilor principale înainte ca vizitatorul să ceară o programare.',

            'implementation' => 'Site static rapid, construit cu HTML, CSS și JavaScript, optimizat pentru mobil și publicat prin Cloudflare Pages.',

            'tags' => [
                'HTML',
                'CSS',
                'JavaScript',
                'Cloudflare Pages',
                'SEO',
                'WhatsApp',
                'Responsive',
            ],
        ],
    ],
];
