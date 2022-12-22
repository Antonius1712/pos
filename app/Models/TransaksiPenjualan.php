<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiPenjualan extends Model
{
    use HasFactory;

    protected $table = 'transaksi_penjualan';

    protected $fillable = [
        'metode_pembayaran_id',
        'pelanggan_id',
        'diskon',
        'total_harga',
        'total_bayar',
        'selisih',
        'bukti_bayar',
    ];
}
