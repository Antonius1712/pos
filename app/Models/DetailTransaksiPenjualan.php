<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksiPenjualan extends Model
{
    use HasFactory;

    protected $table = 'detail_transaksi_penjualan';

    protected $fillable = [
        'transaksi_pembelian_id',
        'barang_id',
        'jumlah_barang',
    ];
}
