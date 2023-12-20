<?php
use App\Http\Controllers\VisitesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('visites')->group(function () {
    //route qui affiche une page
    Route::get('/create', [VisitesController::class, 'showCreate']);
    //route qui valide un form
    Route::post('/create', [VisitesController::class, 'createVisite'])->name('creation_de_visite');
});
