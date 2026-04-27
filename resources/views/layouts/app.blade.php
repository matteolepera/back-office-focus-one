<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'FocusOne-Admin') }}</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/js/app.js'])

<body>
    <div id="app" class="d-flex">

        @auth
            <aside class="sidebar d-flex flex-column">

                <div class="sidebar-brand">
                    <img src="{{ asset('images/logo.png') }}" alt="logo">
                </div>

                <nav class="sidebar-nav flex-grow-1">
                    <p class="sidebar-label">Generale</p>
                    <a href="{{ route('dashboard') }}"
                        class="sidebar-link {{ request()->is('dashboard') ? 'active' : '' }}">
                        <i class="bi bi-speedometer2"></i>
                        <span>Dashboard</span>
                    </a>

                    <p class="sidebar-label mt-3">Entità</p>
                    <a href="{{ route('teams.index') }}" class="sidebar-link {{ request()->is('teams*') ? 'active' : '' }}">
                        <i class="bi bi-trophy"></i>
                        <span>Team</span>
                    </a>
                    <a href="{{ route('drivers.index') }}"
                        class="sidebar-link {{ request()->is('drivers*') ? 'active' : '' }}">
                        <i class="bi bi-person-fill"></i>
                        <span>Piloti</span>
                    </a>
                    <a href="{{ route('car-specs.index') }}"
                        class="sidebar-link {{ request()->is('car-specs*') ? 'active' : '' }}">
                        <i class="bi bi-car-front"></i>
                        <span>Vetture</span>
                    </a>
                    <a href="{{ route('power-units.index') }}"
                        class="sidebar-link {{ request()->is('power-units*') ? 'active' : '' }}">
                        <i class="bi bi-lightning-charge"></i>
                        <span>Power Units</span>
                    </a>
                </nav>

                <div class="sidebar-footer">
                    <div class="sidebar-user">
                        <div class="sidebar-avatar">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                        <div class="sidebar-user-info">
                            <span class="sidebar-user-name">{{ Auth::user()->name }}</span>
                            <span class="sidebar-user-email">{{ Auth::user()->email }}</span>
                        </div>
                    </div>
                    <div class="d-flex gap-2 mt-3">
                        <a href="{{ url('profile') }}" class="sidebar-action">
                            <i class="bi bi-person"></i>
                        </a>
                        <a href="{{ route('logout') }}" class="sidebar-action text-danger"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="bi bi-box-arrow-right"></i>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>

            </aside>
        @endauth

        <main class="main-content flex-grow-1">
            @yield('content')
        </main>

    </div>
</body>

</html>