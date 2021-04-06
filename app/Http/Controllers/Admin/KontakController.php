<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index(){
        $dataKontak = Kontak::latest()->get();
        return view('admin.pages.kontak.index', compact('dataKontak'));
    }

    public function destroy(Kontak $kontak){
        $kontak->delete();

        return redirect()->route('kontak.index')->with('hapus','Kotak User Berhasil Dihapus');
    }

    public function jayapuraIndex(){
        $dataKontak = Kontak::latest()->get();
        return view('jayapura.pages.kontak.index', compact('dataKontak'));
    }

    public function jayapuraDestroy(Kontak $kontak){
        $kontak->delete();

        return redirect()->route('jayapura.kontak.index')->with('hapus','Kotak User Berhasil Dihapus');
    }
}
