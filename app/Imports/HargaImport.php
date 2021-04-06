<?php

namespace App\Imports;

use App\Models\Harga;
use Maatwebsite\Excel\Concerns\ToModel;

class HargaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Harga([
            'kota_asal'     => $row[0],
            'kota_tujuan'    => $row[1],
            'harga_min'    => $row[2],
            'harga_min_hc'    => $row[3],
            'harga_max_hc'    => $row[4],
            'harga_dg'    => $row[5],
            'harga_shipdec_dg'    => $row[6],
            'harga_avi'    => $row[7],
            'jenis_pengiriman'    => $row[8],
        ]);
    }
}
