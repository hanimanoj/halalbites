<header class="bg-[#6B1F1F] px-10 py-4 flex items-center justify-between">
    <!-- LOGO -->
    <div class="flex items-center gap-2 text-white font-semibold text-lg">
        🍽️ <span>Halal Bites Gombak</span>
    </div>

    <!-- NAV -->
    <nav class="bg-white/20 px-6 py-2 rounded-full flex gap-6 text-white">
        <a href="{{ route('home') }}" class="px-3 py-1 rounded-full hover:bg-white/30 transition">Home</a>
        <a href="{{ route('directory.index') }}" class="px-3 py-1 rounded-full hover:bg-white/30 transition">Directory</a>
        <a href="{{ route('saved.index') }}" class="px-3 py-1 rounded-full hover:bg-white/30 transition">Saved</a>
    </nav>

    <!-- ICONS -->
    <div class="text-white flex gap-4 text-lg">
        🔍 👤 ⚙️
    </div>
</header>
