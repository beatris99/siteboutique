<?php

return [
    'meta' => [
        'index' => [
            'title' => 'SiteGo portfolio - live web projects for real businesses',
            'description' => 'Explore live SiteGo projects: RentRide, a rental platform in Brașov, and the Access Bars Beatris presentation website.',
        ],
        'rentride' => [
            'title' => 'RentRide in the SiteGo portfolio - rental platform in Brașov',
            'description' => 'SiteGo project case study for RentRide: a live website for scooter and electric bicycle rentals in Brașov.',
        ],
        'access-bars-beatris' => [
            'title' => 'Access Bars Beatris in the SiteGo portfolio - presentation website',
            'description' => 'SiteGo project case study for Beatris Lupuleț: a presentation website for Access Bars sessions in Brașov, with WhatsApp booking.',
        ],
    ],

    'hero' => [
        'eyebrow' => 'SiteGo portfolio',
        'title' => 'Real projects built for different goals.',
        'description' => 'From a local rental platform to a personal presentation website, every project starts with the business, its audience, and the action visitors need to take.',
        'stats' => [
            ['value' => '2', 'label' => 'live projects'],
            ['value' => '2', 'label' => 'distinct visual directions'],
            ['value' => '100%', 'label' => 'mobile-first'],
        ],
    ],

    'labels' => [
        'view_case' => 'View project',
        'view_live' => 'Open live website',
        'back' => 'Back to portfolio',
        'delivered' => 'What we delivered',
        'result' => 'Project outcome',
        'technology' => 'Technology and implementation',
        'next_project' => 'Next project',
        'external_note' => 'External website · opens in a new tab',
    ],

    'cta' => [
        'eyebrow' => 'Your project could be next',
        'title' => 'Do you need a website that clearly explains your work and guides people towards contact?',
        'description' => 'We start with your business goal, choose the right structure, and build a coherent online presence that is easy to use and ready to promote.',
        'button' => 'Discuss your project',
    ],

    'projects' => [
        'rentride' => [
            'slug' => 'rentride',
            'name' => 'RentRide',
            'category' => 'Local rental platform',
            'headline' => 'Urban mobility on two wheels, presented clearly and made easy to book.',
            'short_description' => 'A complete website for scooter and electric bicycle rentals in Brașov, with clear paths for urban rides and delivery work.',
            'description' => 'RentRide needed more than a presentation page: it required a structure that separates user types, presents available vehicles, and quickly guides visitors towards checking availability and making contact.',
            'image' => '/images/portfolio/rentride-portfolio.webp',
            'image_alt' => 'RentRide Brașov visual presentation with a scooter and electric bicycle',
            'url' => 'https://rentride.ro',
            'status' => 'Live website',
            'year' => '2026',
            'accent' => '#087f8c',
            'accent_soft' => '#ddf7f7',

            'features' => [
                'Presentation of rental models and services',
                'Separate pages for urban rides and delivery riders',
                'Fast contact and availability checks through WhatsApp',
                'Management of vehicles, images, and offers',
                'Romanian and English versions',
                'Local SEO, Analytics, and Search Console',
            ],

            'result' => 'A live website that explains the offer quickly, separates customer needs, and turns interest into a concrete availability request.',

            'implementation' => 'Laravel application with a MySQL database, administration panel, responsive interface, and Docker-based deployment.',

            'tags' => [
                'Laravel',
                'MySQL',
                'Tailwind CSS',
                'Docker',
                'Local SEO',
                'RO / EN',
                'Fleet management',
            ],
        ],

        'access-bars-beatris' => [
            'slug' => 'access-bars-beatris',
            'name' => 'Access Bars Beatris',
            'category' => 'Personal presentation website',
            'headline' => 'A calm and clear website for presenting sessions and booking.',
            'short_description' => 'A presentation page for Beatris Lupuleț, an Access Bars practitioner in Brașov, built for clear explanations, trust, and fast contact.',
            'description' => 'The project needed a visual identity distinct from SiteGo and a simple structure that explains the service, how a session works, who the practitioner is, and how to book.',
            'image' => '/images/portfolio/access-bars-portfolio.webp',
            'image_alt' => 'Homepage of Beatris Lupuleț website for Access Bars sessions in Brașov',
            'url' => 'https://access-bars.pages.dev/',
            'status' => 'Live website',
            'year' => '2026',
            'accent' => '#4b2f68',
            'accent_soft' => '#eee9fa',

            'features' => [
                'A calm, personal, and distinct visual identity',
                'Clear presentation of the service and session flow',
                'Practitioner introduction and booking information',
                'Transparent prices and packages',
                'Direct WhatsApp booking',
                'SEO metadata and Cloudflare Pages deployment',
            ],

            'result' => 'A coherent personal online presence that is easy to browse and answers the main questions before a visitor requests a booking.',

            'implementation' => 'A fast static website built with HTML, CSS, and JavaScript, optimized for mobile and deployed through Cloudflare Pages.',

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
