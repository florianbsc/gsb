
@extends('layout.app')

@section('contenu')
{{--    {{dd($medicaments)}}--}}



    <div class="container-fluid">
        <div class="col-sm-6 col-12 mb-4 mb-sm-0" style="display: flex">

            <!-- Title -->
            <h1 class="h2 mb-0 ls-tight">Les Médicaments</h1>
            <span class="text-muted text-sm" style="margin-left: 10px; margin-top: 1.5%">Nombre de médicament : {{count($medicaments)}}</span>

        </div>
        <div class="card shadow border-0 mb-7">

            <div class="table-responsive">
                <table class="table table-hover table-nowrap">

                    <thead class="thead-light">
                    <tr>
                        <th scope="col"><b>Nom</b></th>
                        <th scope="col"><b>Categorie</b></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($medicaments as $medicament)
                        <tr>
                            <td>
                                {{$medicament->nom_medicament}}
                            </td>
                            <td>
                                {{$medicament->nom_categorie}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@stop
