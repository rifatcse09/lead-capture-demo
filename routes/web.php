<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeadController;

// EFFICIENCY: Routes are grouped and cached in production for better performance.

Route::get('/', function () {
    return view('welcome');
});


Route::get('/', [LeadController::class, 'create'])->name('lead.form');
Route::post('/leads', [LeadController::class, 'store'])->name('leads.store');
Route::get('/admin', [LeadController::class, 'index'])->name('admin.index');
