<?php

use App\Http\Controllers\LeadController;
use App\Http\Controllers\SubscriptionController;
use Illuminate\Support\Facades\Route;

Route::post('/leads', [LeadController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('leads.store');

Route::post('/subscribe', [SubscriptionController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('subscribe');

Route::post('/newsletter/subscribe', [SubscriptionController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('newsletter.subscribe');

Route::post('/newsletter/unsubscribe', [SubscriptionController::class, 'unsubscribe'])
    ->middleware('throttle:5,1')
    ->name('newsletter.unsubscribe');

Route::get(
    '/newsletter/unsubscribe/{token}',
    [SubscriptionController::class, 'unsubscribeByToken']
)
    ->where('token', '[A-Za-z0-9]{32,80}')
    ->name('newsletter.unsubscribe.token');
