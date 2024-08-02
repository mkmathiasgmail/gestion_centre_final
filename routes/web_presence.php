<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\PresenceController;
use App\Http\Controllers\Api\PresenceAutocomplete;

Route::get('codeqr', [QrCodeController::class, 'index'])->name('codeqr')->middleware('permissions');
Route::get('generate/{id}', [QrCodeController::class, 'generateQrCode'])->name('generateQrCode');
Route::post('storeqrcode/{id}', [QrCodeController::class, 'store'])->name('storeqrcode');
// Route::resource('presences', PresenceController::class)->middleware('permissions');
Route::get('create/{id}', [PresenceController::class, 'create'])->name('create');
Route::get('presences', [PresenceController::class, 'index'])->name('presences.index');
Route::post('presences.store', [PresenceController::class, 'store'])->name('presences.store');
Route::post('userlocal', [PresenceController::class, 'userlocal'])->name('userlocal');
Route::get('security', function () {
    return view('presences.securite');
});
Route::get('scanner', function () {
    return view('presences.camera');
})->name('scanner');


// client routes
Route::post('/filtrer/{id}', [PresenceController::class, 'filtrer'])->name('filtrer');
Route::get('/activitencours', [PresenceController::class, 'encours'])->name('activitencours');
Route::get('/confirmation', [PresenceController::class, 'confirmation'])->name('confirmation');
