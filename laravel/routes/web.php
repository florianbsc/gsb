<?php
use App\Http\Controllers\VisitesController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\MedicamentController;
use App\Http\Controllers\ProSanteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('visites')->group(function () {
    //route qui affiche une page
    Route::get('/create', [VisitesController::class, 'showCreate']);
    //route qui valide un form
    Route::post('/create', [VisitesController::class, 'createVisite'])->name('creation_visite');
});

Route::prefix('employes')->group(function ()
{
    Route::get('/create',[EmployeController::class, 'show']);
    Route::post('/create',[EmployeController::class, 'createEmploye'])->name('creation_employe');
    Route::get('/update',[EmployeController::class, 'updateEmploye']);
}

);

Route::prefix('medicaments')->group(function ()
{
    Route::get('/create', [MedicamentController::class, 'show']);
    Route::post('/create',[MedicamentController::class, 'createMedicament'])->name('creation_medicament');
});
Route::prefix('categorie')->group(function ()
{
    Route::get('/create', [MedicamentController::class, 'showCategorie']);
    Route::post('/create',[MedicamentController::class, 'createCategorie'])->name('creation_categorie');
});

Route::prefix('proSante')->group(function (){
    Route::get('create', [ProSanteController::class, 'showProSante']);
    Route::post('/create',[ProSanteController::class,'createProSante'])->name('creation_professionnel_de_sante');
});
