<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RapportController extends Controller
{
    public function showRapport()
    {
        return view('rapport.import');
    }
}
