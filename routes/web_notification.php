<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\NotificationController;

Route::middleware('auth')->group(function () {
    Route::get('notifications/sendMail', [MailController::class, 'sendMail'])->name('sendMail');
    Route::get('notifications/autocomplete', [MailController::class, 'autocomplete'])->name('autocomplete');
    Route::resource('notifications', NotificationController::class);
})->middleware('permissions');

require __DIR__ . '/auth.php';

