<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registracija</title>
</head>
<body>
    
    <h1>Registracija</h1>

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

    <form action="{{ route('registracija.preformRegistration') }}" method="POST">
    
        @csrf
    
    <label for="ime">Ime:</label>
    <input type="text" name="ime" id="ime" required>
    
    <label for="prezime">Prezime:</label>
    <input type="text" name="prezime" id="prezime" required>
    
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    
    <label for="pon_email">Ponovljeni email:</label>
    <input type="pon_email" id="pon_email" name="pon_email" required>
    
    <label for="password">Password:</label>
    <input type="password" name="password" id="password">
    
    <label for="pon_password">Ponovljenii password:</label>
    <input type="password" name="pon_password" id="pon_password">
    
    <button type="submit">Registriraj se</button>
    <a href="/">Povratak na početak</a>
    </form>
    

</body>
</html>