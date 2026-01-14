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

    <div id="searchOverlay" class="search-overlay">
        <div class="search-modal">
            <div class="search-header">
                <input
                    type="text"
                    id="searchInput"
                    placeholder="Search your places"
                    autocomplete="off"
                >
                <button id="closeSearch">✕</button>
            </div>

            <div id="searchResults" class="search-results">
                <p class="search-empty">No recent searches</p>
            </div>
        </div>
    </div>
    
    @stack('scripts')

    {{-- FOOTER --}}
    @include('footer')

    {{-- 🔧 SEARCH SCRIPT --}}
    <script>
        const openBtn = document.getElementById('openSearch');
        const overlay = document.getElementById('searchOverlay');
        const closeBtn = document.getElementById('closeSearch');
        const input = document.getElementById('searchInput');
        const results = document.getElementById('searchResults');

        openBtn.onclick = () => {
            overlay.style.display = 'flex';
            input.focus();
        };

        closeBtn.onclick = () => overlay.style.display = 'none';

        overlay.onclick = (e) => {
            if (e.target === overlay) overlay.style.display = 'none';
        };

        input.addEventListener('input', async () => {
            if (input.value.length < 2) {
                results.innerHTML = '<p class="search-empty">No recent searches</p>';
                return;
            }

            const res = await fetch(`/search/live?q=${input.value}`);
            const html = await res.text();
            results.innerHTML = html;
        });
    </script>

</body>
</html>
