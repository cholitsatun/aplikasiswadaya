<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjualanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualan', function (Blueprint $table) {
            $table->bigIncrements('id_transaksi');
            $table->timestamps();
            $table->string('nama_pembeli');
            $table->integer('barang_terjual');
            $table->text('keterangan');
            $table->integer('total_harga');
 
        //foreign key
        $table->unsignedBigInteger('product_id');
        $table->foreign('product_id')->references('id_produk')->on('produk')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penjualan');
    }
}
