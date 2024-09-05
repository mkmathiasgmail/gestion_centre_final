<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TypeContratController;
use App\Http\Controllers\EmployabiliteController;

Route::get('get_emplois/{id}', [EmployabiliteController::class, 'getEmplois'])->name('getdataEmploye');

Route::get('get_emplois/{id}', [EmployabiliteController::class, 'getEmplois'])->name('getdataEmploye');

Route::resource('type_Contrats', TypeContratController::class);

Route::resource('/user_role',UserController::class)->middleware('permissions:super-admin');

Route::post('/assignRoles/{role}/{user}', [RoleController::class,'assignRoles'])->name('assign_role');

  Route::post('/desactiverRoles/{role}/{user}', [RoleController::class,'desactiverRoles'])->name('desactiver_role');

Route::resource('employabilites', EmployabiliteController::class)->middleware('permissions:admin');