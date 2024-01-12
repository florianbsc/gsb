@extends('layout.app')
@section('title', 'Accueil')
@section('contenu')

    <div class="container-fluid text-center">
        <div class="welcome-container">
            <h1 class="welcome-message">Bonjour {{ auth()->user()->prenom_employe }},</h1><br>
            <h2>Bienvenue dans votre espace de gestion de visie</h2>
            <img src="https://mir-s3-cdn-cf.behance.net/project_modules/1400/6b8a0699093857.5eeafdd995e46.gif" alt="Your Image" class="welcome-image">
        </div>
    </div>

    <style>
        .welcome-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .welcome-message {
            font-size: 24px;
            color: #333;
        }

        .welcome-image {
            margin-top: 20px;
            max-width: 70%;
            height: auto;
            border-radius: 5px;
        }
    </style>

@stop
