<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\PresenceController;

Route::get('codeqr', [QrCodeController::class, 'index']);
Route::resource('presences', PresenceController::class);
Route::post('/filtrer', [PresenceController::class, 'filtrer'])->name('filtrer');
Route::get('/activitencours', [PresenceController::class, 'encours'])->name('activitencours');
