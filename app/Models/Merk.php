<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Merk extends Model
{
    use HasFactory;
    use LogsActivity;
    
    protected $table = 'merk';

    protected $fillable = [
        'kode_merk',
        'nama_merk',
    ];

    protected static $logAttributes = [
        'kode_merk',
        'nama_merk',
    ];

    protected static $logOnlyDirty = true;
}
