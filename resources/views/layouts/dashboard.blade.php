<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Brand Influencer Connect') }} - @yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @if(isset($userType))
        <link rel="stylesheet" href="{{ asset('css/' . $userType . '-dashboard.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('css/brand-dashboard.css') }}">
    @endif
</head>
<body>
    <!-- Navigation -->
    <div class="nav-container">
        <nav class="navbar">
            <a href="@yield('dashboard-route')" class="nav-brand">
                Brand Influencer Connect
            </a>

            <ul class="nav-links">
                @yield('nav-links')
                <li><span>@yield('user-name')</span></li>
                <li>
                    <form method="POST" action="@yield('logout-route')" style="display: inline;">
                        @csrf
                        <button type="submit" class="logout-btn">
                            Logout
                        </button>
                    </form>
                </li>
            </ul>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        @hasSection('header')
            <div class="page-header">
                @yield('header')
            </div>
        @endif

        @yield('content')
    </div>

    <!-- Flash Messages -->
    @if (session('success'))
        <div class="fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="fixed top-4 right-4 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg z-50">
            {{ session('error') }}
        </div>
    @endif
</body>
</html>