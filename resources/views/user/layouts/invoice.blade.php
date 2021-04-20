<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Invoice PEX CARGO</title>
    <link rel="stylesheet" href="{{public_path('/assets/user/peximg/style.css')}}" media="all" />
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="{{public_path('/assets/user/peximg/header.png')}}">
      </div>
      <div id="company">
        <img src="{{public_path('/assets/user/peximg/header2.png')}}">
        <h1>INVOICE NO : {{$report->id}}</h1>
      </div>
      <hr style="width: 1010px; margin-left: -2px">
    </header>
    <main>
        <div class="detailcompany">
            <div class="column">
                <div>Alamat : <span class="isi"><strong>JL. YABASO GUDANG CARGO BANDAR UDARA SENTANI <span style="margin-left:50px"> JAYAPURA PAPUA</span></strong></span></div>
                <div>Telpon : <span class="isi"><strong>082198012827</strong></span></div>
                <div>Fax : <span class="isi"><strong>-</strong></span></div>
                <div>Email : <span class="isi"><strong>papua@expressindo.net</strong></span></div>
            </div>
            <div class="column">
                <div>Tanggal : <span class="isi"><strong>{{date('j M Y', strtotime($report->created_at))}}</strong></span></div>
                <div>Tanggal Jatuh Tempo : <span class="isi"><strong>{{date('j M Y', strtotime($report->created_at))}}</strong></span></div>
                <div>Jenis Pembayaran : <span class="isi"><strong>{{$report->jenis_pembayaran}}</strong></span></div>
            </div>
        </div>
        <hr style="width: 1010px; margin-left: -2px">
        <div id="details" class="clearfix">
          <div id="client" class="kolom">
            <h1>Pengirim : </h1>
            <hr style="width: 120px; margin-left:-1px">
            <div>Nama : <span class="isi"><strong>PEX CARGO</strong></span></div>
            <div>Alamat : <span class="isi"><strong>JAYAPURA</strong></span></div>
            <div>Telepon : <span class="isi"><strong> - </strong></span></div>
          </div>
          <div id="shipping" class="kolom">
              <h1>Penerima : </h1>
              <hr style="width: 120px; margin-left:-1px">
              <div>Nama : <span class="isi"><strong>{{$report->nama}}</strong></span></div>
              <div>Alamat : <span class="isi"><strong>{{$report->alamat}}</strong></span></div>
              <div>Telepon : <span class="isi"><strong>{{$report->no_telp}}</strong></span></div>
          </div>
          <div id="invoice" class="kolom">
              <h1>Rincian Pengiriman : </h1>
              <hr style="width: 230px; margin-left:-1px">
              <div>Bandara Asal : <span class="isi"><strong>{{$report->kota_asal}}</strong></span></div>
              <div>Bandara Tujuan : <span class="isi"><strong>{{$report->kota_tujuan}}</strong></span></div>
              <div>Tgl. Pengiriman : <span class="isi"><strong>{{date('j M Y', strtotime($report->tgl_berangkat))}}</strong></span></div>
              <div>Jenis Pengiriman : <span class="isi"><strong>{{$report->jenis_pengiriman}}</strong></span></div>
          </div>
        </div>
        <hr style="width: 1010px; margin-left: -2px">
      <table border="0" cellspacing="0" cellpadding="0">
        <thead id="content">
          <tr>
            <th><strong>NO. SMU/ AIRWAY BILL</strong></th>
            <th><strong>JUMLAH KIRIMAN (COLI)</strong></th>
            <th><strong>PERNYATAAN TENTANG ISI</strong></th>
            <th><strong>JUMLAH BERAT (Kg)</strong></th>
            <th><strong>HARGA SATUAN (Rp)</strong></th>
            <th><strong>JUMLAH TOTAL (Rp)</strong></th>
          </tr>
        </thead>
        <tbody id="content">
            <tr>
                @if ($report->jenis_pengiriman == "PORT TO PORT")
                    <td>{{$report->no_smu}}</td>
                @else
                    <td></td>
                @endif
                <td>{{$report->jml_kiriman}}</td>
                <td>{{$report->nama_barang}}</td>
                <td>{{$report->jml_berat}}</td>
                <td>{{number_format($report->harga_satuan)}}</td>
                <td>{{number_format($report->total)}}</td>
            </tr>
        </tbody>
      </table>
    <div id="notices">
        <div>Ketentuan Dan Prasyarat</div>
        <div class="notice">
            <ol>
                <li>Invoice ini berlaku sebagai faktur pajak perusahaan.</li>
                <li>Pembayaran dapat dilakukan secara cash/ tunai, transfer bank dan debit deposit,<br> khusus transfer bank pada Rekening Perusahaan: <br>
                    <strong class="italic">BANK BNI 811-489489-7 A/N PT papua expressindo logistik</strong> <br>
                    <strong class="italic">BANK MANDIRI 154-0015552403 A/N PT papua expressindo logistik</strong>
                </li>
                <li>Invoice ini sah apabila terdapat stempel & tanda tangan Pimpinan.</li>
                <li>Abaikan invoice ini bila sudah dilakukan pembayaran.</li>
            </ol>
        </div>
    </div>
    <div id="totalrincian">
        <table>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>SUBTOTAL</td>
                <td>{{number_format($report->total)}}</td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>By. PPN</td>
                <td> - </td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>By. RA & WH </td>
                <td> - </td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>By. ADMIN</td>
                <td> - </td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>PPN 1%</td>
                <td> - </td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>Lainnya</td>
                <td> - </td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>Currency</td>
                <td> IDR </td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>GRAND TOTAL</td>
                <td>{{number_format($report->total)}}</td>
              </tr>
        </table>
    </div>
    <p>Kami menyatakan bahwa invoice ini dibuat secara benar sesuai dengan transaksi yang dilakukan bersama.</p><br><br>
      <div id="ttd">
        <h4 style="float: right; margin-right: 70px">Jayapura, 02 Februari 2021</h4><br>
        <table style="background: white">
            <tr>
                <td><strong>PT. Papua Expressindo Logistik</strong></td>
            </tr>
            <tr>
                <td><strong><br><br>ARIE RINALDI</strong></td>
            </tr>
            <tr>
                <td>Managing Director</td>
            </tr>
        </table>
      </div>
    </main>
  </body>
</html>
