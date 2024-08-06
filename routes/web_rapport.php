<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalendrierController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\MonthlyPlanningController;
use App\Http\Controllers\SuivieHebdomadaireController;

Route::middleware('auth')->group(function () {
    Route::get("/evaluations/monthlyPlanning", [MonthlyPlanningController::class, "monthlyPlanningExport"])->name("exportMonthPlan");
    Route::get("/evaluations/SuivieHebdomadaire", [SuivieHebdomadaireController::class, "suivieHebdomadaireExport"])->name("exportSuivieHebdo");
    Route::get("/evaluations/calexport", [CalendrierController::class, "export"])->name("calexport");
    Route::resource("evaluations", EvaluationController::class);
})->middleware('permissions');

require __DIR__ . '/auth.php';