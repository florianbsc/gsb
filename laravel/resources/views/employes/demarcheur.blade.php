<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>demarcheur</title>


</head>
<body>
@extends('layout.app')

@section('contenu')

<h2>Creation Demarcheur</h2>

<form action="{{ route('creation_demarcheur') }}" method="post">
    @csrf
    <label for="demarcheur">Demarcheur</label><br>
    <input type="text" name="nom_employe" placeholder="Nom"><br>
    <input type="text" name="prenom_employe" placeholder="Prénom"><br>
    <input type="text" name="telephone_employe" placeholder="Numéro de téléphone"><br>
    <input type="text" name="mail_employe" placeholder="Mail"><br>
    <input type="password" name="mdp_employe" placeholder="Mot de Passe"><br>

    <label for="region">Région</label><br>
    <select name="region">
        @foreach($regions as $region)
            <option value="{{ $region->nom_region }}">{{ 'Region : '. $region->nom_region }}</option>
        @endforeach
    </select><br>

    <label for="delegue_region">Delegue de Région</label><br>
    <select name="delegue_region">
        @foreach($delegue_regions as $delegue_region)
            <option value="{{ $delegue_region->identifiant_delegue }}">{{ $delegue_region->nom_employe. ' - Region : '. $region->nom_region }}</option>
        @endforeach
    </select><br>

    <button type="submit">Créer</button>
</form>
@stop

</body>
</html>
