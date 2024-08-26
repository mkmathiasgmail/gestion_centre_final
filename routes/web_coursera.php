<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActiviteController;
use App\Http\Controllers\CourseraUsageController;
use App\Http\Controllers\CourseraMemberController;
use App\Http\Controllers\CourseraSpecialisationController;

Route::get('import-members', 
            [CourseraMemberController::class, 
            'import_members'])->name('import.members');
            
Route::post('import-members-csv', 
            [CourseraMemberController::class, 
            'import_members_csv'])->name('import.members.csv');



Route::get('import-specialisations', 
            [CourseraSpecialisationController::class, 
            'import_specialisations'])->name('import.specialisations');

Route::post('import-specialisations-csv', 
            [CourseraSpecialisationController::class, 
            'import_specialisations_csv'])->name('import.specialisations.csv');


Route::get('import-usages', [CourseraUsageController::class, 'import_usages'])->name('import.usages');
Route::post('import-usages-csv', [CourseraUsageController::class, 'import_usages_csv'])->name('import.usages.csv');

Route::get('rapports-coursera',[ActiviteController::class, 'coursera_rapport'])->name('coursera.rapports');