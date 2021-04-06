<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/admin/jakarta/login', 'Auth\LoginController@showLoginForm')->name('jakarta.login');
Route::post('/admin/jakarta/login', 'Auth\LoginController@login')->name('jakarta.store.login');
Route::post('/admin/jakarta/logout', 'Auth\LoginController@logout')->name('jakarta.logout');

Route::get('/admin/jayapura/login', 'Auth\JayapuraLoginController@getLogin')->name('jayapura.login');
Route::post('/admin/jayapura/login', 'Auth\JayapuraLoginController@postLogin')->name('jayapura.store.login');
Route::post('/admin/jayapura/logout', 'Auth\JayapuraLoginController@postLogout')->name('jayapura.logout');

Route::get('/','User\FrontController@index')->name('front.index');
Route::get('/cek-harga', 'User\FrontController@cekHarga')->name('front.cekHarga');
Route::get('/tracking-barang','User\FrontController@trackingBarang')->name('front.trackingBarang');
Route::post('/kirim-kontak', 'User\FrontController@kontakUser')->name('front.kontak');
Route::get('/invoice/{report}', 'User\FrontController@userInvoice')->name('front.invoice');

Route::prefix('admin/jakarta')->middleware('auth')->group( function(){
    Route::get('/dashboard','Admin\DashboardController@index')->name('jakarta.dashboard');
    Route::get('/pengiriman','Admin\InvoiceController@index')->name('invoice.index');
    Route::get('/create-pengiriman','Admin\InvoiceController@create')->name('invoice.create');
    Route::post('/create-pengiriman', 'Admin\InvoiceController@store')->name('invoice.store');
    Route::get('/update-pengiriman/{invoice}/update', 'Admin\InvoiceController@edit')->name('invoice.edit');
    Route::put('/update-pengiriman/{invoice}', 'Admin\InvoiceController@update')->name('invoice.update');
    Route::delete('/delete-pengeiriman/{invoice}', 'Admin\InvoiceController@destroy')->name('invoice.destroy');
    Route::get('/pengiriman/pdf/{daterange}', 'Admin\InvoiceController@reportPdf')->name('pengiriman.pdf');
    Route::get('cari-customer', 'Admin\ReportController@cari')->name('reports.cari');
    Route::get('/reports','Admin\ReportController@index')->name('reports.index');
    Route::post('/create-report','Admin\ReportController@store')->name('report.store');
    Route::delete('/hapus-report/{report}','Admin\ReportController@destroy')->name('report.hapus');
    Route::get('/reports/pdf/{daterange}', 'Admin\ReportController@reportPdf')->name('report.pdf');
    Route::get('/update-kedatangan/{report}/edit','Admin\ReportController@editKedatangan')->name('report.kedatangan');
    Route::put('/update-kedatangan/{report}','Admin\ReportController@updateKedatangan')->name('update.report.kedatangan');
    Route::get('/harga','Admin\HargaController@index')->name('harga.index');
    Route::post('/create-harga','Admin\HargaController@store')->name('harga.store');
    Route::get('/edit-harga/{harga}/edit','Admin\HargaController@edit')->name('harga.edit');
    Route::put('/edit-harga/{harga}','Admin\HargaController@update')->name('harga.update');
    Route::delete('/hapus-harga/{harga}','Admin\HargaController@destroy')->name('harga.hapus');
    Route::post('/harga/import', 'Admin\HargaController@importHarga')->name('harga.import');
    Route::get('/kontak-user','Admin\KontakController@index')->name('kontak.index');
    Route::delete('/hapus-kontak/{kontak}','Admin\KontakController@destroy')->name('kontak.hapus');
});

Route::prefix('admin/jayapura')->middleware('auth:jayapura')->group( function(){
    Route::get('/dashboard','Admin\DashboardController@jayapuraIndex')->name('jayapura.dashboard');
    Route::get('/pengiriman','Admin\InvoiceController@jayapuraIndex')->name('jayapura.invoice.index');
    Route::get('/create-pengiriman','Admin\InvoiceController@jayapuraCreate')->name('jayapura.invoice.create');
    Route::post('/create-pengiriman', 'Admin\InvoiceController@jayapuraStore')->name('jayapura.invoice.store');
    Route::get('/update-pengiriman/{invoice}/update', 'Admin\InvoiceController@jayapuraEdit')->name('jayapura.invoice.edit');
    Route::put('/update-pengiriman/{invoice}', 'Admin\InvoiceController@jayapuraUpdate')->name('jayapura.invoice.update');
    Route::delete('/delete-pengeiriman/{invoice}', 'Admin\InvoiceController@jayapuraDestroy')->name('jayapura.invoice.destroy');
    Route::get('/pengiriman/pdf/{daterange}', 'Admin\InvoiceController@jayapuraReportPdf')->name('jayapura.pengiriman.pdf');
    Route::get('/harga','Admin\HargaController@jayapuraIndex')->name('jayapura.harga.index');
    Route::post('/create-harga','Admin\HargaController@jayapuraStore')->name('jayapura.harga.store');
    Route::get('/edit-harga/{harga}/edit','Admin\HargaController@jayapuraEdit')->name('jayapura.harga.edit');
    Route::put('/edit-harga/{harga}','Admin\HargaController@jayapuraUpdate')->name('jayapura.harga.update');
    Route::delete('/hapus-harga/{harga}','Admin\HargaController@jayapuraDestroy')->name('jayapura.harga.hapus');
    Route::post('/harga/import', 'Admin\HargaController@jayapuraImportHarga')->name('jayapura.harga.import');
    Route::get('cari-customer', 'Admin\ReportController@jayapuraCari')->name('jayapura.reports.cari');
    Route::get('/reports','Admin\ReportController@jayapuraIndex')->name('jayapura.reports.index');
    Route::post('/create-report','Admin\ReportController@jayapuraStore')->name('jayapura.report.store');
    Route::get('/reports/pdf/{daterange}', 'Admin\ReportController@jayapuraReportPdf')->name('jayapura.report.pdf');
    Route::delete('/hapus-report/{report}','Admin\ReportController@jayapuraDestroy')->name('jayapura.report.hapus');
    Route::get('/update-kedatangan/{report}/edit','Admin\ReportController@jayapuraEditKedatangan')->name('jayapura.report.kedatangan');
    Route::put('/update-kedatangan/{report}','Admin\ReportController@jayapuraUpdateKedatangan')->name('jayapura.update.report.kedatangan');
    Route::get('/kontak-user','Admin\KontakController@jayapuraIndex')->name('jayapura.kontak.index');
    Route::delete('/hapus-kontak/{kontak}','Admin\KontakController@jayapuraDestroy')->name('jayapura.kontak.hapus');
});
