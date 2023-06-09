<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        // Validasi data input
        // $this->validate($request, [
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|email|unique:users|max:255',
        //     'password' => 'required|string|min:8|confirmed',
        // ]);\
        
        //Lihat apakah email telah terpakai atau belum
        $usercount = User::where('email',$request->email)->count();
        if ($usercount > 0){
            echo "<script>alert('Email sudah digunakan !');</script>";
        }else{
            // Buat pengguna baru
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);

            
            // Login pengguna setelah berhasil registrasi
            Auth::login($user);
        }

        // Redirect ke halaman setelah login
        return redirect()->intended('/login');
    }
}
