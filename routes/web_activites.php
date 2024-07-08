<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActiviteController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\HashtagController;
use App\Http\Controllers\TypeEventController;

Route::middleware('auth')->group(function () {
    Route::get('/encours', [ActiviteController::class,'encours'])->name('encours')->middleware('permissions');
    Route::resource('/activites', ActiviteController::class)->middleware('permissions');
    Route::resource('/typevents',TypeEventController::class)->middleware('permissions');
    Route::resource('/categories', CategorieController::class)->middleware('permissions');
    Route::resource('/hashtags', HashtagController::class)->middleware('permissions');
});

require __DIR__ . '/auth.php';
