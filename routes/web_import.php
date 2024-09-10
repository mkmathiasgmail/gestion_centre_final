<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImportControl;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\ImportController;


Route::get('import', [ImportControl::class, 'index'])->name('import')->middleware('permissions');
Route::post('import', [ImportControl::class, 'import'])->name('import')->middleware('permissions');
Route::get('import', [ImportControl::class, 'indexacti'])->name('import.activite')->middleware('permissions');
//Route::post('activites/import', [ImportControl::class, 'importInActivity'])->name('activites.import')->middleware('permissions');;
//Route::get('/download/{filename}', [ImportControl::class, 'download'])->name('file.download');
//Route::post('/export', [ImportControl::class, 'download'])->name('export');
Route::post('/export', [ImportControl::class, 'exportModel'])->name('export');
Route::post('/exportParticipant', [ImportControl::class, 'exportParticipant'])->name('exportParticipant');
Route::post('/importAndgenerate', [ImportControl::class, 'importAndgenerate'])->name('importAndgenerate');
Route::get('/generateAllCertificat/{id}', [ImportControl::class, 'generateAllCertificat'])->name('allCertificat');

