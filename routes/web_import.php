<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImportControl;
use App\Http\Controllers\ImportController;


Route::get('import', [ImportControl::class, 'index'])->name('import')->middleware('permissions');;
Route::post('import', [ImportControl::class, 'import'])->name('import')->middleware('permissions');;
//Route::get('import', [ImportControl::class, 'indexacti'])->name('import.activite')->middleware('permissions');;
//Route::post('activites/import', [ImportControl::class, 'importInActivity'])->name('activites.import')->middleware('permissions');;

