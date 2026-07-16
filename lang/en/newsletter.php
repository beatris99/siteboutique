<?php

return [
    'frontend' => [
        'popup' => [
            'eyebrow' => 'Launch campaign',
            'title' => 'Get your personal 10% discount code',
            'description' => 'Enter your email address. Your unique code will be sent directly to your inbox and will not be displayed in the browser.',
            'form_eyebrow' => 'SiteGo offer',
            'form_title' => 'The code is delivered directly by email.',
            'email_label' => 'Email address',
            'email_placeholder' => 'name@email.com',
            'consent' => 'I agree to receive the code and SiteGo communications by email.',
            'submit' => 'Send me the code',
            'sending' => 'Sending...',
            'decline' => 'Not now',
            'close' => 'Close window',
            'success_title' => 'The code was sent.',
            'success_text' => 'Check your inbox. If the message is missing, also check Spam or Promotions.',
            'points' => [
                [
                    'title' => 'Unique code',
                    'text' => 'Each email address receives a personal code.',
                ],
                [
                    'title' => '10% discount',
                    'text' => 'The code can be used for the SiteGo launch campaign offer.',
                ],
                [
                    'title' => 'Sent by email',
                    'text' => 'The code is not displayed publicly in the browser.',
                ],
            ],
            'messages' => [
                'too_many_requests' => 'You sent too many requests in a short time. Please try again in one minute.',
                'check_email' => 'Check the email address.',
                'generic_error' => 'Something went wrong. Please try again.',
                'request_failed' => 'The request could not be sent. Check your connection and try again.',
            ],
        ],

        'contact_card' => [
            'compact_eyebrow' => 'SiteGo discount',
            'compact_title' => 'Get your 10% discount code by email.',
            'compact_description' => 'Enter your email address and your personal code will be delivered directly to your inbox.',
            'email_placeholder' => 'name@email.com',
            'consent' => 'I agree to receive the code and SiteGo communications by email.',
            'submit_subscribe' => 'Send me the code',
            'sending' => 'Sending...',
            'success_subscribe_title' => 'The code was sent.',
            'success_subscribe_text' => 'Check your inbox and, if needed, the Spam or Promotions folder.',
            'messages' => [
                'too_many_requests' => 'You sent too many requests in a short time. Please try again in one minute.',
                'check_email' => 'Check the email address.',
                'generic_error' => 'Something went wrong. Please try again.',
                'request_failed' => 'The request could not be sent. Check your connection and try again.',
            ],
        ],

        'section' => [
            'eyebrow' => 'SiteGo discount',
            'title' => 'Get your personal 10% discount code.',
            'description' => 'The code is associated with your email address and sent directly to your inbox.',
            'points' => [
                [
                    'title' => 'Personal',
                    'text' => 'A unique code for your email address.',
                ],
                [
                    'title' => 'Private',
                    'text' => 'The code is not displayed in the browser.',
                ],
                [
                    'title' => 'Fast',
                    'text' => 'The email is sent immediately after the request.',
                ],
            ],
            'success_subscribe_title' => 'The code was sent.',
            'success_subscribe_text' => 'Check your inbox and the Spam or Promotions folder.',
            'send_another' => 'Use another address',
            'email_label' => 'Email address',
            'email_placeholder' => 'name@email.com',
            'consent' => 'I agree to receive the code and SiteGo communications by email.',
            'sending' => 'Sending...',
            'submit_subscribe' => 'Send me the code',
            'note_subscribe' => 'You can unsubscribe at any time using the link included in the email.',
            'messages' => [
                'too_many_requests' => 'You sent too many requests in a short time. Please try again in one minute.',
                'check_email' => 'Check the email address.',
                'generic_error' => 'Something went wrong. Please try again.',
                'request_failed' => 'The request could not be sent. Check your connection and try again.',
            ],
        ],
    ],

    'api' => [
        'discount_sent' => 'Your personal :percent% discount code was sent by email.',
        'mail_failed' => 'The request was saved, but the email could not be sent. Please try again.',
        'unsubscribed' => 'The address was unsubscribed if it existed in our list.',
    ],

    'validation' => [
        'email_required' => 'Please enter your email address.',
        'email_invalid' => 'Please enter a valid email address.',
        'consent_required' => 'Your consent is required to receive the code and SiteGo communications by email.',
        'invalid_locale' => 'The selected language is invalid.',
        'request_rejected' => 'The request could not be sent.',
    ],
];