<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AkunController extends Controller
{
    public function index()
    {
        // Mendapatkan data pengguna yang sedang login
        $user = Auth::user();

        // Mengirim data pengguna ke tampilan akun
        return view('akun', compact('user'));
    }
}
