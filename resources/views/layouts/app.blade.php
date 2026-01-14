<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Halal Bites Gombak</title>

    <link rel="stylesheet" href="{{ asset('css/directorydesign.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/save.css') }}">
    @stack('styles')
    
    @vite('resources/css/app.css')
   

    <meta name="csrf-token" contents="{{ csrf_token() }}">

</head>

<body class="{{ session('dark_mode') ? 'dark' : '' }}">

    {{-- HEADER --}}
    @include('header')

    {{-- CONTENT PAGE --}}
    <main>
        @yield('content')
    </main>
    
    @stack('scripts')

    {{-- FOOTER --}}
    @include('footer')

</body>
</html>
