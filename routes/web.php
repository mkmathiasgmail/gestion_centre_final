<?php

use App\Http\Controllers\ActiviteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [ActiviteController::class, 'chartActivity'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/web_activites.php';
require __DIR__.'/web_rapport.php';
require __DIR__.'/web_presence.php';
require __DIR__.'/web_candidatures.php';
require __DIR__.'/web_employabilite.php';

require __DIR__.'/web_semestriel_rapport.php';

require __DIR__.'/web_import.php';
require __DIR__.'/web_certificat.php';


require __DIR__.'/web_notif.php';