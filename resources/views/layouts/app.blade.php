<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Halal Bites Gombak</title>

    @vite('resources/css/app.css')
</head>

<body class="bg-[#F6E4E1]">

    {{-- HEADER --}}
    @include('header')

    {{-- CONTENT PAGE --}}
    <main>
        @yield('content')
    </main>

    {{-- FOOTER --}}
    @include('footer')

</body>
</html>
