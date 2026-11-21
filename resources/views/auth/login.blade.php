<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Learning Relationships</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background:  grey;
        }

        .login-container {
            width: 360px;
            background:  coral;
            padding: 35px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        }

        h2 {
            text-align: center;
            color: #183b65;
            margin-bottom: 8px;
        }

        .subtitle {
            text-align: center;
            color: #1b1b1b;
            font-size: 14px;
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            color: #333;
            font-size: 14px;
        }

        input {
            width: 100%;
            padding: 11px;
            border: 1px solid #c4c4c4;
            border-radius: 6px;
            margin-bottom: 18px;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #183b65;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 15px;
        }

        button:hover {
            background: #102b4b;
        }

        .message {
            color: #c0392b;
            font-size: 13px;
            margin-bottom: 12px;
        }

        .success {
            color: green;
            font-size: 13px;
            margin-bottom: 12px;
        }

        .register-link {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
        }

        a {
            color: #183b65;
            text-decoration: none;
        }
    </style>
</head>

<body>

    <div class="login-container">

        <h2>Welcome</h2>
        <p class="subtitle">Login to your account</p>

        @if(session('success'))
            <p class="success">{{ session('success') }}</p>
        @endif

        @if($errors->any())
            <div class="message">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('login.submit') }}" method="POST">
            @csrf

            <label>Email Address</label>
            <input type="email" name="email"
                   value="{{ old('email') }}"
                   placeholder="Enter your email" required>

            <label>Password</label>
            <input type="password" name="password"
                   placeholder="Enter your password" required>

            <button type="submit">Login</button>
        </form>

        <div class="register-link">
            Don't have an account?
            <a href="{{ route('register') }}">Register</a>
        </div>

    </div>

</body>
</html>