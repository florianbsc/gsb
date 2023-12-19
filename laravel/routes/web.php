<?php
use App\Http\Controllers\VisitesController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/visites/create', [VisitesController::class, 'showCreat']);
Route::post('/create', [VisitesController::class, 'createVisite'])->name('creation_de_visite');
