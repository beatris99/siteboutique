<?php

$integer = static fn (string $key, int $default): int => max(0, (int) env($key, $default));

return [
    'currency' => env('SITEGO_PRICE_CURRENCY', 'RON'),
    'currency_label' => env('SITEGO_PRICE_CURRENCY_LABEL', 'lei'),
    'packages' => [
        'start' => $integer('SITEGO_PRICE_PROJECT_START', 2500),
        'pro' => $integer('SITEGO_PRICE_PROJECT_PRO', 4500),
        'premium' => $integer('SITEGO_PRICE_PROJECT_PREMIUM', 7500),
    ],
    'maintenance' => [
        'essential' => $integer('SITEGO_PRICE_MAINTENANCE_ESSENTIAL', 300),
        'business' => $integer('SITEGO_PRICE_MAINTENANCE_BUSINESS', 500),
        'growth' => $integer('SITEGO_PRICE_MAINTENANCE_GROWTH', 700),
    ],
    'extras' => [
        'contact_form' => $integer('SITEGO_PRICE_EXTRA_CONTACT_FORM', 300),
        'phone_email_button' => $integer('SITEGO_PRICE_EXTRA_PHONE_EMAIL_BUTTON', 150),
        'booking_form' => $integer('SITEGO_PRICE_EXTRA_BOOKING_FORM', 600),
        'gallery' => $integer('SITEGO_PRICE_EXTRA_GALLERY', 400),
        'services_pricing' => $integer('SITEGO_PRICE_EXTRA_SERVICES_PRICING', 350),
        'faq' => $integer('SITEGO_PRICE_EXTRA_FAQ', 250),
        'testimonials' => $integer('SITEGO_PRICE_EXTRA_TESTIMONIALS', 350),
        'google_maps' => $integer('SITEGO_PRICE_EXTRA_GOOGLE_MAPS', 250),
        'product_catalog' => $integer('SITEGO_PRICE_EXTRA_PRODUCT_CATALOG', 900),
        'client_requests_panel' => $integer('SITEGO_PRICE_EXTRA_CLIENT_REQUESTS_PANEL', 1200),
        'analytics' => $integer('SITEGO_PRICE_EXTRA_ANALYTICS', 300),
        'bilingual' => $integer('SITEGO_PRICE_EXTRA_BILINGUAL', 1500),
    ],
    'templates' => [
        'business-essence' => $integer('SITEGO_PRICE_TEMPLATE_BUSINESS_ESSENCE', 2500),
        'premium-studio' => $integer('SITEGO_PRICE_TEMPLATE_PREMIUM_STUDIO', 3500),
        'launch-page' => $integer('SITEGO_PRICE_TEMPLATE_LAUNCH_PAGE', 2500),
        'conversion-flow' => $integer('SITEGO_PRICE_TEMPLATE_CONVERSION_FLOW', 3500),
        'rental-flow' => $integer('SITEGO_PRICE_TEMPLATE_RENTAL_FLOW', 4500),
        'tourism-stay' => $integer('SITEGO_PRICE_TEMPLATE_TOURISM_STAY', 4500),
        'simple-shop' => $integer('SITEGO_PRICE_TEMPLATE_SIMPLE_SHOP', 7500),
        'premium-store' => $integer('SITEGO_PRICE_TEMPLATE_PREMIUM_STORE', 9500),
        'client-portal' => $integer('SITEGO_PRICE_TEMPLATE_CLIENT_PORTAL', 12000),
    ],
];
