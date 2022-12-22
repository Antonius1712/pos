<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiPembelian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_pembelian', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('supplier_id');
            $table->string('diskon');
            $table->string('total_harga');
            $table->string('total_bayar');
            $table->string('selisih');
            $table->string('tanggal_jatuh_tempo');
            $table->string('foto_nota');
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
        Schema::dropIfExists('transaksi_pembelian');
    }
}
