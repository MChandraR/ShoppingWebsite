<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
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
        $dataPesananPending = pesanan::where('status','Pending')->count();
        $dataPesananAcc = pesanan::where('status','Accepted')->count();
        $dataUser = User::where('role','student')->get();
        $dataAdmin = User::where('role','admin')->get();
        $totalProductDiPesan = Product::join('pesanan','pesanan.produk_id','produk.id')->count();
        $resData = [
            'jumlahBarang' => $dataProduct,
            'jumlahPesanan' => $dataPesanan,
            'jumlahUser' => $dataUser->count(),
            'jumlahAdmin' => $dataAdmin->count(),
            'totalDipesan' => $totalProductDiPesan,
            'totalPending' => $dataPesananPending,
            'totalAcc' => $dataPesananAcc
        ];
        return view('admin.dashboard_main',compact('resData'));
    }

    public function products(){
        //Mengambil semua data yang ada di tabel produk
        $productData = Product::all();

        return view('admin.barang',compact('productData'));
    }

    public function addProduct(Request $req){
        //Menambahkan data baru ke dalam tabel produk
        $insert = Product::create([
            'nama' => $req->nama,
            "deskripsi" => $req->deskripsi,
            "harga" => $req->harga
        ]);

        //Memvalidasi dan meyimpan gambar product yang dikirim dari client
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
        //query untuk menhapus data produk sesuai dengan id product
        $productTemp = Product::where('id',$req->id);
        $productTemp->delete();

        $path = "images/product/".$req->id.".png";
        if(file_exists($path)){
            unlink($path);
        }

        //mengembalikan respon dalam bentuk json 
        return response()->json([
            "message" => "success"
        ]);
    }

    public function getProductData(Request $req){
        //Mendapatkan data produk dengan id produk tertentu
        $productData = Product::where('id',$req->id)->get();
        return response()->json([
            "message" => $productData ? "success" : "gagal",
            "data" => $productData
        ]);
    }

    public function updateProduct(Request $req){
        //Mengupdate data produk pada tabel produk sesuai dengan id product tersebut
        $productTemp = Product::where('id',$req->id)->update([
            "nama" => $req->nama,
            "deskripsi" => $req->deskripsi,
            "harga" => $req->harga
        ]);
        $path_temp = "";

        //Memvalidasi file dan menyimpan/mengupdate foto dari product
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
