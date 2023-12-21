<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>

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

    <form action="{{ route('performLogin') }}" method="POST">
    
        @csrf
    
    <label for="email">Email:</label>
    <input type="text" name="email" id="email" required>

    <label for="password">Password</label>
    <input type="password" required name="password" id="password">

    <button type="submit">Login</button>
    <a href="/">Povratak na početak</a>
    </form>

</body>
</html>