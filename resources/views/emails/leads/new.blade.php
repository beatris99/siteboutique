<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <title>Cerere nouă SiteBoutique</title>
</head>
<body style="font-family: Arial, sans-serif; color: #171717; line-height: 1.6;">
@php
    $features = is_array($lead->selected_features)
        ? $lead->selected_features
        : json_decode($lead->selected_features ?? '[]', true);
@endphp

<h1>Cerere nouă SiteBoutique</h1>

<p>Ai primit o cerere nouă din configurator.</p>

<h2>Client</h2>

<p>
    <strong>Nume:</strong> {{ $lead->name }}<br>
    <strong>Email:</strong> {{ $lead->email ?: '-' }}<br>
    <strong>Telefon:</strong> {{ $lead->phone ?: '-' }}
</p>

<h2>Configurație</h2>

<p>
    <strong>Categorie:</strong> {{ $lead->selected_category_label ?: '-' }}<br>
    <strong>Template:</strong> {{ $lead->selected_template }}<br>
    <strong>Pachet:</strong> {{ $lead->selected_package_name ?: '-' }}<br>
    <strong>Total estimativ:</strong> {{ number_format($lead->total_price, 0, ',', '.') }} lei
</p>

<h2>Funcții extra</h2>

@if(!empty($features))
    <ul>
        @foreach($features as $feature)
            <li>{{ $feature }}</li>
        @endforeach
    </ul>
@else
    <p>Fără funcții extra selectate.</p>
@endif

<h2>Mesaj</h2>

<p>
    {!! nl2br(e($lead->message ?: 'Clientul nu a lăsat mesaj.')) !!}
</p>

<p>
    <a href="{{ route('admin.leads.show', $lead) }}">
        Vezi cererea în admin
    </a>
</p>
</body>
</html>
