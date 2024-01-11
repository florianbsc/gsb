<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class RapportController extends Controller
{
    public function showRapport()
    {
        if (auth()->check()) {
            // L'utilisateur est connecté
            return view('rapport.import');
        } else {
            // Redirigez l'utilisateur vers la page de connexion par exemple
            return redirect()->route('login');
        }

    }

    public function depotRapport ()
    {
        // Charger le fichier rapport
        $file = request()->rapport;
        $path = $file->store();

        // Trouver la visite et mettre à jour
        $visite = DB::table('visiter')
            ->where('identifiant_employe', request()->identifiant_employe)
            ->where('identifiant_professionnel_de_sante', request()->identifiant_professionnel_de_sante)
            ->where('identifiant_medicament', request()->identifiant_medicament)
            ->where('derniere_visite', request()->derniere_visite)
            ->update([
                'rapport' => $path,
                'etat_visite' => 'terminer'
            ]);

        return redirect()->route('visite');
    }

    public function download($chemin)
    {
        return Storage::download($chemin);
    }
}

