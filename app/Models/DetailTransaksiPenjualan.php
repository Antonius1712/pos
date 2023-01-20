<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class DetailTransaksiPenjualan extends Model
{
    use HasFactory;
    use LogsActivity;
    
    protected $table = 'detail_transaksi_penjualan';

    protected $fillable = [
        'transaksi_pembelian_id',
        'barang_id',
        'jumlah_barang',
        'harga_barang',
        'sub_total',
    ];

    protected static $logAttributes = [
        'transaksi_pembelian_id',
        'barang_id',
        'jumlah_barang',
        'harga_barang',
        'sub_total',
    ];

    protected static $logOnlyDirty = true;
}
