@extends('jayapura.master-admin')
@section('title','Create Request Pengiriman')
@section('invoice','active')

@section('content')
<div class="col-12 tm-block-col">
    <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll" style="color: white">
        <h2 class="tm-block-title">Tambah Request Pengiriman</h2>
        <form action="#" method="POST">
        @csrf
        <form action="{{route('jayapura.invoice.store')}}" method="POST">
            @csrf

            <label for="jenis_pembayaran">Jenis Pembayaran : </label>
            <input type="text" name="jenis_pembayaran" id="jenis_pembayaran" class="form-control  mb-2">

            <label for="nama">Nama Customer : </label>
            <input type="text" name="nama" id="nama" class="form-control  mb-2">

            <label for="alamat">Alamat Customer : </label>
            <input type="text" name="alamat" id="alamat" class="form-control  mb-2">

            <label for="no_telp">No Telfon Customer : </label>
            <input type="text" name="no_telp" id="no_telp" class="form-control  mb-2">

            <label for="no_seri">Nomor Seri : </label>
            <input type="text" name="no_seri" id="no_seri" class="form-control mb-2 @error('no_seri') is-invalid @enderror">
            @error('no_seri')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <label for="kota_asal">Kota Asal : </label>
            <select class="custom-select mb-2" id="dari" name="kota_asal" required>
                <option selected disabled>Pilih Kota Asal</option>
                @foreach ($kotaAsal as $asal)
                  <option>{{$asal->kota_asal}}</option>
                @endforeach
            </select>

            <label for="kota_tujuan">Kota Tujuan : </label>
            <select class="custom-select mb-2" id="dari" name="kota_tujuan" required>
                <option selected disabled>Pilih Kota Tujuan</option>
                @foreach ($kotaTujuan as $tujuan)
                  <option>{{$tujuan->kota_tujuan}}</option>
                @endforeach
            </select>

            <label for="jenis_pengiriman">Jenis Pengiriman : </label>
            <select class="custom-select mb-2" name="jenis_pengiriman" id="jenis_pengiriman" required>
                <option selected disabled>Pilih Jenis Pengiriman</option>
                @foreach ($jenis_pengiriman as $jenis)
                  <option>{{$jenis->jenis_pengiriman}}</option>
                @endforeach
            </select>

            <label for="jml_kiriman">Jumlah Kiriman : </label>
            <input type="text" name="jml_kiriman" id="jml_kiriman" class="form-control mb-2">

            <label for="nama_barang">Nama Barang : </label>
            <input type="text" name="nama_barang" id="nama_barang" class="form-control mb-2">

            <label for="jml_berat">Jumlah Berat : </label>
            <input type="text" name="jml_berat" id="jml_berat" class="form-control mb-2">

            <label for="harga_satuan">Harga Satuan: </label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text mb-2" id="inputGroupPrepend3">Rp.</span>
              </div>
              <input type="text" name="harga_satuan" id="harga_satuan" class="form-control mb-2">
            </div>

            <label for="total">Total Harga: </label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text mb-2" id="inputGroupPrepend3">Rp.</span>
              </div>
              <input type="text" name="total" id="total" class="form-control mb-2">
            </div>

            <label for="status">Status : </label>
            <input type="text" name="status" id="status" class="form-control mb-2" value="Barang Belum Terkirim" readonly>

          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
