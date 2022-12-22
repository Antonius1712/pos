<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksiPembelian extends Model
{
    use HasFactory;

    protected $table = 'detail_transaksi_pembelian';

    protected $fillable = [
        'transaksi_pembelian_id',
        'barang_id',
        'harga_beli',
        'jumlah_barang',
    ];
}
