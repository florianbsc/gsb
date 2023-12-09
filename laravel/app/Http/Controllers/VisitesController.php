<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;


class VisitesController extends Controller
{
    public function showCreat(){
        $pro_santes = DB::table('professionnel_de_sante')->get();

        // Récupération des médicaments avec les noms de leurs catégories associées
        $medicaments = DB::table('medicament')
            ->join('categorie', 'medicament.identifiant_categorie', '=', 'categorie.identifiant_categorie')
            ->get();
        $demarcheurs = DB::table('demarcheur')
            ->join('employe', 'demarcheur.identifiant_employe_1', '=', 'employe.identifiant_employe')
            ->get();

        return view('visites.create', [
            'pro_santes' => $pro_santes,
            'medicaments' => $medicaments,
            'demarcheurs' => $demarcheurs,
        ]);
    }

    public function createVisite(){
        $date_maintenat = (new DateTime())->format('Y-m-d H:i:s');

        DB::table('date_contact')->insert([
            'derniere_visite' => $date_maintenat
        ]);

        DB::table('visiter')->insert([
//            request()-> ou $_POST pour recup les valeur du form
//
            'identifiant_employe' => request()->id_employe,
            'identifiant_professionnel_de_sante' => request()->id_prof_sante,
            'identifiant_medicament' => request()->id_medicament ,
            'derniere_visite' => $date_maintenat
        ]);
    }

}

