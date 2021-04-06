@extends('jayapura.master-admin')
@section('title','Dashboard')
@section('dashboard','active')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <p class="text-white mt-5 mb-5">Welcome back, <b>{{Auth::user()->name}}</b></p>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <div class="row pt-4 pb-4 mr-4" style="background: #e74c3c; color:white">
                <div class="col-4 text-center">
                    <i class="far fa-file-alt" style="font-size: 70px;"></i>
                </div>
                <div class="col-8">
                    <h3>Data Pengiriman</h3>
                    <p>{{$invoice}} Data</p>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="row pt-4 pb-4 mr-4" style="background-color: #e67e22; color:white">
                <div class="col-4 text-center">
                    <i class="fas fa-plane" style="font-size: 70px;"></i>
                </div>
                <div class="col-8">
                    <h3>Data <br>Tracking</h3>
                    <p>{{$report}} Data</p>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="row pt-4 pb-4" style="background-color: #27ae60; color:white">
                <div class="col-4 text-center">
                    <i class="far fa-money-bill-alt" style="font-size: 70px;"></i>
                </div>
                <div class="col-8">
                    <h3>Data Harga Pengiriman</h3>
                    <p>{{$harga}} Data</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row tm-content-row">

    </div>
</div>
@endsection
