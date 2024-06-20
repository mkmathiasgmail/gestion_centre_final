<?php

use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\MonthlyPlanningController;
use App\Http\Controllers\SuivieHebdomadaireController;
use Illuminate\Support\Facades\Route;

Route::get("/evaluations/monthlyPlanning", [MonthlyPlanningController::class, "monthlyPlanningExport"])->name("exportMonthPlan");
Route::get("/evaluations/SuivieHebdomadaire", [SuivieHebdomadaireController::class, "suivieHebdomadaireExport"])->name("exportSuivieHebdo");

Route::resource("evaluations", EvaluationController::class);