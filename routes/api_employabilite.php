<?php

use App\Http\Controllers\Api\SearchController;
use Illuminate\Support\Facades\Route;





Route::get('/autocomplete', [SearchController::class,'searchQuery'])->name('autocompleted');
Route::apiResource('employabilite', SearchController::class);