<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Kategori extends Model
{
    use HasFactory;
    use LogsActivity;
    
    protected $table = 'kategori';

    protected $fillable = [
        'kode_kategori',
        'nama_kategori',
    ];

    protected static $logAttributes = [
        'kode_kategori',
        'nama_kategori',
    ];

    protected static $logOnlyDirty = true;
}
