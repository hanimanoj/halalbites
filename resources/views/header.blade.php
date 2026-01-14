<header class="navbar">
    <div class="nav-left">
        <img src="{{ asset('images/logos/white.png') }}" alt="logo" class="white-logo">
        <span class="logo">Halal Bites Gombak</span>
    </div>

    <div class="nav-centre">
        <nav>
            <a href="{{ route('home') }}"
               class="{{ request()->routeIs('welcome') ? 'active' : '' }}">
                Home
            </a>

            <a href="{{ route('directory.index') }}"
               class="{{ request()->routeIs('directory') ? 'active' : '' }}">
                Directory
            </a>

            <a href="{{ route('saved-pages') }}"
                class="{{ request()->routeIs('saved-pages') ? 'active' : '' }}">
                Saved
            </a>
        </nav>
    </div>

    <div class="nav-right">
        <a href="#" class="logo">
            <img src="{{ asset('images/logos/search.png') }}" alt="search" class="search-icon">
        </a>

        <a href="{{ route('settings') }}" class="logo">
            <img src="{{ asset('images/logos/settings.png') }}" alt="settings" class="settings-icon">
        </a>

        @if(session()->has('user'))
        <a href="{{ route('profile') }}">
            <img src="{{ asset('images/logos/profile.png') }}" alt="Profile" class="profile-icon">
        </a>
        @else
        <a href="{{ route('login') }}">
            <img src="{{ asset('images/logos/profile.png') }}" alt="Login" class="profile-icon">
        </a>
        @endif
    </div>
</header>
