<?php

use App\Http\Controllers\EvaluationController;
use Illuminate\Support\Facades\Route;

Route::get("/evaluations/monthlyPlanning", [EvaluationController::class, "monthlyPlanningExport"])->name("exportMonthPlan");
Route::get("/evaluations/SuivieHebdomadaire", [EvaluationController::class, "suivieHebdomadaireExport"])->name("exportSuivieHebdo");

Route::resource("evaluations", EvaluationController::class);