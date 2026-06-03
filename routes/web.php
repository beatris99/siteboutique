<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\LeadNoteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/templates/{slug}', function () {
    return view('welcome');
})->name('templates.show');

Route::get('/politica-confidentialitate', function () {
    return view('legal.privacy');
})->name('privacy');

Route::get('/termeni-conditii', function () {
    return view('legal.terms');
})->name('terms');

Route::get('/politica-cookies', function () {
    return view('legal.cookies');
})->name('cookies');

Route::get('/sitemap.xml', function () {
    $baseUrl = rtrim(config('app.url'), '/');

    $urls = [
        ['loc' => $baseUrl . '/', 'priority' => '1.0'],
        ['loc' => $baseUrl . '/templates/business-essence', 'priority' => '0.8'],
        ['loc' => $baseUrl . '/templates/premium-studio', 'priority' => '0.8'],
        ['loc' => $baseUrl . '/templates/launch-page', 'priority' => '0.8'],
        ['loc' => $baseUrl . '/templates/conversion-flow', 'priority' => '0.8'],
        ['loc' => $baseUrl . '/templates/rental-flow', 'priority' => '0.8'],
        ['loc' => $baseUrl . '/templates/tourism-stay', 'priority' => '0.8'],
        ['loc' => $baseUrl . '/templates/simple-shop', 'priority' => '0.8'],
        ['loc' => $baseUrl . '/templates/premium-store', 'priority' => '0.8'],
        ['loc' => $baseUrl . '/templates/client-portal', 'priority' => '0.8'],
        ['loc' => $baseUrl . '/politica-confidentialitate', 'priority' => '0.3'],
        ['loc' => $baseUrl . '/termeni-conditii', 'priority' => '0.3'],
        ['loc' => $baseUrl . '/politica-cookies', 'priority' => '0.3'],
    ];

    return response()
        ->view('sitemap', compact('urls'))
        ->header('Content-Type', 'application/xml');
})->name('sitemap');

Route::post('/leads', [LeadController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('leads.store');

Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.store');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

Route::middleware('admin.auth')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', AdminDashboardController::class)->name('dashboard');

        Route::get('/leads', [LeadController::class, 'index'])->name('leads.index');
        Route::get('/leads/export', [LeadController::class, 'export'])->name('leads.export');

        Route::get('/leads/{lead}', [LeadController::class, 'show'])->name('leads.show');
        Route::get('/leads/{lead}/edit', [LeadController::class, 'edit'])->name('leads.edit');
        Route::put('/leads/{lead}', [LeadController::class, 'update'])->name('leads.update');

        Route::patch('/leads/{lead}/status', [LeadController::class, 'updateStatus'])->name('leads.update-status');
        Route::patch('/leads/{lead}/follow-up', [LeadController::class, 'updateFollowUp'])->name('leads.update-follow-up');

        Route::post('/leads/{lead}/notes', [LeadNoteController::class, 'store'])->name('leads.notes.store');

        Route::delete('/leads/{lead}', [LeadController::class, 'destroy'])->name('leads.destroy');
    });
