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
                            {{$visite->nom_medicament}}
                        </td>
                        <td>
                            <span class="badge badge-lg badge-dot">
                                            <i class="bg-success"></i> terminer
                                        </span>
                            {{$visite->etat_visite}}
                        </td>
                        <td >
                            <label for="documentUpload" class="btn btn-sm btn-neutral">
                                <input type="file" id="documentUpload" style="display:none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
                                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5"/>
                                    <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708z"/>
                                </svg>
                            </label>

                            {{$visite->rapport}}

                        </td>
                    </tr>

                    </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@stop
