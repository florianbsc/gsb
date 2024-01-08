<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>affiche responsable</title>
</head>
<body>


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

{{--    <form action="" method="post">--}}
{{--        @csrf--}}
{{--        <label for="secteur">Secteur</label>--}}
{{--        <ul name="nom_secteur" id="secteur">--}}
{{--            @foreach($secteurs as $secteur)--}}
{{--                <li value="{{ $secteur->nom_secteur }}">{{ $secteur->nom_secteur }} </li>--}}
{{--            @endforeach--}}

{{--        </ul>--}}

{{--        <label for="region">Region</label>--}}
{{--        <ul name="nom_region" id="region">--}}
{{--            @foreach($regions as $region)--}}
{{--                <li value="{{ $region->nom_region }}">{{ $region->nom_region .' dans le secteur--> '. $region->nom_secteur }} </li>--}}
{{--            @endforeach--}}
{{--        </ul>--}}

{{--        <label for="responsable_secteur">Responsable Secteurs</label>--}}
{{--        <ul name="identifiant_employe" id="responsable">--}}
{{--            @foreach($responsable_secteurs as $responsable_secteur)--}}
{{--                <li value="{{ $responsable_secteur->identifiant_responsable }}">{{ $responsable_secteur->nom_employe .' '. $responsable_secteur->prenom_employe .' '. $responsable_secteur->nom_secteur }} </li>--}}
{{--            @endforeach--}}
{{--        </ul>--}}

{{--        <label for="delegue_region">Delegue Region</label>--}}
{{--        <ul name="identifiant_delegue" id="delegue">--}}
{{--            @foreach($delegue_regions as $delegue_region)--}}
{{--                <li value="{{ $delegue_region->identifiant_delegue }}">{{ $delegue_region->nom_employe }} </li>--}}
{{--            @endforeach--}}
{{--        </ul>--}}

{{--        <label for="employe">Employe</label>--}}
{{--        <ul name="identifiant_employe" id="employe">--}}
{{--            @foreach($employes as $employe)--}}
{{--                <li value="{{ $employe->identifiant_employe }}">{{ $employe->nom_employe }} </li>--}}
{{--            @endforeach--}}
{{--        </ul>--}}

{{--        <label for="demarcheur">Demarcheur</label>--}}
{{--        <ul name="identifiant_demarcheur" id="demarcheur">--}}
{{--            @foreach($demarcheurs as $demarcheur)--}}
{{--                <li value="{{ $demarcheur->identifiant_demarcheur }}">{{ $demarcheur->nom_employe }} </li>--}}
{{--            @endforeach--}}
{{--        </ul>--}}

{{--    </form>--}}
</body>
</html>
