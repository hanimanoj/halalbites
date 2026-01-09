@extends('layouts.app')

@section('content')

<div class="flex">

    {{-- SIDEBAR --}}
    @include('partials.sidebar')

    {{-- MAIN CONTENT --}}
    <section class="flex-1 px-12 py-10 bg-[#f3e1e1]">

        {{-- TITLE --}}
        <h1 class="text-4xl font-semibold tracking-widest mb-6 text-center">
            DIRECTORY
        </h1>

        {{-- BREADCRUMB --}}
        <a href="{{ route('category', $brand->category->slug) }}"
           class="text-lg mb-8 block hover:text-[#7a2e2e] transition">
            {{ $brand->category->name }} &lt; {{ $brand->name }}
        </a>

        {{-- CONTENT WRAPPER --}}
        <div class="flex flex-col items-center gap-8">

            {{-- MAP CARD --}}
            <div class="bg-white p-4 rounded-2xl shadow-md w-[320px] h-[240px] flex items-center justify-center">
                {{-- nanti boleh ganti Google Map / iframe --}}
                <img src="{{ asset('images/map-placeholder.png') }}"
                     alt="Map"
                     class="rounded-xl object-cover w-full h-full">
            </div>

            {{-- DETAILS TABLE --}}
            <div class="bg-[#B77B7B] rounded-xl overflow-hidden w-full max-w-xl text-white shadow-md">

                <div class="grid grid-cols-3 border-b border-white/30">
                    <p class="col-span-1 px-4 py-2 font-semibold">Brand</p>
                    <p class="col-span-2 px-4 py-2">{{ $brand->name }}</p>
                </div>

                <div class="grid grid-cols-3 border-b border-white/30">
                    <p class="px-4 py-2 font-semibold">Company</p>
                    <p class="col-span-2 px-4 py-2">{{ $brand->company_name }}</p>
                </div>

                <div class="grid grid-cols-3 border-b border-white/30">
                    <p class="px-4 py-2 font-semibold">Operating Hours</p>
                    <p class="col-span-2 px-4 py-2">{{ $brand->operating_hours }}</p>
                </div>

                <div class="grid grid-cols-3 border-b border-white/30">
                    <p class="px-4 py-2 font-semibold">Jakim Ref. No.</p>
                    <p class="col-span-2 px-4 py-2">{{ $brand->jakim_ref_no }}</p>
                </div>

                <div class="grid grid-cols-3 border-b border-white/30">
                    <p class="px-4 py-2 font-semibold">Expiry Year</p>
                    <p class="col-span-2 px-4 py-2">{{ $brand->expiry_year }}</p>
                </div>

                <div class="grid grid-cols-3">
                    <p class="px-4 py-2 font-semibold">Halal Status</p>
                    <p class="col-span-2 px-4 py-2 text-green-300 font-semibold">
                        {{ ucfirst($brand->halal_status) }}
                    </p>
                </div>

            </div>

        </div>
    </section>
</div>

@endsection
