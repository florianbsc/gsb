<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeController extends Controller
{
    public function show()
    {
        $secteurs = DB::table('secteur')->get();
        $regions = DB::table('region')->get();
        $employes = DB:: table('employe')->get();
        $responsable_secteurs = DB::table('responsable_secteur')->get();
        $delegue_regions = DB::table('delegue_region')->get();

        return view('employes.responsable', [
            //'elemenet(s)' est la variable qui ce crée sur la vu avec la valeurs => $variable(s)
            'secteurs'=> $secteurs,
            'regions' => $regions,
            'employe' => $employes,
            'responsable_secteurs' => $responsable_secteurs,
            'delegue_regions'=> $delegue_regions,
        ]);
    }


    public function createEmploye()
    {
        DB::table('employe')->insert([
            'identifiant_employe' => \request()->identifiant_employe,
            'nom_employe' => \request()->nom_employe,
            'prenom_employe' => \request()->prenom_employe,
            'telephone_employe' => \request()->tele_employe,
            'mail_employe' => \request()->mail_employe,
            'mdp_employe' => bcrypt(\request()->mdp_employe),
        ]);
    }



    public function updateEmploye($identifiant_employe)
    {
        DB::table('employe')
            ->where('identifiant_employe', $identifiant_employe)
            ->update([
                'nom_employe' => \request()->nom_employe,
                'prenom_employe' => \request()->prenom_employe,
                'telephone_employe' => \request()->tele_employe,
                'mail_employe' => \request()->mail_employe,
                'mdp_employe' => bcrypt(\request()->mdp_employe),

            ]);
    }

    public function deleteEmploye($identifiant_employe)
    {
        // Suppression de l'enregistrement dans la table visiter
        DB::table('emùploye')
            ->where('identifiant_employe', $identifiant_employe)
            ->delete();

        return redirect()->back()->with('success', 'L\'employé a été supprimée avec succès.');
    }



}
