<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInputproduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inputproduks', function (Blueprint $table) {
            $table->bigIncrements('id_inp');
            $table->timestamps();
            $table->integer('jumlah_inp');
            $table->date('tanggal_inp')->nullable();
            $table->date('tanggal_out')->nullable();

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
        Schema::dropIfExists('inputproduks');
    }
}
