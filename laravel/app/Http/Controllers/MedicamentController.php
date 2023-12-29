<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class MedicamentController extends Controller
{
    public function show()
    {
        $categories = DB::table('categorie')
            ->get();

       $medicaments = DB::table('medicament')
           ->join('categorie', 'medicament.identifiant_categorie', '=', 'categorie.identifiant_categorie')
           ->get();
//dd($medicaments);
        return view('medicament.create',[
            'categories' => $categories,
            'medicaments' => $medicaments,
        ]);
    }
    public function createMedicament()
    {

        DB::table('medicament')->insert([
//            request()-> ou $_POST pour recup les valeur du form
            'nom_medicament' => request()->nom_medicament,
            'identifiant_categorie' => request()->id_categorie ,
        ]);
    }
    public function showCategorie()
    {
        $categories = DB::table('categorie')
            ->get();

        $medicaments = DB::table('medicament')
            ->join('categorie', 'medicament.identifiant_categorie', '=', 'categorie.identifiant_categorie')
            ->get();
//dd($medicaments);
        return view('medicament.categorie.create',[
            'categories' => $categories,
            'medicaments' => $medicaments,
        ]);
    }
    public function createCategorie()
    {

        DB::table('categorie')->insert([
//            request()-> ou $_POST pour recup les valeur du form
            'nom_categorie' => request()->nom_categorie,
        ]);
    }
}
