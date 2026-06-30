@extends('pages.layout')

@php
    $locale = app()->getLocale() === 'en' ? 'en' : 'ro';

    $seoEnglishPages = [
        'creare-site-de-prezentare-brasov' => [
            'title' => 'Presentation website creation in Brașov',
            'description' => 'SiteGo creates presentation websites for local businesses in Brașov, with clear structure, modern design and contact forms.',
            'eyebrow' => 'Local web design in Brașov',
            'h1' => 'Presentation website creation in Brașov for local businesses',
            'intro' => 'A good presentation website quickly explains who you are, what services you offer and how clients can contact you.',
            'service_type' => 'Presentation website creation',
            'includes' => ['Clear service structure', 'Modern responsive design', 'Contact form', 'WhatsApp button', 'Basic SEO', 'Analytics and Search Console setup'],
            'for_who' => 'Suitable for salons, clinics, freelancers, service businesses, restaurants, photographers and local businesses that want to be easier to find online.',
            'process' => 'We start with the structure and main message, choose the right sections, build the page, test the mobile version and publish the website.',
            'benefits' => [
                ['title' => 'Clarity', 'text' => 'The client quickly understands what you offer and why to contact you.'],
                ['title' => 'Trust', 'text' => 'A modern website communicates professionalism and reduces dependency on social media.'],
                ['title' => 'Fast contact', 'text' => 'WhatsApp and contact forms shorten the path between visitor and request.'],
            ],
        ],
        'web-design-brasov' => [
            'title' => 'Web design Brașov',
            'description' => 'Web design services in Brașov for local businesses that need a modern, clear and mobile-friendly website.',
            'eyebrow' => 'Web design Brașov',
            'h1' => 'Web design in Brașov for modern and clear websites',
            'intro' => 'Website design is not only about beautiful colors. It means structure, trust, clear buttons and a good mobile experience.',
            'service_type' => 'Web design',
            'includes' => ['Brand-adapted design', 'Service sections', 'Visible calls to action', 'Mobile optimization', 'Contact page', 'Google Business integration'],
            'for_who' => 'For businesses in Brașov that already have an outdated website or start from zero and want a more professional online image.',
            'process' => 'We define the website goal, rebuild the structure, prepare the essential content and create a clean, easy-to-read design.',
            'benefits' => [
                ['title' => 'More trust', 'text' => 'A clean design makes the business look more serious.'],
                ['title' => 'Easier to read', 'text' => 'Texts and services are organized for real visitors.'],
                ['title' => 'Better on mobile', 'text' => 'Most clients visit from their phone, so the page must feel natural.'],
            ],
        ],
        'realizare-website-brasov' => [
            'title' => 'Website development Brașov',
            'description' => 'Website development for businesses in Brașov: presentation website, landing page, contact setup, basic SEO and Analytics.',
            'eyebrow' => 'Website development',
            'h1' => 'Website development in Brașov, from idea to launch',
            'intro' => 'SiteGo helps turn your business information into a simple, clear website ready for promotion.',
            'service_type' => 'Website development',
            'includes' => ['Page structure', 'Basic content', 'Responsive design', 'Lead form', 'Google setup', 'Domain launch'],
            'for_who' => 'For entrepreneurs who do not want to waste time with technical details and need a clear, complete and easy-to-use website.',
            'process' => 'We choose the right model, define the sections, prepare the content, build the website and test it before launch.',
            'benefits' => [
                ['title' => 'Simple process', 'text' => 'You do not need to know the technical side. You get clear steps.'],
                ['title' => 'Coherent image', 'text' => 'The website is built around your services and goals.'],
                ['title' => 'Ready for promotion', 'text' => 'You can use it in Google Business, social media and campaigns.'],
            ],
        ],
        'realizare-site-brasov' => [
            'title' => 'Website creation Brașov',
            'description' => 'Website creation in Brașov for local companies, salons, services, clinics and businesses that want a professional online presence.',
            'eyebrow' => 'Website creation Brașov',
            'h1' => 'Website creation in Brașov for your business',
            'intro' => 'A correctly built website must be clear, fast, mobile-friendly and easy for clients to use.',
            'service_type' => 'Website creation',
            'includes' => ['Service structure', 'Responsive design', 'Adapted texts', 'Contact form', 'WhatsApp', 'Basic local SEO'],
            'for_who' => 'For businesses in Brașov that need a new website or a clearer alternative to a Facebook page.',
            'process' => 'We discuss the goal, choose the structure, prepare the texts, build the website, test mobile and publish it.',
            'benefits' => [
                ['title' => 'Own presence', 'text' => 'You are not dependent only on social media or referrals.'],
                ['title' => 'More clarity', 'text' => 'Clients quickly see services, schedule and contact options.'],
                ['title' => 'Prepared for Google', 'text' => 'The page has structure and basic elements for indexing.'],
            ],
        ],
        'creare-site-brasov' => [
            'title' => 'Create website Brașov',
            'description' => 'Website creation in Brașov for small local businesses: presentation website, service page, form and Google-ready structure.',
            'eyebrow' => 'Create website Brașov',
            'h1' => 'Website creation in Brașov for local businesses',
            'intro' => 'If you have a local business, your website must quickly explain what you offer, who it is for and how the client can contact you.',
            'service_type' => 'Website creation',
            'includes' => ['Clear homepage', 'Service sections', 'Fast contact', 'Mobile version', 'Basic SEO', 'Launch preparation'],
            'for_who' => 'For local companies, salons, photographers, freelancers, clinics, restaurants and services that want a more professional image.',
            'process' => 'We start from the goal, choose the right structure, adapt the texts and build the final website.',
            'benefits' => [
                ['title' => 'Quick start', 'text' => 'You can begin with a simple and clear structure.'],
                ['title' => 'Controlled cost', 'text' => 'We do not add unnecessary features from the first stage.'],
                ['title' => 'Easy to extend', 'text' => 'The site can later grow with pages, blog, booking or catalog.'],
            ],
        ],
        'constructie-site-brasov' => [
            'title' => 'Website building Brașov',
            'description' => 'Website building in Brașov: structure, design, development, forms, domain launch and basic optimization.',
            'eyebrow' => 'Website building',
            'h1' => 'Website building in Brașov, from structure to launch',
            'intro' => 'Building a website is not just design. It means clear pages, useful features, forms, testing and correct publishing.',
            'service_type' => 'Website building',
            'includes' => ['Website structure', 'Responsive design', 'Technical development', 'Contact form', 'Mobile testing', 'Domain launch'],
            'for_who' => 'For entrepreneurs who want a correctly built website, with clear steps and without complicated technical discussions.',
            'process' => 'We define what the site should do, build the sections, test the forms and prepare the launch.',
            'benefits' => [
                ['title' => 'Fewer blockers', 'text' => 'You get a clear process, not a confusing list of technical terms.'],
                ['title' => 'Right features', 'text' => 'We add only what helps the business now.'],
                ['title' => 'Ready to launch', 'text' => 'We check design, contact and functionality before publishing.'],
            ],
        ],
        'firma-web-design-brasov' => [
            'title' => 'Web design company Brașov',
            'description' => 'Web design company in Brașov for local businesses that need a presentation website, landing page or digital solution.',
            'eyebrow' => 'Web design company Brașov',
            'h1' => 'Web design company in Brașov for local businesses',
            'intro' => 'SiteGo works with businesses that need a clear online presence: presentation websites, campaign pages, forms and adapted digital solutions.',
            'service_type' => 'Web design company',
            'includes' => ['Initial consultation', 'Website structure', 'Modern design', 'Development', 'Fast contact', 'Assisted launch'],
            'for_who' => 'For companies that want an organized collaboration, a clear direction and an easy-to-use website.',
            'process' => 'We start from the real business need, choose the right direction and build the website in clear steps.',
            'benefits' => [
                ['title' => 'Clear collaboration', 'text' => 'You know what you receive and what comes next.'],
                ['title' => 'Business-oriented', 'text' => 'The website is designed for contact, trust and conversions.'],
                ['title' => 'Support after launch', 'text' => 'We can continue with maintenance, adjustments and extensions.'],
            ],
        ],
        'agentie-web-design-brasov' => [
            'title' => 'Web design agency Brașov',
            'description' => 'Web design agency in Brașov for modern, responsive websites focused on real client requests.',
            'eyebrow' => 'Web design agency',
            'h1' => 'Web design agency in Brașov for modern websites',
            'intro' => 'SiteGo offers a practical approach for local businesses: clear structure, modern design, useful features and simple steps to launch.',
            'service_type' => 'Web design agency',
            'includes' => ['Page strategy', 'UI design', 'Web development', 'Basic SEO', 'Analytics on request', 'Launch support'],
            'for_who' => 'For businesses that want a digital partner, not just a page built quickly and abandoned after launch.',
            'process' => 'We analyze the goal, choose the structure, build the website and prepare it for real use.',
            'benefits' => [
                ['title' => 'Professional image', 'text' => 'The website communicates more trust.'],
                ['title' => 'Good mobile experience', 'text' => 'The structure is designed for users who browse from their phones.'],
                ['title' => 'Clear direction', 'text' => 'You get pages, sections and CTAs with purpose.'],
            ],
        ],
        'landing-page-afaceri' => [
            'title' => 'Landing page for businesses',
            'description' => 'Landing page for promoting a service, product or local campaign. Clear page with CTA and contact form.',
            'eyebrow' => 'Landing page',
            'h1' => 'Landing page for businesses that want clearer leads',
            'intro' => 'A landing page focuses on one goal: explaining the offer and turning the visitor into a lead.',
            'service_type' => 'Landing page',
            'includes' => ['Clear offer hero', 'Benefits', 'Service section', 'FAQ', 'Contact form', 'Repeated CTA'],
            'for_who' => 'Suitable for campaigns, launches, seasonal services, promotions or businesses sending traffic from TikTok, Facebook or Google.',
            'process' => 'We build the page around a clear offer, with short sections, visible benefits and strategically placed contact buttons.',
            'benefits' => [
                ['title' => 'Conversion focus', 'text' => 'The page has one goal and does not waste attention.'],
                ['title' => 'Ideal for ads', 'text' => 'You can send traffic from TikTok, Facebook, Instagram or Google.'],
                ['title' => 'Fast to launch', 'text' => 'It can be built faster than a complete website.'],
            ],
        ],
        'site-salon-beauty' => [
            'title' => 'Website for beauty salon',
            'description' => 'Presentation website for beauty salons, hair salons, makeup artists, stylists or beauty services.',
            'eyebrow' => 'Beauty website',
            'h1' => 'Website for beauty salon, hair salon or beauty services',
            'intro' => 'A salon needs good photos, clear services, indicative prices and a fast way for clients to request appointments.',
            'service_type' => 'Beauty salon website',
            'includes' => ['Beauty services', 'Photo gallery', 'Booking button', 'WhatsApp', 'Reviews', 'Map and schedule'],
            'for_who' => 'For salons, hair stylists, makeup artists, cosmeticians, nail artists and beauty businesses.',
            'process' => 'We focus on image, services, bookings and trust. The page must look good on mobile and lead quickly to contact.',
            'benefits' => [
                ['title' => 'Simpler bookings', 'text' => 'Clients can quickly reach WhatsApp or the form.'],
                ['title' => 'Clear services', 'text' => 'Each service is presented briefly, without clutter.'],
                ['title' => 'Premium image', 'text' => 'The design helps the salon look polished and professional.'],
            ],
        ],
        'cat-costa-un-site-de-prezentare-2026' => [
            'title' => 'How much does a presentation website cost in 2026',
            'description' => 'A clear explanation of how much a presentation website can cost in 2026 and what influences the price.',
            'eyebrow' => 'Pricing guide',
            'h1' => 'How much does a presentation website cost in 2026?',
            'intro' => 'The price depends on the number of pages, customization level, texts, photos, forms, SEO and technical setup needed.',
            'service_type' => 'Website consultation',
            'includes' => ['Price estimate', 'Clear explanations', 'What is included', 'What costs extra', 'Start recommendations', 'Configurator link'],
            'for_who' => 'For entrepreneurs who want to realistically understand the budget needed for a presentation website.',
            'process' => 'The simplest approach is to start with a clear website, not with many unnecessary features. Later you can add pages, blog, portfolio or extra functionality.',
            'benefits' => [
                ['title' => 'Clearer budget', 'text' => 'You understand what influences the cost before asking for an offer.'],
                ['title' => 'No unnecessary features', 'text' => 'You can start with exactly what you need now.'],
                ['title' => 'Useful configurator', 'text' => 'You can estimate the right version for your business more easily.'],
            ],
        ],
    ];

    if ($locale === 'en' && isset($seoEnglishPages[$slug])) {
        $page = array_replace_recursive($page, $seoEnglishPages[$slug]);
    }

    $ui = [
        'ro' => [
            'what_get' => 'Ce primești concret',
            'for_who' => 'Pentru cine este',
            'for_who_title' => 'Potrivit pentru afaceri locale care vor claritate online.',
            'request_offer' => 'Cere ofertă',
            'view_templates' => 'Vezi modele de site',
            'why_title' => 'De ce merită să ai o pagină bine structurată',
            'process_title' => 'Cum lucrăm',
            'steps' => [
                ['01', 'Clarificăm obiectivul'],
                ['02', 'Stabilim structura'],
                ['03', 'Construim pagina'],
                ['04', 'Testăm și lansăm'],
            ],
            'popular_title' => 'Servicii populare SiteGo',
            'popular_text' => 'Poți explora și alte variante de site potrivite pentru afaceri locale, servicii, saloane, campanii sau promovare online.',
            'cta_title' => 'Vrei să discutăm despre site-ul tău?',
            'cta_text' => 'Trimite câteva detalii despre afacerea ta și revenim cu întrebări clare despre structură, funcționalități, termen și buget.',
            'contact_us' => 'Contactează-ne',
            'configure' => 'Configurează site-ul',
            'fallback_title' => 'Servicii web design',
            'fallback_description' => 'SiteGo construiește site-uri pentru afaceri locale.',
        ],
        'en' => [
            'what_get' => 'What you receive',
            'for_who' => 'Who it is for',
            'for_who_title' => 'Suitable for local businesses that want clarity online.',
            'request_offer' => 'Request an offer',
            'view_templates' => 'View website models',
            'why_title' => 'Why a well-structured page is worth it',
            'process_title' => 'How we work',
            'steps' => [
                ['01', 'We clarify the goal'],
                ['02', 'We define the structure'],
                ['03', 'We build the page'],
                ['04', 'We test and launch'],
            ],
            'popular_title' => 'Popular SiteGo services',
            'popular_text' => 'You can also explore other website options suitable for local businesses, services, salons, campaigns or online promotion.',
            'cta_title' => 'Want to talk about your website?',
            'cta_text' => 'Send a few details about your business and we will reply with clear questions about structure, features, timeline and budget.',
            'contact_us' => 'Contact us',
            'configure' => 'Configure website',
            'fallback_title' => 'Web design services',
            'fallback_description' => 'SiteGo builds websites for local businesses.',
        ],
    ][$locale];

    $relatedLinks = [
        'ro' => [
            ['title' => 'Creare site de prezentare Brașov', 'href' => '/creare-site-de-prezentare-brasov', 'text' => 'Site clar pentru afaceri locale care vor să fie găsite mai ușor online.'],
            ['title' => 'Web design Brașov', 'href' => '/web-design-brasov', 'text' => 'Design modern, responsive și adaptat pentru telefon.'],
            ['title' => 'Realizare website Brașov', 'href' => '/realizare-website-brasov', 'text' => 'Website complet, de la structură și texte până la publicare.'],
            ['title' => 'Creare site Brașov', 'href' => '/creare-site-brasov', 'text' => 'Site-uri pentru firme, servicii, saloane, cabinete și afaceri locale.'],
            ['title' => 'Construcție site Brașov', 'href' => '/constructie-site-brasov', 'text' => 'Partea tehnică, structură, publicare, formulare și optimizare de bază.'],
            ['title' => 'Firmă web design Brașov', 'href' => '/firma-web-design-brasov', 'text' => 'Colaborare clară pentru afaceri care vor o prezență online profesionistă.'],
        ],
        'en' => [
            ['title' => 'Presentation website creation in Brașov', 'href' => '/creare-site-de-prezentare-brasov', 'text' => 'A clear website for local businesses that want to be easier to find online.'],
            ['title' => 'Web design Brașov', 'href' => '/web-design-brasov', 'text' => 'Modern responsive design adapted for mobile.'],
            ['title' => 'Website development Brașov', 'href' => '/realizare-website-brasov', 'text' => 'Complete website, from structure and content to launch.'],
            ['title' => 'Create website Brașov', 'href' => '/creare-site-brasov', 'text' => 'Websites for companies, services, salons, clinics and local businesses.'],
            ['title' => 'Website building Brașov', 'href' => '/constructie-site-brasov', 'text' => 'Technical setup, structure, publishing, forms and basic optimization.'],
            ['title' => 'Web design company Brașov', 'href' => '/firma-web-design-brasov', 'text' => 'Clear collaboration for businesses that want a professional online presence.'],
        ],
    ][$locale];

    $title = $page['title'] ?? $ui['fallback_title'];
    $description = $page['description'] ?? $ui['fallback_description'];

    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'ProfessionalService',
        'name' => 'SiteGo',
        'url' => url()->current(),
        'image' => rtrim(config('app.url'), '/') . '/images/og-cover.jpg',
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
        'serviceType' => $page['service_type'] ?? 'Web design',
        'description' => $description,
    ];
