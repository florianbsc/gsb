<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Création Délégué</title>


</head>
<body>

@extends('layout.app')

@section('contenu')

<h2>Creation delegue</h2>

<form action="{{ route('creation_delegue') }}" method="post">
    @csrf
    <label for="delegue">delegue</label><br>
    <input type="text" name="nom_employe" placeholder="Nom"><br>
    <input type="text" name="prenom_employe" placeholder="Prénom"><br>
    <input type="text" name="telephone_employe" placeholder="Numéro de téléphone"><br>
    <input type="text" name="mail_employe" placeholder="Mail"><br>
    <input type="password" name="mdp_employe" placeholder="Mot de Passe"><br>

    <label for="nom_region">Région</label><br>
    <select name="nom_region">
        @foreach($regions as $region)
            <option value="{{ $region->nom_region }}">{{ 'region : '. $region->nom_region }}</option>
        @endforeach
    </select><br>

    <label for="responsable_secteur">Responsable Secteur</label><br>
    <select name="responsable_secteur">
        @foreach($responsable_secteurs as $responsable_secteur)
            <option value="{{ $responsable_secteur->identifiant_responsable }}">{{ $responsable_secteur->nom_employe }}</option>
        @endforeach
    </select><br>

    <button type="submit">Créer</button>
</form>
</body>
@stop

</html>
