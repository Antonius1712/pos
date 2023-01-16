<?php

namespace App\Models;

use Attribute;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Barang extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $table = 'barang';

    protected $fillable = [
        'kategori_id',
        'merk_id',
        'supplier_id',
        'kode_barang',
        'nama_barang',
        'harga_beli',
        'harga_jual',
        'stok',
        'satuan',
    ];

    protected static $logAttributes = [
        'kategori_id',
        'merk_id',
        'supplier_id',
        'kode_barang',
        'nama_barang',
        'harga_beli',
        'harga_jual',
        'stok',
        'satuan',
    ];

    protected static $logOnlyDirty = true;


    // ? RELATION
    public function kategori(){
        return $this->hasOne(Kategori::class, 'id', 'kategori_id');
    }

    public function merk(){
        return $this->hasOne(Merk::class, 'id', 'merk_id');
    }


    // ? SETTING ATTRIBUTE
    // ?NAMA BARANG
    public function getNamaBarangAttribute($value){
        return ucwords($value);
    }

    public function setNamaBarangAttribute($value){
        $this->attributes['nama_barang'] = strtolower($value);
    }

    // ?HARGA JUAL
    public function getHargaJualAttribute($value){
        return number_format($value);
    }

    public function setHargaJualAttribute($value){
        $this->attributes['harga_jual'] = str_replace('.', '', str_replace(',', '', $value));
    }

    // ?HARGA BELI
    public function getHargaBeliAttribute($value){
        return number_format($value);
    }

    public function setHargaBeliAttribute($value){
        $this->attributes['harga_beli'] = str_replace('.', '', str_replace(',', '', $value));
    }

    // ?CREATED AT
    public function getCreatedAtAttribute($value){
        return Carbon::parse($value)->format(config('setting.date_format'));
    }

    // public function setCreatedAtAttribute($value){
    //     $this->attributes['created_at'] = Carbon::CreateFromFormat(config('setting.date_format'), $value)->format('Y-m-d');
    // }

    // ?UPDATED AT
    public function getUpdatedAtAttribute($value){
        return Carbon::parse($value)->format(config('setting.date_format'));
    }

    // public function setUpdatedAtAttribute($value){
    //     $this->attributes['updated_at'] = Carbon::CreateFromFormat(config('setting.date_format'), $value)->format('Y-m-d');
    // }
}
