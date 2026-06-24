<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\LeadNoteController;
use Illuminate\Support\Facades\Route;

$sitegoSeoPages = [
    'creare-site-de-prezentare-brasov' => [
        'title' => 'Creare site de prezentare Brașov',
        'description' => 'SiteGo creează site-uri de prezentare pentru afaceri locale din Brașov, cu structură clară, design modern și formular de contact.',
        'eyebrow' => 'Web design local în Brașov',
        'h1' => 'Creare site de prezentare în Brașov pentru afaceri locale',
        'intro' => 'Un site de prezentare bun explică rapid cine ești, ce servicii oferi și cum te poate contacta clientul. SiteGo te ajută să ai o prezență online clară, modernă și ușor de folosit.',
        'service_type' => 'Creare site de prezentare',
        'includes' => ['Structură clară pentru servicii', 'Design modern și responsive', 'Formular de contact', 'Buton WhatsApp', 'SEO de bază', 'Configurare Analytics și Search Console'],
        'for_who' => 'Este potrivit pentru saloane, cabinete, freelanceri, firme de servicii, restaurante, fotografi și afaceri locale care vor să fie găsite mai ușor online.',
        'process' => 'Începem cu structura și mesajul principal, alegem secțiunile potrivite, construim pagina, testăm varianta de mobil și publicăm site-ul.',
        'benefits' => [
            ['title' => 'Claritate', 'text' => 'Clientul înțelege rapid ce oferi și de ce să te contacteze.'],
            ['title' => 'Încredere', 'text' => 'Un site modern transmite profesionalism și reduce dependența de social media.'],
            ['title' => 'Contact rapid', 'text' => 'Butonul de WhatsApp și formularul scurtează drumul dintre vizitator și cerere.'],
        ],
    ],
    'web-design-brasov' => [
        'title' => 'Web design Brașov',
        'description' => 'Servicii de web design în Brașov pentru afaceri locale care vor un site modern, clar și adaptat pentru mobil.',
        'eyebrow' => 'Web design Brașov',
        'h1' => 'Web design în Brașov pentru site-uri moderne și clare',
        'intro' => 'Designul unui site nu înseamnă doar culori frumoase. Înseamnă structură, încredere, butoane clare și o experiență bună pe telefon.',
        'service_type' => 'Web design',
        'includes' => ['Design adaptat brandului', 'Secțiuni pentru servicii', 'CTA vizibile', 'Optimizare pentru mobil', 'Pagină de contact', 'Integrare cu Google Business'],
        'for_who' => 'Pentru afaceri din Brașov care au deja un site vechi sau pornesc de la zero și vor o imagine mai profesionistă online.',
        'process' => 'Stabilim obiectivul site-ului, refacem structura, pregătim textele esențiale și construim un design aerisit, ușor de parcurs.',
        'benefits' => [
            ['title' => 'Mai multă încredere', 'text' => 'Un design curat face afacerea să pară mai serioasă.'],
            ['title' => 'Mai ușor de citit', 'text' => 'Textele și serviciile sunt organizate pentru vizitatori reali.'],
            ['title' => 'Mai bun pe mobil', 'text' => 'Majoritatea clienților intră de pe telefon, deci pagina trebuie să se miște natural.'],
        ],
    ],
    'realizare-website-brasov' => [
        'title' => 'Realizare website Brașov',
        'description' => 'Realizare website pentru afaceri din Brașov: site de prezentare, landing page, configurare contact, SEO de bază și Analytics.',
        'eyebrow' => 'Realizare website',
        'h1' => 'Realizare website în Brașov, de la idee la publicare',
        'intro' => 'SiteGo te ajută să transformi informațiile despre afacerea ta într-un website simplu, clar și pregătit pentru promovare.',
        'service_type' => 'Realizare website',
        'includes' => ['Structură pagini', 'Texte de bază', 'Design responsive', 'Formular lead', 'Configurări Google', 'Publicare pe domeniu'],
        'for_who' => 'Pentru antreprenori care nu vor să piardă timp cu partea tehnică și vor o variantă clară, completă și ușor de administrat.',
        'process' => 'Alegem modelul potrivit, stabilim secțiunile, pregătim conținutul, construim website-ul și îl testăm înainte de publicare.',
        'benefits' => [
            ['title' => 'Proces simplu', 'text' => 'Nu trebuie să știi partea tehnică. Primești pașii clari.'],
            ['title' => 'Imagine coerentă', 'text' => 'Site-ul este construit în jurul serviciilor și obiectivului tău.'],
            ['title' => 'Pregătit pentru promovare', 'text' => 'Poți folosi site-ul în Google Business, social media și campanii.'],
        ],
    ],
    'landing-page-afaceri' => [
        'title' => 'Landing page pentru afaceri',
        'description' => 'Landing page pentru promovarea unui serviciu, produs sau campanii locale. Pagină clară, cu CTA și formular de contact.',
        'eyebrow' => 'Landing page',
        'h1' => 'Landing page pentru afaceri care vor cereri mai clare',
        'intro' => 'O pagină de tip landing page se concentrează pe un singur obiectiv: să explice oferta și să transforme vizitatorul în lead.',
        'service_type' => 'Landing page',
        'includes' => ['Hero cu ofertă clară', 'Beneficii', 'Secțiune servicii', 'Întrebări frecvente', 'Formular contact', 'CTA repetat'],
        'for_who' => 'Potrivit pentru campanii, lansări, servicii sezoniere, promoții sau afaceri care vor să trimită trafic din TikTok, Facebook sau Google.',
        'process' => 'Construim pagina în jurul unei oferte clare, cu secțiuni scurte, beneficii vizibile și butoane de contact așezate strategic.',
        'benefits' => [
            ['title' => 'Focus pe conversie', 'text' => 'Pagina are un singur scop și nu risipește atenția vizitatorului.'],
            ['title' => 'Ideal pentru reclame', 'text' => 'Poți trimite trafic din TikTok, Facebook, Instagram sau Google.'],
            ['title' => 'Rapid de lansat', 'text' => 'Se poate construi mai repede decât un website complet.'],
        ],
    ],
    'site-salon-beauty' => [
        'title' => 'Site pentru salon beauty',
        'description' => 'Site de prezentare pentru salon beauty, coafor, makeup artist, stilist sau servicii de înfrumusețare.',
        'eyebrow' => 'Site pentru beauty',
        'h1' => 'Site pentru salon beauty, coafor sau servicii de înfrumusețare',
        'intro' => 'Un salon are nevoie de poze bune, servicii clare, prețuri orientative și un mod rapid prin care clientele pot cere programare.',
        'service_type' => 'Site pentru salon beauty',
        'includes' => ['Servicii beauty', 'Galerie foto', 'Buton programare', 'WhatsApp', 'Recenzii', 'Hartă și program'],
        'for_who' => 'Pentru saloane, coafeze, makeup artiști, stiliste, cosmeticiene, nail artists și afaceri din zona de beauty.',
        'process' => 'Punem accent pe imagine, servicii, programări și încredere. Pagina trebuie să arate bine pe telefon și să ducă rapid spre contact.',
        'benefits' => [
            ['title' => 'Programări mai simple', 'text' => 'Clientele pot ajunge rapid la WhatsApp sau formular.'],
            ['title' => 'Servicii clare', 'text' => 'Fiecare serviciu este prezentat pe scurt, fără aglomerație.'],
            ['title' => 'Imagine premium', 'text' => 'Designul ajută salonul să pară îngrijit și profesionist.'],
        ],
    ],
    'cat-costa-un-site-de-prezentare-2026' => [
        'title' => 'Cât costă un site de prezentare în 2026',
        'description' => 'Explicație clară despre cât poate costa un site de prezentare în 2026 și ce influențează prețul.',
        'eyebrow' => 'Ghid de preț',
        'h1' => 'Cât costă un site de prezentare în 2026?',
        'intro' => 'Prețul unui site depinde de numărul de pagini, nivelul de personalizare, texte, poze, formulare, SEO și configurările tehnice necesare.',
        'service_type' => 'Consultanță website',
        'includes' => ['Estimare preț', 'Explicații clare', 'Ce include un site', 'Ce costă extra', 'Recomandări pentru început', 'Link către configurator'],
        'for_who' => 'Pentru antreprenori care vor să înțeleagă realist ce buget trebuie să pregătească pentru un site de prezentare.',
        'process' => 'Cel mai simplu este să pornești cu un site clar, nu cu multe funcții inutile. Ulterior poți adăuga pagini, blog, portofoliu sau funcționalități suplimentare.',
        'benefits' => [
            ['title' => 'Buget mai clar', 'text' => 'Înțelegi ce influențează costul înainte să ceri ofertă.'],
            ['title' => 'Fără funcții inutile', 'text' => 'Poți începe cu exact ce ai nevoie acum.'],
            ['title' => 'Configurator util', 'text' => 'Poți estima mai ușor varianta potrivită pentru afacerea ta.'],
        ],
    ],
];

