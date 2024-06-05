<?php

use App\Http\Controllers\CandidatController;
use App\Http\Controllers\OdcuserController;
use Illuminate\Support\Facades\Route;

Route::resource('candidats', CandidatController::class);
Route::resource('odcusers', OdcuserController::class);
