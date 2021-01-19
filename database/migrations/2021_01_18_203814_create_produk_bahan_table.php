<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukBahanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk_bahan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('jumlah_bahan');

            $table->unsignedBigInteger('bahan_id');
            $table->foreign('bahan_id')->references('id_bahan')->on('bahans')->onDelete('cascade');

            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id_produk')->on('produks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produk_bahan');
    }
}
