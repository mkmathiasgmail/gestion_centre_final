<?php
    use App\Http\Controllers\MailController;
    use Illuminate\Support\Facades\Route;



Route::get('/send-email',[MailController::class,'showForm']);
Route::post('/send-email', [MailController::class,'sendEmail'])->name('send.email');


