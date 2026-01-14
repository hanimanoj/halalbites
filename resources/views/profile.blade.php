@extends('layouts.app')

@section('content')

<div class="profile-wrapper">

    <h1 class="welcome-title">
        Welcome Back, {{ $user['name'] }}
    </h1>

    <div class="edit-profile-page">
    <form method="POST" action="{{ route('logout') }}" class="logout-btn">
        @csrf
        <button type="submit">Logout</button>
    </form>

    <div class="container profile-card">

        <div class="avatar">
            <div class="avatar-circle">
                {{-- optional icon --}}
                <img src="{{ asset('images/logos/profile.png') }}" alt="profile">
            </div>

            <a href="{{ route('profile.edit') }}" class="edit-link">
                Edit Profile
            </a>
        </div>

        <div class="info">
            <h2>Contact Information</h2>

            <p class="info-item">
                <strong>Email</strong><br>
                {{ $user['email'] }}
            </p>

            <p class="info-item">
                <strong>Phone</strong><br>
                {{ $user['phone'] }}
            </p>

            <p class="info-item">
                <strong>Location</strong><br>
                {{ $user['location'] }}
            </p>
        </div>

    </div>
</div>
    @if(session('success'))
        <p class="success-msg">
            {{ session('success') }}
        </p>
    @endif

</div>

@endsection
