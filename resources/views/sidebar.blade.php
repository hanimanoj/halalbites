<div class="w-52 bg-[#b77] p-4 text-white">
    <h3 class="font-bold mb-3">CATEGORIES</h3>

    <a href="{{ route('directory.index') }}"
        class="{{ request()->is('directory') ? 'active' : '' }}">
        All
    </a>

    @foreach($categories as $cat)
    <a href="{{ route('directory.category', $cat->slug) }}"
        class="{{ request()->is('directory/'.$cat->slug) ? 'active' : '' }}">
        {{ $cat->name }}
    </a>
    @endforeach

</div>