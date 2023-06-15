<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $cartCount = auth()->user()->carts()->count();

        return view('home', compact('products','cartCount'));
    }
}
