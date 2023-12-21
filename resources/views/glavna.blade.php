<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prva stranica</title>
</head>
<body>
        <h2>Početna stranica</h2>
        
        {{-- Link na stranicu za registraciju --}}
        <a href="{{ route('registracija.index') }}">Registracija</a>

        {{-- Link na stranicu za prijavu --}}
        <a href="{{ route('login.index') }}">Login</a>
</body>
</html>