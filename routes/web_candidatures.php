<?php

use App\Http\Controllers\CandidatController;
use App\Http\Controllers\OdcuserController;
use Illuminate\Support\Facades\Route;

Route::resource('candidats', CandidatController::class);

// Routes for changing the status of a candidate
Route::post('/candidat/accept', [CandidatController::class, 'accept']);
Route::post('/candidat/decline', [CandidatController::class, 'decline']);
Route::post('/candidat/wait', [CandidatController::class, 'wait']);

Route::get('generate_excel/{event}', [CandidatController::class, 'generateExcel'])->name('generate_excel');
Route::resource('odcusers', OdcuserController::class);
