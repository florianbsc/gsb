@extends('layout.app')

@section('contenu')

    <div class="container-fluid">

        <div class="card shadow border-0 mb-7">
            <div class="card-header">
                <h5 class="mb-0">VISITE</h5>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-nowrap">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Heure</th>
                        <th scope="col">Adresse</th>
                        <th scope="col">Employer</th>
                        <th scope="col">Médicament</th>
                        <th scope="col">Proffesionel</th>
                        <th scope="col">Statu</th>
                        <th scope="col">Rapport</th>

                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            Feb 15, 2021
                        </td>
                        <td>
                            3.5€
                        </td>


                        <td>
                            <img alt="..." src="https://preview.webpixels.io/web/img/other/logos/logo-1.png" class="avatar avatar-xs rounded-circle me-2">
                            <a class="text-heading font-semibold" href="#">
                                Dribbble
                            </a>
                        </td>
                        <td>
                            <img alt="..." src="https://images.unsplash.com/photo-1502823403499-6ccfcf4fb453?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80" class="avatar avatar-sm rounded-circle me-2">
                            <a class="text-heading font-semibold" href="#">
                                Robert Fox
                            </a>
                        </td>
                        <td>
                                       <span class="badge badge-lg badge-dot bg-success">
    Scheduled
</span>

                        </td>
                        <td class="text-end">
                            nom du pro de santé
                        </td>
                        <td>
                            <span class="badge badge-lg badge-dot">
                                            <i class="bg-success"></i> terminer
                                        </span>
                        </td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-neutral"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
                                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5"/>
                                    <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708z"/>
                                </svg>
                            </a>
                            <button type="button" class="btn btn-sm btn-square btn-neutral text-danger-hover">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>

                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer border-0 py-5">
                <span class="text-muted text-sm">nombre de visites</span>
            </div>
        </div>
    </div>
@stop
