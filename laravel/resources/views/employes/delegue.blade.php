@extends('layout.app')

@section('contenu')
    <div class="container-fluid">
    <h2>Création Délégué</h2>

    <form action="{{ route('creation_delegue') }}" method="post">
        @csrf
        <label for="nom_employe">Nom</label><br>
        <input type="text" name="nom_employe" placeholder="Nom" required><br>

        <label for="prenom_employe">Prénom</label><br>
        <input type="text" name="prenom_employe" placeholder="Prénom" required><br>

        <label for="telephone_employe">Numéro de téléphone</label><br>
        <input type="text" name="telephone_employe" placeholder="Numéro de téléphone" required><br>

        <label for="mail_employe">Mail</label><br>
        <input type="text" name="mail_employe" placeholder="Mail" required><br>

        <label for="mdp_employe">Mot de Passe</label><br>
        <input type="password" name="mdp_employe" placeholder="Mot de Passe" required><br>

        <label for="nom_region">Région</label><br>
        <select name="nom_region" required>
            @foreach($regions as $region)
                <option value="{{ $region->nom_region }}">{{ 'Région : '. $region->nom_region }}</option>
            @endforeach
        </select><br>

        <label for="responsable_secteur">Responsable Secteur</label><br>
        <select name="responsable_secteur" required>
            @foreach($responsable_secteurs as $responsable_secteur)
                <option value="{{ $responsable_secteur->identifiant_responsable }}">{{ $responsable_secteur->nom_employe }}</option>
            @endforeach
        </select><br>

        <button type="submit">Créer</button>
    </form>
    </div>
@stop
