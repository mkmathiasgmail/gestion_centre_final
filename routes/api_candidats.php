<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidatController;
use App\Http\Controllers\Api\CandidatController as ApiCandidatController;

Route::apiResource('candidat', ApiCandidatController::class);