@extends('layouts.app')

@section('content')

<section class="saved-page">
    <div class="container saved-container">

        <h1 class="page-title">Saved</h1>

        <p class="page-desc">
            Lets bookmark and view your favourite halal-certified places you plan to visit.
        </p>

        <div class="card-row">
            @forelse($savedPages as $saved)

                <div class="card">

                    {{-- UNSAVE --}}
                    <form
                        action="{{ route('saved.destroy', $saved->id) }}"
                        method="POST"
                        class="bookmark-btn"
                    >
                        @csrf
                        @method('DELETE')
                        <button type="submit">
                            <img
                            src="{{ asset('images/logos/save.png') }}"
                            alt="Unsave"
                        >
                        </button>
                    </form>

                    {{-- LOGO --}}
                    <div class="brand-logo">
                        @if($saved->brand && $saved->brand->logo)
                            <img
                                src="{{ asset($saved->brand->logo) }}"
                                alt="{{ $saved->brand->name }}"
                            >
                        @else
                            <span>No Logo</span>
                        @endif
                    </div>

                    <div class="card-body">
                        <h3>{{ $saved->brand->name }}</h3>

                        <p>
                            {{ $saved->brand->locations->first()->address ?? '' }}
                        </p>

                        <a
                            href="{{ route('directory.show', $saved->brand->slug) }}"
                            class="go-btn"
                        >
                            Go
                        </a>
                    </div>

                </div>

            @empty
                <p class="no-saved">No places saved yet.</p>
            @endforelse
        </div>

    </div>
</section>

@endsection
