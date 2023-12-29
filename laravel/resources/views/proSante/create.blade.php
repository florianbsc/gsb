<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>creation Pro de Sante</title>
</head>
<body>
<h1>New pro</h1>
<form action="{{ route('creation_professionnel_de_sante') }}" method="post">
    @csrf
    <label for="professionnel_de_sante">Pro de Santé</label><br>
    <input type="text" name="nom_professionnel_de_sante" placeholder="Nom"><br>
    <input type="text" name="prenom_professionnel_de_sante" placeholder="Prénom"><br>
    <input type="text" name="metier_professionnel_de_sante" placeholder="categorie"><br>
    <input type="text" name="adresse" placeholder="Adresse"><br>
    <input type="text" name="code_postale" placeholder="Code postale"><br>
    <input type="text" name="ville_professionnel_de_sante" placeholder="Ville"><br>
    <input type="text" name="telephone_professionnel_de_sante" placeholder="Numéro de téléphone"><br>
    <input type="text" name="mail_professionnel_de_sante" placeholder="E-mail"><br>

    <input type="submit">

</form>


</body>
</html>
