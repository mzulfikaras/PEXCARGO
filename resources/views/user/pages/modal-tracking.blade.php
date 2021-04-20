@extends('user.pages.home-user')
@section('title', '| Tracking Barang')

@section('modal_harga')
<div class="modal fade bd-example-modal-lg" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content" style="background-color: #2c2a35; color: white">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Tracking Barang</h5>
          <a href="{{route('front.index')}}">
            <button type="button" class="close"> <span aria-hidden="true">&times;</span> </button>
          </a>
        </div>
        <div class="modal-body">
                    @if ($dataPengiriman->isEmpty() && $dataTracking->isEmpty())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Data Gagal Ditemukan. Silakan Cek Kembali Nomor Seri Anda
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <button id="tombol" class="btn btn-primary">Tracking Barang Kembali</button>

                    @elseif($dataTracking->isEmpty())
                        @foreach ($dataPengiriman as $pengiriman)
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                Data Berhasil Ditemukan.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <h3>Customer Details</h3>
                            <hr style="background-color: white">
                            <div class="row">
                                <div class="col-4 text-center">
                                    <i class="fas fa-user-circle" style="font-size: 36px"></i>
                                    <p>Nama Customer : </p>
                                    <p style="background-color: green">{{$pengiriman->nama}}</p>
                                </div>
                                <div class="col-4 text-center">
                                    <i class="fas fa-map-marked-alt" style="font-size: 36px"></i>
                                    <p>Alamat : </p>
                                    <p>{{ $pengiriman->alamat }}</p>
                                </div>
                                <div class="col-4 text-center">
                                    <i class="fas fa-id-card" style="font-size: 36px"></i>
                                    <p>No Seri : </p>
                                    <p style="background-color: green">{{ $pengiriman->no_seri }}</p>
                                </div>
                            </div>
                        @endforeach
                        <hr style="background-color: white">
                        <h3>Catatan Pengiriman</h3>
                        <hr style="background-color: white">
                        <div class="row">
                            <div class="col-12 text-center">
                                <h5 style="background-color: red">Pengiriman barang Sedang Diproses.</h5>
                            </div>
                        </div>
                    @else
                        @foreach ($dataPengiriman as $pengiriman)
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                Data Berhasil Ditemukan.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <h3>Customer Details</h3>
                            <hr style="background-color: white">
                            <div class="row">
                                <div class="col-4 text-center">
                                    <i class="fas fa-user-circle" style="font-size: 36px"></i>
                                    <p>Nama Customer : </p>
                                    <p style="background-color: green">{{$pengiriman->nama}}</p>
                                </div>
                                <div class="col-4 text-center">
                                    <i class="fas fa-map-marked-alt" style="font-size: 36px"></i>
                                    <p class="text-center">Alamat : </p>
                                    <p>{{ $pengiriman->alamat }}</p>
                                </div>
                                <div class="col-4 text-center">
                                    <i class="fas fa-id-card" style="font-size: 36px"></i>
                                    <p>No Seri : </p>
                                    <p style="background-color: green">{{ $pengiriman->no_seri }}</p>
                                </div>
                            </div>
                        @endforeach
                        <hr style="background-color: white">
                            @foreach ($dataTracking as $tracking)
                                <h3>Catatan Pengiriman</h3>
                                <hr style="background-color: white">
                                <div class="row text-center">
                                    <div class="col-4">
                                        <i class="fas fa-passport" style="font-size: 36px"></i>
                                        <p>NO. SMU/ AIRWAY BILL : </p>
                                        <p style="background-color: green">{{$tracking->no_smu}}</p>
                                    </div>
                                    <div class="col-4">
                                        <i class="fas fa-plane-departure" style="font-size: 36px"></i>
                                        <p>Tanggal Pengririman : </p>
                                        <p style="background-color: green">{{date('d-M-Y', strtotime($tracking->tgl_berangkat))}}</p>
                                    </div>
                                    <div class="col-4">
                                        <i class="fas fa-plane-arrival" style="font-size: 36px"></i>
                                        @if (!empty($tracking->tgl_sampai))
                                            <p>Tanggal Kedatangan : </p>
                                            <p style="background-color: green">{{date('d-M-Y', strtotime($tracking->tgl_sampai))}}</p>
                                        @else
                                            <p>Tanggal Kedatangan: </p>
                                            <p style="background-color: red">Barang Dalam Perjalanan</p>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                    @endif
            <div id="tracking" style="display: none;">
                <form action="{{route('front.trackingBarang')}}" method="GET">
                    @csrf
                    <label for="no_seri">Nomor Seri : </label>
                    <input type="text" class="form-control" id="no_seri" name="no_seri" placeholder="Masukan Nomor Seri Anda" required>
                    <button type="submit" class="btn btn-primary mt-4">Tracking Barang</button>
                </form>
            </div>
        </div>
        <div class="modal-footer">
            <a href="{{route('front.invoice', $pengiriman->id)}}" class="btn btn-primary">Cetak Invoice</a>
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
    var tracking = document.getElementById('tracking')
    var button = document.getElementById('tombol')

    button.addEventListener('click', trackingBarang)

    function trackingBarang(){
        tracking.style.display = 'block'
        button.style.display = 'none'
    }
</script>
@endsection
