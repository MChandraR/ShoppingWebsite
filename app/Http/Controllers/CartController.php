<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $carts = auth()->user()->carts()->get();

        return view('cart.index', compact('carts'));
    }

    public function store(Request $request)
    {
        $cart = new Cart();
        $cart->user_id = auth()->user()->id;
        $cart->product_id = $request->product_id;
        $cart->quantity = $request->quantity;
        $cart->save();

        return redirect()->back()->with('success', 'Product added to cart successfully.');
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();

        return redirect()->back()->with('success', 'Product removed from cart successfully.');
    }
}
