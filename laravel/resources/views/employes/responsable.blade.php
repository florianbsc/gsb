<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Affiche Responsable</title>
</head>
<body>
<h1>ic sera la page responsable</h1>

<h2>Afficher toutes les secteurs</h2>

<form action="" method="post">
    @csrf
    <label for="secteur">Secteur</label>
    <ul name="nom_secteur" id="secteur">
        @foreach($secteurs as $secteur)
            <li value="{{ $secteur->nom_secteur }}">{{ $secteur->nom_secteur }} </li>
        @endforeach

    </ul>

    <label for="region">Region</label>
    <ul name="nom_region" id="region">
        @foreach($regions as $region)
            <li value="{{ $region->nom_region }}">{{ $region->nom_region }} </li>
        @endforeach
    </ul>

    <label for="responsable_secteur">Responsable Secteurs</label>
    <ul name="identifiant_employe" id="responsable">
        @foreach($responsable_secteurs as $responsable_secteur)
            <li value="{{ $responsable_secteur->nom_secteur }}">{{ $responsable_secteur->nom_secteur }} </li>
        @endforeach
    </ul>

    <button type="submit">Créer</button>
</form>
</body>
</html>
