<?php

use App\Http\Controllers\EvaluationController;
use Illuminate\Support\Facades\Route;

Route::resource("evaluations", EvaluationController::class);