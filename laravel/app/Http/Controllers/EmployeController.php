<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Employe;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class EmployeController extends Controller
{
    public function showEmploye()
    {
        $employes = DB:: table('employe')
            ->get();
        $secteurs = DB::table('secteur')
            ->get();
        $regions = DB::table('region')
            ->join('secteur','region.nom_secteur', '=', 'secteur.nom_secteur')
            ->get();
        $delegue_regions = DB::table('delegue_region')
            ->join('employe', 'delegue_region.identifiant_employe', '=', 'employe.identifiant_employe')
            ->get();
        $responsable_secteurs = DB::table('responsable_secteur')
        ->join('employe','responsable_secteur.identifiant_responsable', '=','employe.identifiant_employe')
        ->get();
        // crée une jointure pour avoir le id_delegue->nom_employe
        $demarcheurs = DB::table('demarcheur')
            ->join('employe', 'demarcheur.identifiant_demarcheur', '=', 'employe.identifiant_employe')
            ->get();
//dd($demarcheurs);
        return view('employes.employe', [
            //'elemenet(s)' est la variable qui ce crée sur la vu avec pour valeurs => $variable(s)
            'secteurs'=> $secteurs,
            'regions' => $regions,
            'employes' => $employes,
            'responsable_secteurs' => $responsable_secteurs,
            'delegue_regions'=> $delegue_regions,
            'demarcheurs' => $demarcheurs,
        ]);
    }

    public function createEmploye()
    {
        DB::table('employe')->insert([
//            'identifiant_employe' => \request()->identifiant_employe,
            'nom_employe' => \request()->nom_employe,
            'prenom_employe' => \request()->prenom_employe,
            'telephone_employe' => \request()->telephone_employe,
            'mail_employe' => \request()->mail_employe,
            'mdp_employe' => \request()->mdp_employe,
        ]);
    }

    public function editEmploye($identifiant_employe)
    {

        $employe = DB::table('employe')->where('identifiant_employe', $identifiant_employe)->first();

        return view('employes.test', ['employe' => $employe]);

    }

    public function updateEmploye(Request $request, $identifiant_employe)
    {
        $request->validate([
            'nom_employe' => 'required|string|max:255',
            'prenom_employe' => 'required|string|max:255',
            'telephone_employe' => 'required|string|max:15',
            'mail_employe' => 'required|string|email|max:255',
            'mdp_employe' => 'required|string|max:255',
        ]);

        DB::table('employe')
            ->where('identifiant_employe', $identifiant_employe)
            ->update([
                'nom_employe' => \request()->nom_employe,
                'prenom_employe' => \request()->prenom_employe,
                'telephone_employe' => \request()->tele_employe,
                'mail_employe' => \request()->mail_employe,
                'mdp_employe' => \request()->mdp_employe,
            ]);

        return redirect('/employe/' . $identifiant_employe . '/test')->with('success', 'Les informations de l\'employé ont été mises à jour.');
    }


    public function deleteEmploye($identifiant_employe)
    {
        // Suppression de l'enregistrement dans la table visiter
        DB::table('employe')
            ->where('identifiant_employe', $identifiant_employe)
            ->delete();

        return redirect()->back()->with('success', 'L\'employé a été supprimée avec succès.');
    }

    /*
     * PARTIE DE/CONNEXION
     */

    public function showLoginForm()
    {
            $employes = DB:: table('employe')
                ->get();
//        dd($employes);
        return view('log.login',[
            'employe' => $employes,
        ]);
    }

    public function username()
    {
        return 'mail_employe';
    }

    public function login(Request $request)
    {
        $credentials = [
            'mail_employe' => $request->mail_employe,
            'password' => $request->mdp_employe,
        ];

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect('/accueil');
        }
        // L'utilisateur n'est pas authentifié
        return back()->withErrors(['log.login' => 'Identifiants incorrects.'])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
