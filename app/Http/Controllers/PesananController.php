<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\pesanan;
use App\Models\RiwayatPesanan;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class PesananController extends Controller
{
    public function pembelian(){
        //mendapatkan data transaksi / pesanan yang digabung dengan data users dan data produk
        $transactionData = pesanan::select(DB::raw('pesanan.id,pesanan.user_id,pesanan.produk_id,jumlah,status,users.name,produk.nama'))->join('users','users.id','pesanan.user_id')->join('produk','produk.id','pesanan.produk_id')->get();
        //mendapatkan data total pesanan yang masih pending
        $totalPending = $transactionData->where('status',"Pending");
        //mendapatkan data total pesanan yang sudah di acc
        $totalAcc = $transactionData->where('status',"Accept");
        
        return view('admin.transaksi',compact('transactionData',"totalPending","totalAcc"));
        // return response()->json([
        //     "data" => $transactionData
        // ]);
    }

    public function process(Request $req){
        RiwayatPesanan::create([
            "user_id" => $req->user_id,
            "tanggal_pemesanan" => $req->tgl_pesanan,
            "pesanan" => $req->product_id
        ]);

        
        return null;
    }
}
