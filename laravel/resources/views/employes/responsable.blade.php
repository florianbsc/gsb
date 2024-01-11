@extends('layout.app')

@section('contenu')
    <div class="container-fluid">
<h2>Creation Responsable</h2>

<form action="{{ route('creation_responsable') }}" method="post">
    @csrf
    <label for="responsable">Responsable</label><br>
    <input type="text" name="nom_employe" placeholder="Nom"><br>
    <input type="text" name="prenom_employe" placeholder="Prénom"><br>
    <input type="text" name="telephone_employe" placeholder="Numéro de téléphone"><br>
    <input type="text" name="mail_employe" placeholder="Mail"><br>
    <input type="password" name="mdp_employe" placeholder="Mot de Passe"><br>

    <select>
        @foreach($secteurs as $secteur)
            <option value="{{ $secteur->nom_secteur }}">{{ 'Secteur : '. $secteur->nom_secteur }}</option>
        @endforeach
    </select><br>
    <input type="submit">
</form>
    </div>
@stop
