<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Carbon\Carbon;
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
        'status_bayar',
    ];

    protected static $logAttributes = [
        'metode_pembayaran_id',
        'pelanggan_id',
        'diskon',
        'total_harga',
        'total_bayar',
        'selisih',
        'bukti_bayar',
        'status_bayar',
    ];

    protected static $logOnlyDirty = true;

    // ?Total Harga
    public function getTotalHargaAttribute($value){
        return number_format($value);
    }

    public function setTotalHargaAttribute($value){
        $this->attributes['total_harga'] = str_replace(',', '', $value);
    }

    // ?Diskon
    public function getDiskonAttribute($value){
        return number_format($value);
    }

    public function setDiskonAttribute($value){
        $this->attributes['diskon'] = str_replace(',', '', $value);
    }

    // ?Total Bayar
    public function getTotalBayarAttribute($value){
        return number_format($value);
    }

    public function setTotalBayarAttribute($value){
        $this->attributes['total_bayar'] = str_replace(',', '', $value);
    }

    // ?Customer
    public function getCustomerNameAttribute(){
        return Pelanggan::findOrFail($this->attributes['pelanggan_id'])->nama_pelanggan;
    }

    // ?Metode Bayar
    public function getMetodeBayarAttribute(){
        return MetodePembayaran::findOrFail($this->attributes['metode_pembayaran_id'])->name;
    }

    // ?Status
    public function getStatusAttribute(){
        return Status::findOrFail($this->attributes['status_bayar'])->name;
    }

    public function getBadgeTypeAttribute(){
        if( $this->attributes['status_bayar'] == 1 ){
            return 'warning';
        } else if( $this->attributes['status_bayar'] == 2 ){
            return 'success';
        } else if( $this->attributes['status_bayar'] == 3 ){
            return 'danger';
        }
    }


    public function customer(){
        return $this->hasOne(Pelanggan::class, 'id', 'pelanggan_id');
    }

    public function detailTransaksi(){
        return $this->hasMany(DetailTransaksiPenjualan::class, 'transaksi_penjualan_id', 'id');
    }

    
}
