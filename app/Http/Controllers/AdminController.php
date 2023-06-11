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

    public function addproduct(Request $req){
        Product::create([
            'nama' => $req->nama,
            "deskripsi" => $req->deskripsi,
            "harga" => $req->harga
        ]);
        $idProduct = Product::orderBy('id','desc')->first();
        $file = $req->product_image;
        $file_name = $file->getClientOriginalName();
        $path = "public/img/product/";
        
        Storage::putFileAs($path,$file,$idProduct.".png");

        return back();
    }
}
