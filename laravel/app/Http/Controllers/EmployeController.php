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

    public function showResponsable()
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
        return view('employes.responsable', [
            //'elemenet(s)' est la variable qui ce crée sur la vu avec pour valeurs => $variable(s)
            'secteurs'=> $secteurs,
            'regions' => $regions,
            'employes' => $employes,
            'responsable_secteurs' => $responsable_secteurs,
            'delegue_regions'=> $delegue_regions,
            'demarcheurs' => $demarcheurs,
        ]);
    }

    public function showDelegue()
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
        return view('employes.delegue', [
            //'elemenet(s)' est la variable qui ce crée sur la vu avec pour valeurs => $variable(s)
            'secteurs'=> $secteurs,
            'regions' => $regions,
            'employes' => $employes,
            'responsable_secteurs' => $responsable_secteurs,
            'delegue_regions'=> $delegue_regions,
            'demarcheurs' => $demarcheurs,
        ]);
    }
    public function showDemarcheur()
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

        return view('employes.demarcheur', [
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


// ...

    public function createResponsable(Request $request)
    {
        // Validez les données du formulaire
        $request->validate([
            'nom_employe' => 'required',
            'prenom_employe' => 'required',
            'telephone_employe' => 'required',
            'mail_employe' => 'required',
            'mdp_employe' => 'required',
            'nom_secteur' => 'required',
        ]);

        // Créez un nouvel employé
        $employeId = DB::table('employe')->insertGetId([
            'nom_employe' => $request->input('nom_employe'),
            'prenom_employe' => $request->input('prenom_employe'),
            'telephone_employe' => $request->input('telephone_employe'),
            'mail_employe' => $request->input('mail_employe'),
            'mdp_employe' => $request->input('mdp_employe'),
            'nom_secteur' => $request->input('nom_secteur'),
            ]);

        // Assignez le rôle de responsable de secteur à l'employé
        DB::table('responsable')->insert([
            'identifiant_responsable' => $employeId,
            'nom_secteur' => 'nom_secteur',
        ]);

        // Redirigez avec un message de succès
        return redirect()->back()->with('Le responsable de secteur a été créé avec succès.');
    }

    public function createDelegue(Request $request)
    {
        // Validez les données du formulaire
        $request->validate([
            'nom_employe' => 'required',
            'prenom_employe' => 'required',
            'telephone_employe' => 'required',
            'mail_employe' => 'required',
            'mdp_employe' => 'required',
            'nom_region' => 'required',
        ]);

        // Créez un nouvel employé
        $employeId = DB::table('employe')->insertGetId([
            'nom_employe' => $request->input('nom_employe'),
            'prenom_employe' => $request->input('prenom_employe'),
            'telephone_employe' => $request->input('telephone_employe'),
            'mail_employe' => $request->input('mail_employe'),
            'mdp_employe' => $request->input('mdp_employe'),
            'nom_region' => $request->input('nom_region'),
        ]);

        // Assignez le rôle de responsable de secteur à l'employé
        DB::table('delegue')->insert([
            'identifiant_delegue' => $employeId,
            'nom_region' => 'nom_region',
        ]);

        // Redirigez avec un message de succès
        return redirect()->back()->with('Le delegue de region a été créé avec succès.');
    }
    public function createDemarcheur(Request $request)
    {
        // Validez les données du formulaire
        $request->validate([
            'nom_employe' => 'required',
            'prenom_employe' => 'required',
            'telephone_employe' => 'required',
            'mail_employe' => 'required',
            'mdp_employe' => 'required',
            'nom_region' => 'required',
        ]);

        // Créez un nouvel employé
        $employeId = DB::table('employe')->insertGetId([
            'nom_employe' => $request->input('nom_employe'),
            'prenom_employe' => $request->input('prenom_employe'),
            'telephone_employe' => $request->input('telephone_employe'),
            'mail_employe' => $request->input('mail_employe'),
            'mdp_employe' => $request->input('mdp_employe'),
            'nom_region' => $request->input('nom_region'),
        ]);

        // Assignez le rôle de responsable de secteur à l'employé
        DB::table('demarcheur')->insert([
            'identifiant_delegue' => $employeId,
            'identifiant_demarcheur' => 'identifiant_demarcheur',
        ]);

        // Redirigez avec un message de succès
        return redirect()->back()->with('Le demarcheur a été créé avec succès.');
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
        try {
            // Utilisez le modèle Eloquent si possible, sinon continuez avec les requêtes SQL brutes
            $employes = DB:: table('employe')
                ->get();


            return view('log.login', [
                'employe' => $employes,
            ]);
        } catch (\Exception $e) {
            // Gérez l'erreur de manière appropriée, par exemple, journalisez l'erreur ou renvoyez une page d'erreur
            return view('errors.custom_error', [
                'error_message' => "Une erreur s'est produite lors du chargement des employés.",
            ]);
        }
    }
//    public function showLoginForm()
//    {
//            $employes = DB:: table('employe')
//                ->get();
////        dd($employes);
//        return view('log.login',[
//            'employe' => $employes,
//        ]);
//    }

    public function username()
    {
        return 'mail_employe';
    }


//    public function login(Request $request)
//    {
//        $credentials = $request->only('mail_employe', 'mdp_employe');
//
//        if (Auth::attempt($credentials)) {
//            $request->session()->regenerate();
//            return redirect()->intended('http://127.0.0.1:8000/');
//        }
//
//        // L'authentification a échoué
//        return back()->withErrors(['login' => 'Identifiants incorrects.'])->withInput();
//    }

    public function login(Request $request)
    {
        $credentials = [
            'mail_employe' => $request->mail_employe,
            'password' => $request->mdp_employe,
        ];

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect('http://127.0.0.1:8000/');
        }
        // L'utilisateur n'est pas authentifié
        return back()->withErrors(['login' => 'Identifiants ou mot de passe incorrects.'])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
