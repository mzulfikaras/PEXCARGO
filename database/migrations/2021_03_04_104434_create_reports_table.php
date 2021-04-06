<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('nama_cost');
            $table->char('no_seri')->unique();
            $table->char('no_smu');
            $table->string('kota_asal');
            $table->string('kota_tujuan');
            $table->string('jenis_pengiriman');
            $table->string('admin_input');
            $table->date('tgl_berangkat');
            $table->string('admin_output')->nullable();
            $table->date('tgl_sampai')->nullable();
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
        Schema::dropIfExists('reports');
    }
}
