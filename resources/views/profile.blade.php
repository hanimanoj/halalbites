<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile - Halal Bites Gombak</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        header {
            background-color: #6b1f1f;
            color: white;
            padding: 15px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav a {
            color: white;
            margin: 0 10px;
            text-decoration: none;
        }

        .container {
            padding: 40px;
            display: flex;
            gap: 60px;
            align-items: center;
            justify-content: center;
        }

        .avatar {
            text-align: center;
        }

        .avatar-circle {
            width: 180px;
            height: 180px;
            border-radius: 50%;
            background-color: #c97c7c;
            margin-bottom: 15px;
        }

        .info h2 {
            color: #6b1f1f;
        }

        footer {
            background-color: #6b1f1f;
            color: white;
            padding: 30px;
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>
<body>

<header>
    <h3>Halal Bites Gombak</h3>
    <nav>
        <a href="#">Home</a>
        <a href="#">Directory</a>
        <a href="#">Saved</a>
        <a href="{{ route('logout') }}">Logout</a>
    </nav>
</header>

<h1 style="text-align:center; margin-top:40px;">
    Welcome Back, {{ $user['name'] }}
</h1>

<div class="container">
    <div class="avatar">
        <div class="avatar-circle"></div>
        <a href="{{ route('profile.edit') }}">Edit Profile</a>
        
    </div>

    <div class="info">
        <h2>Contact Information</h2>
        <p><strong>Email:</strong> {{ $user['email'] }}</p>
        <p><strong>Phone:</strong> {{ $user['phone'] }}</p>
        <p><strong>Location:</strong> {{ $user['location'] }}</p>
    </div>
</div>

<footer>
    <div>
        <strong>CONTACT US</strong><br>
        Email | Phone
    </div>

    <div>
        <strong>FOLLOW US</strong><br>
        Instagram | TikTok | Facebook
    </div>
</footer>

</body>
</html>
@if(session('success'))
    <p style="color: green; text-align:center;">
        {{ session('success') }}
    </p>
@endif
