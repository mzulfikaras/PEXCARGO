@extends('user.pages.home-user')
@section('title', '| Cek Harga')

@section('modal_harga')
<div class="modal fade bd-example-modal-lg" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 1399px!important;" role="document">
      <div class="modal-content" style="background-color: #2c2a35; color: white">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Cek Harga</h5>
          <a href="{{route('front.index')}}">
            <button type="button" class="close"> <span aria-hidden="true">&times;</span> </button>
          </a>
        </div>
        <div class="modal-body">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th rowspan="2" style="vertical-align : middle;text-align:center;">KOTA ASAL</th>
                        <th rowspan="2" style="vertical-align : middle;text-align:center;">KOTA TUJUAN</th>
                        <th rowspan="2" style="vertical-align : middle;text-align:center;">HARGA (Min 10kg)</th>
                        <td colspan="2" style="vertical-align : middle;text-align:center;"><b>HEAVY CARGO</b></th>
                        <td colspan="2" align="center"><b>DANGEROUS GOODS</b></th>
                        <td style="vertical-align : middle;text-align:center;"><b>AVI</b></th>
                        <th rowspan="2" style="vertical-align : middle;text-align:center;">JENIS PENGIRIMAN</th>
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
                          <td>{{$harga->kota_asal}}</td>
                          <td>{{$harga->kota_tujuan}}</td>
                          <td>Rp. {{number_format($harga->harga_min)}}</td>
                          <td>Rp. {{number_format($harga->harga_min_hc)}}</td>
                          <td>Rp. {{number_format($harga->harga_max_hc)}}</td>
                          <td>Rp. {{number_format($harga->harga_dg)}}</td>
                          <td>Rp. {{number_format($harga->harga_shipdec_dg)}}</td>
                          <td>Rp. {{number_format($harga->harga_avi)}}</td>
                          <td>{{$harga->jenis_pengiriman}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
                <div id="cekHarga" style="display: none;">
                    <form action="{{route('front.cekHarga')}}" method="get">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <label for="dari">Dari : </label>
                                <select class="custom-select mt-2" id="dari" name="kota_asal" required>
                                  <option selected disabled>Pilih Kota Asal</option>
                                  @foreach ($kotaAsal as $asal)
                                    <option>{{$asal->kota_asal}}</option>
                                  @endforeach
                                </select>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <label for="dari">Tujuan : </label>
                                <select class="custom-select mt-2" id="dari" name="kota_tujuan" required>
                                  <option selected disabled>Pilih Kota Tujuan</option>
                                  @foreach ($kotaTujuan as $tujuan)
                                    <option>{{$tujuan->kota_tujuan}}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-4">Cek Harga</button>
                    </form>
                </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary" id="cek">Cek Harga Lainnya</button>
            <a href="{{route('front.index')}}" class="btn btn-secondary">Close</a>
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
<script>
    var button = document.getElementById('cek');
    var form = document.getElementById('cekHarga');

    button.addEventListener('click', muncul)

    function muncul(){
        form.style.display = 'block'
    }
</script>
@endsection
