@extends('jayapura.master-admin')
@section('title','Reports')
@section('reports','active')

@section('modal')
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content" style="background-color: #435c70; color: white">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data Report</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('jayapura.reports.cari')}}" method="GET">
                @csrf

                <label for="no_seri">Masukan No Seri Customer : </label>
                <input type="text" name="no_seri" class="form-control" placeholder="Masukan No Seri Customer">

        </div>
        <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" onclick="return confirm('Anda Yakin Akan Menghapus Data?')">Submit</button>
            </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('content')
<div class="col-12 tm-block-col">
<div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
        <h2 class="tm-block-title">Data Reports</h2>
        <button type="button" class="btn btn-primary mt-3 mb-3" data-toggle="modal" data-target="#exampleModal">
            + Tambah Reports
        </button>
        <a target="_blank" class="btn btn-success ml-2" style="color: white" id="exportpdf">Print Data PDF</a>

        <form action="{{ route('jayapura.reports.index') }}" method="get">
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
        <table class="table" style="text-align: center;">
            <thead>
                <tr>
                    <th scope="col">Nama Costumer</th>
                    <th scope="col">Kota Asal</th>
                    <th scope="col">Kota Tujuan</th>
                    <th scope="col">Nomor Seri</th>
                    <th scope="col">Jenis Pengiriman</th>
                    <th scope="col">Admin Input Keberangkatan</th>
                    <th scope="col">Tanggal Keberangkatan</th>
                    <th scope="col">Admin Input Kedatangan</th>
                    <th scope="col">Tanggal Kedatangan</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataReport as $report)
                <tr>
                    <td><b>{{$report->nama_cost}}</b></td>
                    <td><b>{{$report->kota_asal}}</b></td>
                    <td><b>{{$report->kota_tujuan}}</b></td>
                    <td><b>{{$report->no_seri}}</b></td>
                    <td><b>{{$report->jenis_pengiriman}}</b></td>
                    <td><b>{{$report->admin_input}}</b></td>
                    <td>{{date('d-M-Y', strtotime($report->tgl_berangkat))}}</td>
                    @if (empty($report->admin_output) && empty($report->tgl_sampai))
                      <td valign="middle" colspan="2">
                        <a href="{{route('jayapura.report.kedatangan', $report->id)}}" class="btn btn-primary">Update Kedatangan</a>
                      </td>
                    @else
                      <td><b>{{$report->admin_output}}</b></td>
                      <td>{{date('d-M-Y', strtotime($report->tgl_sampai))}}</td>
                    @endif
                    <td>
                        <form action="{{route('jayapura.report.hapus', $report->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class='far fa-trash-alt'></i></button>
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

        $('#exportpdf').attr('href', '/admin/jayapura/reports/pdf/' + start.format('DD-MMM-YYYY') + '+' + end.format('DD-MMM-YYYY'))

        $('#created_at').daterangepicker({
            startDate: start,
            endDate: end,
            locale: {
                format: 'DD-MMM-YYYY',
            }
        }, function(first, last) {
            $('#exportpdf').attr('href', '/admin/jayapura/reports/pdf/' + first.format('DD-MMM-YYYY') + '+' + last.format('DD-MMM-YYYY'))
        });
    })
</script>
@endsection
