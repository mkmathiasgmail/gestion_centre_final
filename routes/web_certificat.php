<?php

use App\Http\Controllers\CertificatController;
use App\Models\Certificat;
use Illuminate\Support\Facades\Route;

Route::get('/certificatgenerer/{tshor}', [CertificatController::class, 'generateCertificat'])->name('certificat');

Route::get('/generateAllCertificat/{id}', [CertificatController::class, 'generateAllCertificat'])->name('allCertificat');
Route::get('/vuecertificat/{id}', [CertificatController::class, 'vuecertificat'])->name('voircertificat');

Route::resource('/certificats', CertificatController::class);
