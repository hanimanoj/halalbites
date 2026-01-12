<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up - Halal Bites Gombak</title>

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
    </style>
</head>
<body>

<div class="box">
    <h1>Sign Up</h1>

    <form method="POST" action="{{ route('signup.submit') }}">
        @csrf
        <input type="text" name="name" placeholder="Username">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <button type="submit">Sign Up</button>
    </form>

    <p style="margin-top:20px;">
        Already have an account? <a href="{{ route('login') }}">Log In</a>
    </p>
</div>

</body>
</html>
