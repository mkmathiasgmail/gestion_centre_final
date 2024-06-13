<?php

use App\Http\Controllers\EvaluationController;
use Illuminate\Support\Facades\Route;

Route::get("/evaluations/monthlyPlanning", [EvaluationController::class, "monthlyPlanningExport"])->name("exportMonthPlan");

Route::resource("evaluations", EvaluationController::class);