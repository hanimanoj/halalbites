<aside class="w-60 bg-[#b57b7b] text-white min-h-screen px-6 py-10 relative">

    {{-- TITLE --}}
    <h2 class="text-lg font-bold tracking-widest text-center mb-10">
        CATEGORIES
    </h2>

    {{-- CATEGORY LIST --}}
    <div class="flex flex-col gap-4 mt-6 ms-5">

        {{-- ALL --}}
        <a href="{{ route('directory.index') }}"
           class="px-6 py-2 rounded-full transition text-left
           {{ $currentCategory == 'All'
                ? 'bg-[#8f5a5a] font-semibold'
                : 'hover:bg-[#a66b6b]' }}">
            All
        </a>

        {{-- OTHERS --}}
        @foreach($categories as $cat)
            <a href="{{ route('directory.category', $cat->slug) }}"
               class="px-6 py-2 rounded-full transition text-left
                    {{ $currentCategory == $cat->slug
                    ? 'bg-[#8f5a5a] font-semibold'
                    : 'hover:bg-[#a66b6b]' }}">
                {{ $cat->name }}
            </a>
        @endforeach

    </div>
</aside>
