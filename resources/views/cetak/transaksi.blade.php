<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Transaksi</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body class="bg-white">
    <div class="content px-3">
        <div class="mb-3">
            <h3 class="text-info">Laporan Semua Data Transaksi</h3>
        </div>
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th>Kode Transaksi</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Penyewa</th>
                    <th>Tgl Pinjam</th>
                    <th>Tgl Kembali</th>
                    <th>Email</th>
                    <th>No Telp</th>
                    <th>Jumlah Pinjaman</th>
                    <th>Harga</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($transaksi as $tr)
                    <tr>
                        <td>{{$tr->no_faktur}}</td>
                        <td>{{$tr->item->kode_barang}}</td>
                        <td>{{$tr->item->nama_barang}}</td>
                        <td>{{$tr->nama_peminjam}}</td>
                        <td>{{$tr->tanggal_pinjam}}</td>
                        <td>{{$tr->tanggal_kembali}}</td>
                        <td>{{$tr->email}}</td>
                        <td>{{$tr->phone}}</td>
                        @if ($tr->jumlah == 0)
                        <td>{{$tr->jumlah}}</td>
                        <td>0</td>
                        @else
                        <td>{{$tr->jumlah}}</td>
                        <td>{{$tr->idr}}</td>
                        @endif
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">
                            Maaf Tanggal yang anda masukan tidak tersedia 
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>