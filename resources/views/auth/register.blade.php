<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<style>
    body {
        background: #b9dcfb;
    }

    .register-container {
        min-height: 80vh;
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

    button {
        width: 100%;
        background: #0b5ed7;
        color: #fff;
        padding: 12px;
        border: none;
        border-radius: 6px;
        font-size: 16px;
        cursor: pointer;
        margin-top: 10px;
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
    }
</style>

<div class="register-container">
    <div class="form-card">
        <h2>🩺 Patient Registration</h2>
        <p class="subtitle">Create your account to book appointments</p>

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register.store') }}">
            @csrf

            <div class="input-group">
                <label for="name">Full Name</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
            </div>

            <div class="input-group">
                <label for="email">Email Address</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required>
            </div>

            <div class="input-group">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required>
            </div>

            <div class="input-group">
                <label for="password_confirmation">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required>
            </div>

            <button type="submit">Register</button>

            <p class="login-text">
                Already have an account?
                <a href="{{ route('login') }}">Login here</a>
            </p>
        </form>
    </div>
</div>
</body>
</html>
