<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;


class VisitesController extends Controller
{
    public function showCreate()
    {
        $secteurs = DB::table('secteur')
        ->get();
        $regions = DB::table('region')
            ->join('secteur','region.nom_secteur', '=', 'secteur.nom_secteur')
            ->get();
        $pro_santes = DB::table('professionnel_de_sante')->get();

        // Récupération des médicaments avec les noms de leurs catégories associées
        $medicaments = DB::table('medicament')
            ->join('categorie', 'medicament.identifiant_categorie', '=', 'categorie.identifiant_categorie')
            ->get();
        $demarcheurs = DB::table('demarcheur')
            ->join('employe', 'demarcheur.identifiant_demarcheur', '=', 'employe.identifiant_employe')
//            ->join('delegue_region', 'demarcheur.identifiant_demarcheur', '=', 'delegue_region.identifiant_delegue')
            ->get();
//        dd($demarcheurs);

        return view('visites.create', [
            'secteurs' => $secteurs,
            'regions' => $regions,
            'pro_santes' => $pro_santes,
            'medicaments' => $medicaments,
            'demarcheurs' => $demarcheurs,
        ]);
    }

    public function createVisite()
    {
        $date_maintenat = now();

        DB::table('date_contact')->insert([
            'derniere_visite' => $date_maintenat
        ]);

        DB::table('visiter')->insert([
//            request()-> ou $_POST pour recup les valeur du form

            'identifiant_employe' => request()->identifiant_employe,
            'identifiant_professionnel_de_sante' => request()->identifiant_professionnel_de_sante,
            'identifiant_medicament' => request()->identifiant_medicament ,
            'derniere_visite' => $date_maintenat
        ]);
    }

    public function updateVisite()
    {
        $date_maintenant = now();

        // Mise à jour de la table date_contact
        DB::table('date_contact')->update([
            'derniere_visite' => $date_maintenant
        ]);

        // Mise à jour de la table visiter
        //afficher les clef en hidden pour les reccuper
        DB::table('visiter')->where([
            'identifiant_employe' => \request()->identifiant_employe,
            'identifiant_professionnel_de_sante' => \request()->identifiant_professionnel_de_sante,
            'identifiant_medicament' => \request()->identifiant_medicament,
        ])
            ->update([
            'identifiant_employe' => request()->identifiant_employe,
            'identifiant_professionnel_de_sante' => request()->identifiant_professionnel_de_sante,
            'identifiant_medicament' => request()->identifiant_medicament,
            'derniere_visite' => $date_maintenant
        ]);
    }

    public function deleteVisite($identifiant_employe, $identifiant_professionnel_de_sante, $identifiant_medicament, $date_maintenant)
    {
        // Suppression de l'enregistrement dans la table visiter
        DB::table('visiter')
            ->where('identifiant_employe', $identifiant_employe)
            ->where('identifiant_professionnel_de_sante', $identifiant_professionnel_de_sante)
            ->where('identifiant_medicament', $identifiant_medicament)
            ->where('derniere_visite', $date_maintenant )
            ->delete();

        return redirect()->back()->with('success', 'La visite a été supprimée avec succès.');
    }


}

