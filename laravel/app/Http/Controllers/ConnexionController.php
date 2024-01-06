<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Spatie\Permission\Models\Role;


class ConnexionController extends Controller
{
    public function connexion(){

        $credentials = request()->only('email', 'password');

        $auth = Auth::attempt($credentials, true);
        if ($auth) {
            Session::regenerate();
            $info_user = Auth::user();
            if($info_user->Id_Fonction == 2){ //si c'est un utilisateur
                //return dd('il est utilisateur');
                return redirect()->route('accueil');
            }
            else{
                return redirect()->route('accueil');
            }
        }
        else{
            return redirect()->route('login');
        }
    }

    public function show_login() {
        return view('login');
    }

    public function SeDeconnecter() {
        Auth::guard('web')->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('login'); // redirect permet d'indiquer que il faut prendre la route
    }


    public function show_create_account(){
        return view('create_account', ['roles' => Role::all(), 'fonctions' => \App\Models\Fonction::all()]);
    }

    public function create_account(){
        $user = User::create([
            "nom_employe" => request()->Nom,
            "prenom_employe" => request()->Prenom,
            "telephone_employe" => \request()->telephone,
            "email_employe" => request()->email,
            "mdp_employe" => request()->mdp_employe,
            "Id_Fonction" => request()->id_fonction
        ]);

        $role = Role::where('id', request()->id_role)->first();
        $user->assignRole($role);
        return redirect()->route('login');
    }

}
