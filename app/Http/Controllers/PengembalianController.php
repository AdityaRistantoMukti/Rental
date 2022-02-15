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
        
            // Nexmo::message()->send([
            //     'to' =>   $transaksi->phone,
            //     'from' => 'ARM',
            //     'text'  => 'Halo kami dari Rental-Sepeda ingin berterima kasih kepada customer
            //      karena sudah mengembalikan Barang Yg telah dipinjam'
                
            //     . 'Nama Peminjam:'.$transaksi->nama_peminjam
            //     . 'Tanggal Pinjam:'. $transaksi->tanggal_pinjam
            //     . 'Tanggal Kembali:'.$transaksi->tanggal_kembali
            //     . 'Jumlah Barang:'.$transaksi->jumlah
            //     . 'Harga:'. $transaksi->idr
            //     . 'Terima Kasih atas tanggung jawab nya'
            //     . 'Semoga selalu bahagia -arm'
            //     ]);
        }
        if ($return->save()) {
         $get = Item::findOrFail($return->kodebarang_id);

         $hitung = $get->jumlah_barang + $transaksi->jumlah;
         $jumlah = $transaksi->jumlah - $transaksi->jumlah;
             $get->update([
            'jumlah_barang' =>$hitung
            ]);
            $transaksi->update([
                'jumlah' => $jumlah,
                'durasi' => NULL
            ]);

        }
        return redirect()->back();
    }
}
