@extends('jayapura.master-admin')
@section('title', 'Update Kedatangan')
@section('reports','active')

@section('content')
<div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content" style="background-color: #435c70; color: white">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Update Kedatangan</h5>
          <a href="{{route('reports.index')}}">
            <button type="button" class="close"> <span aria-hidden="true">&times;</span> </button>
          </a>
        </div>
        <div class="modal-body">
          <form action="{{route('jayapura.update.report.kedatangan', $report->id)}}" method="post">
            @csrf
            @method('put')
            <input type="hidden" name="nama_cost" id="nama_cost" class="form-control  mb-2" value="{{old('nama_cost', $report->nama_cost)}}">
            <input type="hidden" name="no_seri" id="no_seri" class="form-control mb-2" value="{{old('no_seri', $report->no_seri)}}">
            <input type="hidden" name="no_smu" id="no_smu" class="form-control mb-2" value="{{old('no_smu', $report->no_smu)}}">
            <input type="hidden" name="jenis_pengiriman" id="jenis_pengiriman" class="form-control mb-2" value="{{old('jenis_pengiriman', $report->jenis_pengiriman)}}">
            <input type="hidden" name="kota_asal" id="kota_asal" class="form-control mb-2" value="{{old('kota_asal', $report->kota_asal)}}">
            <input type="hidden" name="kota_tujuan" id="kota_tujuan" class="form-control mb-2" value="{{old('kota_tujuan', $report->kota_tujuan)}}">
            <input type="hidden" name="admin_input" id="admin_input" class="form-control mb-2" value="{{old('admin_input', $report->admin_input)}}">
            <input type="hidden" name="tgl_berangkat" id="tgl_berangkat" class="form-control mb-2" value="{{old('tgl_berangkat', $report->tgl_berangkat)}}">

            <label for="admin_output">Admin Input Kedatangan : </label>
            <input type="text" name="admin_output" id="admin_output" class="form-control mb-2" value="{{Auth::user()->name}}">

            <label for="tgl_sampai">Tanggal Kedatangan: </label>
            <input type="date" name="tgl_sampai" id="tgl_sampai" class="form-control mb-2" >
        </div>
        <div class="modal-footer">
            <a href="{{route('jayapura.reports.index')}}" class="btn btn-secondary">Close</a>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
<div class="modal-backdrop fade show"></div>
@endsection

@section('js')
<script>
  $('#staticBackdrop').modal('show');
</script>
@endsection
