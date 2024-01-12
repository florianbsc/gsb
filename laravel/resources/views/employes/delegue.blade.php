@extends('layout.app')
@section('title', 'Ajouter de Délégué')
@section('contenu')
    <div class="container-fluid">
    <h2>Ajouter Délégué</h2>

    <form action="{{ route('creation_delegue') }}" method="post">
        @csrf
{{--        <label for="delegue">Délégué</label><br>--}}
        <input type="text" name="nom_employe" placeholder="Nom" required><br>

        <input type="text" name="prenom_employe" placeholder="Prénom" required><br>

        <input type="text" name="telephone_employe" placeholder="Numéro de téléphone" required><br>

        <input type="text" name="mail_employe" placeholder="Mail" required><br>

        <input type="password" name="mdp_employe" placeholder="Mot de Passe" required><br>

        <label for="nom_region">Région</label><br>
        <select name="nom_region" required>
            @foreach($regions as $region)
                <option value="{{ $region->nom_region }}">{{ $region->nom_region }}</option>
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
