<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;



class VisitesController extends Controller
{
    public function showCreateVisite()
    {

        $is_responsable = DB::table('responsable_secteur')
            ->where('identifiant_responsable', auth()->user()->identifiant_employe)
            ->first();
        $regions = DB::table('delegue_region')
            ->get();

        if ($is_responsable) {
            $nom_secteur = $is_responsable->nom_secteur;
            $demarcheurs = DB::table('demarcheur')
                ->join('employe', 'demarcheur.identifiant_demarcheur', '=', 'employe.identifiant_employe')
                ->get();
        } else {
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
        $secteurs = DB::table('secteur')->get();

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

        DB::table('date_contact')->insert([
            'derniere_visite' => request()->date,
        ]);

        DB::table('visiter')->insert([
//            request()-> ou $_POST pour recup les valeur du form

            'identifiant_employe' => request()->id_employe,
            'identifiant_professionnel_de_sante' => request()->id_prof_sante,
            'identifiant_medicament' => request()->id_medicament,
            'derniere_visite' => request()->date,
            'etat_visite' => 'en cours',
        ]);
        return redirect()->route('All_visite');
    }




    public function showVisite()
    {
        $visites = DB::table('visiter')
            ->where( 'employe.identifiant_employe', auth()->user()->identifiant_employe)
            ->join('employe', 'employe.identifiant_employe', '=', 'visiter.identifiant_employe')
            ->join('professionnel_de_sante', 'professionnel_de_sante.identifiant_professionnel_de_sante', '=', 'visiter.identifiant_professionnel_de_sante')
            ->join('medicament', 'medicament.identifiant_medicament', '=', 'visiter.identifiant_medicament')
            ->join('date_contact', 'date_contact.derniere_visite', '=', 'visiter.derniere_visite')
            ->orderBy('visiter.derniere_visite', 'desc') // Order by the date_visite column in descending order
            ->get();

        return view('visites.visite', [
            'visites' => $visites,
        ]);
    }
    public function showAllVisite()
    {

        $visites = DB::table('visiter')
            ->join('employe', 'employe.identifiant_employe', '=', 'visiter.identifiant_employe')
            ->join('professionnel_de_sante', 'professionnel_de_sante.identifiant_professionnel_de_sante', '=', 'visiter.identifiant_professionnel_de_sante')
            ->join('medicament', 'medicament.identifiant_medicament', '=', 'visiter.identifiant_medicament')
            ->join('date_contact', 'date_contact.derniere_visite', '=', 'visiter.derniere_visite')
            ->orderBy('visiter.derniere_visite', 'desc') // Order by the date_visite column in descending order
            ->get();

        return view('visites.toutVisite', [
            'visites' => $visites,
        ]);
    }

}
