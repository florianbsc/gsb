<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Creation de medicament</title>
</head>
<body>
<h1>Nouveau medicaments</h1>

<form action="">
    <label for="medicament">Medicmants</label><br>
    <input type="text" name="nom_medeicament" placeholder="Nom"><br>
    <input type="text" name="identifiant_categorie" placeholder="categorie"><br>


    <select>
        @foreach($categories as $categorie)
            <option value="{{ $categorie->identifiant_categorie }}">{{ $categorie->nom_categorie }}</option>
        @endforeach
    </select><br>
    <input type="submit">



</form>

</body>
</html>
