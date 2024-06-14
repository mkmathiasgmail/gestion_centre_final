<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImportController;


Route::get('import', [ImportController::class, 'index'])->name('import');
