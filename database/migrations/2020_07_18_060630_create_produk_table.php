<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_produk');
            $table->bigInteger('kategori_id')->unsigned();
            $table->bigInteger('merek_id')->unsigned();
            $table->integer('harga_produk');
            $table->timestamps();
            
            // foreign
            $table->foreign('kategori_id')->references('id')->on('nama_kategori');
            $table->foreign('merek_id')->references('id')->on('nama_merek');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produk');
    }
}
