<?php

return [
    'meta' => [
        'title' => 'Autentificare admin - SiteGo',
    ],

    'page' => [
        'title' => 'Autentificare',
        'description' =>
        'Introdu emailul și parola contului de administrator.',
        'back_to_site' => 'Înapoi la site',
    ],

    'fields' => [
        'email' => 'Adresa de email',
        'email_placeholder' => 'Email administrator',

        'password' => 'Parola',
        'password_placeholder' => 'Parola administratorului',

        'submit' => 'Intră în admin',
    ],

    'validation' => [
        'email_required' =>
        'Adresa de email este obligatorie.',

        'email_invalid' =>
        'Introdu o adresă de email validă.',

        'password_required' =>
        'Parola este obligatorie.',

        'password_invalid' =>
        'Parola introdusă nu este validă.',
    ],

    'errors' => [
        'invalid_credentials' =>
        'Datele de autentificare nu sunt corecte.',

        'not_authorized' =>
        'Contul nu are drepturi de administrator.',

        'too_many_attempts' =>
        'Au fost făcute prea multe încercări. Așteaptă și încearcă din nou.',
    ],

    'command' => [
        'email_prompt' =>
        'Adresa de email a administratorului',

        'name_prompt' =>
        'Numele administratorului',

        'password_prompt' =>
        'Parola nouă, minimum 12 caractere',

        'password_confirmation_prompt' =>
        'Repetă parola',

        'passwords_do_not_match' =>
        'Parolele introduse nu coincid.',

        'created' =>
        'Contul de administrator a fost creat.',

        'updated' =>
        'Contul de administrator a fost actualizat, iar parola a fost schimbată.',

        'account_email' =>
        'Email administrator: :email',
    ],
];
