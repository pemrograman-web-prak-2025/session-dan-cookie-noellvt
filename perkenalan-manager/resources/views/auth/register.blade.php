@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div style="max-width: 500px; margin: 50px auto;">
    <h2 style="text-align: center; margin-bottom: 30px; color: #667eea;">Daftar Akun Baru</h2>
    
    <form action="{{ route('register') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="name" value="{{ old('name') }}" required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" required>
        </div>

        <div class="form-group">
            <label>Konfirmasi Password</label>
            <input type="password" name="password_confirmation" required>
        </div>

        <button type="submit" class="btn btn-primary" style="width: 100%; margin-top: 10px;">Daftar</button>
    </form>

    <p style="text-align: center; margin-top: 20px;">
        Sudah punya akun? <a href="{{ route('login') }}" style="color: #667eea;">Login di sini</a>
    </p>
</div>
@endsection