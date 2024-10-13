<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Welcome to Laravel Breeze!</h1>
        <p>
            <a href="{{ route('login') }}">Login</a> or <a href="{{ route('register') }}">Register</a>
        </p>
    </div>
</body>
</html>
