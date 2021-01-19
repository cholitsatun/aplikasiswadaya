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
            $table->date('tanggal_inb')->nullable();
            $table->date('tanggal_out')->nullable();

            //foreign key
            $table->unsignedBigInteger('bahanbaku_id');
            $table->foreign('bahanbaku_id')->references('id_bahan')->on('bahanbakus')->onDelete('cascade');
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
