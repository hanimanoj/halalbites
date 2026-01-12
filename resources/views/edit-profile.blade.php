<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Profile - Halal Bites Gombak</title>

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
            margin-left: 15px;
            text-decoration: none;
        }

        h1 {
            text-align: center;
            margin-top: 30px;
            color: #6b1f1f;
        }

        .container {
            display: flex;
            justify-content: center;
            gap: 60px;
            padding: 40px;
        }

        .avatar {
            text-align: center;
        }

        .avatar-circle {
            width: 160px;
            height: 160px;
            border-radius: 50%;
            background-color: #c97c7c;
            margin-bottom: 10px;
        }

        form {
            width: 400px;
        }

        label {
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 12px;
            margin: 8px 0 15px;
            border-radius: 8px;
            border: none;
            background-color: #eee;
        }

        button {
            padding: 12px 40px;
            border-radius: 20px;
            border: none;
            background-color: #c97c7c;
            color: white;
            font-size: 16px;
        }
    </style>
</head>
<body>

<header>
    <h3>Halal Bites Gombak</h3>
    <nav>
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('logout') }}">Logout</a>
    </nav>
</header>

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

</body>
</html>
