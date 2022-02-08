@extends('layouts.app')

@section('content')
    <div class="container mb-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Daftar Barang</li> 
               </ol>
             </nav>
        <div class="row">
            <div class="col-md-12">
                <div class="card border">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <a href="{{route('daftarbarang.create')}}" class="btn btn-outline-primary">Tambah Barang</a>
                               </div>
                        </div>
                       
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Stock Barang</th>
                                    <th>Harga Satuan</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                <tr>
                                    <td>{{$item->kode_barang}}</td>
                                    <td>
                                        <a href="{{route('transaksi.create', $item->id)}}" class="btn btn-outline-primary btn-sm">{{$item->nama_barang}}</a>
                                    </td>
                                    <td>{{$item->jumlah_barang}}</td>
                                    <td>{{$item->idr}}</td>
                                    <td>
                                        <form action="{{route('daftarbarang.destroy', $item->id)}}" method="post">
                                        <a href="{{route('daftarbarang.edit', $item->id)}}" class="btn btn-outline-primary btn-sm">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                           <button type="submit" class="btn btn-outline-danger btn-sm">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                              
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection