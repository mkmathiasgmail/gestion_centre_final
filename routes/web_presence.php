<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\PresenceController;

Route::get('codeqr', [QrCodeController::class, 'index'])->name('codeqr')->middleware('permissions');
Route::resource('presences', PresenceController::class)->middleware('permissions');

// client routes

Route::post('/filtrer', [PresenceController::class, 'filtrer'])->name('filtrer');
Route::get('/activitencours', [PresenceController::class, 'encours'])->name('activitencours');
Route::get('/confirmation', [PresenceController::class, 'confirmation'])->name('confirmation');
