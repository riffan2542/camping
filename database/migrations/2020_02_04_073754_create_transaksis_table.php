<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('pemesanan_id');
            $table->foreign('pemesanan_id')->references('id')->on('pemesanans')->onDelete('cascade');
            $table->unsignedBigInteger('stokbarang_id');
            $table->foreign('stokbarang_id')->references('id')->on('stokbarangs')->onDelete('cascade');
            $table->unsignedBigInteger('pengembalian_id');
            $table->foreign('pengembalian_id')->references('id')->on('pengembalians')->onDelete('cascade');
            $table->string('nama_admin');
            $table->string('nama_barang');
            $table->integer('total_harga');
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
        Schema::dropIfExists('transaksis');
    }
}
