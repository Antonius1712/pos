<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->id();
            $table->integer('kategori_id');
            $table->integer('merk_id');
            $table->integer('supplier_id');
            $table->integer('kode_barang');
            $table->integer('nama_barang');
            $table->integer('harga_beli');
            $table->integer('harga_jual');
            $table->integer('stok');
            $table->integer('satuan');
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
        Schema::dropIfExists('barang');
    }
}
