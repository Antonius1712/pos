<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Role extends Model
{
    use HasFactory;
    use LogsActivity;
    
    protected $table = 'roles';

    protected $fillable = [
        'name',
    ];

    protected static $logAttributes = [
        'name',
    ];

    protected static $logOnlyDirty = true;
}
