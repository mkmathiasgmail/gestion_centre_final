<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployabiliteController;


Route::get('autocomplet', [EmployabiliteController::class, 'getAutocompleteData'])->name('autocomplet');