foreach ($sitegoSeoPages as $slug => $page) {
    Route::get('/' . $slug, function () use ($page, $slug) {
        return view('pages.seo-landing', [
            'page' => $page,
            'slug' => $slug,
        ]);
    })->name('seo.' . str_replace('-', '_', $slug));
}

Route::get('/language/{locale}', function (string $locale) {
    if (! in_array($locale, ['ro', 'en'], true)) {
        abort(404);
    }

    session(['locale' => $locale]);

    return back();
})->name('language.switch');

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/modele-site', function () {
    return view('welcome');
})->name('templates.index');

Route::get('/configurator', function () {
    return view('welcome');
})->name('configurator');

Route::get('/contact', function () {
    return view('welcome');
})->name('contact');

Route::get('/templates/{slug}', function () {
    return view('welcome');
})->name('templates.show');

Route::get('/cum-lucram', function () {
    return view('pages.work-process');
})->name('work-process');

Route::get('/realizare-site-uri', function () {
    return view('pages.realizare-site-uri');
})->name('seo.websites');

Route::get('/preturi', function () {
    return view('pages.pricing');
})->name('pricing');

Route::get('/intrebari-frecvente', function () {
    return view('pages.faq');
})->name('faq');

Route::get('/site-facut-pentru-tine', function () {
    return view('pages.done-for-you');
})->name('done-for-you');

