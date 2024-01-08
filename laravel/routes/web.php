<?php
use App\Http\Controllers\VisitesController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\MedicamentController;
use App\Http\Controllers\ProSanteController;
use App\Http\Controllers\RapportController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/accueil', function () {
    dd('connected');
})->middleware('auth')->name('accueil');



Route::prefix('visites')->group(function ()
    {
        Route::get('/planning', [VisitesController::class, 'showPlanning'])->name('planning');
        //route qui affiche une page
        Route::get('/create', [VisitesController::class, 'show']);
        //route qui valide un form
        Route::post('/create', [VisitesController::class, 'createVisite'])->name('creation_visite');


    });

Route::prefix('employes')->group(function ()
    {
        Route::get('/create/employe',[EmployeController::class, 'showEmploye']);
        Route::get('/create/responsable',[EmployeController::class, 'showResponsable']);
        Route::get('/create/delegue',[EmployeController::class, 'showDelegue']);
        Route::get('/create/demarcheur',[EmployeController::class, 'showDemarcheur']);

        Route::post('/create/employe',[EmployeController::class, 'createEmploye'])->name('creation_employe');
        Route::post('/create/responsable',[EmployeController::class, 'createResponsable'])->name('creation_responsable');
        Route::post('/create/delegue',[EmployeController::class, 'createDelegue'])->name('creation_delegue');
        Route::post('/create/demarcheur',[EmployeController::class, 'createDemarcheur'])->name('creation_demarcheur');

        Route::get('/{id}/edit',[EmployeController::class, 'editEmploye'])->name('edit_employe');
       //Route::post('/{id}', [EmployeController::class, 'updateEmploye'])->name('employe_update');
    });
//// ---------------------------- CONNEXION


        Route::get('/login',[EmployeController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [EmployeController::class, 'login']);
        Route::get('/logout',[EmployeController::class, 'logout'])->name('logout');






Route::prefix('medicaments')->group(function ()
    {
        Route::get('/create', [MedicamentController::class, 'show']);
        Route::post('/create',[MedicamentController::class, 'createMedicament'])->name('creation_medicament');
    });

Route::prefix('categorie')->group(function ()
    {
        Route::get('/create', [MedicamentController::class, 'showCategorie']);
        Route::post('/create',[MedicamentController::class, 'createCategorie'])->name('creation_categorie');
        Route::get('/update',[MedicamentController::class,'updateCategorie'])->name('maj_categorie');
    });

Route::prefix('proSante')->group(function ()
    {
        Route::get('/create', [ProSanteController::class, 'showProSante']);
        Route::post('/create',[ProSanteController::class,'createProSante'])->name('creation_professionnel_de_sante');
    });
Route::prefix('rapport')->group(function ()
    {
       Route::get('/create',[RapportController::class,'showRapport'])->name('rapport');
    });
