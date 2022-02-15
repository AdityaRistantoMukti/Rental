@extends('layouts.app')

@section('content')
    <div class="container mb-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card border">
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No.Pengembalian</th>
                                    <th>No.Faktur</th>
                                    <th>Kode Barang</th>
                                    <th>Nama Penyewa</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Tanggal Kembali</th>
                                    <th>Lama Penyewaan</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($returns as $rt)
                                <tr>
                                    <td>{{$rt->no_pengembalian}}</td>
                                    <td>{{$rt->transaksi->no_faktur}}</td>
                                    <td>{{$rt->item->kode_barang}}</td>
                                    <td>{{$rt->transaksi->nama_peminjam}}</td>
                                    <td>{{$rt->transaksi->tanggal_pinjam}}</td>
                                    <td>{{$rt->transaksi->tanggal_kembali}}</td>
                                    <td>
                                        <?php
                                        $datetime2 = strtotime($rt->transaksi->tanggal_kembali) ;
                                        $datenow = strtotime($rt->transaksi->tanggal_pinjam);
                                        $durasi = ($datenow - $datetime2) / 86400 ;
                                        $durasi2 = ($durasi);
                                    ?>
                                        <?php $durasi1 = abs($durasi) ?> {{ $durasi1 }} Hari   
                                    </td>
                                </tr>
                                @empty 
                                <tr>
                                    <td >
                                    <td colspan="8  " class="text-center text-danger">Maaf data pengembalian tidak tersedia</td></td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection