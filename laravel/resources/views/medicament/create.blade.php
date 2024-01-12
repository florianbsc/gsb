
@extends('layout.app')
@section('title', 'Création médicaments')
@section('contenu')
<h1>Création Médicament</h1>

<form action="{{  route('creation_medicament') }}" method="post">
    @csrf
    <label for="medicament"></label><br>
    <input type="text" name="nom_medicament" placeholder="Nom"><br>

    <label for="identifiant_categorie">Categorie</label>
    <select name="id_categorie">
        @foreach($categories as $categorie)
            <option value="{{ $categorie->identifiant_categorie }}">{{ $categorie->nom_categorie }}</option>
        @endforeach
    </select><br>
    <input type="submit">
</form>
@stop
