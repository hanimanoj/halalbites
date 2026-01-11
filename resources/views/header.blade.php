<header class="navbar">
    <div class="nav-left">
        <img src="{{ asset('white.png') }}" alt="logo" class="white-logo">
        <span class="logo">Halal Bites Gombak</span>
    </div>

    <div class="nav-centre">
        <nav>
            <a href="{{ route('home') }}"
               class="{{ request()->routeIs('home') ? 'active' : '' }}">
                Home
            </a>

            <a href="{{ route('directory.index') }}"
               class="{{ request()->routeIs('directory') ? 'active' : '' }}">
                Directory
            </a>

            <a href="{{ route('saved.index') }}"
               class="{{ request()->routeIs('saved') ? 'active' : '' }}">
                Saved
            </a>
        </nav>
    </div>

    <div class="nav-right">
        <a href="{{ route('search') }}" class="logo">
            <img src="{{ asset('search.png') }}" alt="search" class="search-icon">
        </a>

        <a href="{{ route('settings') }}" class="logo">
            <img src="{{ asset('settings.png') }}" alt="settings" class="settings-icon">
        </a>

        <a href="{{ route('profile') }}" class="logo">
            <img src="{{ asset('profile.png') }}" alt="profile" class="profile-icon">
        </a>
    </div>
</header>
