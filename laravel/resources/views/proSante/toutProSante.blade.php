@extends('layout.app')
@section('title', 'Liste de Proffesionnels Santés')
@section('contenu')
    {{--{{dd($professionnel_de_santes)}}--}}

    <div class="container-fluid">
        <div class="col-sm-6 col-12 mb-4 mb-sm-0" style="display: flex">

            <!-- Title -->
            <h1 class="h2 mb-0 ls-tight">Proffesionnels Santés</h1>
            <span class="text-muted text-sm"
                  style="margin-left: 10px; margin-top: 1.5%">Nombre : {{count($professionnel_de_santes)}}</span>

        </div>

                <div class="col-sm-6 col-12 mb-2 mb-sm-0" style="display: flex;margin-top:5px;">
                    <form method="POST" action="{{ route('liste_professionnel_de_sante_recherche') }}" style="display:flex">
                        @csrf
                        <input type="text" name="recherche" placeholder="Rechercher..." value="{{ $valeur_recherche ?? '' }}" style="width:250px">
                        <button type="submit" style="margin-left:15px">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                            </svg>
                        </button>
                    </form>
                </div>

        <div class="card shadow border-0 mb-7">

            <div class="table-responsive">
                <table class="table table-hover table-nowrap">

                    <thead class="thead-light">
                    <tr>
                        <th scope="col"><b>Nom Prenom</b></th>
                        <th scope="col"><b>Metier</b></th>
                        <th scope="col"><b>Adresse</b></th>
                        <th scope="col"><b>Code postale</b></th>
                        <th scope="col"><b>Ville</b></th>
                        <th scope="col"><b>Mail</b></th>
                        <th scope="col"><b>Téléphone</b></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($professionnel_de_santes as $professionnel_de_sante)
                        <tr>
                            <td>
                                {{$professionnel_de_sante->nom_professionnel_de_sante .' '. $professionnel_de_sante->prenom_professionnel_de_sante}}
                            </td>
                            <td>
                                {{$professionnel_de_sante->metier_professionnel_de_sante}}
                            </td>
                            <td>
                                {{$professionnel_de_sante->adresse}}
                            </td>
                            <td>
                                {{$professionnel_de_sante->code_postale}}
                            </td>
                            <td>
                                {{$professionnel_de_sante->ville_professionnel_de_sante}}
                            </td>
                            <td>
                                {{$professionnel_de_sante->mail_professionnel_de_sante}}
                            </td>
                            <td>
                                {{$professionnel_de_sante->telephone_professionnel_de_sante}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@stop
