<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DetailTransaksiPenjualan;
use Illuminate\Http\Request;

class DetailTransaksiController extends Controller
{
    public function __invoke(Request $request)
    {
        $id = $request->idt;
        return response()->json([
            'code' => 200,
            'data' => DetailTransaksiPenjualan::where('transaksi_penjualan_id', $id)->get()
        ]);
    }
}