Route::redirect('/realizare-site-brasov', '/realizare-site-uri', 301);

/*
|--------------------------------------------------------------------------
| Temporar ascuns - partea pentru developeri
|--------------------------------------------------------------------------
*/
Route::redirect('/pentru-developeri', '/', 302)->name('developers');

foreach (config('seo_pages', []) as $slug => $page) {
    Route::get('/' . $slug, function () use ($page, $slug) {
        return view('pages.seo.show', [
            'page' => $page,
            'slug' => $slug,
        ]);
    })->name('seo.' . $page['route_name']);
}

Route::get('/politica-confidentialitate', function () {
    return view('legal.privacy');
})->name('privacy');

Route::get('/termeni-conditii', function () {
    return view('legal.terms');
})->name('terms');

Route::get('/politica-cookies', function () {
    return view('legal.cookies');
})->name('cookies');

Route::get('/sitemap.xml', function () {
    $baseUrl = rtrim(config('app.url'), '/');

    $urls = [
        ['loc' => $baseUrl . '/', 'priority' => '1.0'],
        ['loc' => $baseUrl . '/modele-site', 'priority' => '0.9'],
        ['loc' => $baseUrl . '/configurator', 'priority' => '0.9'],
        ['loc' => $baseUrl . '/contact', 'priority' => '0.8'],
        ['loc' => $baseUrl . '/cum-lucram', 'priority' => '0.8'],
        ['loc' => $baseUrl . '/realizare-site-uri', 'priority' => '0.9'],
        ['loc' => $baseUrl . '/preturi', 'priority' => '0.8'],
        ['loc' => $baseUrl . '/intrebari-frecvente', 'priority' => '0.7'],
        ['loc' => $baseUrl . '/site-facut-pentru-tine', 'priority' => '0.8'],

        ['loc' => $baseUrl . '/templates/business-essence', 'priority' => '0.8'],
        ['loc' => $baseUrl . '/templates/premium-studio', 'priority' => '0.8'],
        ['loc' => $baseUrl . '/templates/launch-page', 'priority' => '0.7'],
        ['loc' => $baseUrl . '/templates/conversion-flow', 'priority' => '0.8'],
        ['loc' => $baseUrl . '/templates/rental-flow', 'priority' => '0.8'],
        ['loc' => $baseUrl . '/templates/tourism-stay', 'priority' => '0.8'],
        ['loc' => $baseUrl . '/templates/simple-shop', 'priority' => '0.8'],
        ['loc' => $baseUrl . '/templates/premium-store', 'priority' => '0.7'],
        ['loc' => $baseUrl . '/templates/client-portal', 'priority' => '0.7'],

        ['loc' => $baseUrl . '/politica-confidentialitate', 'priority' => '0.3'],
        ['loc' => $baseUrl . '/termeni-conditii', 'priority' => '0.3'],
        ['loc' => $baseUrl . '/politica-cookies', 'priority' => '0.3'],
    ];

    foreach (config('seo_pages', []) as $slug => $page) {
        $urls[] = [
            'loc' => $baseUrl . '/' . $slug,
            'priority' => '0.8',
        ];
    }

    return response()
        ->view('sitemap', compact('urls'))
        ->header('Content-Type', 'application/xml');
})->name('sitemap');

Route::get('/robots.txt', function () {
    $sitemap = rtrim(config('app.url'), '/') . '/sitemap.xml';

    $lines = [
        'User-agent: *',
        'Allow: /',
        'Disallow: /admin',
        'Disallow: /admin/',
        '',
        'Sitemap: ' . $sitemap,
        '',
    ];

    return response(implode("\n", $lines))->header('Content-Type', 'text/plain');
})->name('robots');

Route::post('/leads', [LeadController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('leads.store');

Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');

Route::post('/admin/login', [AdminAuthController::class, 'login'])
    ->middleware('throttle:5,1')
    ->name('admin.login.store');

Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

Route::middleware('admin.auth')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', AdminDashboardController::class)->name('dashboard');

        Route::get('/leads', [LeadController::class, 'index'])->name('leads.index');
        Route::get('/leads/export', [LeadController::class, 'export'])->name('leads.export');

        Route::get('/leads/{lead}', [LeadController::class, 'show'])->name('leads.show');
        Route::get('/leads/{lead}/offer', [LeadController::class, 'offer'])->name('leads.offer');
        Route::get('/leads/{lead}/edit', [LeadController::class, 'edit'])->name('leads.edit');

        Route::put('/leads/{lead}', [LeadController::class, 'update'])->name('leads.update');

        Route::patch('/leads/{lead}/status', [LeadController::class, 'updateStatus'])->name('leads.update-status');
        Route::patch('/leads/{lead}/follow-up', [LeadController::class, 'updateFollowUp'])->name('leads.update-follow-up');

        Route::post('/leads/{lead}/notes', [LeadNoteController::class, 'store'])->name('leads.notes.store');

        Route::delete('/leads/{lead}', [LeadController::class, 'destroy'])->name('leads.destroy');
    });
