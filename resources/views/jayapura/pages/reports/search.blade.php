@extends('jayapura.master-admin')
@section('title','Create Data Tracking')
@section('reports','active')

@section('content')
<div class="modal fade bd-example-modal-lg" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content" style="background-color: #2c2a35; color: white">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Tracking Barang</h5>
          <a href="#">
            <button type="button" class="close"> <span aria-hidden="true">&times;</span> </button>
          </a>
        </div>
        <div class="modal-body">
            @foreach ($invoice as $data)
            <form action="{{route('jayapura.report.store')}}" method="POST">
                @csrf

                <label for="nama_cost">Nama Costumer : </label>
                <input type="text" name="nama_cost" id="nama_cost" class="form-control  mb-4" value="{{$data->nama}}">

                <label for="no_seri">Nomor Seri : </label>
                <input type="text" name="no_seri" id="no_seri" class="form-control mb-4" value="{{$data->no_seri}}">

                <label for="no_smu">Nomor smu / Airwaybill : </label>
                <input type="text" name="no_smu" id="no_smu" class="form-control mb-4">

                <label for="tgl_berangkat">Tanggal Keberangkatan : </label>
                <input type="date" name="tgl_berangkat" id="tgl_berangkat" class="form-control mb-4">

                <label for="kota_asal">Kota Asal : </label>
                <input type="text" class="form-control mb-4" name="kota_asal" value="{{$data->kota_asal}}">

                <label for="kota_tujuan">Kota Tujuan : </label>
                <input type="text" class="form-control mb-4" name="kota_tujuan" value="{{$data->kota_tujuan}}">

                <label for="jenis_pengiriman">Jenis Pengiriman : </label>
                <input type="text" class="form-control mb-4" name="jenis_pengiriman" value="{{$data->jenis_pengiriman}}">

                <label for="admin_input">Admin Input Keberangkatan : </label>
                <input type="text" name="admin_input" id="admin_input" class="form-control mb-4" value="{{ Auth::user()->name }}" readonly>
            @endforeach
        </div>
        <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{route('jayapura.reports.index')}}" class="btn btn-secondary">Close</a>
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
