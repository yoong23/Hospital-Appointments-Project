@extends('layouts.app')

@section('title','Home')

@section('content')
<div class="homepage-container">
    <h1>🏥 Hospital Management System</h1>
    <p>Welcome to the official digital hospital portal. Choose your role to continue:</p>

    <div class="role-buttons">
        <a href="{{ route('register') }}"><i class="fas fa-user-plus"></i> Patient Register</a>
        <a href="{{ route('login') }}"><i class="fas fa-user"></i> Patient Login</a>
        <a href="{{ route('admin.login') }}"><i class="fas fa-user-shield"></i> Admin Login</a>
    </div>
</div>
@endsection