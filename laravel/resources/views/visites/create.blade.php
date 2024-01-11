@extends('layout.app')

@section('contenu')

    <div class="container-fluid">
    <form action="{{  route('creation_visite') }}" method="post">
        @csrf
        <label for="region">Région</label>
        @if($is_responsable)
            <select name="nom_region" id="region">
                @foreach($regions as $region)
                    <option value="{{ $region->nom_region }}">{{$region->nom_region}}</option>
                @endforeach
            </select>
        @else
            <select name="nom_region" id="region" disabled>
                <option>{{ $delegue_region  }}</option>
            </select>
        @endif


        <label for="employe">Employé</label>
        <select name="id_employe" id="id_employe">
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
{{--    les info transites via le name, l'id est utilie que pour le css--}}
        <select name="id_medicament" id="medicament">
            @foreach($medicaments as $medicament)
                <option value="{{ $medicament->identifiant_medicament }}">{{ $medicament->nom_medicament .'-'. $medicament->nom_categorie }} </option>

            @endforeach
        </select>
        <label>Date de visite</label>
        <input type="datetime-local" name="date">
        <button type="submit">Créer</button>
    </form>
    </div>
@stop
