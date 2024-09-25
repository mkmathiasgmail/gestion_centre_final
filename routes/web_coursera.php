<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActiviteController;
use App\Http\Controllers\CourseraController;
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

Route::get('rapports-coursera',[CourseraController::class, 'rapport_invitation'])->name('coursera.rapports');
Route::get("coursera-licence_encours", [CourseraController::class, "licence_encours"])->name("licencesCoursera");
Route::get('cursera-certificat_obtenue', [CourseraController::class, 'certificat_obtenue'])->name('certificatscursera');
Route::get('cursera-memmbre_30day', [CourseraController::class, 'memmbre_30day'])->name('membre_30days');
Route::get('cursera-non_inscrit_cours', [CourseraController::class, 'non_inscrit_cours'])->name('non_inscrit_coursera');
Route::get('cursera-taux_utilisation', [CourseraController::class, 'taux_utilisation'])->name('taux_utilisation');
Route::get('cursera-last_activity', [CourseraController::class, 'last_activity'])->name('last_activity');