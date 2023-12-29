<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>crée categorie</title>
</head>
<body>
<h1>New categorie</h1>

<form action="{{ route('creation_categorie') }}" method="post">
    @csrf
    <label for="categorie">Catégorie</label>
    <input type="text" name="nom_categorie" placeholder="Nom"><br>

    <input type="submit">

</form>

</body>
</html>
