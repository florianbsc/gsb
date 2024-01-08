<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>delegue</title>
</head>
<body>
<nav>
    <a href="{{ route('login') }}">Connexion</a>
    <ul>
        <li>
            <a href="{{ route('creation_visite') }}">crea visiteur</a>
        </li>
        <li>
            <a href="{{ route('creation_demarcheur') }}">crea demarcheur</a>
        </li>
        <li>
            <a href="{{ route('logout') }}">deco</a>
        </li>
    </ul>
</nav>


<h2>Creation delegue</h2>

<form action="{{ route('creation_delegue') }}" method="post">
    @csrf
    <label for="delegue">delegue</label><br>
    <input type="text" name="nom_employe" placeholder="Nom"><br>
    <input type="text" name="prenom_employe" placeholder="Prénom"><br>
    <input type="text" name="telephone_employe" placeholder="Numéro de téléphone"><br>
    <input type="text" name="mail_employe" placeholder="Mail"><br>
    <input type="password" name="mdp_employe" placeholder="Mot de Passe"><br>

    <select>
        @foreach($regions as $region)
            <option value="{{ $region->nom_region }}">{{ 'region : '. $region->nom_region }}</option>
        @endforeach
    </select><br>
    <input type="submit">



</form>
</body>
</html>
