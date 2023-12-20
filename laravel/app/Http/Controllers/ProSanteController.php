<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProSanteController extends Controller
{
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
