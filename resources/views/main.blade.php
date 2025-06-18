<!DOCTYPE html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('css/nav-bar.css') }}">
    @yield('styles')
</head>
<body>
    <div class="Nav-Bar">
        <a class="Logo-link" href="{{ route('home') }}"><img class="Logo" src="{{ asset('img/Logo.png') }}" alt="logo" > </a>
        <div class="Nav-Bar-Category-Container">
            <a href="{{ route('arti.blogs') }}">Articles & Blogs</a>
            <a>Community</a>
            <a href="{{ route('featured.resto') }}">Restaurants</a>
            <a>About</a>
            <a>Contacts</a>
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