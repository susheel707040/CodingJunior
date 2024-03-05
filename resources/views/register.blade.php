<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
        .login-btn {
            display: block;
            text-align: center;
            margin-top: 10px;
            background-color: #007bff; /* Blue color */
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            text-decoration: none;
            border-radius: 5px;
            width: 100%;
            box-sizing: border-box;
        }
        .login-btn:hover {
            background-color: #0056b3; /* Darker shade of blue on hover */
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <form method="POST" action="{{ route('register.submit') }}">
            @csrf
            <input type="text" name="name" placeholder="Name" required>
            <input type="text" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
            <span class="error">
                @error('password')
                    {{ $message }}
                @enderror
            </span>
            <input type="submit" value="Register">
        </form>
        <a href="{{ route('admin.login') }}" class="login-btn">Login</a>
    </div>
</body>
</html>
