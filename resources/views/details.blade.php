@extends('layouts.app')

@section('content')
<div class="max-w-10xl mx-auto flex ">
    
    {{-- SIDEBAR --}}
    @include('sidebar')

    {{-- MAIN CONTENT --}}
    <section class="flex-1 px-12 py-10">

        {{-- TITLE --}}
        <h1 class="text-4xl font-semibold tracking-widest mb-6 text-center">
            DIRECTORY
        </h1>

        {{-- BREADCRUMB --}}
        <div class="text-lg mb-8 px-12">
            <a href="{{ route('directory.category', $brand->category->slug) }}"
                class="hover:text-[#7a2e2e] transition font-medium">
                {{ strtoupper($brand->category->name) }}
            </a>
            <span class="mx-1">&lt;</span>
            <span class="font-semibold text-black">
                {{ strtoupper($brand->name) }}
            </span>
        </div>

        {{-- CONTENT --}}
        <div class="flex flex-col items-center gap-10 mt-6">

            {{-- MAP CARD --}}
            <div class="group h-[260px] w-full max-w-xl rounded-xl overflow-hidden
                        shadow-md border-3 border-black/40
                        transition-all duration-300
                        hover:shadow-xl hover:-translate-y-1"
                >
                @if($location && $location->full_address)
                    <iframe
                        width="100%"
                        height="100%"
                        frameborder="0"
                        style="border:0"
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        src="https://www.google.com/maps?q={{ urlencode($location->full_address) }}&output=embed">
                    </iframe>
                @else
                    <div class="flex items-center justify-center h-full text-sm text-gray-500">
                        Location not available
                    </div>
                @endif
            </div>

            {{-- DETAILS TABLE --}}
            <div class="bg-[#B77B7B] rounded-xl overflow-hidden w-full max-w-3xl text-white shadow-md border-3 border-black/40">

                {{-- DETAILS HEADER --}}
                <div class="text-center font-semibold tracking-widest py-2 border-b-3 border-black/40 bg-[#A86B6B]">
                    DETAILS
                </div>

                {{-- ROW --}}   
                <div class="grid grid-cols-3 border-b-3 border-black/40">
                    <p class="px-4 py-2 font-semibold border-r-3 border-black/40">Brand</p>
                    <p class="col-span-2 px-4 py-2">Kenangan Coffee</p>
                </div>

                <div class="grid grid-cols-3 border-b-3 border-black/40">
                    <p class="px-4 py-2 font-semibold border-r-3 border-black/40">Company</p>
                    <p class="col-span-2 px-4 py-2">{{ $brand->company_name }}</p>
                </div>

                <div class="grid grid-cols-3 border-b-3 border-black/40">
                    <p class="px-4 py-2 font-semibold border-r-3 border-black/40">Operating Hours</p>
                    <p class="col-span-2 px-4 py-2">{{ $brand->operating_hours }}</p>
                </div>

                <div class="grid grid-cols-3 border-b-3 border-black/40">
                    <p class="px-4 py-2 font-semibold border-r-3 border-black/40">Jakim Ref. No.</p>
                    <p class="col-span-2 px-4 py-2">{{ $brand->jakim_ref_no }}</p>
                </div>

                <div class="grid grid-cols-3 border-b-3 border-black/40">
                    <p class="px-4 py-2 font-semibold border-r-3 border-black/40">Expiry Year</p>
                    <p class="col-span-2 px-4 py-2">{{ $brand->expiry_year }}</p>
                </div>

                <div class="grid grid-cols-3">
                    <p class="px-4 py-2 font-semibold border-r-3 border-black/40">Halal Status</p>
                    <p class="col-span-2 px-4 py-2 text-green-300 font-semibold">
                        {{ ucfirst($brand->halal_status) }}
                    </p>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection