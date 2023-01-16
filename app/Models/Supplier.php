<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Supplier extends Model
{
    use HasFactory;
    use LogsActivity;
    
    protected $table = 'supplier';

    protected $fillable = [
        'nama_supplier',
        'alamat_supplier',
        'nama_sales',
        'nomor_hp_sales',
    ];

    protected static $logAttributes = [
        'nama_supplier',
        'alamat_supplier',
        'nama_sales',
        'nomor_hp_sales',
    ];

    protected static $logOnlyDirty = true;
}
