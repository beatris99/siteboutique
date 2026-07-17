<?php

use Illuminate\Support\Facades\Route;

Route::get('/language/{locale}', function (string $locale) {
    if (! in_array($locale, ['ro', 'en'], true)) {
        abort(404);
    }

    session(['locale' => $locale]);

    return back();
})
    ->whereIn('locale', ['ro', 'en'])
    ->name('language.switch');

Route::view('/', 'welcome')->name('home');

Route::view('/modele-site', 'welcome')
    ->name('templates.index');

Route::view('/configurator', 'welcome')
    ->name('configurator');

Route::view('/contact', 'welcome')
    ->name('contact');

Route::view('/portofoliu', 'welcome')
    ->name('portfolio.index');

Route::view('/portofoliu/rentride', 'welcome')
    ->name('portfolio.rentride');

Route::view('/portofoliu/access-bars-beatris', 'welcome')
    ->name('portfolio.access-bars-beatris');

Route::view('/templates/{slug}', 'welcome')
    ->where('slug', '[A-Za-z0-9-]+')
    ->name('templates.show');

Route::view('/cum-lucram', 'pages.work-process')
    ->name('work-process');

Route::view('/realizare-site-uri', 'pages.realizare-site-uri')
    ->name('seo.websites');

Route::view('/preturi', 'pages.pricing')
    ->name('pricing');

Route::view('/intrebari-frecvente', 'pages.faq')
    ->name('faq');

Route::view('/site-facut-pentru-tine', 'pages.done-for-you')
    ->name('done-for-you');

Route::view('/politica-confidentialitate', 'legal.privacy')
    ->name('privacy');

Route::view('/termeni-conditii', 'legal.terms')
    ->name('terms');

Route::view('/politica-cookies', 'legal.cookies')
    ->name('cookies');
