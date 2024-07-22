<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\PresenceController;
use App\Http\Controllers\Api\PresenceAutocomplete;


Route::get('generate/{id}', [QrCodeController::class, 'generateQrCode'])->name('generateQrCode');
Route::post('storeqrcode/{id}', [QrCodeController::class, 'store'])->name('storeqrcode');
// Route::resource('presences', PresenceController::class)->middleware('permissions');
Route::get('create/{id}', [PresenceController::class, 'create'])->name('create');
Route::get('presences', [PresenceController::class, 'index'])->name('presences.index');
Route::post('presences.store', [PresenceController::class, 'store'])->name('presences.store');
Route::post('userlocal', [PresenceController::class, 'userlocal'])->name('userlocal');

// client routes

Route::get('/confirmation', [PresenceController::class, 'confirmation'])->name('confirmation');
