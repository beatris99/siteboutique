<!DOCTYPE html>
@php
    $locale = app()->getLocale() === 'en' ? 'en' : 'ro';

    $landingContent = trans('home.landing');
    unset($landingContent['popup'], $landingContent['newsletter']);

    $portfolioContent = trans('portfolio');
    $homeMeta = trans('home.meta');

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
            'title' => data_get(
                $homeMeta,
                'home_title',
                $locale === 'en'
                    ? 'Website development for businesses | SiteGo'
                    : 'Creare site web și dezvoltare pentru afaceri | SiteGo'
            ),
            'description' => data_get(
                $homeMeta,
                'home_description',
                $locale === 'en'
                    ? 'SiteGo builds presentation websites, online stores, booking systems and custom web solutions for businesses in Romania and remote international collaborations.'
                    : 'SiteGo construiește site-uri de prezentare, magazine online, sisteme de rezervări și soluții web personalizate pentru afaceri din România și colaborări online internaționale.'
            ),
        ],
        'contact' => [
            'title' => $locale === 'en'
                ? 'Contact SiteGo - Tell us about your web project'
                : 'Contact SiteGo - Spune-ne despre proiectul tău web',
            'description' => $locale === 'en'
                ? 'Send SiteGo a short brief for a website, shop, booking flow, landing page or custom web application.'
                : 'Trimite o cerere către SiteGo pentru un site, magazin online, sistem de rezervări, landing page sau aplicație web personalizată.',
        ],
        'cerere-trimisa' => [
            'title' => $locale === 'en'
                ? 'Request sent | SiteGo'
                : 'Cerere trimisă | SiteGo',
            'description' => $locale === 'en'
                ? 'Your request has been received by SiteGo.'
                : 'Cererea ta a fost primită de SiteGo.',
        ],
        'modele-site' => [
            'title' => $locale === 'en'
                ? 'Website models and interactive demos | SiteGo'
                : 'Modele de site și demo-uri interactive | SiteGo',
            'description' => $locale === 'en'
                ? 'Explore website models for services, bookings, shops and custom digital products.'
                : 'Vezi modele de site pentru servicii, rezervări, magazine și soluții digitale personalizate.',
        ],
        'configurator' => [
            'title' => $locale === 'en'
                ? 'Website configurator - Choose the features you need | SiteGo'
                : 'Configurator site - Alege funcționalitățile de care ai nevoie | SiteGo',
            'description' => $locale === 'en'
                ? 'Choose the website type and features you need and send SiteGo a clear project request.'
                : 'Alege tipul de site și funcționalitățile de care ai nevoie și trimite către SiteGo o cerere clară de proiect.',
        ],
        'portofoliu' => [
            'title' => data_get($portfolioContent, 'meta.index.title', 'Portofoliu SiteGo - proiecte web live'),
            'description' => data_get($portfolioContent, 'meta.index.description', 'Vezi proiectele web realizate și publicate de SiteGo.'),
        ],
        'portofoliu/rentride' => [
            'title' => data_get($portfolioContent, 'meta.rentride.title', 'RentRide în portofoliul SiteGo'),
            'description' => data_get($portfolioContent, 'meta.rentride.description', 'Descoperă proiectul RentRide, platformă pentru închirieri.'),
        ],
        'portofoliu/access-bars-beatris' => [
            'title' => data_get($portfolioContent, 'meta.access-bars-beatris.title', 'Access Happiness în portofoliul SiteGo'),
            'description' => data_get($portfolioContent, 'meta.access-bars-beatris.description', 'Descoperă site-ul Access Happiness realizat de SiteGo.'),
        ],
        'portofoliu/happiness-atelier' => [
            'title' => data_get($portfolioContent, 'meta.happiness-atelier.title', 'Happiness Atelier în portofoliul SiteGo'),
            'description' => data_get($portfolioContent, 'meta.happiness-atelier.description', 'Descoperă platforma Happiness Atelier pentru catalog și rezervări de rochii.'),
        ],
    ];

    if (str_starts_with($currentPath, 'templates/')) {
        $pageMeta = [
            'title' => $locale === 'en'
                ? 'Interactive website demo | SiteGo'
                : 'Demo site interactiv | SiteGo',
            'description' => $locale === 'en'
                ? 'Explore a configurable website demo and see how the structure can be adapted to your business.'
                : 'Vezi un demo de site configurabil și cum poate fi adaptată structura pentru afacerea ta.',
        ];
    } else {
        $pageMeta = $metaByPath[$currentPath] ?? $metaByPath[''];
    }

    $ogImagePath = '/images/og-cover.jpg';
    $ogImageAlt = 'SiteGo - creare site web și dezvoltare web pentru afaceri';
    $ogImageType = 'image/jpeg';

    $portfolioStructuredData = null;
    $portfolioProjectsBySlug = is_array($portfolioContent)
        ? ($portfolioContent['projects'] ?? [])
        : [];
    $portfolioProjects = array_values($portfolioProjectsBySlug);

    $makePortfolioCreativeWork = static function (array $project) use ($appUrl): array {
        $creativeWork = [
            '@type' => 'CreativeWork',
            'name' => $project['name'] ?? '',
            'headline' => $project['headline'] ?? '',
            'description' => $project['short_description'] ?? '',
            'url' => $appUrl . '/portofoliu/' . ($project['slug'] ?? ''),
            'creator' => [
                '@type' => 'Organization',
                '@id' => $appUrl . '/#organization',
                'name' => 'SiteGo',
                'url' => $appUrl . '/',
            ],
        ];

        if (!empty($project['image'])) {
            $creativeWork['image'] = $appUrl . $project['image'];
        }

        if (!empty($project['url'])) {
            $creativeWork['sameAs'] = $project['url'];
        }

        if (!empty($project['year'])) {
            $creativeWork['dateCreated'] = (string) $project['year'];
        }

        return $creativeWork;
    };

    if ($currentPath === 'portofoliu') {
        $portfolioStructuredData = [
            '@context' => 'https://schema.org',
            '@type' => 'CollectionPage',
            'name' => data_get($portfolioContent, 'meta.index.title'),
            'description' => data_get($portfolioContent, 'meta.index.description'),
            'url' => $currentUrl,
            'hasPart' => array_map($makePortfolioCreativeWork, $portfolioProjects),
        ];
    }

    if (str_starts_with($currentPath, 'portofoliu/')) {
        $portfolioSlug = str_replace('portofoliu/', '', $currentPath);
        $portfolioProject = $portfolioProjectsBySlug[$portfolioSlug] ?? null;

        if (is_array($portfolioProject)) {
            if (!empty($portfolioProject['image'])) {
                $ogImagePath = $portfolioProject['image'];
                $ogImageAlt = $portfolioProject['image_alt'] ?? $portfolioProject['name'] ?? $ogImageAlt;

                if (str_ends_with(strtolower($ogImagePath), '.webp')) {
                    $ogImageType = 'image/webp';
                } elseif (str_ends_with(strtolower($ogImagePath), '.png')) {
                    $ogImageType = 'image/png';
                }
            }

            $portfolioStructuredData = [
                '@context' => 'https://schema.org',
                ...$makePortfolioCreativeWork($portfolioProject),
                'url' => $currentUrl,
                'mainEntityOfPage' => $currentUrl,
            ];
        }
    }

    $robotsMeta = $currentPath === 'cerere-trimisa'
        ? 'noindex, follow'
        : 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1';

    $ogImage = $appUrl . $ogImagePath;
    $ogLocale = $locale === 'ro' ? 'ro_RO' : 'en_US';
    $contact = config('sitego.contact');
