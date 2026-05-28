<?php

return [
    'phone_display' => env('RENTRIDE_PHONE_DISPLAY', '0753 721 818'),
    'phone_whatsapp' => env('RENTRIDE_PHONE_WHATSAPP', '40753721818'),
    'email' => env('RENTRIDE_EMAIL', 'lupulet92@gmail.com'),

    'notification_email' => env('RENTRIDE_NOTIFICATION_EMAIL', env('RENTRIDE_EMAIL', 'lupulet92@gmail.com')),

    'pfa' => [
        'name' => env('RENTRIDE_PFA_NAME', 'LUPULET COSMIN MOISICA PERSOANA FIZICA AUTORIZATA'),
        'cui' => env('RENTRIDE_PFA_CUI', '50816006'),
        'registration_number' => env('RENTRIDE_PFA_REGISTRATION_NUMBER', 'F2024014308004'),
        'address' => env('RENTRIDE_PFA_ADDRESS', 'Jud. Braşov, Municipiul Braşov, Strada 1 DECEMBRIE 1918, Nr. 16, Bl. 503, Scara C, Etaj 2, Ap. 12'),
        'city' => env('RENTRIDE_PFA_CITY', 'Brașov'),
        'country' => env('RENTRIDE_PFA_COUNTRY', 'România'),
    ],
];
