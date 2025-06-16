<!DOCTYPE html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('css/nav-bar.css') }}">
    @yield('styles')
</head>
<body>
    <div class="Nav-Bar">
        <div class="Nav-Bar-Category-Container">
            <a>Articles & Blogs</a>
            <a>Forum</a>
            <a>Restaurants</a>
            <a>About</a>
        </div>
        <div class="Auth-Container">
            @if (Auth::check())
                <a>Profile</a>
                <a>Logout</a>
            @else
                <a>Login</a>
            @endif
        </div>
    </div>
    @yield(section: 'content')
</body>
</html>