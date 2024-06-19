<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RapportSemestrielController;

Route::get("rapportSemestriel/exportSemestriel", [RapportSemestrielController::class, "exportToExcel"])->name("exportSemestre");
Route::post("typeEvents","getEvents")->name('get-Events');

Route::resource('rapportSemestriel', RapportSemestrielController::class);
