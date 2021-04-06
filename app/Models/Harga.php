<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Harga extends Model
{
    protected $fillable = ['kota_asal','kota_tujuan', 'harga_min', 'harga_min_hc', 'harga_max_hc','harga_dg','harga_shipdec_dg','harga_avi','jenis_pengiriman'];
}
