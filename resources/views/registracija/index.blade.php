<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>Registracija</title>
</head>

<body>

    <div class="container-sm ">

        <div class="row">

            <div class="d-flex justify-content-center">
                <h1>Registracija</h1>
            </div>

        </div>

        <!-- Modal container -->
        <div id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <span class="close">&times;</span>
                <p>Modal text goes here...</p>
                <button>The new button</button>
            </div>

        </div>

        <div class="row">

            <div class="d-flex justify-content-center">
                @if (session('success'))
                    <p class="font-monospace">{{ session('success') }}</p>
                @endif

                @if (session('error'))
                    <p class="font-monospace">{{ session('error') }}</p>
                @endif


                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <p class="font-monospace">{{ $error }}</p>
                    @endforeach
                @endif
            </div>

        </div>

        <div class="row p-3 d-flex justify-content-center">
            <div class="card my-3 p-3" style="width: 18rem;">

                <form action="{{ route('registracija.preformRegistration') }}" method="POST">

                    @csrf

                    <div class="mb-2 col-auto">

                        <div class="my-1 col-auto">
                            <label for="ime">Ime:</label>
                        </div>

                        <div class="my-1 col-auto">
                            <input type="text" name="ime" id="ime" required>
                        </div>

                    </div>

                    <div class="col-auto">

                        <div class="my-1 col-auto">
                            <label for="prezime">Prezime:</label>

                        </div>

                        <div class="my-1 col-auto">
                            <input type="text" name="prezime" id="prezime" required>
                        </div>
                        <hr>
                    </div>

                    <div class="col-auto">

                        <div class="my-1 col-auto">
                            <label for="email">Email:</label>
                        </div>

                        <div class="my-1 col-auto">
                            <input type="email" id="email" name="email" required>
                        </div>

                    </div>

                    <div class="col-auto">

                        <div class="my-1 col-auto">
                            <label for="pon_email">Ponovi email:</label>
                        </div>

                        <div class="my-1 col-auto">
                            <input type="email" id="pon_email" name="pon_email" required>
                            <hr>
                        </div>

                    </div>

                    <div class="col-auto">

                        <div class="my-1 col-auto">
                            <label for="password">Password:</label>
                        </div>

                        <div class="my-1 col-auto">
                            <input type="password" name="password" id="password">
                        </div>

                    </div>

                    <div class="col-auto">

                        <div class="my-1 col-auto">
                            <label for="pon_password">Ponovi password:</label>
                        </div>

                        <div class="my-1 col-auto">
                            <input type="password" name="pon_password" id="pon_password">
                            <hr>
                        </div>

                    </div>

                    <div class="col-auto py-1">

                        <div class="m-1 col-auto">
                            <button type="submit" id="modalBtn" class="btn btn-primary">Registriraj
                                se</button>
                        </div>

                        <div class="m-1 col-auto">
                            <a href="/" class="btn btn-secondary">Odustani</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

    @push('scripts')

    <script>
        // Get button that opens modal 
        const btn = document.getElementById('modalBtn');

        // When user clicks button, open modal 
        btn.onclick = function() {
            modal.style.display = "block";

            // Disable background scroll
            document.body.style.overflow = "hidden";
        }

        // When user clicks x button, close modal
        const close = document.getElementsByClassName("close")[0];
        close.onclick = function() {
            modal.style.display = "none";

            // Enable scroll again
            document.body.style.overflow = "auto";
        }
    </script>

    @endpush

    @stack('scripts')
    
    <script src="{{ mix('js/main.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    
</body>

</html>
