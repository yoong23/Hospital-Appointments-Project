<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="auth-center">
    <div class="auth-container">
        <h2>Admin Login</h2>
        <p class="subtitle">Hospital Management System</p>

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="auth-error">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login.post') }}">
            @csrf

            <div class="input-group">
                <label>Email</label>
                <input type="email" name="email" required autofocus>
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>

            <button type="submit">Login</button>
        </form>
    </div>
</div>

</body>
</html>
