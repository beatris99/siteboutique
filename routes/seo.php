<?php

use Illuminate\Support\Facades\Route;

$sitegoSeoPages = config('sitego-seo', []);

foreach ($sitegoSeoPages as $slug => $page) {
    Route::view('/' . $slug, 'pages.seo-landing', [
        'page' => $page,
        'slug' => $slug,
    ])->name('seo.' . str_replace('-', '_', $slug));
}

Route::get('/sitemap.xml', function () use ($sitegoSeoPages) {
    $baseUrl = rtrim(config('app.url'), '/');

    $urls = [
        ['loc' => $baseUrl . '/', 'priority' => '1.0'],
        ['loc' => $baseUrl . '/modele-site', 'priority' => '0.9'],
        ['loc' => $baseUrl . '/configurator', 'priority' => '0.9'],
        ['loc' => $baseUrl . '/portofoliu', 'priority' => '0.9'],
        ['loc' => $baseUrl . '/portofoliu/rentride', 'priority' => '0.8'],
        ['loc' => $baseUrl . '/portofoliu/access-bars-beatris', 'priority' => '0.8'],
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

    foreach (array_keys($sitegoSeoPages) as $slug) {
        $urls[] = [
            'loc' => $baseUrl . '/' . $slug,
            'priority' => '0.85',
        ];
    }

    $urls = collect($urls)
        ->unique('loc')
        ->values()
        ->all();

    return response()
        ->view('sitemap', compact('urls'))
        ->header('Content-Type', 'application/xml');
})->name('sitemap');

Route::get('/robots.txt', function () {
    $sitemap = rtrim(config('app.url'), '/') . '/sitemap.xml';

    $content = implode("\n", [
        'User-agent: *',
        'Allow: /',
        'Disallow: /admin',
        'Disallow: /admin/',
        '',
        'Sitemap: ' . $sitemap,
        '',
    ]);

    return response($content)
        ->header('Content-Type', 'text/plain');
})->name('robots');
