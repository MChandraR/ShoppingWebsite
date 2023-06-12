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
        $insert = Product::create([
            'nama' => $req->nama,
            "deskripsi" => $req->deskripsi,
            "harga" => $req->harga
        ]);

        if(isset($req->product_image)){
            if($req->product_image != null){
                $idProduct = Product::orderBy('id','desc')->first();
                $file = $req->product_image;
                $file_name = $file->getClientOriginalName();
                $path = "images/product";
                if(isset($req->id)){
                    $idProduct = $req->id;
                }
                // Storage::putFileAs($path,$file,$idProduct->id.".png");
                $file->move($path,$idProduct->id.".png");
            }
        }

        return response()->json([
            "message" => $insert ? "success" : "gagal"
        ]);
    }

    public function deleteProduct(Request $req){
        $productTemp = Product::where('id',$req->id);
        $productTemp->delete();

        return response()->json([
            "message" => "success"
        ]);
    }

    public function pembelian(){
        $transactionData = pesanan::all();
        return view('admin.transaksi',compact('transactionData'));
    }

    public function getProductData(Request $req){
        $productData = Product::where('id',$req->id)->get();
        return response()->json([
            "message" => $productData ? "success" : "gagal",
            "data" => $productData
        ]);
    }

    public function updateProduct(Request $req){
        $productTemp = Product::where('id',$req->id)->update([
            "nama" => $req->nama,
            "deskripsi" => $req->deskripsi,
            "harga" => $req->harga
        ]);
        $path_temp = "";

        if(isset($req->product_image)){
            if($req->product_image != null){
                $idProduct ="";
                $file = $req->product_image;
                $file_name = $file->getClientOriginalName();
                $path = "images/product";
                if(isset($req->id)){
                    $idProduct = $req->id;
                }
                $old_file =  $path."/".$idProduct.".png";
                if(file_exists($old_file)){
                    unlink($path."/".$idProduct.".png");
                };
                $path_temp = $path."/".$idProduct.".png";
                $file->move($path,$idProduct.".png");
            }
        }

        return response()->json([
            "message" => $productTemp ? "success" : "gagal",
            "res" => $path_temp
        ]);
    }
}
