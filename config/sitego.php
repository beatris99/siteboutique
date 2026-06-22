<?php

return [
    'contact' => [
        'email' => env('SITEGO_CONTACT_EMAIL'),
        'phone' => env('SITEGO_CONTACT_PHONE'),
        'location' => env('SITEGO_CONTACT_LOCATION', 'Brasov, Romania'),
        'area' => env('SITEGO_CONTACT_AREA', 'Brasov si online'),
    ],

    'verification' => [
        'google_site_verification' => env('SITEGO_GOOGLE_SITE_VERIFICATION'),
    ],

    'analytics' => [
        'ga_measurement_id' => env('SITEGO_GA_MEASUREMENT_ID'),
    ],
];