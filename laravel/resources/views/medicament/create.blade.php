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
<h1>Nouveau medicament</h1>

<form action="{{  route('creation_medicament') }}" method="post">
    @csrf
    <label for="medicament">Médicament</label><br>
    <input type="text" name="nom_medicament" placeholder="Nom"><br>

    <label for="identifiant_categorie">Categorie</label>
    <select name="id_categorie">
        @foreach($categories as $categorie)
            <option value="{{ $categorie->identifiant_categorie }}">{{ $categorie->nom_categorie }}</option>
        @endforeach
    </select><br>
    <input type="submit">



</form>

</body>
</html>
