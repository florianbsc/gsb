<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class MedicamentController extends Controller
{
    public function show()
    {
        $categories = DB::table('categorie')->get();

        $medicaments = DB::table('medicament')
            ->join('categorie', 'medicament.identifiant_categorie', '=', 'categorie.identifiant_categorie')
            ->get();

        return view('medicament.create', [
            'categories' => $categories,
            'medicaments' => $medicaments,
        ]);
    }

    public function showMedicament()
    {
        // Récupère la liste des médicaments avec leurs catégories
        $medicaments = DB::table('medicament')
            ->join('categorie', 'medicament.identifiant_categorie', '=', 'categorie.identifiant_categorie')
            ->get();

        return view('medicament.liste', [
            'medicaments' => $medicaments,
        ]);
    }

    public function showMedicamentAvecRecherche()
    {
        // Recherche des médicaments en fonction du terme de recherche
        $medicaments = DB::table('medicament')
            ->join('categorie', 'medicament.identifiant_categorie', '=', 'categorie.identifiant_categorie')
            ->where(function ($query) {
                $recherche = request()->recherche;
                $query->where('medicament.nom_medicament', 'LIKE', "%$recherche%")
                    ->orWhere('categorie.nom_categorie', 'LIKE', "%$recherche%");
            })
            ->get();

        return view('medicament.liste', [
            'medicaments' => $medicaments,
            'valeur_recherche' => request()->recherche
        ]);
    }

    public function createMedicament()
    {
        // Crée un nouveau médicament en utilisant les valeurs du formulaire
        DB::table('medicament')->insert([
            'nom_medicament' => request()->nom_medicament,
            'identifiant_categorie' => request()->id_categorie,
        ]);

        // Redirige l'utilisateur vers la liste des médicaments après la création
        return redirect()->route('liste_medicament');
    }

    public function createCategorie()
    {
        // Crée une nouvelle catégorie en utilisant les valeurs du formulaire
        DB::table('categorie')->insert([
            'nom_categorie' => request()->nom_categorie,
        ]);
    }
}
