@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card border">
                    <div class="card-body">
                        <form action="{{route('transaksi.store', $transactions->id)}}" method="post">
                            @csrf
                            <div class="row">
                               
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Kode Barang</label>
                                        <input class="form-control" type="text" value="{{$transactions->kode_barang}}" disabled>
                                        <input type="hidden" name="kodebarang_id" class="form-control" value="{{$transactions->id}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Nama Barang</label>
                                        <input class="form-control" type="text" value="{{$transactions->nama_barang}}" disabled>
                                        <input type="hidden" name="namabarang_id" class="form-control" value="{{$transactions->id}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Nama Peminjam</label>
                                        <input type="text" name="nama_peminjam" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Jumlah Yang Dipinjam</label>
                                        <input type="number" name="jumlah" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Tangga Pinjam</label>
                                        <input type="date" name="tanggal_pinjam" id="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Tanggal Kembali</label>
                                        <input type="date" name="tanggal_kembali" id="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Harga </label>
                                        <input type="text" name="idr" class="form-control" value="{{$transactions->idr}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">E-mail </label>
                                        <input type="email" name="email" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Telp </label>
                                        <input type="text" class="form-control" value="6281934081715" disabled>
                                        <input type="hidden" name="phone" class="form-control" value="6281934081715">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                   <button type="submit" class="btn btn-success">Simpan Transaksi</button>
                                   <a href="{{route('transaksi.index')}}" class="btn btn-secondary ">Kembali</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection