<div class="grid__item" id="home-link">
    <div class="product">
        <div class="tm-nav-link">
            <i class="fas fa-plane fa-3x tm-nav-icon"></i>
            <span class="tm-nav-text">Tracking & Harga</span>
            <div class="product__bg"></div>
        </div>
        <div class="product__description">
            <div class="row mb-3">
                <div class="col-12">
                    <h2 class="tm-page-title">Tracking & Harga</h2>
                    <hr style="background-color: white">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <h4>Tracking Barang</h4>
                    <form action="{{route('front.trackingBarang')}}" method="GET">
                        @csrf
                        <label for="no_seri">Nomor Seri : </label>
                        <input type="text" class="form-control" id="no_seri" name="no_seri" placeholder="Masukan Nomor Seri Anda" required>
                        <button type="submit" class="btn btn-primary mt-4">Tracking Barang</button>
                    </form>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <h4>Cek Harga</h4>
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

        </div>
    </div>
</div>
