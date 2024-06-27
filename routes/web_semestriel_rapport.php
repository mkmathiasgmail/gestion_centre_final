<?php

use App\Http\Controllers\EvaluationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TypeEventController;
use App\Http\Controllers\RapportSemestrielController;

Route::get("rapportSemestriel/exportSemestriel", [RapportSemestrielController::class, "exportToExcel"])->name("exportSemestre");
Route::post("rapportwenzory",[EvaluationController::class, "wenzory"])->name("exportWenzory");

Route::resource('rapportSemestriel', RapportSemestrielController::class);
