<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\LoginController;

Route::post('/login',[LoginController::class,'login']);