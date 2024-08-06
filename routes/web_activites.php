<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActiviteController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\HashtagController;
use App\Http\Controllers\TypeEventController;

Route::middleware('auth')->group(function () {
    Route::post('bookInSeat/{_id}', [ActiviteController::class, 'bookInSeat'])->name('bookInSeat');
    Route::post('IsEvent/{_id}', [ActiviteController::class, 'isEvent'])->name('IsEvent');
    Route::post('send/{_id}', [ActiviteController::class, 'status'])->name('send');
    Route::post('showInSlider/{_id}', [ActiviteController::class, 'showInSlider'])->name('showInSlider');
    Route::post('showInCalendar/{_id}', [ActiviteController::class, 'showInCalendar'])->name('showInCalendar'); 
    Route::get('/encours', [ActiviteController::class,'encours'])->name('encours');
    Route::resource('/activites', ActiviteController::class);
    Route::resource('/typevents',TypeEventController::class);
    Route::resource('/categories', CategorieController::class);
    Route::resource('/hashtags', HashtagController::class);

})->middleware('permissions');

require __DIR__ . '/auth.php';
