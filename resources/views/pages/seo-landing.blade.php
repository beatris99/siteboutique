@php
    $title = $page['title'] ?? 'SiteGo';
    $description = $page['description'] ?? 'Site-uri de prezentare pentru afaceri locale.';
    $canonical = 'https://sitego.ro/' . $slug;

    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'ProfessionalService',
        'name' => 'SiteGo',
        'url' => 'https://sitego.ro',
        'areaServed' => [
            '@type' => 'City',
            'name' => 'Brașov',
        ],
        'description' => $description,
        'email' => 'sitegobv@gmail.com',
        'telephone' => '+40747084861',
        'address' => [
            '@type' => 'PostalAddress',
            'addressLocality' => 'Brașov',
            'addressCountry' => 'RO',
        ],
        'serviceType' => $page['service_type'] ?? 'Web design',
    ];
@endphp
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} - SiteGo</title>
    <meta name="description" content="{{ $description }}">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ $canonical }}">
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link rel="shortcut icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <script type="application/ld+json">{!! json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}</script>
    <style>
        body { margin: 0; font-family: Arial, sans-serif; background: #f7f4ef; color: #162033; }
        a { color: inherit; }
        .page { max-width: 1120px; margin: 0 auto; padding: 28px 20px 64px; }
        .nav { display: flex; justify-content: space-between; align-items: center; gap: 16px; margin-bottom: 48px; }
        .brand { display: flex; align-items: center; gap: 10px; font-weight: 800; font-size: 22px; text-decoration: none; }
        .brand img { width: 34px; height: 34px; }
        .nav-links { display: flex; gap: 16px; flex-wrap: wrap; font-size: 14px; }
        .nav-links a { text-decoration: none; opacity: .78; }
        .hero { display: grid; grid-template-columns: 1.25fr .75fr; gap: 28px; align-items: stretch; }
        .card { background: rgba(255,255,255,.74); border: 1px solid rgba(22,32,51,.10); border-radius: 28px; box-shadow: 0 24px 80px rgba(22,32,51,.08); }
        .hero-main { padding: 42px; }
        .eyebrow { display: inline-flex; padding: 8px 12px; border-radius: 999px; background: #e9dfd2; font-size: 13px; font-weight: 700; margin-bottom: 18px; }
        h1 { font-size: clamp(34px, 5vw, 58px); line-height: 1.02; margin: 0 0 18px; letter-spacing: -0.04em; }
        .lead { font-size: 19px; line-height: 1.65; opacity: .82; margin: 0 0 26px; }
        .buttons { display: flex; gap: 12px; flex-wrap: wrap; }
        .btn { display: inline-flex; align-items: center; justify-content: center; padding: 14px 18px; border-radius: 999px; text-decoration: none; font-weight: 800; }
        .btn-primary { background: #162033; color: #fff; }
        .btn-secondary { background: #fff; border: 1px solid rgba(22,32,51,.14); }
        .side { padding: 28px; }
        .side h2 { margin: 0 0 14px; font-size: 22px; }
        .list { display: grid; gap: 12px; padding: 0; margin: 0; list-style: none; }
        .list li { padding: 14px; border-radius: 18px; background: #fff; border: 1px solid rgba(22,32,51,.08); }
        .section { margin-top: 28px; padding: 32px; }
        .grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; }
        .mini { padding: 20px; background: #fff; border-radius: 20px; border: 1px solid rgba(22,32,51,.08); }
        .mini h3 { margin: 0 0 10px; }
        .mini p, .section p { line-height: 1.65; opacity: .82; }
        .footer-cta { margin-top: 28px; padding: 34px; background: #162033; color: #fff; border-radius: 28px; }
        @media (max-width: 820px) {
            .hero, .grid { grid-template-columns: 1fr; }
            .hero-main, .section, .footer-cta { padding: 24px; }
            .nav { align-items: flex-start; flex-direction: column; }
        }
    </style>
</head>
<body>
    <main class="page">
        <nav class="nav">
            <a class="brand" href="https://sitego.ro">
                <img src="{{ asset('images/sitego-icon.svg') }}" alt="SiteGo">
                <span>SiteGo</span>
            </a>
            <div class="nav-links">
                <a href="https://sitego.ro/modele-site">Modele site</a>
                <a href="https://sitego.ro/configurator">Configurator</a>
                <a href="https://sitego.ro/site-facut-pentru-tine">Site făcut pentru tine</a>
            </div>
        </nav>

        <section class="hero">
            <div class="card hero-main">
                <div class="eyebrow">{{ $page['eyebrow'] }}</div>
                <h1>{{ $page['h1'] }}</h1>
                <p class="lead">{{ $page['intro'] }}</p>
                <div class="buttons">
                    <a class="btn btn-primary" href="https://sitego.ro/configurator">Configurează site-ul</a>
                    <a class="btn btn-secondary" href="https://wa.me/40747084861">Scrie-ne pe WhatsApp</a>
                </div>
            </div>

            <aside class="card side">
                <h2>Ce primești</h2>
                <ul class="list">
                    @foreach ($page['includes'] as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </aside>
        </section>

        <section class="card section">
            <h2>Pentru cine este potrivit</h2>
            <p>{{ $page['for_who'] }}</p>
        </section>

        <section class="grid">
            @foreach ($page['benefits'] as $benefit)
                <div class="mini">
                    <h3>{{ $benefit['title'] }}</h3>
                    <p>{{ $benefit['text'] }}</p>
                </div>
            @endforeach
        </section>

        <section class="card section">
            <h2>Cât durează și ce include procesul</h2>
            <p>{{ $page['process'] }}</p>
        </section>

        
        <!-- SITEGO SEO CROSS LINKS START -->
        <section class="card section">
            <h2>Servicii populare SiteGo</h2>
            <p>Poți explora și alte variante de site potrivite pentru afaceri locale, servicii, saloane, campanii sau promovare online.</p>
            <div class="grid">
                <a class="mini" style="display:block;text-decoration:none;color:inherit;" href="https://sitego.ro/creare-site-de-prezentare-brasov">
                    <h3>Creare site de prezentare Brașov</h3>
                    <p>Site clar pentru afaceri locale care vor să fie găsite mai ușor online.</p>
                </a>
                <a class="mini" style="display:block;text-decoration:none;color:inherit;" href="https://sitego.ro/web-design-brasov">
                    <h3>Web design Brașov</h3>
                    <p>Design modern, responsive și adaptat pentru telefon.</p>
                </a>
                <a class="mini" style="display:block;text-decoration:none;color:inherit;" href="https://sitego.ro/realizare-website-brasov">
                    <h3>Realizare website Brașov</h3>
                    <p>Website complet, de la structură și texte până la publicare.</p>
                </a>
                <a class="mini" style="display:block;text-decoration:none;color:inherit;" href="https://sitego.ro/landing-page-afaceri">
                    <h3>Landing page pentru afaceri</h3>
                    <p>Pagină concentrată pe o ofertă, un serviciu sau o campanie.</p>
                </a>
                <a class="mini" style="display:block;text-decoration:none;color:inherit;" href="https://sitego.ro/site-salon-beauty">
                    <h3>Site pentru salon beauty</h3>
                    <p>Prezentare elegantă pentru servicii beauty, programări și portofoliu.</p>
                </a>
                <a class="mini" style="display:block;text-decoration:none;color:inherit;" href="https://sitego.ro/cat-costa-un-site-de-prezentare-2026">
                    <h3>Cât costă un site în 2026?</h3>
                    <p>Ghid simplu despre buget, ce include și ce poate costa extra.</p>
                </a>
            </div>
        </section>
        <!-- SITEGO SEO CROSS LINKS END -->

        <section class="footer-cta">
            <h2>Vrei un site mai clar pentru afacerea ta?</h2>
            <p>Intră în configurator și vezi ce variantă ți se potrivește. Primești o estimare și putem discuta concret următorii pași.</p>
            <div class="buttons">
                <a class="btn btn-secondary" href="https://sitego.ro/configurator">Configurează site-ul</a>
                <a class="btn btn-secondary" href="https://sitego.ro/modele-site">Vezi modele de site</a>
            </div>
        </section>
    </main>
</body>
</html>
