<?php

use App\Http\Controllers\EmployabiliteController;
use Illuminate\Support\Facades\Route;



Route::resource('/employabilite', EmployabiliteController::class);

