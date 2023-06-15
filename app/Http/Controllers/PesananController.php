<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\pesanan;
use App\Models\RiwayatPesanan;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PesananController extends Controller
{
    public function pembelian(){
        //mendapatkan data transaksi / pesanan yang digabung dengan data users dan data produk
        $transactionData = pesanan::select(DB::raw('pesanan.id,pesanan.user_id,pesanan.produk_id,jumlah,status,users.name,produk.nama'))->join('users','users.id','pesanan.user_id')->join('produk','produk.id','pesanan.produk_id')->get();
        //mendapatkan data total pesanan yang masih pending
        $totalPending = $transactionData->where('status',"Pending");
        //mendapatkan data total pesanan yang sudah di acc
        $totalAcc = $transactionData->where('status',"Accepted");
        $totalCancel = $transactionData->where('status',"Cancelled");
        
        return view('admin.transaksi',compact('transactionData',"totalPending","totalAcc","totalCancel"));
        // return response()->json([
        //     "data" => $transactionData
        // ]);
    }

    public function process(Request $req){
        $pesananData = pesanan::where('id',$req->pesananID);
        if($req->action!="Accept") {
            $data = $pesananData->first();
            $pesananData->update([
                "status" => "Cancelled"
            ]);
        }else{
            $data = $pesananData->first();
            $pesananData->update([
                "status" => ($data->status == "Pending" ? "Accepted" : "Pending" )
            ]);

            RiwayatPesanan::create([
                "user_id" => $data->user_id,
                "tanggal_pesanan" => date('Y-m-d H:m:s'),
                "pesanan" => $data->produk_id
            ]);

        }
        
        
        return back();
    }

    public function order(Request $req){
        $dataUser = Auth::user();

        $pesanan = pesanan::create([
            "user_id" =>  $dataUser['id'],
            "produk_id" => $req->produk_id,
            "jumlah" => $req-> jumlah,
            "status" => "Pending"
        ]);

        if($pesanan){
            return response()->json([
                "message" => "berhasil"
            ]);
        }else{
            return response()->json([
                "message" => "gagal"
            ]);
        }
        
        return null;
    }

    public function addToCart(Request $req){
        $userData = Auth::user();
        $cart = Cart::create([
            "user_id" => $userData['id'],
            'product_id' => $req->product_id,
            "quantity" => $req->quantity
        ]);

        return response()->json([
            "message" => $cart ? "success" : "failed"
        ]);
    }
}
