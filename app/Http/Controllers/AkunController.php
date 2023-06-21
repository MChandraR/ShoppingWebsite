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
            "email" => $req->email,
            "alamat" => $req->alamat
        ]);

        if(isset($req->profile_image)){
            if($req->profile_image != null){
                $file = $req->profile_image;
                $path = "images/users/";
                if(isset(Auth::user()->id)){
                    $idProduct = Auth::user()->id;
                }
                // Storage::putFileAs($path,$file,$idProduct->id.".png");
                $file->move($path,$idProduct.".png");
            }
        }

        return back()->with('success', 'Akun berhasil diupdate !');;
    }
}
 