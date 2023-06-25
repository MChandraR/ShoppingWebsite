<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\pesanan;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::where('user_id',Auth::user()->id)->select(DB::raw('carts.id,carts.user_id,carts.product_id,carts.quantity,produk.nama,produk.harga,produk.id as pid'))->
        join('produk','produk.id','carts.product_id')->get();
        return view('cart.index', compact('carts'));
    }

    public function getCart()
    {
        $carts =Cart::where('user_id',Auth::user()->id)->select(DB::raw('carts.id,carts.user_id,carts.product_id,carts.quantity,produk.nama,produk.harga,produk.id as pid'))->
        join('produk','produk.id','carts.product_id')->get();
        foreach($carts as $cart){
            Cart::where('id',$cart->id)->delete();
            pesanan::create([
                "user_id" => Auth::user()->id,
                "produk_id" => $cart->product_id,
                "jumlah" => $cart->quantity,
                "status" => "Pending"
            ]);
        }

        return response()->json([
            "message" => $carts ? "success" : "failed",
            "data" => $carts,
        ]);
    }

    public function store(Request $request)
    {
        $product = Product::where('id',$request->product_id);
        $sisa = $product->first()->stock - $request->quantity;
        if( $sisa < 0){
            return redirect()->back()->with('success', 'Stock produk kurang !');
        }
        $cart = new Cart();
        $cart->user_id = auth()->user()->id;
        $cart->product_id = $request->product_id;
        $cart->quantity = $request->quantity;
        $cart->save();

        $product->update([
            "stock" => $sisa
        ]);

        return redirect()->back()->with('success', 'Product added to cart successfully.');
    }

    public function delete($id)
    {
        $cart = Cart::where('id',$id);
        $product = Product::where('id',$cart->first()->product_id);
        $product->update([
            "stock" => $product->first()->stock + $cart->first()->quantity
        ]);
        $cart->delete();

        return redirect()->back()->with('success', 'Barang dihapus dari keranjang.');
    }

    public function userCancel(){
        $proses = pesanan::where('user_id',Auth::user()->id)->update([
            "status" => "Cancelled"
        ]);

        return back();
    }
}
