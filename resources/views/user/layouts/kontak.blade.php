<div class="grid__item">
    <div class="product">
        <div class="tm-nav-link">
            <i class="fas fa-comments fa-3x tm-nav-icon"></i>
            <span class="tm-nav-text">Kontak</span>
            <div class="product__bg"></div>
        </div>
        <div class="product__description">
            <div class="pt-sm-4 pb-sm-4 pl-sm-5 pr-sm-5 pt-2 pb-2 pl-3 pr-3">
                <div class="row mb-3">
                    <div class="col-12">
                        <h2 class="tm-page-title text-center">Kontak Kami</h2>
                    </div>
                </div>
                <div class="row mb-4 text-center">
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <i class="fas fa-home"> Alamat : <p>Jl Yabaso Terminal Cargo Sentani International Airport Jayapura-Papua 99352</p></i>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <i class="fa fa-envelope-o"> Email : <p class="mt-4">papua@expressindo.net</p></i>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <i class="fa fa-phone"> Telefon : <p class="mt-4">0967-5197032</p></i>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <form action="{{route('front.kontak')}}" method="post" class="contact-form">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6 col-lg-6 col-xl-6">
                                  <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama"  required/>
                                </div>
                                <div class="form-group col-md-6 col-lg-6 col-xl-6 tm-col-email">
                                  <input type="email" id="email" name="email" class="form-control" placeholder="Email"  required/>
                                </div>
                                <div class="form-group col-md-6 col-lg-6 col-xl-6">
                                    <input type="text" id="no_telp" name="no_telp" class="form-control" placeholder="Nomor Telepon"  required/>
                                </div>
                                <div class="form-group col-md-6 col-lg-6 col-xl-6 tm-col-email">
                                  <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Alamat"  required/>
                                </div>
                            </div>
                            <div class="form-group">
                              <textarea id="pesan" name="pesan" class="form-control" rows="9" placeholder="Pesan" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary tm-btn-submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
