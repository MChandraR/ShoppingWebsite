<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;

class RiwayatPesananController extends Controller
{
    public function index()
    {
        // Mendapatkan riwayat pesanan dari database
        $riwayatPesanan = Pesanan::all();

        return view('riwayatpesanan', compact('riwayatPesanan'));
    }
}
