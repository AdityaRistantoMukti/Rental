<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\Item;
use App\Pengembalian;
use Nexmo\Laravel\Facade\Nexmo;

class PengembalianController extends Controller
{
    public function index()
    {
        $returns = Pengembalian::with('item','transaksi')->get();
        
        return view('pengembalian.index', compact('returns'));
    }

    public function create($id)
    {
       $transaksi = Transaction::findOrFail($id);
      
        return view('pengembalian.create', compact('transaksi'));
    }

    public function store(Request $request, $id)
    {
        $return = Pengembalian::create([
            'kodebarang_id' => $request->kodebarang_id,
            'namapeminjam_id' => $request->namapeminjam_id,
            'tglpinjam_id' => $request->tglpinjam_id,
            'tglkembali_id' => $request->tglkembali_id,
            'nofaktur_id' => $request->nofaktur_id,
        ]);
        
        if ($return->save()) {
            $transaksi = Transaction::findOrFail($id);

            Nexmo::message()->send([
                'to' =>   $transaksi->phone,
                'from' => 'ARM',
                'text'  => 'Halo kami dari Rental-Sepeda ingin Memberitahu bahwa anda sudah  Mengembalikan Barang nya'

               . 'Nama Peminjam:'.$transaksi->nama_peminjam
               . 'Tanggal Pinjam:'. $transaksi->tanggal_pinjam
               . 'Tanggal Kembali:'.$transaksi->tanggal_kembali
               . 'Jumlah Barang:'.$transaksi->jumlah
               . 'Harga:'. $transaksi->idr
               . 'Terima Kasih'
                ]);
                
                $get = Item::findOrFail($return->kodebarang_id);

                $hitung = $get->jumlah_barang + $transaksi->jumlah;

                $get->update([
                    'jumlah_barang' =>$hitung
                ]);
        }
        return redirect()->back();
    }
}
