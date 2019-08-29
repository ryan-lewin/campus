<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Campus - Your place to share')</title>
</head>
<body>
    <header>
        <ul>
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ url('users')}}">Users</a></li>
            <li><a href="{{ url('recent')}}">Recent Posts</a></li>
        </ul>
    </header>
    @yield('content')
</body>
</html>