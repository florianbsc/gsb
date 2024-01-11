@extends('layout.app')
@section('title', 'Liste de visites')
@section('contenu')
    @php
        use Carbon\Carbon;
    @endphp
    <title>TEST</title>
    <div class="container-fluid">
        <div class="col-sm-6 col-12 mb-4 mb-sm-0" style="display: flex">

            <!-- Title -->
            <h1 class="h2 mb-0 ls-tight">Mes visites</h1>
            <span class="text-muted text-sm" style="margin-left: 10px; margin-top: 1.5%">Nombre de visites : {{count($visites)}}</span>

        </div>
        <div class="card shadow border-0 mb-7">

            <div class="table-responsive">
                <table class="table table-hover table-nowrap">

                    <thead class="thead-light">
                    <tr>
                        <th scope="col"><b>Demarcheur</b></th>
                        <th scope="col"><b>Date</b></th>
                        <th scope="col"><b>Heure</b></th>
                        <th scope="col"><b>Adresse</b></th>
                        <th scope="col"><b>Médicament</b></th>
                        <th scope="col"><b>Proffesionel</b></th>
                        <th scope="col"><b>statut</b></th>
                        <th scope="col"><b>Rapport</b></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($visites as $visite)
                        <tr>
                            <td>
                                <b>{{$visite->nom_employe.' '.$visite->prenom_employe}}</b>
                            </td>
                            <td>
                                {{ Carbon::createFromFormat('Y-m-d H:i:s', $visite->derniere_visite)->format('d/m/Y')  }}
                            </td>
                            <td>
                                {{ Carbon::createFromFormat('Y-m-d H:i:s', $visite->derniere_visite)->format('H:i') }}
                            </td>
                            <td>
                                {{$visite->adresse}}
                            </td>
                            <td>
                                {{$visite->nom_medicament}}
                            </td>
                            <td>
                                {{$visite->nom_professionnel_de_sante.' '.$visite->prenom_professionnel_de_sante}}
                            </td>
                            <td>
                                @switch($visite->etat_visite)
                                    @case('terminer')
                                        <span class="badge badge-lg badge-dot">
                                        <i class="bg-success"></i> Terminer
                                    </span>
                                        @break

                                    @case('en cours')
                                        <span class="badge badge-lg badge-dot">
                                        <i class="bg-warning"></i> En cours
                                    </span>
                                        @break
                                @endswitch
                            </td><td >
                                @if($visite->rapport == '')
                               aucun rapport
                                @else
                                    <a href="{{ route('download_rapport', ['chemin' => $visite->rapport]) }}">
                                        <button style="padding:4px;width:40px">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-circle" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293z"/>
                                            </svg>
                                        </button>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@stop
