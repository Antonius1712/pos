<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class TransaksiPenjualan extends Model
{
    use HasFactory;
    use LogsActivity;
    
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

    protected static $logAttributes = [
        'metode_pembayaran_id',
        'pelanggan_id',
        'diskon',
        'total_harga',
        'total_bayar',
        'selisih',
        'bukti_bayar',
    ];

    protected static $logOnlyDirty = true;
}
