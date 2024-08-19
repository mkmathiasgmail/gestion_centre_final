<?php

use App\Http\Controllers\CandidatController;
use App\Http\Controllers\OdcuserController;
use Illuminate\Support\Facades\Route;

Route::resource('candidats', CandidatController::class);

// Route for changing a candidate status
Route::post('/candidat/{status}', [CandidatController::class, 'updateStatus']);

Route::get('generate_excel/{event}', [CandidatController::class, 'generateExcel'])->name('generate_excel');
