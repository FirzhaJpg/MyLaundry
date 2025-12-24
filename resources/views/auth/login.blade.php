@extends('layouts.app')

@section('page_title', 'Login')

@section('content')
    <div class="ml-auth-card">
        <div class="ml-auth-logo">
            <img src="{{ asset('MyLaundry-Logo.png') }}" alt="MyLaundry Logo">
        </div>
        <h1 class="ml-auth-title">Login</h1>

        <form method="POST" action="{{ route('login') }}" class="ml-form-grid ml-form-grid--1">
            @csrf

            <div class="ml-field">
                <label class="ml-label">Email</label>
                <input class="ml-input" type="email" name="email" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <div class="ml-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="ml-field">
                <label class="ml-label">Password</label>
                <input class="ml-input" type="password" name="password" required>
            </div>

            <div class="ml-check">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Remember me</label>
            </div>

            <button class="ml-btn" type="submit">
                <i data-lucide="log-in"></i>
                Login
            </button>
        </form>

        <div class="ml-auth-footer">
            Belum punya akun?
            <a class="ml-link" href="{{ route('register') }}">Register</a>
        </div>
    </div>
@endsection
