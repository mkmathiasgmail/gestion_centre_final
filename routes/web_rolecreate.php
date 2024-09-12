<?php

namespace App\Http\Controllers;

use App\Http\Controllers\RoleCreateController;
use Illuminate\Support\Facades\Route;


// Route::resource('/create', 'RoleCreateController::class)->name('create');
Route::resource('role', RoleCreateController::class);