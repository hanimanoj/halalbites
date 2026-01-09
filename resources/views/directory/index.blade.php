@extends('layouts.app')

@section('content')
<div class="flex max-w-7xl mx-auto mt-6 gap-6">

    {{-- SIDEBAR --}}
    <aside class="w-60 bg-[#b57b7b] text-white min-h-screen px-6 py-10">>
        <!-- CATEGORY TITLE -->
        <h2 class="text-lg font-bold tracking-widest text-center mb-6">
            CATEGORIES
        </h2>

        <!-- CATEGORY LIST -->
        <div class="flex flex-col gap-3">
        
        <a href="{{ route('directory.index') }}"
           class="w-full text-center py-2 rounded-full transition
           {{ $currentCategory == 'All'
                ? 'bg-white text-[#9a2e2e] font-semibold'
                : 'hover:bg-white/20' }}">
            All
        </a>

        @foreach($categories as $cat)
            <a href="{{ route('directory.category', $cat->slug) }}"
                    class="w-full text-center py-2 rounded-full transition
                    {{ $currentCategory == $cat->slug
                    ? 'bg-white text-[#9a2e2e] font-semibold'
                    : 'hover:bg-white/20' }}">
                {{ $cat->name }}
            </a>
        @endforeach
    </aside>

    {{-- CONTENT --}}
    <main class="flex-1">
        <h1 class="text-3xl font-bold mb-10 text-center">
          {{ strtoupper($currentCategory) }}
        </h1>

        <!-- 🔥 SINI TEMPAT CARD -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-0 gap-y-8">
          @foreach($brands as $brand)

              <div
                  class="w-full max-w-[260px] h-[300px]
                        bg-white rounded-2xl
                        overflow-hidden
                        shadow-md hover:shadow-xl
                        transition"
              >

          <!-- LOGO AREA -->
          <div class="h-40 bg-white flex items-center justify-center">
            @if($brand->logo)
              <img 
                src="{{ asset($brand->logo) }}" 
                alt="{{ $brand->name }} logo"
                class="w-full h-full object-contain p-6"
              >
            @else
              <span class="text-gray-400">No Logo</span>
            @endif
          </div>

          <!-- INFO AREA -->
          <div class="bg-[#6b1f1f] p-4 text-white relative h-[150px]">

          <!-- BOOKMARK -->
          <div class="absolute top-4 right-4 text-white">
          🔖
          </div>

          <h3 class="font-semibold text-sm leading-tight">
            {{ $brand->name }}
          </h3>

          <p class="text-xs opacity-80 mt-1">
            {{ $brand->locations->first()->address ?? '' }}
          </p>

          <!-- GO BUTTON -->
          <a href="{{ route('directory.show', ['brand' => $brand->id]) }}"
            class="absolute bottom-4 left-4 right-4
                  bg-white text-[#6b1f1f]
                  text-xs font-semibold
                  py-2 rounded-md
                  text-center
                  hover:bg-[#f2dede]
                  transition">
            Go
          </a>
          </div>
  </div>

            @endforeach
        </div>
    </main>

</div>
@endsection
