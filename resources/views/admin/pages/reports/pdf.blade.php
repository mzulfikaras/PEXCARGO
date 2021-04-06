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
    <table width="1035px" class="table-hover table-bordered text-center">
        @php
            $no = 1;
        @endphp
        <thead>
            <tr>
                <th scope="col">#No.</th>
                <th scope="col">Nama Costumer</th>
                <th scope="col">Kota Asal</th>
                <th scope="col">Kota Tujuan</th>
                <th scope="col">Nomor Seri</th>
                <th scope="col">Admin Input Keberangkatan</th>
                <th scope="col">Tanggal Keberangkatan</th>
                <th scope="col">Admin Input Kedatangan</th>
                <th scope="col">Tanggal Kedatangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataReport as $report)
            <tr>
                <td>{{$no++}}</td>
                <th><b>{{$report->nama_cost}}</b></th>
                <td><b>{{$report->kota_asal}}</b></td>
                <td><b>{{$report->kota_tujuan}}</b></td>
                <td><b>{{$report->no_seri}}</b></td>
                <td><b>{{$report->admin_input}}</b></td>
                <td>{{date('d-M-Y', strtotime($report->tgl_berangkat))}}</td>
                <td><b>{{$report->admin_output}}</b></td>
                <td>{{date('d-M-Y', strtotime($report->tgl_sampai))}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
