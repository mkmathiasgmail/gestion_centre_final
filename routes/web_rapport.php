<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalendrierController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\MonthlyPlanningController;
use App\Http\Controllers\SuivieHebdomadaireController;

Route::get("/evaluations/monthlyPlanning", [MonthlyPlanningController::class, "monthlyPlanningExport"])->name("exportMonthPlan");
Route::get("/evaluations/SuivieHebdomadaire", [SuivieHebdomadaireController::class, "suivieHebdomadaireExport"])->name("exportSuivieHebdo");
Route::get("/evaluations/calendrier", [CalendrierController::class, "export"])->name("calexport");

Route::resource("evaluations", EvaluationController::class);