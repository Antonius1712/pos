<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class TransaksiPembelian extends Model
{
    use HasFactory;
    use LogsActivity;
    
    protected $table = 'transaksi_pembelian';

    protected $fillable = [
        'user_id',
        'supplier_id',
        'diskon',
        'total_harga',
        'total_bayar',
        'selisih',
        'tanggal_jatuh_tempo',
        'foto_nota',
    ];

    protected static $logAttributes = [
        'user_id',
        'supplier_id',
        'diskon',
        'total_harga',
        'total_bayar',
        'selisih',
        'tanggal_jatuh_tempo',
        'foto_nota',
    ];

    protected static $logOnlyDirty = true;
}
