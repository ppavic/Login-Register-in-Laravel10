<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    <title>Prva stranica</title>
</head>

<body>
    <div class="container">


        <div class="row g-3">
            <div class=" d-flex justify-content-center"><h1>Login & registracija</h1 ></div>
        </div>

        <div class="row g-2">
            
            {{-- Link na stranicu za registraciju --}}
            <div class="g-2 d-flex justify-content-center">
                    <div class="p-3"><a href="{{ route('registracija.index') }}"
                        class="btn btn-primary">Registracija</a></div>

                {{-- Link na stranicu za prijavu --}}

                    <div class="p-3 "><a href="{{ route('login.index') }}" class="btn btn-primary">Login</a>
                </div>
            </div>
        </div>

    </div>
</body>

</html>
