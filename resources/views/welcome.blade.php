<!DOCTYPE html>
@php
    $locale = app()->getLocale() === 'en' ? 'en' : 'ro';

    $landingContent = trans('home.landing');
    $newsletterContent = trans('newsletter.frontend');
    $portfolioContent = trans('portfolio');

    $landingContent['popup'] = $newsletterContent['popup'] ?? [];
    $landingContent['newsletter'] = $newsletterContent['contact_card'] ?? [];

    $sitegoAppData = [
        'locale' => $locale,

        'content' => [
            'brand' => trans('brand'),
            'header' => trans('header'),
            'navigation' => trans('navigation'),
            'portfolio' => $portfolioContent,
            'footer' => trans('footer'),
            'contact' => trans('contact'),
            'common' => trans('home.common'),
            'landing' => $landingContent,
            'templateGallery' => trans('home.template_gallery'),
            'packagesSection' => trans('home.packages_section'),
            'configurator' => trans('home.configurator'),
            'priceSummary' => trans('home.price_summary'),
            'whatYouGet' => trans('home.what_you_get'),
            'whyWorkWithMe' => trans('home.why_work_with_me'),
            'floatingDock' => trans('home.floating_dock'),
        ],

        'builder' => trans('site_builder'),

        'config' => [
            'contact' => config('sitego.contact'),
        ],
    ];

    $appUrl = rtrim(config('app.url'), '/');
    $currentPath = trim(request()->path(), '/');
    $currentUrl = url()->current();

    $metaByPath = [
        '' => [
            'title' => 'SiteGo - Web design Brașov și site-uri pentru afaceri locale',
            'description' => 'SiteGo construiește site-uri de prezentare, landing page-uri, magazine simple și soluții digitale pentru afaceri locale din Brașov și România.',
        ],

        'contact' => [
            'title' => 'Contact SiteGo - Cere ofertă pentru site-ul tău',
            'description' => 'Trimite o cerere către SiteGo și discutăm despre site-ul, landing page-ul, magazinul sau soluția digitală de care ai nevoie.',
        ],

        'modele-site' => [
            'title' => 'Modele de site - Alege structura potrivită pentru afacerea ta',
            'description' => 'Vezi modele de site pentru prezentare, rezervări, vânzare, magazin online sau platformă custom și alege direcția potrivită.',
        ],

        'configurator' => [
            'title' => 'Configurator site - Alege funcționalitățile pentru website-ul tău',
            'description' => 'Configurează site-ul dorit: alegi pachetul, funcționalitățile și primești o estimare orientativă pentru proiect.',
        ],

        'portofoliu' => [
            'title' => data_get(
                $portfolioContent,
                'meta.index.title',
                'Portofoliu SiteGo - proiecte web live'
            ),

            'description' => data_get(
                $portfolioContent,
                'meta.index.description',
                'Vezi proiectele web realizate și publicate de SiteGo.'
            ),
        ],

        'portofoliu/rentride' => [
            'title' => data_get(
                $portfolioContent,
                'meta.rentride.title',
                'RentRide în portofoliul SiteGo'
            ),

            'description' => data_get(
                $portfolioContent,
                'meta.rentride.description',
                'Descoperă proiectul RentRide, platformă pentru închirieri în Brașov.'
            ),
        ],

        'portofoliu/access-bars-beatris' => [
            'title' => data_get(
                $portfolioContent,
                'meta.access-bars-beatris.title',
                'Access Bars Beatris în portofoliul SiteGo'
            ),

            'description' => data_get(
                $portfolioContent,
                'meta.access-bars-beatris.description',
                'Descoperă site-ul de prezentare realizat pentru Beatris Lupuleț.'
            ),
        ],
    ];

    if (str_starts_with($currentPath, 'templates/')) {
        $pageMeta = [
            'title' => 'Demo site și template configurabil - SiteGo',
            'description' => 'Vezi un model de site configurabil și alege pachetul potrivit pentru afacerea ta.',
        ];
    } else {
        $pageMeta = $metaByPath[$currentPath] ?? $metaByPath[''];
    }

    /*
    |--------------------------------------------------------------------------
    | Imagine Open Graph
    |--------------------------------------------------------------------------
    */

    $ogImagePath = '/images/og-cover.jpg';
    $ogImageAlt = 'SiteGo - site-uri construite pentru afaceri reale';
    $ogImageType = 'image/jpeg';

    /*
    |--------------------------------------------------------------------------
    | Date structurate pentru portofoliu
    |--------------------------------------------------------------------------
    */

    $portfolioStructuredData = null;

    $portfolioProjectsBySlug = is_array($portfolioContent)
        ? ($portfolioContent['projects'] ?? [])
        : [];

    $portfolioProjects = array_values(
        $portfolioProjectsBySlug
    );

    if ($currentPath === 'portofoliu') {
        $portfolioStructuredData = [
            '@context' => 'https://schema.org',
            '@type' => 'CollectionPage',

            'name' => data_get(
                $portfolioContent,
                'meta.index.title'
            ),

            'description' => data_get(
                $portfolioContent,
                'meta.index.description'
            ),

            'url' => $currentUrl,

            'hasPart' => array_map(
                static function (
                    array $project
                ) use (
                    $appUrl
                ): array {
                    return [
                        '@type' => 'CreativeWork',

                        'name' => $project['name'],

                        'headline' => $project['headline'],

                        'description' => $project[
                            'short_description'
                        ],

                        'url' => $appUrl
                            . '/portofoliu/'
                            . $project['slug'],

                        'image' => $appUrl
                            . $project['image'],

                        'sameAs' => $project['url'],

                        'creator' => [
                            '@type' => 'Organization',
                            'name' => 'SiteGo',
                            'url' => $appUrl,
                        ],
                    ];
                },

                $portfolioProjects
            ),
        ];
    }

    if (
        str_starts_with(
            $currentPath,
            'portofoliu/'
        )
    ) {
        $portfolioSlug = str_replace(
            'portofoliu/',
            '',
            $currentPath
        );

        $portfolioProject = $portfolioProjectsBySlug[
            $portfolioSlug
        ] ?? null;

        if (is_array($portfolioProject)) {
            $ogImagePath = $portfolioProject['image'];
            $ogImageAlt = $portfolioProject['image_alt'];

            if (
                str_ends_with(
                    strtolower($ogImagePath),
                    '.webp'
                )
            ) {
                $ogImageType = 'image/webp';
            }

            $portfolioStructuredData = [
                '@context' => 'https://schema.org',
                '@type' => 'CreativeWork',

                'name' => $portfolioProject['name'],

                'headline' => $portfolioProject[
                    'headline'
                ],

                'description' => $portfolioProject[
                    'short_description'
                ],

                'url' => $currentUrl,

                'mainEntityOfPage' => $currentUrl,

                'image' => $appUrl
                    . $portfolioProject['image'],

                'sameAs' => $portfolioProject['url'],

                'dateCreated' => $portfolioProject['year'],

                'creator' => [
                    '@type' => 'Organization',
                    'name' => 'SiteGo',
                    'url' => $appUrl,
                ],
            ];
        }
    }

    $ogImage = $appUrl . $ogImagePath;

    $ogLocale = $locale === 'ro'
        ? 'ro_RO'
        : 'en_US';
