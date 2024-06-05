<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActiviteController;


Route::middleware('auth')->group(function () {
    Route::get('/encours', [ActiviteController::class,'encours'])->name('encours');
    Route::resource('/activites', ActiviteController::class);
});

require __DIR__ . '/auth.php';
