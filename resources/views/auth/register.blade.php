@extends('layouts.app')

@section('page_title', 'Register')

@section('content')
    <div class="ml-auth-card">
        <h1 class="ml-auth-title">Register</h1>

        <form method="POST" action="{{ route('register') }}" class="ml-form-grid ml-form-grid--1">
            @csrf

            <div class="ml-field">
                <label class="ml-label">Full Name</label>
                <input class="ml-input" type="text" name="name" value="{{ old('name') }}" required autofocus>
                @error('name')
                    <div class="ml-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="ml-field">
                <label class="ml-label">Phone</label>
                <input class="ml-input" type="text" name="phone" value="{{ old('phone') }}" required>
                @error('phone')
                    <div class="ml-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="ml-field">
                <label class="ml-label">Email</label>
                <input class="ml-input" type="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="ml-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="ml-field">
                <label class="ml-label">Password</label>
                <input class="ml-input" type="password" name="password" required>
                @error('password')
                    <div class="ml-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="ml-field">
                <label class="ml-label">Confirm Password</label>
                <input class="ml-input" type="password" name="password_confirmation" required>
            </div>

            <button class="ml-btn" type="submit">
                <i data-lucide="user-plus"></i>
                Register
            </button>
        </form>

        <div class="ml-auth-footer">
            Sudah punya akun?
            <a class="ml-link" href="{{ route('login') }}">Login</a>
        </div>
    </div>
@endsection
