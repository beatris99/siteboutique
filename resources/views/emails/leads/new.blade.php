<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <title>Cerere nouă SiteBoutique</title>
</head>
<body style="margin:0; padding:0; background:#f7f4ef; font-family:Arial, sans-serif; color:#171717;">
@php
    $yesNo = function ($value) {
        if (is_null($value)) {
            return 'Nespecificat';
        }

        return $value ? 'Da' : 'Nu';
    };
@endphp

<div style="max-width:760px; margin:0 auto; padding:32px 16px;">
    <div style="background:#ffffff; border-radius:24px; padding:32px; border:1px solid #eee;">
        <p style="margin:0; font-size:12px; text-transform:uppercase; letter-spacing:3px; color:#8b6f47;">
            SiteBoutique Admin
        </p>

        <h1 style="margin:16px 0 0; font-size:30px;">
            Cerere nouă de la {{ $lead->name }}
        </h1>

        <div style="margin-top:24px; background:#f7f4ef; border-radius:18px; padding:20px;">
            <h2 style="margin:0 0 14px; font-size:20px;">Client</h2>

            <p><strong>Nume:</strong> {{ $lead->name }}</p>
            <p><strong>Email:</strong> {{ $lead->email ?: '-' }}</p>
            <p><strong>Telefon:</strong> {{ $lead->phone ?: '-' }}</p>
            <p><strong>Tip business:</strong> {{ $lead->business_type ?: 'Nespecificat' }}</p>
            <p><strong>Pagina sursă:</strong> {{ $lead->source_page ?: '-' }}</p>
        </div>

        <div style="margin-top:20px; background:#f7f4ef; border-radius:18px; padding:20px;">
            <h2 style="margin:0 0 14px; font-size:20px;">Detalii proiect</h2>

            <p><strong>Are logo?</strong> {{ $yesNo($lead->has_logo) }}</p>
            <p><strong>Are poze?</strong> {{ $yesNo($lead->has_photos) }}</p>
            <p><strong>Are domeniu?</strong> {{ $yesNo($lead->has_domain) }}</p>
            <p><strong>Buget aproximativ:</strong> {{ $lead->budget_range ?: 'Nespecificat' }}</p>
            <p><strong>Urgență:</strong> {{ $lead->urgency ?: 'Nespecificat' }}</p>
            <p><strong>Deadline dorit:</strong> {{ $lead->launch_deadline ? $lead->launch_deadline->format('d.m.Y') : 'Nespecificat' }}</p>
        </div>

        <div style="margin-top:20px; background:#171717; color:#ffffff; border-radius:18px; padding:20px;">
            <h2 style="margin:0 0 14px; font-size:20px;">Configurație</h2>

            <p><strong>Template:</strong> {{ $lead->selected_template ?: '-' }}</p>
            <p><strong>Categorie:</strong> {{ $lead->selected_category_label ?: '-' }}</p>
            <p><strong>Pachet:</strong> {{ $lead->selected_package_name ?: '-' }}</p>
            <p><strong>Preț estimativ:</strong> {{ $lead->total_price }} lei</p>

            @if(!empty($lead->selected_features))
                <p><strong>Extra-uri:</strong></p>
                <ul>
                    @foreach($lead->selected_features as $feature)
                        <li>{{ $feature }}</li>
                    @endforeach
                </ul>
            @endif
        </div>

        <div style="margin-top:20px; background:#f7f4ef; border-radius:18px; padding:20px;">
            <h2 style="margin:0 0 14px; font-size:20px;">Mesaj client</h2>

            <p style="white-space:pre-line; line-height:1.7;">
                {{ $lead->message ?: 'Nu a lăsat mesaj.' }}
            </p>
        </div>

        <div style="margin-top:20px; background:#f7f4ef; border-radius:18px; padding:20px;">
            <h2 style="margin:0 0 14px; font-size:20px;">Materiale de cerut</h2>

            <ul style="line-height:1.8;">
                @foreach($requirements as $requirement)
                    <li>{{ $requirement }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
</body>
</html>
