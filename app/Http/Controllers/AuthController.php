<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
            $userData = User::where('email',$request->email)->first();
            Auth::guard('admin')->attempt($credentials);
            // Jika autentikasi berhasil, redirect ke halaman beranda atau halaman tujuan lainnya
            return redirect()->route( $userData->role == "admin" ?'admin.db':'home') ;
        } 
        // Jika autentikasi gagal, kembali ke halaman login dengan pesan error
        return back();
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}


