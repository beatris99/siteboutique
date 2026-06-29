<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dezabonare newsletter - SiteGo</title>
    <meta name="robots" content="noindex, nofollow">
    <style>
        body { margin: 0; background: #f7f4ef; color: #171717; font-family: Arial, sans-serif; }
        .wrap { min-height: 100vh; display: grid; place-items: center; padding: 24px; }
        .card { max-width: 560px; background: #fff; border: 1px solid #e8e0d3; border-radius: 28px; padding: 36px; box-shadow: 0 24px 80px rgba(23,23,23,.08); }
        .eyebrow { margin: 0 0 14px; color: #9a7438; text-transform: uppercase; letter-spacing: 3px; font-size: 12px; font-weight: 700; }
        h1 { margin: 0; font-size: 34px; line-height: 1.1; }
        p { color: #555; line-height: 1.7; }
        a { display: inline-flex; margin-top: 12px; background: #171717; color: #fff; text-decoration: none; border-radius: 999px; padding: 13px 22px; font-weight: 700; }
    </style>
</head>
<body>
<div class="wrap">
    <main class="card">
        <p class="eyebrow">SiteGo newsletter</p>
        <h1>Ai fost dezabonat/ă.</h1>
        <p>Adresa {{ $subscriber->email }} nu va mai primi mesajele noastre de newsletter. Dacă a fost o greșeală, te poți abona din nou de pe site.</p>
        <a href="{{ config('app.url') }}">Înapoi pe site</a>
    </main>
</div>
</body>
</html>
