<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier l'employé</title>
</head>
<body>
@extends('layout.app')

@section('contenu')

<h2>Modifier l'employé</h2>
@if(session('success'))
    <p>{{ session('success') }}</p>
@endif
<form action="#" method="post">
    @csrf
{{--    @method('put')--}}

    <label for="nom_employe">Nom:</label>
    <input type="text" id="nom_employe" name="nom_employe" value="{{ $employe->nom_employe }}" required><br><br>

    <label for="prenom_employe">Prénom:</label>
    <input type="text" id="prenom_employe" name="prenom_employe" value="{{ $employe->prenom_employe }}" required><br><br>

    <label for="telephone_employe">Téléphone:</label>
    <input type="text" id="telephone_employe" name="telephone_employe" value="{{ $employe->telephone_employe }}" required><br><br>

    <label for="mail_employe">Email:</label>
    <input type="text" id="mail_employe" name="mail_employe" value="{{ $employe->mail_employe }}" required><br><br>

    <label for="mdp_employe">Mot de passe:</label>
    <input type="password" id="mdp_employe" name="mdp_employe" value="{{ $employe->mdp_employe }}" required><br><br>

    <button type="submit">Enregistrer</button>
</form>

@stop
</body>
</html>
