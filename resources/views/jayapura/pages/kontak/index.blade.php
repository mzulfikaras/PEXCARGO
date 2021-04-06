@extends('jayapura.master-admin')
@section('title', 'Kontak')
@section('kontak', 'active')

@section('content')
@php
    $no = 1;
@endphp
<div class="col-12 tm-block-col">
<div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
        <h2 class="tm-block-title">Kontak User</h2>
        @if (session('pesan'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                  {{session('pesan')}}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                  </button>
            </div>
        @endif
        @if (session('hapus'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  {{session('hapus')}}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                  </button>
            </div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">NO.</th>
                    <th scope="col">NAMA</th>
                    <th scope="col">EMAIL</th>
                    <th scope="col">NOMOR TELEPON</th>
                    <th scope="col">ALAMAT</th>
                    <th scope="col">PESAN</th>
                    <th scope="col">ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataKontak as $kontak)
                    <tr>
                        <th scope="row"><b>{{ $no++ }}</b></th>
                        <td><b>{{ $kontak->nama }}</b></td>
                        <td><b>{{ $kontak->email }}</b></td>
                        <td><b>{{ $kontak->no_telp }}</b></td>
                        <td><b>{{ $kontak->alamat }}</b></td>
                        <td><b>{{ $kontak->pesan }}</b></td>
                        <td>
                            <form action="{{route('jayapura.kontak.hapus', $kontak->id)}}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger"><i class='far fa-trash-alt'></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
