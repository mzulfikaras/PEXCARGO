@extends('admin.master-admin')
@section('title','Harga')
@section('harga','active')

@section('modal')
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content" style="background-color: #435c70; color: white">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Harga</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('harga.store')}}" method="POST">
                @csrf
                <label for="kota_asal">Kota Asal : </label>
                <input type="text" name="kota_asal" id="kota_asal" class="form-control  mb-2">

                <label for="kota_tujuan">Kota Tujuan : </label>
                <input type="text" name="kota_tujuan" id="kota_tujuan" class="form-control mb-2">

                <label for="harga_min">Harga Min 10 kg : </label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text mb-2" id="inputGroupPrepend3">Rp.</span>
                  </div>
                  <input type="text" name="harga_min" id="harga_min" class="form-control mb-2">
                </div>

                <label for="harga_min_hc">Harga Heavy Cargo 70/149kg : </label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text mb-2" id="inputGroupPrepend3">Rp.</span>
                  </div>
                  <input type="text" name="harga_min_hc" id="harga_min_hc" class="form-control mb-2">
                </div>

                <label for="harga_max_hc">Harga Heavy Cargo 150/300kg : </label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text mb-2" id="inputGroupPrepend3">Rp.</span>
                  </div>
                  <input type="text" name="harga_max_hc" id="harga_max_hc" class="form-control mb-2">
                </div>

                <label for="harga_dg">Tarif DG : </label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text mb-2" id="inputGroupPrepend3">Rp.</span>
                  </div>
                  <input type="text" name="harga_dg" id="harga_dg" class="form-control mb-2">
                </div>

                <label for="harga_shpdec_dg">Shipdec DG : </label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text mb-2" id="inputGroupPrepend3">Rp.</span>
                  </div>
                  <input type="text" name="harga_shipdec_dg" id="harga_shipdec_dg" class="form-control mb-2">
                </div>

                <label for="harga_avi">Harga Avi: </label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text mb-2" id="inputGroupPrepend3">Rp.</span>
                  </div>
                  <input type="text" name="harga_avi" id="harga_avi" class="form-control mb-2">
                </div>

                <label for="jenis_pengiriman">Jenis Pengiriman : </label>
                <input type="text" name="jenis_pengiriman" id="jenis_pengiriman" class="form-control  mb-2">
        </div>
        <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('modal-import')
<div class="modal fade" id="importHarga" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: #435c70; color: white">
            <div class="modal-header">
                <h5 class="modal-title">IMPORT DATA HARGA DARI EXCEL</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('harga.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>PILIH FILE</label>
                        <input type="file" name="file" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                    <button type="submit" class="btn btn-success">IMPORT</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('content')
@php
    $no = 1;
@endphp
<div class="col-12 tm-block-col">
<div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
        <h2 class="tm-block-title">Data Harga</h2>
        <button type="button" class="btn btn-primary mt-3 mb-3" data-toggle="modal" data-target="#exampleModal">
            + Tambah Harga
        </button>
        <button type="button" class="btn btn-success ml-2" data-toggle="modal" data-target="#importHarga">
            IMPORT EXCEL
        </button>
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
        <table class="table">
            <thead>
                <tr>
                    <th rowspan="2" style="vertical-align : middle;text-align:center;">NO.</th>
                    <th rowspan="2" style="vertical-align : middle;text-align:center;">KOTA ASAL</th>
                    <th rowspan="2" style="vertical-align : middle;text-align:center;">KOTA TUJUAN</th>
                    <th rowspan="2" style="vertical-align : middle;text-align:center;">HARGA MIN 10kg</th>
                    <td colspan="2" style="text-align:center;"><b>HEAVY CARGO</b></th>
                    <td colspan="2" align="center"><b>DANGEROUS GOODS</b></th>
                    <td style="text-align:center;"><b>AVI</b></th>
                    <th rowspan="2" style="vertical-align : middle;text-align:center;">JENIS PENGIRIMAN</th>
                    <th rowspan="2" style="vertical-align : middle;text-align:center;">ACTION</th>
                    </tr>
                <tr>
                    <th>Harga 70-149kg</th>
                    <th>Harga 150-300kg</th>
                    <th>TARIF DG</th>
                    <th>SHIPDEC</th>
                    <th>LIVE ANIMALS</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataHarga as $harga)
                    <tr>
                        <td scope="row"><b>{{ $no++ }}</b></td>
                        <td><b>{{ $harga->kota_asal }}</b></td>
                        <td><b>{{ $harga->kota_tujuan }}</b></td>
                        <td><b>Rp. {{ number_format($harga->harga_min) }}</b></td>
                        <td><b>Rp. {{ number_format($harga->harga_min_hc) }}</b></td>
                        <td><b>Rp. {{ number_format($harga->harga_max_hc) }}</b></td>
                        <td><b>Rp. {{ number_format($harga->harga_dg) }}</b></td>
                        <td><b>Rp. {{ number_format($harga->harga_shipdec_dg) }}</b></td>
                        <td><b>Rp. {{ number_format($harga->harga_avi) }}</b></td>
                        <td><b>{{ $harga->jenis_pengiriman }}</b></td>
                        <td>
                            <form action="{{route('harga.hapus', $harga->id)}}" method="POST">
                                @csrf
                                @method('DELETE')

                                <a href="{{route('harga.edit', $harga->id)}}" class="btn btn-warning"><i class="far fa-edit"></i></a>
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Anda Yakin Akan Menghapus Data?')"><i class='far fa-trash-alt'></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
