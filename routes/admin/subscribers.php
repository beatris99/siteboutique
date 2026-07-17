<?php

use App\Http\Controllers\Admin\SubscriberController;
use Illuminate\Support\Facades\Route;

Route::middleware('admin.auth')
    ->prefix('admin/subscribers')
    ->name('admin.subscribers.')
    ->group(function () {
        Route::get('/', [SubscriberController::class, 'index'])
            ->name('index');

        Route::get('/export', [SubscriberController::class, 'export'])
            ->name('export');

        Route::post('/{subscriber}/resend', [SubscriberController::class, 'resend'])
            ->whereNumber('subscriber')
            ->name('resend');

        Route::patch('/{subscriber}/mark-used', [SubscriberController::class, 'markUsed'])
            ->whereNumber('subscriber')
            ->name('mark-used');

        Route::patch('/{subscriber}/mark-unused', [SubscriberController::class, 'markUnused'])
            ->whereNumber('subscriber')
            ->name('mark-unused');
    });
