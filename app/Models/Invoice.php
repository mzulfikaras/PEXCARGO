<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'tgl',
        'jenis_pembayaran',
        'nama',
        'alamat',
        'no_telp',
        'kota_asal',
        'kota_tujuan',
        'jenis_pengiriman',
        'no_seri',
        'tgl_pengiriman',
        'no_smu',
        'jml_kiriman',
        'nama_barang',
        'jml_berat',
        'harga_satuan',
        'total',
    ];
}
