<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Dashboard</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body class="bg-white">
    <div class="content px-3">
        <div class="mb-3">
            <h3 class="text-info">Laporan Semua Data Dashboard</h3>
        </div>
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th>- Jumlah data Barang : {{$items}} Barang</th>
                </tr>
                <tr>
                    <th>- Jumlah data Transaksi: {{$transaksi}} Transaksi</th>
                </tr>
                <tr>
                    <th>- Jumlah data Terlambat: {{$late}} Data</th>
                </tr>
                <tr>
                    <th>- Jumlah Penghasilan: IDR  {{number_format($omset)}}</th>
                </tr>
            </thead>
        </table>
    </div>
</body>
</html>