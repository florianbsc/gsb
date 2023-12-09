
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulaire de Création</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        form {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        select,
        button {
            padding: 8px;
            margin-bottom: 15px;
            width: calc(100% - 16px);
            border-radius: 3px;
            border: 1px solid #ccc;
        }

        button {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>


    <form action="{{  route('creation_de_visite') }}" method="post">
        @csrf
        <label for="employe">Employé</label>
        <select name="id_employe" id="employe">
            @foreach($demarcheurs as $demarcheur)
                <option value="{{ $demarcheur->identifiant_employe }}">{{ $demarcheur->nom_employe .' '. $demarcheur->prenom_employe }} </option>

            @endforeach

            </select>

            <label for="proffessionnel_sante">Professionnel de Santé</label>
            <select name="id_prof_sante" id="proffessionnel_sante">
                @foreach($pro_santes as $pro_sante)
                    <option value="{{ $pro_sante->identifiant_professionnel_de_sante }}">{{ $pro_sante->nom_professionnel_de_sante .' '. $pro_sante->prenom_professionnel_de_sante  }} </option>
                @endforeach
            </select>

            <label for="medicament">Médicament</label>
    ²{{--    les info transites via le name, l'id est utilie que pour le css--}}
            <select name="id_medicament" id="medicament">
                @foreach($medicaments as $medicament)
                    <option value="{{ $medicament->identifiant_medicament }}">{{ $medicament->nom_medicament .'-'. $medicament->nom_categorie }} </option>

                @endforeach
            </select>
            <button type="submit">Créer</button>
    </form>

</body>
</html>
