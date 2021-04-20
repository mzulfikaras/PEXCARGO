<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_pembayaran')->nullable();
            $table->string('nama')->nullable();
            $table->text('alamat')->nullable();
            $table->char('no_telp')->nullable();
            $table->string('kota_asal')->nullable();
            $table->string('kota_tujuan')->nullable();
            $table->string('jenis_pengiriman')->nullable();
            $table->char('no_seri')->unique()->nullable();
            $table->date('tgl_berangkat')->nullable();
            $table->char('no_smu')->nullable();
            $table->integer('jml_kiriman')->nullable();
            $table->string('nama_barang')->nullable();
            $table->integer('jml_berat')->nullable();
            $table->bigInteger('harga_satuan')->nullable();
            $table->bigInteger('total')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('invoices');
    }
}
