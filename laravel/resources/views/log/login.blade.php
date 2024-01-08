<!DOCTYPE html>
<!-- Coding By CodingNepal - youtube.com/codingnepal -->
<html lang="fr" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Login Employe </title>

</head>
<body>
@extends('layout.app')

@section('contenu')
<div class="center">
    <h1>Connexion</h1>
    @if($errors->has('login'))
        <p>{{ $errors->first('login') }}</p>
    @endif
    <form action=" {{ route('login') }}" method="post">
        @csrf
        <div class="txt_field">
            <label for="mail_employe" ></label>
            <input type="email" id="mail_employe" name="mail_employe" placeholder="Identifiant" required>
        </div>
        <div class="txt_field">
            <label placeholder="test"></label>
            <input name="mdp_employe" type="password" placeholder="Mot de passe" required >
        </div>

        <input type="submit" value="Connexion">
        <div class="signup_link">
            Créé un Demarcheur <a href="{{ route('creation_demarcheur') }}">Créé</a><br>
            Créé un Responasble <a href="{{ route('creation_responsable') }}">Créé</a><br>
            Créé un Delegue <a href="{{ route('creation_delegue') }}">Créé</a><br>
        </div>
    </form>
</div>
@stop

</body>
</html>
