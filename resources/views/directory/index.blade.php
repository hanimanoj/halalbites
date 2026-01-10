@extends('layouts.app')

@section('content')
<div class="flex max-w-10xl gap-6">

    {{-- SIDEBAR --}}
    @include('sidebar')

    {{-- CONTENT --}}
    <main class="flex-1 px-12 py-10 ">
        <h1 class="text-4xl font-semibold tracking-widest mb-6 text-center">
            DIRECTORY
        </h1>
        <div class="text-lg mb-8 px-6">
          <h1 class="hover:text-[#7a2e2e] transition font-medium">
              {{ strtoupper($currentCategory) }}
          </h1>
        </div>

        <!-- CARD AREA -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-0 gap-y-8 max-w-7xl mx-auto px-6 mt-12 mb-24">
          @foreach($brands as $brand)

          <div
              class="group w-full max-w-[260px] h-[280px]
                    bg-white rounded-2xl
                    overflow-hidden
                    shadow-md
                    transition-all duration-300
                    hover:-translate-y-2 hover:shadow-xl
                    cursor-pointer"
              >

          <!-- LOGO AREA -->
          <div class="h-40 bg-white flex items-center justify-center">
            @if($brand->logo)
              <img 
                src="{{ asset($brand->logo) }}" 
                alt="{{ $brand->name }} logo"
                class="w-full h-full object-contain p-6
                      transition-transform duration-300
                      group-hover:scale-105"
              >
            @else
              <span class="text-gray-400">No Logo</span>
            @endif
          </div>

          <!-- INFO AREA -->
          <div class="bg-[#6b1f1f] p-4 text-white relative h-[120px]
                      transition-colors duration-300
                      group-hover:bg-[#581616]">

          <!-- BOOKMARK -->
          <div class="absolute top-4 right-4">
            <img 
                src="{{ asset('images/logos/save.png') }}"
                alt="Save"
                class="w-5 h-5
                      opacity-80
                      transition-all duration-300
                      group-hover:scale-110
                      group-hover:opacity-100"
            >
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
                  transition-all duration-300
                  group-hover:bg-[#f2dede]
                  group-hover:tracking-wide">
            Go
          </a>
          </div>
  </div>

            @endforeach
        </div>
    </main>

</div>
@endsection
