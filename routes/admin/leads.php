<?php

use App\Http\Controllers\LeadController;
use App\Http\Controllers\LeadNoteController;
use Illuminate\Support\Facades\Route;

Route::middleware('admin.auth')
    ->prefix('admin/leads')
    ->name('admin.leads.')
    ->group(function () {
        Route::get('/', [LeadController::class, 'index'])
            ->name('index');

        Route::get('/export', [LeadController::class, 'export'])
            ->name('export');

        Route::get('/{lead}', [LeadController::class, 'show'])
            ->whereNumber('lead')
            ->name('show');

        Route::get('/{lead}/offer', [LeadController::class, 'offer'])
            ->whereNumber('lead')
            ->name('offer');

        Route::get('/{lead}/edit', [LeadController::class, 'edit'])
            ->whereNumber('lead')
            ->name('edit');

        Route::put('/{lead}', [LeadController::class, 'update'])
            ->whereNumber('lead')
            ->name('update');

        Route::patch('/{lead}/status', [LeadController::class, 'updateStatus'])
            ->whereNumber('lead')
            ->name('update-status');

        Route::patch('/{lead}/follow-up', [LeadController::class, 'updateFollowUp'])
            ->whereNumber('lead')
            ->name('update-follow-up');

        Route::post('/{lead}/notes', [LeadNoteController::class, 'store'])
            ->whereNumber('lead')
            ->name('notes.store');

        Route::delete('/{lead}', [LeadController::class, 'destroy'])
            ->whereNumber('lead')
            ->name('destroy');
    });
