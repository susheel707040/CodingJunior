<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            max-width: 400px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="text"], input[type="password"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        h2 {
            text-align: center;
        }
        .register-btn {
            display: block;
            text-align: center;
            margin-top: 10px;
            background-color: #007bff;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            text-decoration: none;
            border-radius: 5px;
            width: 100%;
            box-sizing: border-box;
        }
        .register-btn:hover {
            background-color: #0056b3;
        }
        .error {
            color: red; /* Ensuring error message appears in red color */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        @if ($errors->any())
            <div class="error">
                {{ $errors->first() }}
            </div>
        @endif
        <form method="POST" action="{{ route('login.submit') }}">
            @csrf
            <input type="text" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password">
            <input type="submit" value="Login" class="small-btn">
        </form>
        <a href="{{ route('register.form') }}" class="register-btn">Register</a>
    </div>
</body>
</html>
