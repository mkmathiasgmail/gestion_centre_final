<?php

use App\Http\Controllers\CandidatController;
use Illuminate\Support\Facades\Route;

Route::resource('candidats', CandidatController::class);

// Route for changing a candidate status
Route::post('/candidat/{status}', [CandidatController::class, 'updateStatus']);

Route::get('generate_excel/{event}', [CandidatController::class, 'generateExcel'])->name('generate_excel');
Route::get('get_candidats/{id_event}', [CandidatController::class, 'getCandidats'])->name('getcandidats');
Route::get('get_participants/{id_event}', [CandidatController::class, 'getParticipants'])->name('getparticipants');
