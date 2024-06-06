<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QrCodeController;
Route::get('codeqr',[QrCodeController::class, 'generate']);