<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tribe - Drive Powerful Creator Marketing</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Global Styles -->
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
</head>

<body>
    <!-- Navbar Component -->
    @include('components.navbar')

    <!-- Hero Section Component -->
    @include('components.home.hero')

    <!-- Trust Section Component -->
    @include('components.home.trust')

    <!-- Features Section Component -->
    @include('components.home.features')

    <!-- Market Section Component -->
    @include('components.home.market')

    <!-- Community Sections Component -->
    @include('components.home.community')

    <!-- CTA Sections Component -->
    @include('components.home.cta')

    <!-- Footer Component -->
    @include('components.footer')
</body>
</html>
