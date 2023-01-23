<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiPenjualan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_penjualan', function (Blueprint $table) {
            $table->id();
            $table->integer('metode_pembayaran_id');
            $table->integer('pelanggan_id');
            $table->integer('diskon');
            $table->integer('total_harga');
            $table->integer('total_bayar');
            $table->string('bukti_bayar')->nullable();
            $table->integer('status_bayar')->default('1');
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
        Schema::dropIfExists('transaksi_penjualan');
    }
}
