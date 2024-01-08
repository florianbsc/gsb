<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;



class VisitesController extends Controller
{
    public function show()
    {

            $is_responsable = DB::table('responsable_secteur')
                ->where('identifiant_responsable',auth()->user()->identifiant_employe)
                ->first();
            $regions = DB::table('delegue_region')
                ->get();


        if($is_responsable){
            $nom_secteur = $is_responsable->nom_secteur;
            $demarcheurs = DB::table('demarcheur')
                ->join('employe', 'demarcheur.identifiant_demarcheur', '=', 'employe.identifiant_employe')
                ->get();
        }else{
            //$delegue_region = $is_responsable->;

            $demarcheurs = DB::table('demarcheur')
                ->where('demarcheur.identifiant_employe', auth()->user()->identifiant_employe)
                ->join('employe', 'demarcheur.identifiant_demarcheur', '=', 'employe.identifiant_employe')
                ->get();
            $delegue_region = DB::table('delegue_region')
                ->where('identifiant_delegue', auth()->user()->identifiant_employe)
                ->first()->nom_region;
        }
        //-----
        $secteurs = DB::table('secteur')
        ->get();
        $pro_santes = DB::table('professionnel_de_sante')->get();

        // Récupération des médicaments avec les noms de leurs catégories associées
        $medicaments = DB::table('medicament')
            ->join('categorie', 'medicament.identifiant_categorie', '=', 'categorie.identifiant_categorie')
            ->get();


//        dd($demarcheurs);

        return view('visites.create', [
            'regions' => $regions,
            'delegue_region' => $delegue_region ?? NULL,
            'pro_santes' => $pro_santes,
            'medicaments' => $medicaments,
            'demarcheurs' => $demarcheurs,
            'is_responsable' => $is_responsable
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

            'identifiant_employe' => request()->id_employe,
            'identifiant_professionnel_de_sante' => request()->id_prof_sante,
            'identifiant_medicament' => request()->id_medicament ,
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

    public function showPlanning()
    {
        $plannings = DB::table('visiter')->get();
        dd('probleme d\'affichage car 4 clefs primaires', $plannings);
        return view('visites.planning',[
            'plannings' => $plannings,
    ]);
    }

}

