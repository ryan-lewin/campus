<!DOCTYPE html>
<html lang="en" class="has-navbar-fixed-top">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <title>@yield('title', 'Campus - Your place to share')</title>
</head>
<body>
    <header>
    <nav class="navbar is-fixed-top has-background-dark" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">
                <a class="navbar-item title is-2 has-text-primary" href="#">
                Campus
                </a>
            </div>
            <div id="navbarBasicExample" class="navbar-menu">
                <div class="navbar-start">
                <a href="{{ url('/') }}" class="navbar-item has-text-primary">Home</a>
                <a href="{{ url('users') }}" class="navbar-item has-text-primary">Users</a>
                <a href="{{ url('recent') }}" class="navbar-item has-text-primary">Recent Posts</a>
                </div>
                <div class="navbar-end">
                    <a href="{{ url('about') }}" class="navbar-item has-text-primary">About</a>
                </div>
            </div>
            </nav>
    </header>
    @yield('content')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            (document.querySelectorAll('.notification .delete') || []).forEach(($delete) => {
                $notification = $delete.parentNode;
                $delete.addEventListener('click', () => {
                    $notification.parentNode.removeChild($notification);
                });
            });
        });
    </script>
</body>
</html>