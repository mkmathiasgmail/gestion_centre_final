<?php

use App\Http\Controllers\CertificatController;
use Illuminate\Support\Facades\Route;

Route::resource('/certificat', CertificatController::class);