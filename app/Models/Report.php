<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'nama_cost',
        'kota_asal',
        'kota_tujuan',
        'no_seri',
        'no_smu',
        'jenis_pengiriman',
        'admin_input',
        'tgl_berangkat',
        'admin_output',
        'tgl_sampai'
    ];
}
