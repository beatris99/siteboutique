<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SiteBoutique - Site-uri moderne pentru afaceri</title>

    <meta
        name="description"
        content="Site-uri moderne, configurabile și transparente pentru afaceri care vor să se lanseze rapid. Alege template-ul, pachetul și funcțiile dorite."
    >

    <meta name="robots" content="index, follow">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta property="og:title" content="SiteBoutique - Site-uri moderne pentru afaceri">
    <meta
        property="og:description"
        content="Alege un template, configurează funcțiile și vezi prețul estimativ pentru site-ul tău."
    >
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ config('app.url') }}">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="SiteBoutique - Site-uri moderne pentru afaceri">
    <meta
        name="twitter:description"
        content="Site-uri configurabile, preț transparent și lansare rapidă pentru afaceri."
    >

    <link rel="canonical" href="{{ config('app.url') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div id="app"></div>
</body>
</html>
