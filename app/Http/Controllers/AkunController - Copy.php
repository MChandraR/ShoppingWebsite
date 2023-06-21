<?php

namespace App\Http\Controllers;
use App\Models\User;

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

    public function edit(Request $req){
        User::where('id',Auth::user()->id)->update([
            "name" => $req->name,
            "email" => $req->email
        ]);

   

        return back()->with('success', 'Akun berhasil diupdate !');;
    }
}
