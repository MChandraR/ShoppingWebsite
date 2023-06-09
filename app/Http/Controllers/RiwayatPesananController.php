<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\RiwayatPesanan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class RiwayatPesananController extends Controller
{
    public function index()
    {
        // Mendapatkan riwayat pesanan dari database
        $riwayatPesanan = RiwayatPesanan::join('pesanan','pesanan.id','riwayat_pesanan.pesanan')
        ->join('produk','produk.id','pesanan.produk_id')->where('riwayat_pesanan.user_id',Auth::user()->id)->get();

        $pesanans = Pesanan::where('user_id',Auth::user()->id)->where(function ($query) {
            $query->where('status', '=', 'Pending')
            ->orWhere('status', '=', 'Accepted')
            ->orWhere('status', '=', 'Dikirim');
        })->join('produk','produk.id','pesanan.produk_id')->get();

        return view('riwayatpesanan', compact('riwayatPesanan','pesanans'));
    }
    
    public function indexadmin(){
        $riwayat = RiwayatPesanan::select(DB::raw('riwayat_pesanan.*,pesanan.jumlah,pesanan.status as status,produk.nama,users.name'))
        ->where(function ($query) {
            $query->where('status', '=', 'Selesai')
            ->orWhere('status', '=', 'Cancelled')
            ->orWhere('status', '=', 'Delivered');
        })->join('pesanan','pesanan.id','riwayat_pesanan.pesanan')
        ->join('produk','produk.id','pesanan.produk_id')
        ->join('users','users.id','pesanan.user_id');
        $dataRiwayat = $riwayat->get();
        $totalSampai = $dataRiwayat->where('status','Delivered')->count();
        $totalCancel = $dataRiwayat->where('status','Cancelled')->count();
        $totalSelesai = $dataRiwayat->where('status','Selesai')->count();

        return view('admin.riwayat',compact('dataRiwayat','totalSampai','totalCancel','totalSelesai'));
    } 
}
