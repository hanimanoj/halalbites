@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Saved</h1>
    <p>Lets bookmark and view your favourite halal-certified places you plan to visit.</p>

    <div class="card-row">
        @forelse($savedPages as $page)
        <div class="card">
            <div class="card-body">

                {{-- UNSAVE BUTTON --}}
                <form action="{{ route('saved.destroy', $page->id) }}" method="POST" class="btn-unsave-form">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-unsave">Unsave</button>
                </form>

                {{-- PAGE NAME --}}
                <h3 class="card-title">{{ $page->page_name }}</h3>

                {{-- GO BUTTON --}}
                <a href="{{ $page->page_url }}" class="btn-go">Go</a>

            </div>
        </div>
        @empty
            <p class="no-saved">No cafes saved yet.</p>
        @endforelse
    </div>
</div>
@endsection