@endphp
<html lang="{{ $locale }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pageMeta['title'] }}</title>
    <meta name="description" content="{{ $pageMeta['description'] }}">
    <meta name="robots" content="{{ $robotsMeta }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="canonical" href="{{ $currentUrl }}">
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/sitego-icon.svg') }}?v=1">
    <link rel="shortcut icon" href="{{ asset('images/sitego-icon.svg') }}?v=1">

    <meta property="og:title" content="{{ $pageMeta['title'] }}">
    <meta property="og:description" content="{{ $pageMeta['description'] }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ $currentUrl }}">
    <meta property="og:image" content="{{ $ogImage }}">
    <meta property="og:image:secure_url" content="{{ $ogImage }}">
    <meta property="og:image:type" content="{{ $ogImageType }}">
    <meta property="og:image:alt" content="{{ $ogImageAlt }}">
    <meta property="og:site_name" content="SiteGo">
    <meta property="og:locale" content="{{ $ogLocale }}">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $pageMeta['title'] }}">
    <meta name="twitter:description" content="{{ $pageMeta['description'] }}">
    <meta name="twitter:image" content="{{ $ogImage }}">

    <meta name="theme-color" content="#f7f4ef">
    <meta name="google-site-verification" content="8Wp3PXaLXhT25xkld277MiKuu-PrIKrYvT6HKMXNeD4">

    <link rel="preload" href="{{ asset('fonts/instrument-sans-latin-wght-normal.woff2') }}" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="{{ asset('fonts/source-serif-4-latin-wght-normal.woff2') }}" as="font" type="font/woff2" crossorigin>
    @if($locale === 'ro')
        <link rel="preload" href="{{ asset('fonts/instrument-sans-latin-ext-wght-normal.woff2') }}" as="font" type="font/woff2" crossorigin>
        <link rel="preload" href="{{ asset('fonts/source-serif-4-latin-ext-wght-normal.woff2') }}" as="font" type="font/woff2" crossorigin>
    @endif

    @vite([
        'resources/css/app.css',
        'resources/js/app.js',
    ])

    <script type="application/ld+json">
        {!! json_encode(
            [
                '@context' => 'https://schema.org',
                '@graph' => [
                    [
                        '@type' => 'Organization',
                        '@id' => $appUrl . '/#organization',
                        'name' => 'SiteGo',
                        'alternateName' => 'Site Go',
                        'url' => $appUrl . '/',
                        'logo' => [
                            '@type' => 'ImageObject',
                            'url' => $appUrl . '/images/sitego-icon.svg',
                        ],
                        'image' => $appUrl . '/images/og-cover.jpg',
                        'email' => $contact['email'] ?? 'sitegobv@gmail.com',
                        'telephone' => $contact['phone'] ?? '+40747084861',
                        'areaServed' => [
                            [
                                '@type' => 'Country',
                                'name' => 'Romania',
                            ],
                            [
                                '@type' => 'Place',
                                'name' => 'Remote / international online collaboration',
                            ],
                        ],
                        'knowsAbout' => [
                            'Website development',
                            'Web design',
                            'Laravel',
                            'Vue.js',
                            'Online stores',
                            'Booking systems',
                            'Custom web applications',
                        ],
                        'contactPoint' => [
                            '@type' => 'ContactPoint',
                            'contactType' => 'sales',
                            'telephone' => $contact['phone'] ?? '+40747084861',
                            'email' => $contact['email'] ?? 'sitegobv@gmail.com',
                            'availableLanguage' => ['Romanian', 'English'],
                            'areaServed' => ['RO', 'EU'],
                        ],
                        'sameAs' => [
                            'https://www.facebook.com/share/1BQ9mzPgqy/',
                        ],
                    ],
                    [
                        '@type' => 'WebSite',
                        '@id' => $appUrl . '/#website',
                        'url' => $appUrl . '/',
                        'name' => 'SiteGo',
                        'publisher' => [
                            '@id' => $appUrl . '/#organization',
                        ],
                        'inLanguage' => ['ro-RO', 'en'],
                    ],
                ],
            ],
            JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES
        ) !!}
    </script>

    @if ($portfolioStructuredData)
        <script type="application/ld+json">
            {!! json_encode(
                $portfolioStructuredData,
                JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES
            ) !!}
        </script>
    @endif
</head>
<body>
    <script id="sitego-app-data" type="application/json">@json($sitegoAppData)</script>
    <div id="app"></div>
    @include('partials.cookie-consent')
</body>
</html>
