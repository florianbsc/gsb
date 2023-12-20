<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeController extends Controller
{
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



}
