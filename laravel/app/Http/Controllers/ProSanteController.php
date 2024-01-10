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


    public function updateProSante($identifiant_professionnel_de_sante)
    {
        DB::table('professionnel_de_sante')
            ->where('identifiant_professionnel_de_sante',$identifiant_professionnel_de_sante)
            ->update([
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

    public function deleteProSante($identifiant_professionnel_de_sante)
    {
        DB::table('professionnel_de_sante')
            ->where('identifiant_professionnel_de_sante',$identifiant_professionnel_de_sante)
            ->delete();

        return redirect()->back()->with('success', 'Le professionnel de sante à été supprimée avec succès.');
    }




}
