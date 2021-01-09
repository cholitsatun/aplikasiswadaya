<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBahanbakuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bahanbaku', function (Blueprint $table) {
            $table->bigIncrements('id_bahan');
            $table->timestamps();
            $table->string('nama_bahan');
            $table->string('supplier');
            $table->integer('stok_bahan');
            $table->date('tanggal_masuk');

            
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
        Schema::dropIfExists('bahanbaku');
    }
}
