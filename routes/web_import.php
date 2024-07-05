<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImportControl;
use App\Http\Controllers\ImportController;


Route::get('import', [ImportControl::class, 'index'])->name('import');
Route::post('import', [ImportControl::class, 'import'])->name('import');
Route::get('activites/{activite}/import', [ImportControl::class, 'indexacti'])->name('import.activite');
Route::post('activites/{activite}/import', [ImportControl::class, 'importInActivity'])->name('activites.import');

