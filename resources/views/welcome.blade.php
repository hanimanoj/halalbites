@extends('layouts.app')

@section('content')
<section class="hero">
    <h1>THE EASIEST WAY TO<br>FIND YOUR HALAL FOODS</h1>
    <p>Halal Bites Gombak is the perfect tool to satisfy your cravings.<br>
       Start using it now!</p>
    <button class="btn">Get Started</button>
</section>

<hr class="divider">

<section class="about">
    <h2>About Us</h2>
    <img src="{{ asset('images/logos/black.png') }}" alt="Halal Bites Logo" class="black-logo">
    <p>
        Halal Bites Gombak is a platform designed to help users identify
        authentic JAKIM halal-certified food and beverage outlets within
        the Gombak area.
    </p>
</section>

<hr class="divider">

<section class="jakim">
    <h2>What is JAKIM?</h2>
    <img src="{{ asset('images/logos/jakim.png') }}" alt="JAKIM Logo" class="jakim-logo">
    <p>
        JAKIM (Jabatan Kemajuan Islam Malaysia) is the official authority 
        responsible for issuing and monitoring halal certifications in Malaysia. 
        A JAKIM certification indicates that the food preparation, ingredients, 
        and handling processes comply with Islamic dietary guidelines.
    </p>
</section>

<hr class="divider">

<section class="halal">
    <h2>Why Halal Matters</h2>
    <div class="card-container">
        <div class="card">Safe and clean</div>
        <div class="card">Free from prohibited or harmful ingredients</div>
        <div class="card">Compliant with Islamic dietary requirements</div>
    </div>

    <p class="verse">
        "O humankind! Eat from what is lawful and good on the earth and do not follow
        Satan’s footsteps. He is truly your sworn enemy.""
    </p>
</section>
@endsection
