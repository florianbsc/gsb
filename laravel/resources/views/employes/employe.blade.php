
@extends('layout.app')

@section('contenu')

    <h2>Creation employe</h2>

    <form action="{{ route('creation_employe') }}" method="post">
        @csrf
        <label for="employe">Employer</label><br>
        <input type="text" name="nom_employe" placeholder="Nom"><br>
        <input type="text" name="prenom_employe" placeholder="Prénom"><br>
        <input type="text" name="telephone_employe" placeholder="Numéro de téléphone"><br>
        <input type="text" name="mail_employe" placeholder="Mail"><br>
        <input type="password" name="mdp_employe" placeholder="Mot de Passe"><br>

        <select>
            @foreach($regions as $region)
                <option value="{{ $region->nom_region }}">{{ 'Région --> "'. $region->nom_region .'" Secteur --> '. $region->nom_secteur }}</option>
            @endforeach
        </select><br>
        <input type="submit">



    </form>
@stop