@endphp

@section('title', $title)
@section('description', $description)
@section('page-title', $page['h1'] ?? $title)
@section('page-intro', $page['intro'] ?? $description)

@section('content')
    <script type="application/ld+json">
        {!! json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
    </script>

    <section class="grid gap-8 lg:grid-cols-[1.05fr_0.95fr]">
        <article class="rounded-[2rem] bg-[#f7f4ef] p-6 sm:p-8">
            <p class="text-sm font-semibold uppercase tracking-[0.25em] text-[#8b6f47]">
                {{ $page['eyebrow'] ?? 'SiteGo' }}
            </p>

            <h2 class="mt-4 text-3xl font-semibold leading-tight sm:text-4xl">
                {{ $ui['what_get'] }}
            </h2>

            <div class="mt-6 grid gap-3">
                @foreach($page['includes'] ?? [] as $item)
                    <div class="flex gap-3 rounded-2xl bg-white p-4">
                        <span class="text-[#8b6f47]">✓</span>
                        <span>{{ $item }}</span>
                    </div>
                @endforeach
            </div>
        </article>

        <article class="rounded-[2rem] bg-black p-6 text-white sm:p-8">
            <p class="text-sm font-semibold uppercase tracking-[0.25em] text-white/40">
                {{ $ui['for_who'] }}
            </p>

            <h2 class="mt-4 text-3xl font-semibold leading-tight">
                {{ $ui['for_who_title'] }}
            </h2>

            <p class="mt-5 leading-8 text-white/65">
                {{ $page['for_who'] ?? '' }}
            </p>

            <div class="mt-8 flex flex-col gap-3 sm:flex-row lg:flex-col">
                <a href="/contact" class="inline-flex justify-center rounded-full bg-white px-6 py-4 text-sm font-semibold text-black">
                    {{ $ui['request_offer'] }}
                </a>

                <a href="/modele-site" class="inline-flex justify-center rounded-full border border-white/20 px-6 py-4 text-sm font-semibold text-white">
                    {{ $ui['view_templates'] }}
                </a>
            </div>
        </article>
    </section>

    <section class="mt-12">
        <h2 class="text-3xl font-semibold">
            {{ $ui['why_title'] }}
        </h2>

        <div class="mt-6 grid gap-4 md:grid-cols-3">
            @foreach($page['benefits'] ?? [] as $benefit)
                <article class="rounded-2xl bg-[#f7f4ef] p-5">
                    <h3 class="text-xl font-semibold">{{ $benefit['title'] }}</h3>
                    <p class="mt-3 leading-7 text-black/60">{{ $benefit['text'] }}</p>
                </article>
            @endforeach
        </div>
    </section>

    <section class="mt-12 rounded-[2rem] bg-[#f7f4ef] p-6 sm:p-8">
        <h2 class="text-3xl font-semibold">
            {{ $ui['process_title'] }}
        </h2>

        <p class="mt-4 max-w-4xl leading-8 text-black/60">
            {{ $page['process'] ?? '' }}
        </p>

        <div class="mt-6 grid gap-4 md:grid-cols-4">
            @foreach($ui['steps'] as [$number, $text])
                <div class="rounded-2xl bg-white p-5">
                    <p class="text-sm font-semibold text-[#8b6f47]">{{ $number }}</p>
                    <p class="mt-3 font-semibold">{{ $text }}</p>
                </div>
            @endforeach
        </div>
    </section>

    <section class="mt-12">
        <h2 class="text-3xl font-semibold">
            {{ $ui['popular_title'] }}
        </h2>

        <p class="mt-4 max-w-4xl leading-8 text-black/60">
            {{ $ui['popular_text'] }}
        </p>

        <div class="mt-6 grid gap-4 md:grid-cols-2 lg:grid-cols-3">
            @foreach($relatedLinks as $link)
                @if($link['href'] !== '/' . $slug)
                    <a href="{{ $link['href'] }}" class="rounded-2xl bg-[#f7f4ef] p-5 transition hover:-translate-y-1 hover:bg-[#efe8dc]">
                        <h3 class="text-xl font-semibold">{{ $link['title'] }}</h3>
                        <p class="mt-3 text-sm leading-6 text-black/60">{{ $link['text'] }}</p>
                    </a>
                @endif
            @endforeach
        </div>
    </section>

    <section class="mt-12 rounded-[2rem] bg-black p-6 text-white sm:p-8">
        <div class="grid gap-6 lg:grid-cols-[1fr_0.65fr] lg:items-center">
            <div>
                <h2 class="text-3xl font-semibold">
                    {{ $ui['cta_title'] }}
                </h2>

                <p class="mt-4 leading-8 text-white/60">
                    {{ $ui['cta_text'] }}
                </p>
            </div>

            <div class="flex flex-col gap-3 sm:flex-row lg:flex-col">
                <a href="/contact" class="inline-flex justify-center rounded-full bg-white px-6 py-4 text-sm font-semibold text-black">
                    {{ $ui['contact_us'] }}
                </a>

                <a href="/configurator" class="inline-flex justify-center rounded-full border border-white/20 px-6 py-4 text-sm font-semibold text-white">
                    {{ $ui['configure'] }}
                </a>
            </div>
        </div>
    </section>
@endsection
