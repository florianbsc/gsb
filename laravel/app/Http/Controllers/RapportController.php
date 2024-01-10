<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
