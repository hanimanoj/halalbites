@extends('layouts.app')

@section('content')
<div class="directory-wrapper">

    {{-- SIDEBAR --}}
    @include('sidebar')

    {{-- MAIN CONTENT --}}
    <main class="directory-main">

        {{-- TITLE --}}
        <h1 class="directory-title">DIRECTORY</h1>

        {{-- CURRENT CATEGORY --}}
        <div class="directory-category">
            {{ strtoupper($currentCategory) }}
        </div>

        {{-- CARD GRID --}}
        <div class="directory-grid">

            @foreach($brands as $brand)
            <div class="directory-card">

                {{-- BOOKMARK (TOP RIGHT) --}}
                <form
                    action="{{ route('saved.store', $brand->id) }}"
                    method="POST"
                    class="bookmark-btn"
                >
                    @csrf
                    <button type="submit">
                        <img
                            src="{{ asset('images/logos/save.png') }}"
                            alt="Save"
                        >
                    </button>
                </form>

                {{-- LOGO AREA --}}
                <div class="card-logo">
                    @if($brand->logo)
                        <img
                            src="{{ asset($brand->logo) }}"
                            alt="{{ $brand->name }}"
                        >
                    @else
                        <span>No Logo</span>
                    @endif
                </div>

                {{-- INFO AREA --}}
                <div class="card-info">
                    <h3>{{ $brand->name }}</h3>

                    <p>
                        {{ $brand->locations->first()->address ?? '' }}
                    </p>

                    {{-- GO BUTTON --}}
                    <a
                        href="{{ route('directory.show', $brand->slug) }}"
                        class="go-btn"
                    >
                        Go
                    </a>
                </div>

            </div>
            @endforeach

        </div>
    </main>
</div>
@endsection
