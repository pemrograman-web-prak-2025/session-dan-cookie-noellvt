@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div style="max-width: 500px; margin: 50px auto;">
    <h2 style="text-align: center; margin-bottom: 30px; color: #667eea;">Login</h2>
    
    <form action="{{ route('login') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" required>
        </div>

        <div class="form-group" style="display: flex; align-items: center; gap: 8px; margin-bottom: 10px;">
            <input type="checkbox" name="remember" id="remember" style="width: auto; margin: 0;">
            <label for="remember" style="margin: 0; font-weight: normal; cursor: pointer;">Ingat saya</label>
        </div>

        <button type="submit" class="btn btn-primary" style="width: 100%; margin-top: 10px;">Login</button>
    </form>

    <p style="text-align: center; margin-top: 20px;">
        Belum punya akun? <a href="{{ route('register') }}" style="color: #667eea;">Daftar di sini</a>
    </p>
</div>
@endsection