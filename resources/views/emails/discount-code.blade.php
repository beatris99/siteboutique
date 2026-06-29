@php
    $locale = $locale ?? app()->getLocale();

    if (in_array($locale, ['ro', 'en'], true)) {
        app()->setLocale($locale);
    }

    $unsubscribeUrl = $subscriber->unsubscribe_token
        ? route('newsletter.unsubscribe.token', [
            'token' => $subscriber->unsubscribe_token,
            'locale' => app()->getLocale(),
        ])
        : config('app.url');

    $contactUrl = rtrim(config('app.url'), '/') . '/#contact';
@endphp

    <!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <title>{{ __('emails.discount.subject', ['percent' => $subscriber->discount_percent ?? 10]) }}</title>
</head>
<body style="margin:0; padding:0; background:#f7f4ef; font-family:Arial, sans-serif; color:#171717;">
<div style="display:none; max-height:0; overflow:hidden; opacity:0;">
    {{ __('emails.discount.preheader') }}
</div>

<div style="max-width:680px; margin:0 auto; padding:32px 16px;">
    <div style="background:#ffffff; border-radius:24px; padding:32px; border:1px solid #eee; box-shadow:0 20px 60px rgba(23,23,23,0.06);">
        <p style="margin:0; font-size:12px; text-transform:uppercase; letter-spacing:3px; color:#a67c3a; font-weight:bold;">
            {{ __('emails.discount.campaign') }}
        </p>

        <h1 style="margin:16px 0 0; font-size:30px; line-height:1.2; color:#171717;">
            {{ __('emails.discount.title', ['percent' => $subscriber->discount_percent ?? 10]) }}
        </h1>

        <p style="line-height:1.7; color:#555; font-size:15px;">
            {{ __('emails.discount.intro') }}
        </p>

        <div style="margin-top:24px; background:#171717; border-radius:18px; padding:28px; text-align:center;">
            <p style="margin:0; font-size:12px; text-transform:uppercase; letter-spacing:3px; color:#d8c3a5;">
                {{ __('emails.discount.code_label') }}
            </p>

            <p style="margin:10px 0 0; font-size:34px; font-weight:bold; letter-spacing:4px; color:#ffffff;">
                {{ $subscriber->discount_code }}
            </p>
        </div>

        @if($subscriber->discount_expires_at)
            <p style="margin-top:18px; line-height:1.7; color:#666; font-size:14px;">
                {{ __('emails.discount.expires', [
                    'date' => $subscriber->discount_expires_at->format('d.m.Y'),
                ]) }}
            </p>
        @endif

        <p style="line-height:1.7; color:#666; font-size:14px;">
            {{ __('emails.discount.confirmation') }}
        </p>

        <div style="margin-top:28px; text-align:center;">
            <a href="{{ $contactUrl }}"
               style="display:inline-block; background:#171717; color:#ffffff; text-decoration:none; padding:14px 28px; border-radius:999px; font-weight:bold; font-size:14px;">
                {{ __('emails.discount.cta') }}
            </a>
        </div>

        <p style="margin-top:28px; line-height:1.7; color:#777; font-size:13px;">
            {{ __('emails.discount.marketing_note') }}
        </p>

        <p style="margin-top:18px; line-height:1.7; color:#999; font-size:12px;">
            {{ __('emails.discount.unsubscribe_question') }}
            <a href="{{ $unsubscribeUrl }}" style="color:#777;">
                {{ __('emails.discount.unsubscribe_link') }}
            </a>.
        </p>
    </div>

    <p style="text-align:center; color:#999; font-size:12px; margin-top:20px;">
        © {{ date('Y') }} {{ __('emails.discount.footer') }}
    </p>
</div>
</body>
</html>
