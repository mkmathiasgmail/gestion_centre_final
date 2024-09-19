<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OdcuserController;
use App\Models\Odcuser;

Route::get('get_users', [OdcuserController::class, 'getUsers'])->name('getdata');
Route::get('/odcusers/search', [OdcuserController::class, 'search'])->name('odcusers.search');
Route::resource('odcusers', OdcuserController::class);
