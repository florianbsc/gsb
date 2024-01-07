<?php
use App\Http\Controllers\VisitesController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\MedicamentController;
use App\Http\Controllers\ProSanteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/accueil', function () {
    dd('connected');
})->middleware('auth');

Route::prefix('visites')->group(function ()
    {
        Route::get('/planning', [VisitesController::class, 'showPlanning']);
        //route qui affiche une page
        Route::get('/create', [VisitesController::class, 'show']);
        //route qui valide un form
        Route::post('/create', [VisitesController::class, 'createVisite'])->name('creation_visite');


    });

Route::prefix('employes')->group(function ()
    {
        Route::get('/create',[EmployeController::class, 'showEmploye']);
        Route::post('/create',[EmployeController::class, 'createEmploye'])->name('creation_employe');
        Route::get('/{id}/edit',[EmployeController::class, 'editEmploye'])->name('edit_employe');
       //Route::post('/{id}', [EmployeController::class, 'updateEmploye'])->name('employe_update');



        Route::get('/login',[EmployeController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [EmployeController::class, 'login']);
        Route::get('/logout',[EmployeController::class, 'logout'])->name('logout');

    });


//// ---------------------------- CONNEXION
//
//Route::get('/login', [ConnexionController::class, 'show_login'])->name('login');
//Route::post('/make-login', [ConnexionController::class, 'connexion'])->name('submit_login');
//Route::get('/Create/account',[ConnexionController::class,'show_create_account'])->name('show_create_account')->middleware('role:admin');//middleware('role:admin|utilisateur')
//Route::post('/Create/account',[ConnexionController::class, 'create_account'])->name('create_account')->middleware('role:admin');


Route::prefix('medicaments')->group(function ()
    {
        Route::get('/create', [MedicamentController::class, 'show']);
        Route::post('/create',[MedicamentController::class, 'createMedicament'])->name('creation_medicament');
    });

Route::prefix('categorie')->group(function ()
    {
        Route::get('/create', [MedicamentController::class, 'showCategorie']);
        Route::post('/create',[MedicamentController::class, 'createCategorie'])->name('creation_categorie');
        Route::get('update',[MedicamentController::class,'updateCategorie'])->name('maj_categorie');
    });

Route::prefix('proSante')->group(function ()
    {
        Route::get('create', [ProSanteController::class, 'showProSante']);
        Route::post('/create',[ProSanteController::class,'createProSante'])->name('creation_professionnel_de_sante');
    });
