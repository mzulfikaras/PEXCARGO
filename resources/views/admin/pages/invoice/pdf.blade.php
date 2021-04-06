<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>REPORT BULANAN PEX CARGO</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <h5 class="text-center">Laporan Bulanan Periode ({{ $date[0] }} - {{ $date[1] }})</h5>
    <hr>
    <table class="table-hover table-bordered text-center">
        @php
            $no = 1;
        @endphp
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Jenis Pembayaran</th>
                <th scope="col">Nama Customer</th>
                <th scope="col">Alamat Customer</th>
                <th scope="col">No Telfon Customer</th>
                <th scope="col">Kota Asal</th>
                <th scope="col">Kota Tujuan</th>
                <th scope="col">Nomor Seri</th>
                <th scope="col">Jenis Pengiriman</th>
                <th scope="col">Jumlah Kiriman(COIL)</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Jumlah Berat(KG)</th>
                <th scope="col">Harga Satuan</th>
                <th scope="col">Jumlah Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataInvoice as $data)
            <tr>
                <td>{{$no++}}</td>
                <th><b>{{$data->jenis_pembayaran}}</b></th>
                <th><b>{{$data->nama}}</b></th>
                <th><b>{{$data->alamat}}</b></th>
                <th><b>{{$data->no_telp}}</b></th>
                <td><b>{{$data->kota_asal}}</b></td>
                <td><b>{{$data->kota_tujuan}}</b></td>
                <td><b>{{$data->jenis_pengiriman}}</b></td>
                <td><b>{{$data->no_seri}}</b></td>
                <td><b>{{$data->jml_kiriman}}</b></td>
                <td>{{$data->nama_barang}}</td>
                <td><b>{{$data->jml_berat}}</b></td>
                <td>{{$data->harga_satuan}}</td>
                <td>{{$data->total}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
