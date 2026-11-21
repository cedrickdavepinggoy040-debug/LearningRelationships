
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Learning Relationships</title>

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
            background: grey;
        }

        .register-container {
            width: 380px;
            background: coral;
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
            color: #777;
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
            border: 1px solid #ccc;
            border-radius: 6px;
            margin-bottom: 16px;
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

        .login-link {
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

    <div class="register-container">

        <h2>Create Account</h2>
        <p class="subtitle">Register to get started</p>

        @if($errors->any())
            <div class="message">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('register.submit') }}" method="POST">
            @csrf

            <label>Full Name</label>
            <input type="text" name="name"
                   value="{{ old('name') }}"
                   placeholder="Enter your name" required>

            <label>Email Address</label>
            <input type="email" name="email"
                   value="{{ old('email') }}"
                   placeholder="Enter your email" required>

            <label>Password</label>
            <input type="password" name="password"
                   placeholder="Create a password" required>

            <label>Confirm Password</label>
            <input type="password" name="password_confirmation"
                   placeholder="Confirm your password" required>

            <button type="submit">Create Account</button>
        </form>

        <div class="login-link">
            Already have an account?
            <a href="{{ route('login') }}">Login</a>
        </div>

    </div>

</body>
</html>
