<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\pesanan;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard');
    }

    public function mainView(){
        $dataProduct = Product::count(); 
        $dataPesanan = pesanan::count();
        $dataUser = User::where('role','student')->get();
        $dataAdmin = User::where('role','admin')->get();
        $resData = [
            'jumlahBarang' => $dataProduct,
            'jumlahPesanan' => $dataPesanan,
            'jumlahUser' => $dataUser->count(),
            'jumlahAdmin' => $dataAdmin->count()
        ];
        return view('admin.dashboard_main',compact('resData'));
    }

    public function products(){
        $productData = Product::all();

        return view('admin.barang',compact('productData'));
    }

    public function addProduct(Request $req){
        Product::create([
            'nama' => $req->nama,
            "deskripsi" => $req->deskripsi,
            "harga" => $req->harga
        ]);
        $idProduct = Product::orderBy('id','desc')->first();
        $file = $req->product_image;
        $file_name = $file->getClientOriginalName();
        $path = "images/product";
        
        // Storage::putFileAs($path,$file,$idProduct->id.".png");
        $file->move($path,$idProduct->id.".png");

        return back();
    }

    public function deleteProduct(Request $req){
        $productTemp = Product::where('id',$req->id);
        $productTemp->delete();

        return response()->json([
            "message" => "success"
        ]);
    }
}
