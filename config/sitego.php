<?php

$contactEmail = env('SITEGO_CONTACT_EMAIL', 'sitegobv@gmail.com');
$contactLocation = env('SITEGO_CONTACT_LOCATION', 'România / online');
$contactArea = env('SITEGO_CONTACT_AREA', 'România · colaborări online internaționale');

return [
    'contact' => [
        'email' => in_array($contactEmail, [
            'heresbeatriselena@gmail.com',
            'contact@sitego.ro',
        ], true)
            ? 'sitegobv@gmail.com'
            : $contactEmail,

        'phone' => env('SITEGO_CONTACT_PHONE', '+40 747 084 861'),

        'location' => in_array($contactLocation, [
            'Brașov, România',
            'Brasov, Romania',
        ], true)
            ? 'România / online'
            : $contactLocation,

        'area' => in_array($contactArea, [
            'Brașov și online',
            'Brasov si online',
            'Colaborare online în toată țara',
        ], true)
            ? 'România · colaborări online internaționale'
            : $contactArea,
    ],
];
