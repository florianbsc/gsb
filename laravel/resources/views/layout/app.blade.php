
<style>
    /* Webpixels CSS */
    /* Utility and component-centric Design System based on Bootstrap for fast, responsive UI development */
    /* URL: https://github.com/webpixels/css */

    @import url(https://unpkg.com/@webpixels/css@1.1.5/dist/index.css);

    /* Bootstrap Icons */
    @import url("https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.4.0/font/bootstrap-icons.min.css");

</style>

<!-- Banner -->

<!-- Dashboard -->
<div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
    <!-- Vertical Navbar -->
    <nav class="navbar show navbar-vertical h-lg-screen navbar-expand-lg px-0 py-3 navbar-light bg-white border-bottom border-bottom-lg-0 border-end-lg" id="navbarVertical">
        <div class="container-fluid">
            <!-- Toggler -->
            <button class="navbar-toggler ms-n2" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Brand -->
            <a class="navbar-brand py-lg-2 mb-lg-5 px-lg-6 me-0" href="{{route('accueil')}}">
                <img src="{{asset('images/gsb.png')}}" alt="Logo GSB">
            </a>
            <!-- User menu (mobile) -->
            <div class="navbar-user d-lg-none">
                <!-- Dropdown -->
                <div class="dropdown">
                    <!-- Toggle -->
                    <a href="#" id="sidebarAvatar" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="avatar-parent-child">
                            <img alt="Image Placeholder" src="https://images.unsplash.com/photo-1548142813-c348350df52b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80" class="avatar avatar- rounded-circle">
                            <span class="avatar-child avatar-badge bg-success"></span>
                        </div>
                    </a>
                    <!-- Menu -->
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="sidebarAvatar">
                        <a href="#" class="dropdown-item">Profile</a>
                        <a href="#" class="dropdown-item">Settings</a>
                        <a href="#" class="dropdown-item">Billing</a>
                        <hr class="dropdown-divider">
                        <a href="{{route('logout')}}" class="dropdown-item">Logout</a>
                    </div>
                </div>
            </div>
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidebarCollapse">
                <!-- Navigation -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('accueil')}}">
                            <i class="bi bi-house"></i> Accueil
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('planning')}}">
                            <i class="bi bi-bar-chart"></i> Visite
                        </a>
                    </li>

                        <li class="nav-item">
                            <a class="nav-link" >
                                <i class="bi bi-people"></i> Employes
                            </a>


                            <ul>
                                <li>
                                    <a href="{{route('creation_demarcheur')}}">
                                        Demarcheurs
                                    </a>

                                    <ul>
                                            <li class="nav-item">Creation</li>
                                            <li class="nav-item">Niveau 3</li>
                                            <!-- Ajoutez autant d'éléments de niveau 3 que nécessaire -->
                                        </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('creation_responsable')}}">Responsables</a>
                                    <ul>
                                        <li class="nav-item">Creation</li>
                                        <li class="nav-item">Niveau 3</li>
                                        <!-- Ajoutez autant d'éléments de niveau 3 que nécessaire -->
                                    </ul>
                                </li>

                                <li class="nav-item">
                                    <a href="{{route('creation_delegue')}}">Delegues</a>

                                    <ul>
                                        <li class="nav-item">Creation</li>
                                        <li class="nav-item">Niveau 3</li>
                                        <!-- Ajoutez autant d'éléments de niveau 3 que nécessaire -->
                                    </ul>
                                </li>

                                <!-- Ajoutez autant d'éléments de niveau 2 que nécessaire -->
                            </ul>
                        </li>

                        <!-- Ajoutez autant d'éléments de niveau 1 que nécessaire -->


                    <li class="nav-item">
                        <a class="nav-link" href="{{route('creation_medicament')}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-capsule" viewBox="0 0 16 16">
                                <path d="M1.828 8.9 8.9 1.827a4 4 0 1 1 5.657 5.657l-7.07 7.071A4 4 0 1 1 1.827 8.9Zm9.128.771 2.893-2.893a3 3 0 1 0-4.243-4.242L6.713 5.429z"/>
                            </svg> Medicaments
                        </a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="{{route('creation_professionnel_de_sante')}}">
                            <i class="bi bi-people"></i> Proffesionnels Santé
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('rapport') }}">
                            <i class="bi bi-book"></i> Rapport
                        </a>
                    </li>
                </ul>
                <!-- Divider -->
                <hr class="navbar-divider my-5 opacity-20">
                <!-- Navigation -->
                <!-- Push content down -->
                <div class="mt-auto"></div>
                <!-- User (md) -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">
                            <i class="bi bi-box-arrow-left"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Main content -->
    <div class="h-screen flex-grow-1 overflow-y-lg-auto">
        <!-- Header -->
        <header class="bg-surface-primary border-bottom pt-6">
            <div class="container-fluid">
                <div class="mb-npx">
                    <div class="row align-items-center">
                        <div class="col-sm-6 col-12 mb-4 mb-sm-0">
                            <!-- Title -->
                            <h1 class="h2 mb-0 ls-tight">Visites</h1>
                        </div>
                        <!-- Actions -->
                        <div class="col-sm-6 col-12 text-sm-end">
                            <div class="mx-n1">
                                <a href="#" class="btn d-inline-flex btn-sm btn-neutral border-base mx-1">
                                    <span class=" pe-2">
                                        <i class="bi bi-pencil"></i>
                                    </span>
                                    <span>Edit</span>
                                </a>
                                <a href="#" class="btn d-inline-flex btn-sm btn-primary mx-1">
                                    <span class=" pe-2">
                                        <i class="bi bi-plus"></i>
                                    </span>
                                    <span>Create</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Nav -->
                    <ul class="nav nav-tabs mt-4 overflow-x border-0">
                        <li class="nav-item ">
                            <a href="#" class="nav-link active">All files</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link font-regular">Shared</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link font-regular">File requests</a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
        <!-- Main -->
        <main class="py-6 bg-surface-secondary">
            @section('contenu')
            @show
        </main>
    </div>
</div>
