<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Harga;
use App\Models\Invoice;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use PDF;

class InvoiceController extends Controller
{
    public function index(){
        $start = Carbon::now()->startOfMonth()->format('Y-m-d H:i:s');
        $end = Carbon::now()->endOfMonth()->format('Y-m-d H:i:s');

        if (request()->date != '') {
            $date = explode(' - ' ,request()->date);
            $start = Carbon::parse($date[0])->format('Y-m-d');
            $end = Carbon::parse($date[1])->format('Y-m-d');
        }
        $dataInvoice = Invoice::latest()->whereBetween('created_at', [$start, $end])->get();
        return view('admin.pages.invoice.index', compact('dataInvoice'));
    }

    public function reportPdf($daterange)
    {
        $date = explode('+', $daterange);

        $start = Carbon::parse($date[0])->format('Y-m-d H:i:s');
        $end = Carbon::parse($date[1])->format('Y-m-d H:i:s');


        $dataInvoice = Invoice::latest()->whereBetween('created_at', [$start, $end])->get();

        $pdf = PDF::loadView('admin.pages.invoice.pdf', compact('dataInvoice', 'date'))->setPaper('a3','landscape');

        return $pdf->stream();
    }

    public function create(){
        $array = Harga::all();
        $harga = collect($array);
        $kotaAsal = $harga->unique('kota_asal');
        $kotaTujuan = $harga->unique('kota_tujuan');
        $jenis_pengiriman = $harga->unique('jenis_pengiriman');
        $kotaAsal->values()->all();
        $kotaTujuan->values()->all();
        $jenis_pengiriman->values()->all();

        return view('admin.pages.invoice.create', compact('kotaAsal','kotaTujuan','jenis_pengiriman'));
    }

    public function store(Request $request){
        $validateData = $request->validate([
            'jenis_pembayaran' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'kota_asal' =>'required',
            'kota_tujuan' => 'required',
            'jenis_pengiriman' => 'required',
            'no_seri' => 'required|unique:invoices',
            'tgl_berangkat' => '',
            'no_smu' => '',
            'jml_kiriman' => 'required|integer',
            'nama_barang' => 'required',
            'jml_berat' => 'required|integer',
            'harga_satuan' => 'required',
            'total' => 'required',
            'status' => 'required',
        ]);

        Invoice::create($validateData);
        $request->session()->flash('pesan', 'Data Pengiriman Berhasil Di Tambahkan');
        return redirect()->route('invoice.index');

    }

    public function edit(Invoice $invoice){
        $array = Harga::all();
        $harga = collect($array);
        $kotaAsal = $harga->unique('kota_asal');
        $kotaTujuan = $harga->unique('kota_tujuan');
        $jenis_pengiriman = $harga->unique('jenis_pengiriman');
        $kotaAsal->values()->all();
        $kotaTujuan->values()->all();
        $jenis_pengiriman->values()->all();

        return view('admin.pages.invoice.edit', compact('invoice','kotaAsal','kotaTujuan','jenis_pengiriman'));
    }

    public function update(Request $request, Invoice $invoice){
        $validateData = $request->validate([
            'jenis_pembayaran' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'kota_asal' =>'required',
            'kota_tujuan' => 'required',
            'jenis_pengiriman' => 'required',
            'no_seri' => 'required|unique:invoices,no_seri,' . $invoice->id,
            'tgl_berangkat' => '',
            'no_smu' => '',
            'jml_kiriman' => 'required|integer',
            'nama_barang' => 'required',
            'jml_berat' => 'required|integer',
            'harga_satuan' => 'required',
            'total' => 'required',
            'status' => 'required',
        ]);

        $invoice->update($validateData);
        $request->session()->flash('pesan', 'Data Pengiriman Berhasil Di Update');
        return redirect()->route('invoice.index');
    }

    public function destroy(Invoice $invoice){
        $invoice->delete();
        return redirect()->route('invoice.index')->with('hapus','Data Pengiriman Berhasil di Hapus');
    }

