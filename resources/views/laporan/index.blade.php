@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td>1.</td>
                            <td>Rekap semua data Daftar Barang</td>
                            <td><a href="{{route('laporan.item')}}" class="btn btn-outline-secondary btn-sm">Cetak</a></td>
                        </tr>
                        <tr>
                            <td>2.</td>
                            <td>Rekap semua data Transaksi</td>
                            <td><a href="{{route('laporan.transaksi')}}" class="btn btn-outline-secondary btn-sm">Cetak</a></td>
                        </tr>
                        <tr>
                            <td>3.</td>
                            <td>Rekap semua data Pengembalian</td>
                            <td><a href="{{route('laporan.return')}}" class="btn btn-outline-secondary btn-sm">Cetak</a></td>
                        </tr>
                        <tr>
                            <td>4.</td>
                            <td>Rekap semua data Dashboard</td>
                            <td><a href="{{route('laporan.dashboard')}}" class="btn btn-outline-secondary btn-sm">Cetak</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection