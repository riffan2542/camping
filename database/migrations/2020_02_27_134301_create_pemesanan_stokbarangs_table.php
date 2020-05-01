<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemesananStokbarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanan_stokbarangs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('pemesanan_id')->unsigned();
            $table->bigInteger('stokbarang_id')->unsigned();
            $table->foreign('pemesanan_id')->references('id')->on('pemesanans')->onDelete('cascade');
            $table->foreign('stokbarang_id')->references('id')->on('stokbarangs')->onDelete('cascade');
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
        Schema::dropIfExists('pemesanan_stokbarangs');
    }
}
