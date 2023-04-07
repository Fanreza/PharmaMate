<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('images/medical-book.png') }}" />
    <link rel="icon" type="image/png" href="{{ asset('images/medical-book.png') }}" />

    @vite(['resources/js/app.js'])

    {{-- Internal Javascript --}}
    @stack('scripts')
</head>

<body>
    <div id="app">
        @yield('content')
    </div>
</body>

</html>
