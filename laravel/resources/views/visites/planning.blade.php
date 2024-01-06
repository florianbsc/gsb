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
<h1>planning</h1>

<form action="#" method="#">
    @csrf

    @foreach($plannings as $planning)
        <select>
            <option value="{{$planning}}"></option>
        </select>
    @endforeach



</form>

</body>
</html>
