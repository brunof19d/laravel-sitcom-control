<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/9a4416e63f.js" crossorigin="anonymous"></script>
    <title>Sitcom Control</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-2 d-flex justify-content-between">
        <a class="navbar navbar-expand-lg" href="{{ route('show_series') }}">Home</a>
        @auth
            <a href="/mylogout" class="text-danger">Logout</a> 
        @endauth

        @guest
            <a href="/series" class="text-danger">Login</a>  
        @endguest
        
    </nav>
    <div class="container">
        <div class="jumbotron">
            <h1>@yield('header')</h1>
        </div>

        @yield('content')

    </div>
</body>

</html>