    public function jayapuraIndex(){
        $start = Carbon::now()->startOfMonth()->format('Y-m-d H:i:s');
        $end = Carbon::now()->endOfMonth()->format('Y-m-d H:i:s');

        if (request()->date != '') {
            $date = explode(' - ' ,request()->date);
            $start = Carbon::parse($date[0])->format('Y-m-d');
            $end = Carbon::parse($date[1])->format('Y-m-d');
        }
        $dataInvoice = Invoice::latest()->whereBetween('created_at', [$start, $end])->get();
        return view('jayapura.pages.invoice.index', compact('dataInvoice'));
    }

    public function jayapuraReportPdf($daterange)
    {
        $date = explode('+', $daterange);

        $start = Carbon::parse($date[0])->format('Y-m-d H:i:s');
        $end = Carbon::parse($date[1])->format('Y-m-d H:i:s');


        $dataInvoice = Invoice::latest()->whereBetween('created_at', [$start, $end])->get();

        $pdf = PDF::loadView('admin.pages.invoice.pdf', compact('dataInvoice', 'date'))->setPaper('a3','landscape');

        return $pdf->stream();
    }

    public function jayapuraCreate(){
        $array = Harga::all();
        $harga = collect($array);
        $kotaAsal = $harga->unique('kota_asal');
        $kotaTujuan = $harga->unique('kota_tujuan');
        $jenis_pengiriman = $harga->unique('jenis_pengiriman');
        $kotaAsal->values()->all();
        $kotaTujuan->values()->all();
        $jenis_pengiriman->values()->all();

        return view('jayapura.pages.invoice.create', compact('kotaAsal','kotaTujuan','jenis_pengiriman'));
    }

    public function jayapuraStore(Request $request){
        $validateData = $request->validate([
            'jenis_pembayaran' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'kota_asal' =>'required',
            'kota_tujuan' => 'required',
            'jenis_pengiriman' => 'required',
            'no_seri' => 'required|unique:invoices',
            'tgl_berangkat' => '',
            'no_smu' => '',
            'jml_kiriman' => 'required|integer',
            'nama_barang' => 'required',
            'jml_berat' => 'required|integer',
            'harga_satuan' => 'required',
            'total' => 'required',
            'status' => 'required',
        ]);

        Invoice::create($validateData);
        $request->session()->flash('pesan', 'Data Pengiriman Berhasil Di Tambahkan');
        return redirect()->route('jayapura.invoice.index');

    }

    public function jayapuraEdit(Invoice $invoice){
        $array = Harga::all();
        $harga = collect($array);
        $kotaAsal = $harga->unique('kota_asal');
        $kotaTujuan = $harga->unique('kota_tujuan');
        $jenis_pengiriman = $harga->unique('jenis_pengiriman');
        $kotaAsal->values()->all();
        $kotaTujuan->values()->all();
        $jenis_pengiriman->values()->all();

        return view('jayapura.pages.invoice.edit', compact('invoice','kotaAsal','kotaTujuan','jenis_pengiriman'));
    }

    public function jayapuraUpdate(Request $request, Invoice $invoice){
        $validateData = $request->validate([
            'jenis_pembayaran' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'kota_asal' =>'required',
            'kota_tujuan' => 'required',
            'jenis_pengiriman' => 'required',
            'no_seri' => 'required|unique:invoices,no_seri,' . $invoice->id,
            'tgl_berangkat' => '',
            'no_smu' => '',
            'jml_kiriman' => 'required|integer',
            'nama_barang' => 'required',
            'jml_berat' => 'required|integer',
            'harga_satuan' => 'required',
            'total' => 'required',
            'status' => 'required',
        ]);

        $invoice->update($validateData);
        $request->session()->flash('pesan', 'Data Pengiriman Berhasil Di Update');
        return redirect()->route('jayapura.invoice.index');
    }

    public function jayapuraDestroy(Invoice $invoice){
        $invoice->delete();
        return redirect()->route('jayapura.invoice.index')->with('hapus','Data Pengiriman Berhasil di Hapus');
    }
}
