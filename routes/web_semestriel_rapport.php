<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TypeEventController;
use App\Http\Controllers\RapportSemestrielController;

Route::get("rapportSemestriel/exportSemestriel", [RapportSemestrielController::class, "exportToExcel"])->name("exportSemestre");

Route::resource('rapportSemestriel', RapportSemestrielController::class);
