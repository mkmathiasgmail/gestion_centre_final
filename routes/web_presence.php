<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\PresenceController;
use App\Http\Controllers\Api\PresenceAutocomplete;

Route::get('codeqr', [QrCodeController::class, 'index'])->name('codeqr')->middleware('permissions');
// Route::resource('presences', PresenceController::class)->middleware('permissions');
Route::get('create/{id}', [PresenceController::class, 'create'])->name('create');
Route::get('presences.index', [PresenceController::class, 'index'])->name('presences.index');
Route::post('presences.store', [PresenceController::class, 'store'])->name('presences.store');
// client routes
Route::post('/filtrer/{id}', [PresenceController::class, 'filtrer'])->name('filtrer');
Route::get('/activitencours', [PresenceController::class, 'encours'])->name('activitencours');
Route::get('/confirmation', [PresenceController::class, 'confirmation'])->name('confirmation');
