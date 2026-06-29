@php
    $locale = request('locale');

    if (in_array($locale, ['ro', 'en'], true)) {
        app()->setLocale($locale);
    }
@endphp

    <!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('emails.unsubscribe.title') }} - SiteGo</title>
</head>
<body style="margin:0; min-height:100vh; display:grid; place-items:center; background:#f7f4ef; font-family:Arial, sans-serif; color:#171717;">
<div style="max-width:560px; margin:24px; background:#fff; border:1px solid #eee; border-radius:28px; padding:36px; text-align:center; box-shadow:0 24px 80px rgba(23,23,23,0.08);">
    <p style="margin:0; color:#a67c3a; font-size:12px; letter-spacing:3px; text-transform:uppercase; font-weight:bold;">
        SiteGo
    </p>

    <h1 style="margin:16px 0 0; font-size:32px; line-height:1.2;">
        {{ __('emails.unsubscribe.title') }}
    </h1>

    <p style="margin:16px 0 0; color:#666; line-height:1.7;">
        {{ __('emails.unsubscribe.description', [
            'email' => $subscriber->email,
        ]) }}
    </p>

    <a href="{{ url('/') }}"
       style="display:inline-block; margin-top:28px; background:#171717; color:#fff; text-decoration:none; padding:14px 24px; border-radius:999px; font-weight:bold;">
        {{ __('emails.unsubscribe.back') }}
    </a>
</div>
</body>
</html>
