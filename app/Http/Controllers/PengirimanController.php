<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pesanan;
use App\Models\RiwayatPesanan;
use Illuminate\Support\Facades\DB;


class PengirimanController extends Controller
{
    public function index(){
        $totalBelumDikirim = pesanan::where('status','Accepted')->get();
        $totalDikirim = pesanan::where('status','Dikirim')->get();
        $totalSampai = pesanan::where('status','Delivered')->get();

        $transactionData = pesanan::select(DB::raw('pesanan.id,pesanan.user_id,pesanan.produk_id,pesanan.jumlah,pesanan.status,users.telepon,users.name,users.alamat,produk.nama'))->
        where(function ($query) {
            $query->where('status', '=', 'Accepted')
                  ->orWhere('status', '=', 'Dikirim')
                  ->orWhere('status', '=', 'Delivered');
        })->join('users','users.id','pesanan.user_id')->join('produk','produk.id','pesanan.produk_id')->get();
        return view('admin.pengiriman',compact('transactionData','totalBelumDikirim','totalDikirim','totalSampai'));
    }

    public function proses(Request $req){
        $pesananData = pesanan::where('id',$req->pesananID);

        $data = $pesananData->first();
        $pesananData->update([
            "status" => $req->action
        ]);

        if($req->action=="Cancelled" || $req->action== "Delivered"){
            RiwayatPesanan::create([
                "user_id" => $data->user_id,
                "tanggal_pesanan" => date('Y-m-d H:m:s'),
                "pesanan" => $req->pesananID
            ]);
        }

        
        return response()->json([
            "message" => "success ".$req->action." dengan id : " .$req->pesananID
        ]);
    }
}
