<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $cartCount = 0;
        if(isset(Auth::user()->id)){
            $cartCount = Cart::where('user_id',Auth::user()->id)->count();
        }

        return view('home', compact('products','cartCount'));
    }
}
