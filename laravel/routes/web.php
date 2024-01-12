<?php
use App\Http\Controllers\VisitesController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\MedicamentController;
use App\Http\Controllers\ProSanteController;
use App\Http\Controllers\RapportController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');

//    renvoi vers la page app apres la connxion
})->middleware('auth')->name('accueil');

//page pour voir mes test
Route::get('/test', function () {  return view('test'); });


//// ---------------------------- CONNEXION


Route::get('/login',[EmployeController::class, 'showLoginForm'])->name('login');
Route::post('/login', [EmployeController::class, 'login']);
Route::get('/logout',[EmployeController::class, 'logout'])->name('logout');


Route::prefix('visites')->group(function ()
    {
        Route::get('/', [VisitesController::class, 'showVisite'])->name('visite');
        Route::get('/toutes', [VisitesController::class, 'showAllVisite'])->name('All_visite');
        //route qui affiche une page
        Route::get('/create', [VisitesController::class, 'showCreateVisite'])->middleware('auth');
        //route qui valide un form
        Route::post('/create', [VisitesController::class, 'createVisite'])->name('creation_visite');
    });

Route::prefix('employes')->group(function ()
    {
        Route::get('/create/employe',[EmployeController::class, 'showEmploye']);
//        Route::get('/create/responsable',[EmployeController::class, 'showResponsable'])->name('create_responsable');
        Route::get('/create/delegue',[EmployeController::class, 'showDelegue'])->name('create_delegue');
        Route::get('/create/demarcheur',[EmployeController::class, 'showDemarcheur'])->name('create_demarcheur');
        Route::get('/show/demarcheur',[EmployeController::class, 'showAllDemarcheur'])->name('allDemarcheur');

        Route::post('/create/employe',[EmployeController::class, 'createEmploye'])->name('creation_employe');
        Route::post('/create/responsable',[EmployeController::class, 'createResponsable'])->name('creation_responsable');
        Route::post('/create/delegue',[EmployeController::class, 'createDelegue'])->name('creation_delegue');
        Route::post('/create/demarcheur',[EmployeController::class, 'createDemarcheur'])->name('creation_demarcheur');

    });




Route::prefix('medicaments')->group(function ()
    {
        Route::get('/create', [MedicamentController::class, 'show']);
        Route::get('/', [MedicamentController::class, 'showMedicament'])->name('liste_medicament');
        Route::post('/create',[MedicamentController::class, 'createMedicament'])->name('creation_medicament');
        Route::post('/search', [MedicamentController::class, 'showMedicamentAvecRecherche'])->name('liste_medicament_recherche');
    });

Route::prefix('categorie')->group(function ()
    {
        Route::post('/create',[MedicamentController::class, 'createCategorie'])->name('creation_categorie');
    });

Route::prefix('proSante')->group(function ()
    {
        Route::get('/create', [ProSanteController::class, 'showProSante']);
        Route::post('/create',[ProSanteController::class,'createProSante'])->name('creation_professionnel_de_sante');
        Route::get('/show',[ProSanteController::class,'showAllProSante'])->name('all_professionnel_de_sante');
        Route::post('/search', [ProSanteController::class, 'showProSanteAvecRecherche'])->name('liste_professionnel_de_sante_recherche');

    });


Route::prefix('rapport')->group(function ()
    {
       Route::post('/depot',[RapportController::class, 'depotRapport'])->name('depot_rapport');
       Route::get('/download/{chemin}', [RapportController::class, 'download'])->name('download_rapport');
    });
