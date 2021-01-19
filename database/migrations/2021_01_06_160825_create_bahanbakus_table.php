<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBahanbakusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bahanbakus', function (Blueprint $table) {
            $table->bigIncrements('id_bahan');
            $table->timestamps();
            $table->string('nama_bahan');
            $table->integer('stok_bahan');
            $table->integer('kategori');

            
        //foreign key
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
        Schema::dropIfExists('bahanbakus');
    }
}
