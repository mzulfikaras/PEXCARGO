<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Harga;
use App\Models\Invoice;
use App\Models\Report;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use PDF;

class ReportController extends Controller
{
    public function index(){
        $start = Carbon::now()->startOfMonth()->format('Y-m-d');
        $end = Carbon::now()->endOfMonth()->format('Y-m-d');

        if (request()->date != '') {
            $date = explode(' - ' ,request()->date);
            $start = Carbon::parse($date[0])->format('Y-m-d');
            $end = Carbon::parse($date[1])->format('Y-m-d');
        }

        $dataReport = Report::latest()->whereBetween('tgl_berangkat', [$start, $end])->get();

        return view('admin.pages.reports.index', compact('dataReport'));
    }

    public function reportPdf($daterange)
    {
        $date = explode('+', $daterange);

        $start = Carbon::parse($date[0])->format('Y-m-d');
        $end = Carbon::parse($date[1])->format('Y-m-d');


        $dataReport = Report::latest()->whereBetween('tgl_berangkat', [$start, $end])->get();

        $pdf = PDF::loadView('admin.pages.reports.pdf', compact('dataReport', 'date'))->setPaper('a4','landscape');

        return $pdf->stream();
    }

    public function cari(Request $request){
        $no_seri = $request->no_seri;

        $invoice = Invoice::where('no_seri','like',"%". $no_seri)->get();

        return view('admin.pages.reports.search', compact('invoice'));
    }

    public function store(Request $request){
        $validateData = $request->validate([
            'nama_cost' => 'required',
            'kota_asal' => 'required',
            'kota_tujuan' => 'required',
            'no_seri' => 'required',
            'no_smu' => 'required',
            'jenis_pengiriman' => 'required',
            'admin_input' =>'required',
            'tgl_berangkat' => 'required',
        ]);

        Report::create($validateData);

        $dataInvoice = Invoice::where('no_seri', $validateData['no_seri'])->get();
        foreach($dataInvoice as $data){
            $data->tgl_berangkat = $validateData['tgl_berangkat'];
            $data->no_smu = $validateData['no_smu'];
            $data->save();
        }

        $request->session()->flash('pesan','Data Telah Ditambahkan');
        return redirect()->route('reports.index');
    }

    public function editKedatangan(Report $report){
        return view('admin.pages.reports.edit', compact('report'));
    }

    public function updateKedatangan(Request $request, Report $report){
        $validateData = $request->validate([
            'nama_cost' => '',
            'kota_asal' => '',
            'kota_tujuan' => '',
            'no_seri' => '',
            'no_seri' => '',
            'jenis_pengiriman' => '',
            'admin_input' =>'',
            'tgl_berangkat' => '',
            'admin_output' => 'required',
            'tgl_sampai' => 'required'
        ]);

        $report->update($validateData);

        $request->session()->flash('pesan','Data Kedatangan Barang Berhasil Di Update');
        return redirect()->route('reports.index');
    }

    public function destroy(Report $report){
        $report->delete();

        return redirect()->route('reports.index')->with('hapus','Data Berhasil Dihapus');
    }

    public function jayapuraIndex(){
        $start = Carbon::now()->startOfMonth()->format('Y-m-d');
        $end = Carbon::now()->endOfMonth()->format('Y-m-d');

        if (request()->date != '') {
            $date = explode(' - ' ,request()->date);
            $start = Carbon::parse($date[0])->format('Y-m-d');
            $end = Carbon::parse($date[1])->format('Y-m-d');
        }

        $dataReport = Report::latest()->whereBetween('tgl_berangkat', [$start, $end])->get();

        return view('jayapura.pages.reports.index', compact('dataReport'));
    }

    public function jayapuraReportPdf($daterange)
    {
        $date = explode('+', $daterange);

        $start = Carbon::parse($date[0])->format('Y-m-d');
        $end = Carbon::parse($date[1])->format('Y-m-d');


        $dataReport = Report::latest()->whereBetween('tgl_berangkat', [$start, $end])->get();

        $pdf = PDF::loadView('admin.pages.reports.pdf', compact('dataReport', 'date'))->setPaper('a4','landscape');

        return $pdf->stream();
    }

    public function jayapuraCari(Request $request){
        $no_seri = $request->no_seri;

        $invoice = Invoice::where('no_seri','like',"%". $no_seri)->get();

        return view('jayapura.pages.reports.search', compact('invoice'));
    }

    public function jayapuraStore(Request $request){
        $validateData = $request->validate([
            'nama_cost' => 'required',
            'kota_asal' => 'required',
            'kota_tujuan' => 'required',
            'no_seri' => 'required',
            'no_smu' => 'required',
            'jenis_pengiriman' => 'required',
            'admin_input' =>'required',
            'tgl_berangkat' => 'required',
        ]);

        Report::create($validateData);

        $dataInvoice = Invoice::where('no_seri', $validateData['no_seri'])->get();
        foreach($dataInvoice as $data){
            $data->tgl_berangkat = $validateData['tgl_berangkat'];
            $data->no_smu = $validateData['no_smu'];
            $data->save();
        }

        $request->session()->flash('pesan','Data Telah Ditambahkan');
        return redirect()->route('jayapura.reports.index');
    }

    public function jayapuraEditKedatangan(Report $report){
        return view('jayapura.pages.reports.edit', compact('report'));
    }

    public function jayapuraUpdateKedatangan(Request $request, Report $report){
        $validateData = $request->validate([
            'nama_cost' => '',
            'kota_asal' => '',
            'kota_tujuan' => '',
            'no_seri' => '',
            'no_smu' => '',
            'jenis_pengiriman' => '',
            'admin_input' =>'',
            'tgl_berangkat' => '',
            'admin_output' => 'required',
            'tgl_sampai' => 'required'
        ]);

        $report->update($validateData);

        $request->session()->flash('pesan','Data Kedatangan Barang Berhasil Di Update');
        return redirect()->route('jayapura.reports.index');
    }

    public function jayapuraDestroy(Report $report){
        $report->delete();

        return redirect()->route('jayapura.reports.index')->with('hapus','Data Berhasil Dihapus');
    }
}
