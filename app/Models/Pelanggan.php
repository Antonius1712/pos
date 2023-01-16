<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Pelanggan extends Model
{
    use HasFactory;
    use LogsActivity;
    
    protected $table = 'pelanggan';

    protected $fillable = [
        'nama_pelanggan',
        'nomor_hp',
        'alamat',
    ];

    protected static $logAttributes = [
        'nama_pelanggan',
        'nomor_hp',
        'alamat',
    ];

    protected static $logOnlyDirty = true;
}
