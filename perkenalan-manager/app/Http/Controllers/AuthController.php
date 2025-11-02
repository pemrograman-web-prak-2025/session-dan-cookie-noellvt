<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('perkenalan.index')->with('success', 'Registrasi berhasil!');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $remember = $request->has('remember'); // cek apakah checkbox dicentang

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            
            // simpen info ke session
            session([
                'user_name' => Auth::user()->name,
                'user_email' => Auth::user()->email,
                'login_time' => now()->format('Y-m-d H:i:s')
            ]);
            
            return redirect('/perkenalan')->with('success', 'Login berhasil! Selamat datang ' . Auth::user()->name);
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        
        // hapus semua
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        // hapus custom
        $request->session()->forget(['user_name', 'user_email', 'login_time']);
        
        return redirect('/login')->with('success', 'Logout berhasil!');
    }
}