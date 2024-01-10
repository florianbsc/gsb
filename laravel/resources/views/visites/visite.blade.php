<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
@extends('layout.app')

@section('contenu')
<h1>planning</h1>

<form action="{{ route('planning') }}" method="post">
    @csrf

    <label for="visite">Visites</label>
    <select name="visite" id="visite">
        @foreach($plannings as $planning)
            <option value="{{$planning->}}">{{ $planning }}</option>
        @endforeach
    </select>



</form>
@stop

</body>
</html>
