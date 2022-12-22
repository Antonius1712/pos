<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailTransaksiPembelian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_transaksi_pembelian', function (Blueprint $table) {
            $table->id();
            $table->integer('transaksi_pembelian_id');
            $table->integer('barang_id');
            $table->integer('harga_beli');
            $table->integer('jumlah_barang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_transaksi_pembelian');
    }
}
