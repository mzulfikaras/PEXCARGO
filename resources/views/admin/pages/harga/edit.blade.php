@extends('admin.master-admin')
@section('title','Edit Harga')
@section('harga','active')

@section('content')
<div class="col-12 tm-block-col">
    <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
        <h2 class="tm-block-title">Update Harga</h2>
        <form action="{{route('harga.update', $harga->id)}}" method="POST">
        @csrf
        @method('PUT')
          <div class="form-group">
              <label for="kota_asal">Kota Asal : </label>
              <input type="text" name="kota_asal" id="kota_asal" class="form-control  mb-2" value="{{old('kota_asal',$harga->kota_asal)}}">
          </div>
          <div class="form-group">
              <label for="kota_tujuan">Kota Tujuan : </label>
              <input type="text" name="kota_tujuan" id="kota_tujuan" class="form-control mb-2" value="{{old('kota_tujuan',$harga->kota_tujuan)}}">
          </div>
          <div class="form-group">
              <label for="harga_min">Harga Min 10 kg : </label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupPrepend3">Rp.</span>
                </div>
                <input type="text" name="harga_min" id="harga_min" class="form-control" value="{{old('harga_min', $harga->harga_min)}}">
              </div>
          </div>

          <div class="form-group">
            <label for="harga_min_hc">Harga Heavy Cargo 70/149kg : </label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend3">Rp.</span>
              </div>
              <input type="text" name="harga_min_hc" id="harga_min_hc" class="form-control" value="{{old('harga_min_hc', $harga->harga_min_hc)}}">
            </div>
          </div>

          <div class="form-group">
            <label for="harga_max_hc">Harga Heavy Cargo 150/300kg : </label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend3">Rp.</span>
              </div>
              <input type="text" name="harga_max_hc" id="harga_max_hc" class="form-control" value="{{old('harga_max_hc', $harga->harga_max_hc)}}">
            </div>
          </div>

          <div class="form-group">
            <label for="harga_dg">Tarif DG : </label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend3">Rp.</span>
              </div>
              <input type="text" name="harga_dg" id="harga_dg" class="form-control" value="{{old('harga_dg',$harga->harga_dg)}}">
            </div>
          </div>

          <div class="form-group">
            <label for="harga_shipdec_dg">Tarif Shipdec DG : </label>
            <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupPrepend3">Rp.</span>
                </div>
                <input type="text" name="harga_shipdec_dg" id="harga_shipdec_dg" class="form-control" value="{{old('harga_shipdec_dg', $harga->harga_shipdec_dg)}}">
              </div>
          </div>

          <div class="form-group">
            <label for="harga_avi">Harga Avi: </label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend3">Rp.</span>
              </div>
              <input type="text" name="harga_avi" id="harga_avi" class="form-control" value="{{old('harga_avi', $harga->harga_avi)}}">
            </div>
          </div>

          <div class="form-group">
            <label for="jenis_pengiriman">Jenis Pengiriman : </label>
            <input type="text" name="jenis_pengiriman" id="jenis_pengiriman" class="form-control mb-2" value="{{old('jenis_pengiriman',$harga->jenis_pengiriman)}}">
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
