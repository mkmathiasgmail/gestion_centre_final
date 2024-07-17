<?php

use App\Http\Controllers\CertificatController;
use App\Models\Certificat;
use Illuminate\Support\Facades\Route;

Route::get('/certificatgenerer', [CertificatController::class, 'generateCertificat']);

Route::resource('/certificat', CertificatController::class);
