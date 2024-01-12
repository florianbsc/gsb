<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;


class ProSanteController extends Controller
{
    public function showProSante()
    {
        if (auth()->check()) {
            // L'utilisateur est connecté
            $professionnel_de_santes = DB::table('professionnel_de_sante')->get();

            return view('proSante.create', ['professionnel_de_sante'=> $professionnel_de_santes,]);        } else {
            // Redirigez l'utilisateur vers la page de connexion par exemple
            return redirect()->route('login');
        }


    }

    public function showAllProSante()
    {
            // L'utilisateur est connecté
            $professionnel_de_santes = DB::table('professionnel_de_sante')->get();

            return view('proSante.toutProSante', [
                'professionnel_de_santes'=> $professionnel_de_santes,]);


    }
//    public function showProSanteAvecRecherche()
//    {
//        // L'utilisateur est connecté
//        $professionnel_de_santes = DB::table('professionnel_de_sante')->get()
//        ->where(function($query) {
//            $recherche = request()->recherche;
//            $query->where('professionnel_de_sante.nom_professionnel_de_sante', 'LIKE', "%$recherche%");
////                  ->orWhere('professionnel_de_sante.prenom_professionnel_de_sante', 'LIKE', "%$recherche%");
//                })
//        ->get();
//
//        return view('proSante.toutProSante', [
//            'professionnel_de_santes'=> $professionnel_de_santes,
//            'valeur_recherche' => request()->recherche
//        ]);
//
//
//    }
    public function showProSanteAvecRecherche()
    {
        $professionnel_de_santes = DB::table('professionnel_de_sante')
            ->where(function($query) {
                $recherche = request()->recherche;
                $query->where('professionnel_de_sante.nom_professionnel_de_sante', 'LIKE', "%$recherche%")
                    ->orWhere('professionnel_de_sante.prenom_professionnel_de_sante', 'LIKE', "%$recherche%")
                    ->orWhere('professionnel_de_sante.metier_professionnel_de_sante', 'LIKE', "%$recherche%")
                    ->orWhere('professionnel_de_sante.adresse', 'LIKE', "%$recherche%")
                    ->orWhere('professionnel_de_sante.code_postale', 'LIKE', "%$recherche%")
                    ->orWhere('professionnel_de_sante.ville_professionnel_de_sante', 'LIKE', "%$recherche%")
                    ->orWhere('professionnel_de_sante.mail_professionnel_de_sante', 'LIKE', "%$recherche%")
                    ->orWhere('professionnel_de_sante.telephone_professionnel_de_sante', 'LIKE', "%$recherche%");
            })
            ->get();

        return view('proSante.toutProSante', [
            'professionnel_de_santes'=> $professionnel_de_santes,
            'valeur_recherche' => request()->recherche
        ]);
    }



    public function createProSante()
    {
        DB::table('professionnel_de_sante')->insert([
            // je ne suis pas sur qu'il faut mettre l'id
            //'identifiant_professionnel_de_sante' => request()-> id_pro,
            'nom_professionnel_de_sante' => \request()-> nom_professionnel_de_sante,
            'prenom_professionnel_de_sante' => \request()-> prenom_professionnel_de_sante,
            'metier_professionnel_de_sante' => \request()-> metier_professionnel_de_sante,
            'adresse' =>\request()-> adresse,
            'code_postale' => \request()->  code_postale,
            'ville_professionnel_de_sante' => \request()-> ville_professionnel_de_sante,
            'mail_professionnel_de_sante' => \request()-> mail_professionnel_de_sante,
            'telephone_professionnel_de_sante' => \request()-> telephone_professionnel_de_sante,

        ]);
    }



}
