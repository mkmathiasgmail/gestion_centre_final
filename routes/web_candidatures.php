<?php

use App\Http\Controllers\CandidatController;
use App\Http\Controllers\OdcuserController;
use Illuminate\Support\Facades\Route;

Route::resource('candidats', CandidatController::class);
Route::get('candidat_validate/{id}', [CandidatController::class, 'validate'])->name('candidat_validate');
Route::get('candidat_reject/{id}', [CandidatController::class, 'reject'])->name('candidat_reject');
Route::get('candidat_await/{id}', [CandidatController::class, 'await'])->name('candidat_await');
Route::resource('odcusers', OdcuserController::class);
