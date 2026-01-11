<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Halal Bites Gombak</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @vite('resources/css/app.css')

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
