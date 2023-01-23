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
        'transaksi_penjualan_id',
        'barang_id',
        'jumlah_barang',
        'harga_barang',
        'sub_total',
    ];

    protected static $logAttributes = [
        'transaksi_penjualan_id',
        'barang_id',
        'jumlah_barang',
        'harga_barang',
        'sub_total',
    ];

    protected static $logOnlyDirty = true;

    protected $appends = ['nama_barang', 'harga_barang', 'sub_total', 'sub_total'];


    // ATTRIBUTES SETTING
    public function getNamaBarangAttribute(){
        return Barang::findOrFail($this->attributes['barang_id'])->nama_barang;
    }

    public function getHargaBarangAttribute(){
        return number_format($this->attributes['harga_barang']);
    }

    public function setHargaBarangAttribute($value){
        $this->attributes['harga_barang'] = str_replace(',', '', $value);
    }

    public function getSubTotalAttribute(){
        return number_format($this->attributes['sub_total']);
    }

    public function setSubTotalAttribute($value){
        $this->attributes['sub_total'] = str_replace(',', '', $value);
    }

    
}
