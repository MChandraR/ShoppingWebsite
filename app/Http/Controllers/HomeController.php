<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::select(DB::raw('produk.id,nama,deskripsi,harga,stock,ram_rom,chipset,kamera,baterai'))->leftjoin('spesifikasi','spesifikasi.produk_id','produk.id')->get();
        $cartCount = 0;
        if(isset(Auth::user()->id)){
            $cartCount = Cart::where('user_id',Auth::user()->id)->count();
        }

        return view('home', compact('products','cartCount'));
    }
}
