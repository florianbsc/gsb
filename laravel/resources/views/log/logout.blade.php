<html lang="en" dir="ltr" data-nav-layout="vertical" data-vertical-style="overlay" class="light"
      data-header-styles="light" data-menu-styles="light" data-toggled="close" loader="disable"
      data-lt-installed="true">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GSB - Intranet</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
            integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link id="style" href="{{ asset('assets/libs/simplebar/simplebar.min.css') }}" rel="stylesheet">
    <meta http-equiv="imagetoolbar" content="no">
</head>
<body>


<p>Se connecter</p>
<form action="/login" method="POST">
    @csrf

{{--        @if(null !== Session::get('error'))--}}
{{--                <span>Mot de passe ou nom d'utilisateur incorrecte !</span>--}}
{{--        @endif--}}
            <label for="signin-username">
                Identifiant
            </label>
            <input type="text"
                   name="utilisateur" id="new-username" placeholder="Identifiant"
                   autocomplete="new-username">


                <input type="password"
                       name="password" id="new-password" placeholder="Mot de passe"
                       autocomplete="new-password">
                <button aria-label="button"
                        type="button" onclick="createpassword('signin-password',this)"
                        id="button-addon2">
                    <i class="align-middle ri-eye-off-line"></i>
                </button>
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label for="defaultCheck1"> En se rappelle de vous ? </label>

            <button type="submit">
                Connexion
            </button>

<a href="{{ route('documentation') }}" target="_blank">Lien : Documentation de la base de donnée</a><br>
<a href="/request-docs" target="_blank">Lien : Documentation technique des classes</a><br>
<a href="/uml" target="_blank">Lien : Diagramme UML des classes</a>

</form>
</body>
</html>
