<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHargasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hargas', function (Blueprint $table) {
            $table->id();
            $table->string('kota_asal');
            $table->string('kota_tujuan');
            $table->bigInteger('harga_min');
            $table->bigInteger('harga_min_hc');
            $table->bigInteger('harga_max_hc');
            $table->bigInteger('harga_dg');
            $table->bigInteger('harga_shipdec_dg');
            $table->bigInteger('harga_avi');
            $table->string('jenis_pengiriman');
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
        Schema::dropIfExists('hargas');
    }
}
