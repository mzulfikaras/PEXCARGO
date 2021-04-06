@extends('admin.master-admin')
@section('title','Create Request Pengiriman')
@section('invoice','active')

@section('content')
<div class="col-12 tm-block-col">
    <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll" style="color: white">
        <h2 class="tm-block-title">Edit Request Pengiriman</h2>
        <form action="{{route('invoice.update', $invoice->id)}}" method="POST">
            @csrf
            @method('put')
            <label for="jenis_pembayaran">Jenis Pembayaran : </label>
            <input type="text" name="jenis_pembayaran" id="jenis_pembayaran" class="form-control  mb-2" value="{{old('jenis_pembayaran', $invoice->jenis_pembayaran)}}">

            <label for="nama">Nama Costumer : </label>
            <input type="text" name="nama" id="nama" class="form-control  mb-2" value="{{old('nama', $invoice->nama)}}">

            <label for="alamat">Alamat Costumer : </label>
            <input type="text" name="alamat" id="alamat" class="form-control  mb-2" value="{{old('alamat', $invoice->alamat)}}">

            <label for="no_telp">No Telfon Costumer : </label>
            <input type="text" name="no_telp" id="no_telp" class="form-control  mb-2" value="{{old('no_telp', $invoice->no_telp)}}">

            <label for="no_seri">Nomor Seri : </label>
            <input type="text" name="no_seri" id="no_seri" class="form-control mb-2 @error('no_seri') is-invalid @enderror" value="{{old('no_seri', $invoice->no_seri)}}">
            @error('no_seri')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <label for="kota_asal">Kota Asal : </label>
            <select class="custom-select mb-2" id="dari" name="kota_asal" required>
                <option selected readonly>{{old('kota_asal', $invoice->kota_asal)}}</option>
                @foreach ($kotaAsal as $asal)
                    <option>
                          {{$asal->kota_asal}}
                    </option>
                @endforeach
            </select>

            <label for="kota_tujuan">Kota Tujuan : </label>
            <select class="custom-select mb-2" id="dari" name="kota_tujuan" required>
                <option selected readonly>{{old('kota_tujuan', $invoice->kota_tujuan)}}</option>>
                @foreach ($kotaTujuan as $tujuan)
                    <option>
                        {{$tujuan->kota_tujuan}}
                    </option>
                @endforeach
            </select>

            <label for="jenis_pengiriman">Jenis Pengiriman : </label>
            <select class="custom-select mb-2" name="jenis_pengiriman" id="jenis_pengiriman" required>
                <option selected readonly>{{old('jenis_pengiriman', $invoice->jenis_pengiriman)}}</option>
                @foreach ($jenis_pengiriman as $jenis)
                  <option>
                    {{$jenis->jenis_pengiriman}}
                  </option>
                @endforeach
            </select>

            <label for="jml_kiriman">Jumlah Kiriman : </label>
            <input type="text" name="jml_kiriman" id="jml_kiriman" class="form-control mb-2" value="{{old('jml_kiriman',$invoice->jml_kiriman)}}">

            <label for="nama_barang">Nama Barang : </label>
            <input type="text" name="nama_barang" id="nama_barang" class="form-control mb-2" value="{{old('nama_barang', $invoice->nama_barang)}}">

            <label for="jml_berat">Jumlah Berat : </label>
            <input type="text" name="jml_berat" id="jml_berat" class="form-control mb-2" value="{{old('jml_berat', $invoice->jml_berat)}}">

            <label for="harga_satuan">Harga Satuan: </label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text mb-2" id="inputGroupPrepend3">Rp.</span>
              </div>
              <input type="text" name="harga_satuan" id="harga_satuan" class="form-control mb-2" value="{{old('harga_satuan', $invoice->harga_satuan)}}">
            </div>

            <label for="total">Total Harga: </label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text mb-2" id="inputGroupPrepend3">Rp.</span>
              </div>
              <input type="text" name="total" id="total" class="form-control mb-2" value="{{old('total', $invoice->total)}}">
            </div>

          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
