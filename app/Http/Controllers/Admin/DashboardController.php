<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Harga;
use App\Models\Invoice;
use App\Models\Report;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $invoice = Invoice::count();
        $report = Report::count();
        $harga = Harga::count();
        return view('admin.pages.dashboard.index', compact('invoice','report', 'harga'));
    }

    public function jayapuraIndex(){
        $invoice = Invoice::count();
        $report = Report::count();
        $harga = Harga::count();
        return view('jayapura.pages.dashboard.index', compact('invoice','report', 'harga'));
    }
}
