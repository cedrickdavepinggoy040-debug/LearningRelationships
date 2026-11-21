
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Learning Relationships</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background:  grey;
            min-height: 100vh;
        }

        header {
            background:  coral;
            color: white;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h2 {
            font-size: 21px;
        }

        .logout-btn {
            background: grey;
            color: #183b65;
            padding: 9px 17px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
        }

        .container {
            max-width: 1000px;
            margin: 40px auto;
            padding: 20px;
        }

        .welcome-card {
            background:  coral;
            padding: 35px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        }

        .welcome-card h1 {
            color: #183b65;
            margin-bottom: 12px;
        }

        .welcome-card p {
            color: #666;
            line-height: 1.6;
        }

        .info-card {
            background: coral;
            margin-top: 25px;
            padding: 25px;
            border-radius: 12px;
        }

        .info-card h3 {
            color: #183b65;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

    <header>
        <h2>Learning Relationships</h2>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </header>

    <div class="container">

        <div class="welcome-card">
            <h1>Welcome, {{ Auth::user()->name }}!</h1>

            <p>
                You have successfully logged in to your account.
                Welcome to the Learning Relationships dashboard.
            </p>
        </div>

        <div class="info-card">
            <h3>Dashboard</h3>
            <p>You are now accessing the main page of the system.</p>

            <a href="{{ route('students.index') }}">
                Manage Students
            </a>
        </div>

    </div>

</body>
</html>
