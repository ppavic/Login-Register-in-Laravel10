<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>Login</title>
</head>

<body>
    <div class="container-sm ">

        <div class="row">

            <div class="d-flex justify-content-center">
                <h1>Prijava</h1>
            </div>

        </div>

        <div class="row">
            <div class="d-flex justify-content-center">
                @if (session('success'))
                    <p>{{ session('success') }}</p>
                @endif

                @if (session('error'))
                    <p>{{ session('error') }}</p>
                @endif


                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                @endif
            </div>
        </div>




        <div class="row p-3 d-flex justify-content-center">
            <div class="card my-3 p-3" style="width: 18rem;">
                <form action="{{ route('performLogin') }}" method="POST">

                    @csrf

                    <div class="mb-2 col-auto">
                        <div class="my-1 col-auto">
                            <label for="email">Email:</label>
                        </div>

                        <div class="my-1 col-auto">
                            <input type="text" name="email" id="email" required>
                        </div>

                    </div>

                    <div class="mb-2 col-auto">

                        <div class="my-1 col-auto">
                            <label for="password">Password</label>
                        </div>

                        <div class="my-1 col-auto">
                            <input type="password" required name="password" id="password">
                        </div>

                    </div>

                    <div class="mb-2 col-auto">

                        <div class="mb-2 col-auto">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>  
                        <div class="mb-2 col-auto">
                            <a href="/" class="btn btn-primary">Odustani</a>
                        </div>

                    </div>

                </form>
            </div>
        </div>


</body>

</html>
