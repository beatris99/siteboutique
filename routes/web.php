<?php

use App\Http\Controllers\LeadController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/leads', [LeadController::class, 'store'])->name('leads.store');

Route::get('/admin/leads', [LeadController::class, 'index'])->name('admin.leads.index');
Route::patch('/admin/leads/{lead}/status', [LeadController::class, 'updateStatus'])->name('admin.leads.update-status');
