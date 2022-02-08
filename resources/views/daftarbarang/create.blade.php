@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card border">
                    <div class="card-body">
                        <form action="{{route('daftarbarang.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Nama Barang</label>
                                        <input type="text" name="nama_barang" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Image</label>
                                        <input type="file"  name="image" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Jumlah Barang</label>
                                        <input type="number" name="jumlah_barang" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Harga Satuan</label>
                                        <input type="text" name="idr" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                   <button type="submit" class="btn btn-success ">Simpan Barang</button>
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