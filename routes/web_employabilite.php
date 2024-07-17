<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployabiliteController;




Route::resource('/user_role',UserController::class)->middleware('permissions');

Route::post('/assignRoles/{role}/{user}', [RoleController::class,'assignRoles'])->name('assign_role')->middleware('permissions');

  Route::post('/desactiverRoles/{role}/{user}', [RoleController::class,'desactiverRoles'])->name('desactiver_role')->middleware('permissions');

Route::resource('employabilites', EmployabiliteController::class)->middleware('permissions');





