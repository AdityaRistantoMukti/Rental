<?php

namespace App\Http\Controllers\Laporan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Item;
use App\Transaction;
use App\Pengembalian;
use PDF;

class TransaksiController extends Controller
{
    public function rekap(){
        $transaksi = Transaction::with('item')->get();

        $pdf = PDF::loadView('cetak.transaksi', compact('transaksi'))->setPaper('a4','landscape');
        return $pdf->stream('laporan.semua.data.transaksi');
    }
}
