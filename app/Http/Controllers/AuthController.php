<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function showAdminLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Jika autentikasi berhasil, redirect ke halaman beranda atau halaman tujuan lainnya
            return redirect()->route('home');
        } else {
            // Jika autentikasi gagal, kembali ke halaman login dengan pesan error
            return redirect()->route('login')->withErrors(['email' => 'Invalid credentials']);
        }
        
        if (Auth::guard('admin')->attempt($credentials)) {
            // Jika autentikasi berhasil, redirect ke halaman beranda admin atau halaman tujuan lainnya
            return redirect()->route('admin.dashboard');
        } else {
            // Jika autentikasi gagal, kembali ke halaman login dengan pesan error
            return redirect()->route('admin.login')->withErrors(['email' => 'Invalid credentials']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}


