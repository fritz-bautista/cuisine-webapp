<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- ✅ Mobile responsive -->
    @yield('title')
    {{-- ✅ Vite-compiled CSS/JS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/nav-bar.css') }}">
    @yield('styles')
    @yield('styles2')
</head>


<body>
    <div class="Nav-Bar">
        <div class="Nav-Bar-TopRow">
            <button class="nav-toggle" onclick="toggleNav()">☰</button>
            <a class="Logo-link" href="{{ route('home') }}">
                <img class="Logo" src="{{ asset('img/Logo.png') }}" alt="Logo">
            </a>
        </div>

        <div class="Nav-Bar-Category-Container" id="mobileNav">
            <a href="{{ route('arti.blogs') }}">Articles & Blogs</a>
            <a href="{{ route('community.index') }}">Community</a>
            <a href="{{ route('featured.resto') }}">Restaurants</a>
            <a href="{{ route('about.index') }}">About</a>
            <a href="{{ route('contact.index') }}">Submit</a>
        </div>

        <div class="Auth-Container">
            @auth
                <a href="{{ route('profile.edit') }}">Profile</a>
                <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                    @csrf
                    <button type="submit" style=cursor:pointer;>
                        Logout
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}">Login</a>
            @endauth
        </div>
    </div>

    <main class="main-container">
        @yield('content')
        @yield('footer')
    </main>
    <script>
        function toggleNav() {
            const nav = document.getElementById('mobileNav');
            nav.classList.toggle('show-nav');
        }
    </script>

</body>

</html>