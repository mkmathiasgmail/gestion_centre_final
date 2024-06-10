<?php

use App\Http\Controllers\Api\OdcuserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('odcusers', OdcuserController::class);
