@extends('layout.app')
@section('title', 'Ajouter Professionnel De Santé')

@section('contenu')
    <h1>Ajouter Professionnel De Santé</h1>
    <form action="{{ route('creation_professionnel_de_sante') }}" method="post">
        @csrf
        <label for="professionnel_de_sante"></label><br>
        <input type="text" name="nom_professionnel_de_sante" placeholder="Nom"><br>
        <input type="text" name="prenom_professionnel_de_sante" placeholder="Prénom"><br>
        <input type="text" name="metier_professionnel_de_sante" placeholder="metier"><br>
        <input type="text" name="adresse" placeholder="Adresse"><br>
        <input type="text" name="code_postale" placeholder="Code postale"><br>
        <input type="text" name="ville_professionnel_de_sante" placeholder="Ville"><br>
        <input type="text" name="telephone_professionnel_de_sante" placeholder="Numéro de téléphone"><br>
        <input type="text" name="mail_professionnel_de_sante" placeholder="E-mail"><br>

        <input type="submit">

    </form>

@stop
