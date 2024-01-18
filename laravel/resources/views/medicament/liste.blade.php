@extends('layout.app')  <!-- Utilise le layout.app comme modèle de mise en page -->
@section('title', 'Liste médicaments')  <!-- Définit le titre de la page -->
@section('contenu')  <!-- Section du contenu de la page -->

<div class="container-fluid">
    <div class="col-sm-6 col-12 mb-4 mb-sm-0" style="display: flex">
        <!-- En-tête avec le titre et le nombre de médicaments -->
        <h1 class="h2 mb-0 ls-tight">Les Médicaments</h1>
        <span class="text-muted text-sm"
              style="margin-left: 10px; margin-top: 1.5%">Nombre de médicament : {{count($medicaments)}}</span>
    </div>
    <div class="col-sm-6 col-12 mb-2 mb-sm-0" style="display: flex;margin-top:5px;">
        <!-- Formulaire de recherche avec le bouton de recherche -->
        <form method="POST" action="{{ route('liste_medicament_recherche') }}" style="display:flex">
            @csrf <!-- Protection contre les attaques CSRF -->
            <input type="text" name="recherche" placeholder="Rechercher..." value="{{ $valeur_recherche ?? '' }}"
                   style="width:250px">
            <button type="submit" style="margin-left:15px">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                     class="bi bi-search" viewBox="0 0 16 16">
                    <path
                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                </svg>
            </button>
        </form>
    </div>

    <div class="card shadow border-0 mb-7">
        <!-- Carte contenant la table de médicaments -->
        <div class="table-responsive">
            <table class="table table-hover table-nowrap">
                <thead class="thead-light">
                <!-- En-tête de la table -->
                <tr>
                    <th scope="col"><b>Nom</b></th>
                    <th scope="col"><b>Catégorie</b></th>
                </tr>
                </thead>
                <tbody>
                <!-- Affichage des médicaments dans la table -->
                @foreach($medicaments as $medicament)
                    <tr>
                        <td>
                            {{$medicament->nom_medicament}}
                        </td>
                        <td>
                            {{$medicament->nom_categorie}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@stop
