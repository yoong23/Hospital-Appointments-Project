<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Patient Login</title>

    <style>
        body {
            background: #b9dcfb;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .register-container {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-card {
            background: #cfe7ff;
            padding: 40px;
            width: 420px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }

        .form-card h2 {
            text-align: center;
            color: #0b5ed7;
            margin-bottom: 5px;
        }

        .subtitle {
            text-align: center;
            font-size: 14px;
            margin-bottom: 25px;
            color: #475569;
        }

        .input-group {
            margin-bottom: 15px;
        }

        .input-group label {
            display: block;
            font-weight: 600;
            margin-bottom: 6px;
        }

        .input-group input {
            width: 100%;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #cbd5e1;
            font-size: 14px;
        }

        .remember {
            font-size: 14px;
            margin-bottom: 15px;
        }

        button {
            width: 100%;
            background: #0b5ed7;
            color: #fff;
            padding: 12px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background: #094db1;
        }

        .login-text {
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
        }

        .login-text a {
            color: #0b5ed7;
            font-weight: 600;
            text-decoration: none;
        }

        .error {
            background: #fee2e2;
            padding: 12px;
            margin-bottom: 15px;
            border-radius: 6px;
            color: #991b1b;
            font-size: 14px;
        }
    </style>
</head>
<body>

<div class="register-container">
    <div class="form-card">

        <h2>Patient Login</h2>
        <p class="subtitle">Login to book appointments</p>

        @if ($errors->any())
            <div class="error">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login.store') }}">
            @csrf

            <div class="input-group">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required>
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>

            <div class="remember">
                <label>
                    <input type="checkbox" name="remember"> Remember me
                </label>
            </div>

            <button type="submit">Login</button>
        </form>

        <div class="login-text">
            Don't have an account?
            <a href="{{ route('register') }}">Register here</a>
        </div>

    </div>
</div>

</body>
</html>
