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
}
