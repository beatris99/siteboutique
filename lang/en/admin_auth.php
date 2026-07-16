<?php

return [
    'meta' => [
        'title' => 'Admin login - SiteGo',
    ],

    'page' => [
        'title' => 'Authentication',
        'description' =>
        'Enter the administrator account email and password.',
        'back_to_site' => 'Back to website',
    ],

    'fields' => [
        'email' => 'Email address',
        'email_placeholder' => 'Administrator email',

        'password' => 'Password',
        'password_placeholder' => 'Administrator password',

        'submit' => 'Enter admin',
    ],

    'validation' => [
        'email_required' =>
        'The email address is required.',

        'email_invalid' =>
        'Enter a valid email address.',

        'password_required' =>
        'The password is required.',

        'password_invalid' =>
        'The entered password is not valid.',
    ],

    'errors' => [
        'invalid_credentials' =>
        'The authentication details are incorrect.',

        'not_authorized' =>
        'This account does not have administrator access.',

        'too_many_attempts' =>
        'Too many attempts were made. Wait and try again.',
    ],

    'command' => [
        'email_prompt' =>
        'Administrator email address',

        'name_prompt' =>
        'Administrator name',

        'password_prompt' =>
        'New password, minimum 12 characters',

        'password_confirmation_prompt' =>
        'Repeat the password',

        'passwords_do_not_match' =>
        'The passwords do not match.',

        'created' =>
        'The administrator account was created.',

        'updated' =>
        'The administrator account was updated and its password was changed.',

        'account_email' =>
        'Administrator email: :email',
    ],
];
