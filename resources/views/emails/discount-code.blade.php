<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <title>Codul tău de 10% - SiteGo</title>
</head>
<body style="margin:0; padding:0; background:#f7f4ef; font-family:Arial, sans-serif; color:#171717;">
@php
    $unsubscribeUrl = $subscriber->unsubscribe_token
        ? route('newsletter.unsubscribe.token', $subscriber->unsubscribe_token)
        : config('app.url');
@endphp
<div style="max-width:680px; margin:0 auto; padding:32px 16px;">
    <div style="background:#ffffff; border-radius:24px; padding:32px; border:1px solid #eee;">
        <p style="margin:0; font-size:12px; text-transform:uppercase; letter-spacing:3px; color:#8b6f47;">
            SiteGo
        </p>

        <h1 style="margin:16px 0 0; font-size:30px;">
            Codul tău de 10%
        </h1>

        <p style="line-height:1.7; color:#555;">
            Mulțumim că te-ai abonat! Acesta este codul tău personal de reducere. Îl poți menționa când ne scrii despre proiectul tău.
        </p>

        <div style="margin-top:24px; background:#171717; border-radius:18px; padding:28px; text-align:center;">
            <p style="margin:0; font-size:12px; text-transform:uppercase; letter-spacing:3px; color:#d8c3a5;">
                Reducere {{ $subscriber->discount_percent }}%
            </p>
            <p style="margin:10px 0 0; font-size:34px; font-weight:bold; letter-spacing:4px; color:#ffffff;">
                {{ $subscriber->discount_code }}
            </p>
        </div>

        <div style="margin-top:28px; text-align:center;">
            <a href="{{ config('app.url') }}/#contact"
               style="display:inline-block; background:#171717; color:#ffffff; text-decoration:none; padding:14px 28px; border-radius:999px; font-weight:bold; font-size:14px;">
                Hai să vorbim
            </a>
        </div>

        <p style="margin-top:28px; line-height:1.7; color:#777; font-size:13px;">
            Codul este personal. Dacă nu tu ai cerut acest email, îl poți ignora.
        </p>

        <p style="margin-top:18px; line-height:1.7; color:#999; font-size:12px;">
            Nu mai vrei să primești mesaje de la SiteGo?
            <a href="{{ $unsubscribeUrl }}" style="color:#777;">Dezabonează-te aici</a>.
        </p>
    </div>

    <p style="text-align:center; color:#999; font-size:12px; margin-top:20px;">
        © {{ date('Y') }} SiteGo · Brașov
    </p>
</div>
</body>
</html>
