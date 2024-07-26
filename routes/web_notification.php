<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationController;

Route::get('notifications/sendMail', [NotificationController::class, 'sendMail'])->name('sendMail');

Route::resource('notifications', NotificationController::class);
