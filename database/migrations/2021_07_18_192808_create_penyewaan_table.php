<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenyewaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penyewaan', function (Blueprint $table) {
            $table->bigIncrements('id_sewa');
            $table->integer('id_customer');
            $table->integer('id_lapangan');
            $table->date('tanggal_sewa');
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->integer('harga');
            $table->integer('uang_muka');
            $table->integer('uang_sisa');
            $table->string('keterangan');
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
        Schema::dropIfExists('penyewaan');
    }
}