@endphp

<html lang="{{ $locale }}">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>{{ $pageMeta['title'] }}</title>

    <meta
        name="description"
        content="{{ $pageMeta['description'] }}"
    >

    <meta
        name="robots"
        content="index, follow"
    >

    <meta
        name="csrf-token"
        content="{{ csrf_token() }}"
    >

    <meta
        property="og:title"
        content="{{ $pageMeta['title'] }}"
    >

    <meta
        property="og:description"
        content="{{ $pageMeta['description'] }}"
    >

    <meta
        property="og:type"
        content="website"
    >

    <meta
        property="og:url"
        content="{{ $currentUrl }}"
    >

    <meta
        property="og:image"
        content="{{ $ogImage }}"
    >

    <meta
        property="og:image:secure_url"
        content="{{ $ogImage }}"
    >

    <meta
        property="og:image:type"
        content="{{ $ogImageType }}"
    >

    <meta
        property="og:image:alt"
        content="{{ $ogImageAlt }}"
    >

    <meta
        property="og:site_name"
        content="SiteGo"
    >

    <meta
        property="og:locale"
        content="{{ $ogLocale }}"
    >

    <meta
        name="twitter:card"
        content="summary_large_image"
    >

    <meta
        name="twitter:title"
        content="{{ $pageMeta['title'] }}"
    >

    <meta
        name="twitter:description"
        content="{{ $pageMeta['description'] }}"
    >

    <meta
        name="twitter:image"
        content="{{ $ogImage }}"
    >

    <link
        rel="canonical"
        href="{{ $currentUrl }}"
    >

    <link
        rel="icon"
        type="image/svg+xml"
        href="{{ asset('images/sitego-icon.svg') }}?v=1"
    >

    <link
        rel="shortcut icon"
        href="{{ asset('images/sitego-icon.svg') }}?v=1"
    >

    <meta
        name="theme-color"
        content="#f7f4ef"
    >

    <link
        rel="preconnect"
        href="https://fonts.bunny.net"
        crossorigin
    >

    <link
        href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700|source-serif-4:400,500,600,700"
        rel="stylesheet"
    >

    <meta
        name="google-site-verification"
        content="8Wp3PXaLXhT25xkld277MiKuu-PrIKrYvT6HKMXNeD4"
    >

    @vite([
        'resources/css/app.css',
        'resources/js/app.js',
    ])

    <script type="application/ld+json">
        {!! json_encode(
            [
                '@context' => 'https://schema.org',
                '@type' => 'ProfessionalService',
                'name' => 'SiteGo',
                'url' => $appUrl,
                'image' => $appUrl . '/images/og-cover.jpg',
                'email' => 'sitegobv@gmail.com',
                'telephone' => '+40747084861',
                'priceRange' => 'de la 2.500 lei',

                'areaServed' => [
                    '@type' => 'City',
                    'name' => 'Brașov',
                ],

                'address' => [
                    '@type' => 'PostalAddress',
                    'addressLocality' => 'Brașov',
                    'addressCountry' => 'RO',
                ],

                'sameAs' => [
                    'https://www.facebook.com/share/1BQ9mzPgqy/',
                ],
            ],

            JSON_UNESCAPED_UNICODE
            | JSON_UNESCAPED_SLASHES
        ) !!}
    </script>

    @if ($portfolioStructuredData)
        <script type="application/ld+json">
            {!! json_encode(
                $portfolioStructuredData,

                JSON_UNESCAPED_UNICODE
                | JSON_UNESCAPED_SLASHES
            ) !!}
        </script>
    @endif
</head>

<body>
    <script
        id="sitego-app-data"
        type="application/json"
    >@json($sitegoAppData)</script>

    <div id="app"></div>

    @include('partials.cookie-consent')
</body>
</html>