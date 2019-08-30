<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css">
    <title>@yield('title', 'Campus - Your place to share')</title>
</head>
<body>
    <header>
    <nav class="navbar" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">
                <a class="navbar-item title" href="#">
                Campus
                </a>
                <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                </a>
            </div>
            <div id="navbarBasicExample" class="navbar-menu">
                <div class="navbar-start">
                <a href="{{ url('Posts') }}" class="navbar-item">Home</a>
                <a href="{{ url('users')}}" class="navbar-item">Users</a>
                <a href="{{ url('recent')}}" class="navbar-item">Recent Posts</a>
                </div>
                <div class="navbar-end">
                    <a class="navbar-item">About</a>
                </div>
            </div>
            </nav>
    </header>
    @yield('content')
</body>
</html>