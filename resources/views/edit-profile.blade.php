@extends('layouts.app')

@section('content')

<h1>Edit Profile</h1>

<div class="container">

    <div class="avatar">
        <div class="avatar-circle"></div>
        <p><u>Upload Photo</u></p>
    </div>

    <form method="POST" action="{{ route('profile.update') }}">
        @csrf

        <label>Name</label>
        <input type="text" name="name" value="{{ $user->name }}" required>

        <label>Email</label>
        <input type="email" name="email" value="{{ $user->email }}" required>

        <label>Phone</label>
        <input type="text" name="phone" value="{{ $user->phone }}">

        <label>Location</label>
        <input type="text" name="location" value="{{ $user->location }}">

        <button type="submit">Save</button>
    </form>

</div>

@endsection