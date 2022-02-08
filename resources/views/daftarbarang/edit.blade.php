@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card border">
                    <div class="card-body">
                        <form action="{{route('daftarbarang.update', $items->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Nama Barang</label>
                                        <input type="text" name="nama_barang" class="form-control" value="{{$items->nama_barang}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Image</label>
                                        <input type="file" id="" name="image" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Jumlah Barang</label>
                                        <input type="number" name="jumlah_barang" class="form-control" value="{{$items->jumlah_barang}}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Harga Satuan</label>
                                        <input type="text" name="idr" class="form-control" value="{{$items->idr}}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                   <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                                   <a href="{{route('daftarbarang.index')}}" class="btn btn-secondary ">Kembali</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection