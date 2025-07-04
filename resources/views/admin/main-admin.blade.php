<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    @yield('title')
    @yield('styles')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    @yield('admin-styles')
</head>

<body>
    <div class="admin-dashboard">
        <aside class="admin-sidebar">
            <div class="admin-logo">
                <h2>CUISINE Admin</h2>
            </div>
            <nav class="admin-nav">
                <a href="{{ route('admin.dashboard') }}">📰 Dashboard</a>
                <a href="{{ route('articles.dashboard') }}">📰 Article Manager</a>
                <a href="{{ route('admin.restaurants') }}">🍽️ Restaurant Manager</a>
                <a href="{{ route('admin.users') }}">👥 User Manager</a>
                <a href="{{ route('admin.events') }}">📅 Event Manager</a>
                <a href="">⚙️ Settings</a>
            </nav>
        </aside>

        <main class="admin-main">
            <header class="admin-header">
                <h1>@yield('admin-title', 'Dashboard')</h1>
            </header>

            <section class="admin-content">
                @yield('admin-content')
            </section>
        </main>
    </div>
</body>

</html>