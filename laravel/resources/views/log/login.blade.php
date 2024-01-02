<!DOCTYPE html>
<!-- Coding By CodingNepal - youtube.com/codingnepal -->
<html lang="fr" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Login Employe </title>
{{--    <link rel="stylesheet" href="style.css">--}}
</head>
<body>
<div class="center">
    <h1>Login</h1>
    @if($errors->has('login'))
        <p>{{ $errors->first('login') }}</p>
    @endif
    <form action=" {{ route('login') }}" method="post">
        @csrf
        <div class="txt_field">
            <label for="mail_employe" ></label>
            <input type="email" id="mail_employe" name="mail_employe" placeholder="Identifiant" required>
        </div>
        <div class="txt_field">
            <label placeholder="test"></label>
            <input type="password" placeholder="Password" required >
        </div>

        <div class="pass">Forgot Password?</div>
        <input type="submit" value="Login">
        <div class="signup_link">
            Not a member? <a href="{{ route('creation_employe') }}">Signup</a>
        </div>
    </form>
</div>

</body>
</html>
