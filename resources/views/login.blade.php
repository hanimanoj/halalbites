<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Halal Bites Gombak - Login</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #6b1f1f;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: white;
        }
        .box {
            width: 400px;
            text-align: center;
        }
        input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border-radius: 8px;
            border: none;
        }
        button {
            padding: 12px 40px;
            border-radius: 20px;
            border: none;
            background-color: #c97c7c;
            color: white;
            font-size: 16px;
        }
        a {
            color: white;
            text-decoration: underline;
        }
        .error {
            color: #ffdada;
        }
    </style>
</head>
<body>

<div class="box">
    <h1>Halal Bites Gombak</h1>

    @if(session('error'))
        <p class="error">{{ session('error') }}</p>
    @endif

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <form method="POST" action="{{ route('login.submit') }}">
        @csrf
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <button type="submit">Log In</button>
    </form>

    <p style="margin-top:20px;">
        Don’t have an account? <a href="{{ route('signup') }}">Sign up</a>
    </p>
</div>

</body>
</html>
