@extends('layouts.app')

@section('content')
<div class="px-12 py-10">
    <h1 class="text-4xl font-semibold mb-6">Saved</h1>

    @if(count($savedBrands))
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($savedBrands as $brand)
        <div class="bg-white rounded-2xl shadow-md overflow-hidden">

            <div class="h-40 flex items-center justify-center">
                <img src="{{ asset($brand->logo) }}" class="h-full object-contain p-6">
            </div>

            <div class="bg-[#6b1f1f] text-white p-4 relative">
                <form action="{{ route('saved.destroy', $brand->id) }}" method="POST"
                      class="absolute top-4 right-4">
                    @csrf
                    @method('DELETE')
                    <button>❌</button>
                </form>

                <h3 class="font-semibold text-sm">{{ $brand->name }}</h3>
                <p class="text-xs opacity-80">
                    {{ $brand->locations->first()->address ?? '' }}
                </p>

                <a href="{{ route('directory.show', $brand->slug) }}"
                   class="block mt-4 bg-white text-[#6b1f1f] text-xs font-semibold py-2 rounded text-center">
                    View
                </a>
            </div>
        </div>
        @endforeach
    </div>
    @else
        <p class="text-gray-500">No saved brands yet.</p>
    @endif
</div>
@endsection
