@extends('admin.master-admin')
@section('title','Request Pengiriman')
@section('invoice','active')
@section('content')
<div class="col-12 tm-block-col">
<div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
        <h2 class="tm-block-title">Data Pengiriman Customer</h2>
        <a href="{{route('invoice.create')}}" class="btn btn-primary">+ Data Pengiriman</a>
        <a target="_blank" class="btn btn-success ml-2" style="color: white" id="exportpdf">Print Data PDF</a>


        <form action="{{ route('invoice.index') }}" method="get">
            <div class="input-group mb-3 col-md-4 float-right">
                <input type="text" id="created_at" name="date" class="form-control">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Filter</button>
                </div>
            </div>
        </form>

        <div class="alert" style="margin-top: 3rem">
            @if (session('pesan'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                      {{session('pesan')}}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                      </button>
                </div>
            @endif
            @if (session('hapus'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      {{session('hapus')}}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                      </button>
                </div>
            @endif
        </div>

        <table class="table" style="text-align: center;" id="dataTables-example">
            <thead>
                <tr>
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
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataInvoice as $data)
                <tr>
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
                    <td>
                        <form action="{{route('invoice.destroy', $data->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{route('invoice.edit', $data->id)}}" class="btn btn-warning">Edit</a>
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script>
    $(document).ready(function() {
        let start = moment().startOf('month')
        let end = moment().endOf('month')

        $('#exportpdf').attr('href', '/admin/jakarta/pengiriman/pdf/' + start.format('DD-MMM-YYYY') + '+' + end.format('DD-MMM-YYYY'))

        $('#created_at').daterangepicker({
            startDate: start,
            endDate: end,
            locale: {
                format: 'DD-MMM-YYYY',
            }
        }, function(first, last) {
            $('#exportpdf').attr('href', '/admin/jakarta/pengiriman/pdf/' + first.format('DD-MMM-YYYY') + '+' + last.format('DD-MMM-YYYY'))
        });
    })
</script>
@endsection
