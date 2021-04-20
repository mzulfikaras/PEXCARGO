<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Harga;
use App\Models\Invoice;
use App\Models\Kontak;
use App\Models\Report;
use Illuminate\Http\Request;
use PDF;

class FrontController extends Controller
{
    public function index(){
        $array = Harga::all();
        $harga = collect($array);
        $kotaAsal = $harga->unique('kota_asal');
        $kotaTujuan = $harga->unique('kota_tujuan');
        $kotaAsal->values()->all();
        $kotaTujuan->values()->all();
        return view('user.pages.home-user', compact('kotaAsal','kotaTujuan'));
    }

    public function cekHarga(Request $request){
        $array = Harga::all();
        $harga = collect($array);
        $kotaAsal = $harga->unique('kota_asal');
        $kotaTujuan = $harga->unique('kota_tujuan');
        $kotaAsal->values()->all();
        $kotaTujuan->values()->all();

        $kota_asal = $request->kota_asal;
        $kota_tujuan = $request->kota_tujuan;

        $dataHarga = Harga::where([
            ['kota_asal','like',"%".$kota_asal."%"],
            ['kota_tujuan','like',"%".$kota_tujuan."%"]
        ])->get();

        return view('user.pages.modal-harga', compact('dataHarga','kotaAsal','kotaTujuan'));
    }

    public function trackingBarang(Request $request){
        $array = Harga::all();
        $harga = collect($array);
        $kotaAsal = $harga->unique('kota_asal');
        $kotaTujuan = $harga->unique('kota_tujuan');
        $kotaAsal->values()->all();
        $kotaTujuan->values()->all();

        $kota_asal = $request->kota_asal;
        $kota_tujuan = $request->kota_tujuan;

        $tracking = $request->no_seri;

        $dataPengiriman = Invoice::where('no_seri','like',"%".$tracking)->get();
        $dataTracking = Report::where('no_seri','like',"%".$tracking)->get();

        return view('user.pages.modal-tracking', compact('dataPengiriman','dataTracking','kotaAsal','kotaTujuan'));

    }

    public function kontakUser(Request $request){
         $validateData = $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
            'pesan' => 'required'
         ]);

         Kontak::create($validateData);

         $request->session()->flash('pesan','Pesan Berhasil Terkirim. Terimakasih Atas Pesan Anda');
         return redirect()->route('front.index');
    }

    public function userInvoice(Invoice $report){
        $invoice = PDF::loadview('user.layouts.invoice', compact('report'))->setPaper('a3','potrait');
        return $invoice->stream();
    }
}
