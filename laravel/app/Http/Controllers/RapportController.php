<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class RapportController extends Controller
{


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
        return Storage::download($chemin, 'RAPPORT - '.Carbon::now()->format('d-m-Y'));
    }
}

