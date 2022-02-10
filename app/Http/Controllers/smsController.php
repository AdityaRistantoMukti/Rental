<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;
use App\Transaction;

class smsController extends Controller
{
    public function store(Request $request, $id)
    {
        $transaksi = Transaction::findOrFail($id);
        
        Nexmo::message()->send([
            'to' =>   $transaksi->phone,
            'from' => 'Rental Sepeda (ARM)',
            'text'  => 'Halo kami dari Rental-Sepeda ingin memberikan kode'.$transaksi->item->kode_barang
            
           . 'Nama Peminjam:'.$transaksi->nama_peminjam
           . 'Tanggal Pinjam:'. $transaksi->tanggal_pinjam
           . 'Tanggal Kembali:'.$transaksi->tanggal_kembali
           . 'Jumlah Barang:'.$transaksi->jumlah
           . 'Harga:'. $transaksi->idr
           . 'Terima Kasih'
            ]);

        return redirect()->back();
    }
}
