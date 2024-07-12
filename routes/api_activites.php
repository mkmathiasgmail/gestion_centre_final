<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ActiviteController;

Route::apiResource('activite',ActiviteController::class)->middleware('permissions');

Route::get('recent-activites', [ActiviteController::class, 'getActiviteRecent'])->name('activite.recent');

