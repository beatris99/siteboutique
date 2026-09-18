@php
    $locale = app()->getLocale() === 'en' ? 'en' : 'ro';

    $copy = [
        'ro' => [
            'title' => 'Politica cookies',
            'intro' => 'Această politică explică modul în care SiteGo poate folosi cookies sau tehnologii similare.',
            'what_title' => 'Ce sunt cookies',
            'what_text' =>
                'Cookies sunt fișiere mici salvate în browser, folosite pentru funcționarea site-ului, preferințe, analiză sau servicii externe.',
            'necessary_title' => 'Cookies necesare',
            'necessary_text' =>
                'Site-ul poate folosi cookies necesare pentru funcționare, securitate, sesiuni sau protecție împotriva abuzurilor.',
            'analytics_title' => 'Analytics și tracking',
            'analytics_text' =>
                'Dacă vor fi activate servicii precum Google Analytics, Meta Pixel sau alte instrumente de măsurare, acestea pot folosi cookies pentru statistici și optimizare.',
            'control_title' => 'Controlul cookies',
            'control_text' =>
                'Utilizatorul poate controla sau șterge cookies din setările browserului. Dezactivarea anumitor cookies poate afecta funcționarea unor părți ale site-ului.',
            'updates_title' => 'Actualizări',
            'updates_text' =>
                'Politica de cookies poate fi actualizată atunci când se adaugă servicii noi de analiză, marketing sau funcționalitate.',
        ],
        'en' => [
            'title' => 'Cookie policy',
            'intro' => 'This policy explains how SiteGo may use cookies or similar technologies.',
            'what_title' => 'What cookies are',
            'what_text' =>
                'Cookies are small files stored in the browser, used for website functionality, preferences, analytics or external services.',
            'necessary_title' => 'Necessary cookies',
            'necessary_text' =>
                'The website may use necessary cookies for functionality, security, sessions or abuse protection.',
            'analytics_title' => 'Analytics and tracking',
            'analytics_text' =>
                'If services such as Google Analytics, Meta Pixel or other measurement tools are enabled, they may use cookies for statistics and optimisation.',
            'control_title' => 'Cookie control',
            'control_text' =>
                'Users can control or delete cookies from their browser settings. Disabling certain cookies may affect how some parts of the website work.',
            'updates_title' => 'Updates',
            'updates_text' =>
                'The cookie policy may be updated whenever new analytics, marketing or functionality services are added.',
        ],
    ][$locale];
@endphp

@extends('legal.layout')

@section('title', $copy['title'])
@section('page-title', $copy['title'])

@section('content')
    <p>{{ $copy['intro'] }}</p>

    <h2>{{ $copy['what_title'] }}</h2>
    <p>{{ $copy['what_text'] }}</p>

    <h2>{{ $copy['necessary_title'] }}</h2>
    <p>{{ $copy['necessary_text'] }}</p>

    <h2>{{ $copy['analytics_title'] }}</h2>
    <p>{{ $copy['analytics_text'] }}</p>

    <h2>{{ $copy['control_title'] }}</h2>
    <p>{{ $copy['control_text'] }}</p>

    <h2>{{ $copy['updates_title'] }}</h2>
    <p>{{ $copy['updates_text'] }}</p>
@endsection
