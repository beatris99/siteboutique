<?php

return [
    'frontend' => [
        'popup' => [
            'eyebrow' => 'Campanie de lansare',
            'title' => 'Primește codul tău personal de reducere de 10%',
            'description' => 'Introdu adresa de email. Codul unic va fi trimis direct în inbox și nu va fi afișat în browser.',
            'form_eyebrow' => 'Oferta SiteGo',
            'form_title' => 'Codul ajunge direct pe email.',
            'email_label' => 'Adresa de email',
            'email_placeholder' => 'nume@email.com',
            'consent' => 'Sunt de acord să primesc codul și comunicări SiteGo pe email.',
            'submit' => 'Trimite-mi codul',
            'sending' => 'Se trimite...',
            'decline' => 'Nu acum',
            'close' => 'Închide fereastra',
            'success_title' => 'Codul a fost trimis.',
            'success_text' => 'Verifică inboxul. Dacă mesajul nu apare, verifică și folderele Spam sau Promotions.',
            'points' => [
                [
                    'title' => 'Cod unic',
                    'text' => 'Fiecare adresă de email primește un cod personal.',
                ],
                [
                    'title' => 'Reducere de 10%',
                    'text' => 'Codul poate fi folosit pentru oferta SiteGo din campania de lansare.',
                ],
                [
                    'title' => 'Trimis pe email',
                    'text' => 'Codul nu este afișat public în browser.',
                ],
            ],
            'messages' => [
                'too_many_requests' => 'Ai trimis prea multe cereri într-un timp scurt. Încearcă din nou peste un minut.',
                'check_email' => 'Verifică adresa de email.',
                'generic_error' => 'A apărut o eroare. Încearcă din nou.',
                'request_failed' => 'Cererea nu a putut fi trimisă. Verifică conexiunea și încearcă din nou.',
            ],
        ],

        'contact_card' => [
            'compact_eyebrow' => 'Reducere SiteGo',
            'compact_title' => 'Primește codul de reducere de 10% pe email.',
            'compact_description' => 'Introdu adresa de email, iar codul personal va fi trimis direct în inbox.',
            'email_placeholder' => 'nume@email.com',
            'consent' => 'Sunt de acord să primesc codul și comunicări SiteGo pe email.',
            'submit_subscribe' => 'Trimite-mi codul',
            'sending' => 'Se trimite...',
            'success_subscribe_title' => 'Codul a fost trimis.',
            'success_subscribe_text' => 'Verifică inboxul și, dacă este nevoie, folderul Spam sau Promotions.',
            'messages' => [
                'too_many_requests' => 'Ai trimis prea multe cereri într-un timp scurt. Încearcă din nou peste un minut.',
                'check_email' => 'Verifică adresa de email.',
                'generic_error' => 'A apărut o eroare. Încearcă din nou.',
                'request_failed' => 'Cererea nu a putut fi trimisă. Verifică conexiunea și încearcă din nou.',
            ],
        ],

        'section' => [
            'eyebrow' => 'Reducere SiteGo',
            'title' => 'Primește codul personal de reducere de 10%.',
            'description' => 'Codul este asociat adresei tale de email și este trimis direct în inbox.',
            'points' => [
                [
                    'title' => 'Personal',
                    'text' => 'Cod unic pentru adresa ta de email.',
                ],
                [
                    'title' => 'Privat',
                    'text' => 'Codul nu apare în browser.',
                ],
                [
                    'title' => 'Rapid',
                    'text' => 'Emailul este trimis imediat după solicitare.',
                ],
            ],
            'success_subscribe_title' => 'Codul a fost trimis.',
            'success_subscribe_text' => 'Verifică inboxul și folderul Spam sau Promotions.',
            'send_another' => 'Folosește altă adresă',
            'email_label' => 'Adresa de email',
            'email_placeholder' => 'nume@email.com',
            'consent' => 'Sunt de acord să primesc codul și comunicări SiteGo pe email.',
            'sending' => 'Se trimite...',
            'submit_subscribe' => 'Trimite-mi codul',
            'note_subscribe' => 'Te poți dezabona oricând din linkul inclus în email.',
            'messages' => [
                'too_many_requests' => 'Ai trimis prea multe cereri într-un timp scurt. Încearcă din nou peste un minut.',
                'check_email' => 'Verifică adresa de email.',
                'generic_error' => 'A apărut o eroare. Încearcă din nou.',
                'request_failed' => 'Cererea nu a putut fi trimisă. Verifică conexiunea și încearcă din nou.',
            ],
        ],
    ],

    'api' => [
        'discount_sent' => 'Codul tău personal de reducere de :percent% a fost trimis pe email.',
        'mail_failed' => 'Cererea a fost salvată, dar emailul nu a putut fi trimis. Încearcă din nou.',
        'unsubscribed' => 'Adresa a fost dezabonată, dacă exista în lista noastră.',
    ],

    'validation' => [
        'email_required' => 'Te rugăm să introduci adresa de email.',
        'email_invalid' => 'Te rugăm să introduci o adresă de email validă.',
        'consent_required' => 'Este nevoie de acordul tău pentru a primi codul și comunicările SiteGo pe email.',
        'invalid_locale' => 'Limba selectată nu este validă.',
        'request_rejected' => 'Cererea nu a putut fi trimisă.',
    ],
];
