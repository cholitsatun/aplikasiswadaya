<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInputbahansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inputbahans', function (Blueprint $table) {
            $table->bigIncrements('id_inb');
            $table->timestamps();
            $table->string('supplier');
            $table->integer('jumlah_inb');
            $table->date('tanggal_inb');
            $table->date('tanggal_out')->nullable();

            //foreign key
            $table->unsignedBigInteger('bahan_id');
            $table->foreign('bahan_id')->references('id_bahan')->on('bahans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inputbahans');
    }
}
