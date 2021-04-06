<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Harga;
use App\Imports\HargaImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class HargaController extends Controller
{
    public function index(){
        $dataHarga = Harga::latest()->get();
        return view('admin.pages.harga.index', compact('dataHarga'));
    }

    public function store(Request $request){
        $validateData = $request->validate([
            'kota_asal' => 'required',
            'kota_tujuan' => 'required',
            'harga_min' => 'required|integer',
            'harga_min_hc' => 'required|integer',
            'harga_max_hc' => 'required|integer',
            'harga_dg' => 'required|integer',
            'harga_shipdec_dg' => 'required|integer',
            'harga_avi' => 'required|integer',
            'jenis_pengiriman' => 'required'
        ]);

        Harga::create($validateData);

        $request->session()->flash('pesan','Data Harga Berhasil Ditambahkan');
        return redirect()->route('harga.index');
    }

    public function edit(Harga $harga){
        return view('admin.pages.harga.edit', compact('harga'));
    }

    public function update(Request $request, Harga $harga){
        $validateData = $request->validate([
            'kota_asal' => 'required',
            'kota_tujuan' => 'required',
            'harga_min' => 'required|integer',
            'harga_min_hc' => 'required|integer',
            'harga_max_hc' => 'required|integer',
            'harga_dg' => 'required|integer',
            'harga_shipdec_dg' => 'required|integer',
            'harga_avi' => 'required|integer',
            'jenis_pengiriman' => 'required'
        ]);

        $harga->update($validateData);
        $request->session()->flash('pesan','Data Harga Berhasil Diupdate');
        return redirect()->route('harga.index');
    }

    public function destroy(Harga $harga){
        $harga->delete();
        return redirect()->route('harga.index')->with('hapus','Data Harga Berhasil Dihapus');
    }

    public function importHarga(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = $file->hashName();

        //temporary file
        $path = $file->storeAs('public/excel/harga/',$nama_file);

        // import data
        $import = Excel::import(new HargaImport(), storage_path('app/public/excel/harga/'.$nama_file));

        //remove from server
        Storage::delete($path);

        if($import) {
            //redirect
            return redirect()->route('harga.index')->with(['pesan' => 'Data Berhasil Diimport!']);
        } else {
            //redirect
            return redirect()->route('harga.index')->with(['pesan' => 'Data Gagal Diimport!']);
        }
    }


    public function jayapuraIndex(){
        $dataHarga = Harga::latest()->get();
        return view('jayapura.pages.harga.index', compact('dataHarga'));
    }

    public function jayapuraStore(Request $request){
        $validateData = $request->validate([
            'kota_asal' => 'required',
            'kota_tujuan' => 'required',
            'harga_min' => 'required|integer',
            'harga_min_hc' => 'required|integer',
            'harga_max_hc' => 'required|integer',
            'harga_dg' => 'required|integer',
            'harga_shipdec_dg' => 'required|integer',
            'harga_avi' => 'required|integer',
            'jenis_pengiriman' => 'required'
        ]);

        Harga::create($validateData);

        $request->session()->flash('pesan','Data Harga Berhasil Ditambahkan');
        return redirect()->route('jayapura.harga.index');
    }

    public function jayapuraEdit(Harga $harga){
        return view('jayapura.pages.harga.edit', compact('harga'));
    }

    public function jayapuraUpdate(Request $request, Harga $harga){
        $validateData = $request->validate([
            'kota_asal' => 'required',
            'kota_tujuan' => 'required',
            'harga_min' => 'required|integer',
            'harga_min_hc' => 'required|integer',
            'harga_max_hc' => 'required|integer',
            'harga_dg' => 'required|integer',
            'harga_shipdec_dg' => 'required|integer',
            'harga_avi' => 'required|integer',
            'jenis_pengiriman' => 'required'
        ]);

        $harga->update($validateData);
        $request->session()->flash('pesan','Data Harga Berhasil Diupdate');
        return redirect()->route('jayapura.harga.index');
    }

    public function jayapuraDestroy(Harga $harga){
        $harga->delete();
        return redirect()->route('jayapura.harga.index')->with('hapus','Data Harga Berhasil Dihapus');
    }

    public function jayapuraImportHarga(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = $file->hashName();

        //temporary file
        $path = $file->storeAs('public/excel/harga/',$nama_file);

        // import data
        $import = Excel::import(new HargaImport(), storage_path('app/public/excel/harga/'.$nama_file));

        //remove from server
        Storage::delete($path);

        if($import) {
            //redirect
            return redirect()->route('jayapura.harga.index')->with(['pesan' => 'Data Berhasil Diimport!']);
        } else {
            //redirect
            return redirect()->route('jayapura.harga.index')->with(['pesan' => 'Data Gagal Diimport!']);
        }
    }
}
