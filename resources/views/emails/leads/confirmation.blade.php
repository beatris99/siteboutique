<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <title>Am primit cererea ta</title>
</head>
<body style="margin:0; padding:0; background:#f7f4ef; font-family:Arial, sans-serif; color:#171717;">
<div style="max-width:680px; margin:0 auto; padding:32px 16px;">
    <div style="background:#ffffff; border-radius:24px; padding:32px; border:1px solid #eee;">
        <p style="margin:0; font-size:12px; text-transform:uppercase; letter-spacing:3px; color:#8b6f47;">
            SiteBoutique
        </p>

        <h1 style="margin:16px 0 0; font-size:30px;">
            Bună, {{ $lead->name }}!
        </h1>

        <p style="line-height:1.7; color:#555;">
            Am primit cererea ta și configurația aleasă. Revin cu un mesaj pentru clarificări și pentru oferta finală.
        </p>

        <div style="margin-top:24px; background:#f7f4ef; border-radius:18px; padding:20px;">
            <h2 style="margin:0 0 14px; font-size:20px;">Configurația trimisă</h2>

            <p><strong>Template:</strong> {{ $lead->selected_template ?: '-' }}</p>
            <p><strong>Pachet:</strong> {{ $lead->selected_package_name ?: '-' }}</p>
            <p><strong>Preț estimativ:</strong> {{ $lead->total_price }} lei</p>
            <p><strong>Buget aproximativ:</strong> {{ $lead->budget_range ?: 'Nespecificat' }}</p>
            <p><strong>Urgență:</strong> {{ $lead->urgency ?: 'Nespecificat' }}</p>

            @if(!empty($lead->selected_features))
                <p><strong>Extra-uri:</strong></p>
                <ul>
                    @foreach($lead->selected_features as $feature)
                        <li>{{ $feature }}</li>
                    @endforeach
                </ul>
            @endif
        </div>

        <div style="margin-top:24px; background:#171717; color:#ffffff; border-radius:18px; padding:20px;">
            <h2 style="margin:0 0 14px; font-size:20px;">
                Ca să pot face oferta finală, pregătește:
            </h2>

            <ul style="line-height:1.8;">
                @foreach($requirements as $requirement)
                    <li>{{ $requirement }}</li>
                @endforeach
            </ul>
        </div>

        <p style="margin-top:24px; line-height:1.7; color:#555;">
            Prețul trimis prin configurator este estimativ. Oferta finală se stabilește după ce verific cererea și materialele disponibile.
        </p>

        <p style="margin-top:24px; line-height:1.7; color:#555;">
            Mulțumesc,<br>
            SiteBoutique
        </p>
    </div>
</div>
</body>
</html>
