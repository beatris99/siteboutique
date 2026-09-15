<?php

use Illuminate\Support\Facades\Route;

$sitegoSeoPages = config('sitego-seo', []);

/*
|--------------------------------------------------------------------------
| Canonical SEO pages
|--------------------------------------------------------------------------
|
| Only distinct search intents receive their own indexable URL. Generic
| service pages target Romania / remote work. A single dedicated local page
| remains for Brașov because it already receives local-search impressions.
|
*/
foreach ($sitegoSeoPages as $slug => $page) {
    Route::view('/' . $slug, 'pages.seo-landing', [
        'page' => $page,
        'slug' => $slug,
    ])->name('seo.' . str_replace('-', '_', $slug));
}

/*
|--------------------------------------------------------------------------
| Legacy URL redirects
|--------------------------------------------------------------------------
|
| Keep old URLs alive as permanent redirects instead of allowing 404s or
| leaving near-duplicate pages in the index.
|
*/
$removedServicePages = [
    '/site-de-prezentare' => '/realizare-site-uri',
    '/magazin-online' => '/realizare-site-uri',
    '/site-cu-rezervari' => '/realizare-site-uri',
    '/dezvoltare-web-personalizata' => '/realizare-site-uri',
];

foreach ($removedServicePages as $from => $to) {
    Route::redirect($from, $to, 301);
}

$seoRedirects = [
    '/realizare-website-brasov' => '/web-design-brasov',
    '/realizare-site-brasov' => '/web-design-brasov',
    '/creare-site-brasov' => '/web-design-brasov',
    '/constructie-site-brasov' => '/web-design-brasov',
    '/firma-web-design-brasov' => '/web-design-brasov',
    '/agentie-web-design-brasov' => '/web-design-brasov',
    '/creare-site-de-prezentare-brasov' => '/realizare-site-uri',
    '/site-inchirieri-brasov' => '/realizare-site-uri',
    '/magazin-online-brasov' => '/realizare-site-uri',
    '/landing-page-afaceri' => '/landing-page',
    '/site-salon-beauty' => '/site-pentru-salon',
    '/cat-costa-un-site-de-prezentare-2026' => '/cat-costa-un-site-2026',
];

foreach ($seoRedirects as $from => $to) {
    Route::redirect($from, $to, 301);
}

/*
|--------------------------------------------------------------------------
| XML sitemap
|--------------------------------------------------------------------------
*/
Route::get('/sitemap.xml', function () use ($sitegoSeoPages) {
    $baseUrl = rtrim(config('app.url'), '/');

    $staticPaths = [
        '/',
        '/modele-site',
        '/configurator',
        '/portofoliu',
        '/portofoliu/rentride',
        '/portofoliu/access-bars-beatris',
        '/portofoliu/happiness-atelier',
        '/contact',
        '/cum-lucram',
        '/realizare-site-uri',
        '/preturi',
        '/intrebari-frecvente',
        '/site-facut-pentru-tine',
        '/templates/business-essence',
        '/templates/premium-studio',
        '/templates/launch-page',
        '/templates/conversion-flow',
        '/templates/rental-flow',
        '/templates/tourism-stay',
        '/templates/simple-shop',
        '/templates/premium-store',
        '/templates/client-portal',
        '/politica-confidentialitate',
        '/termeni-conditii',
        '/politica-cookies',
    ];

    $seoPaths = array_map(
        static fn (string $slug): string => '/' . $slug,
        array_keys($sitegoSeoPages)
    );

    $urls = collect(array_merge($staticPaths, $seoPaths))
        ->unique()
        ->map(static fn (string $path): array => [
            'loc' => $path === '/'
                ? $baseUrl . '/'
                : $baseUrl . $path,
        ])
        ->values()
        ->all();

    return response()
        ->view('sitemap', compact('urls'))
        ->header('Content-Type', 'application/xml; charset=UTF-8');
})->name('sitemap');

/*
|--------------------------------------------------------------------------
| robots.txt
|--------------------------------------------------------------------------
*/
Route::get('/robots.txt', function () {
    $sitemap = rtrim(config('app.url'), '/') . '/sitemap.xml';

    $content = implode("\n", [
        'User-agent: *',
        'Allow: /',
        'Disallow: /admin',
        'Disallow: /admin/',
        'Disallow: /language/',
        '',
        'Sitemap: ' . $sitemap,
        '',
    ]);

    return response($content)
        ->header('Content-Type', 'text/plain; charset=UTF-8');
})->name('robots');
