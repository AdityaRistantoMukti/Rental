<?php

namespace App\Http\Controllers\Laporan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Item;
use App\Transaction;
use App\Pengembalian;
use PDF;

class PengembalianController extends Controller
{
    public function rekap(){

        $return = Pengembalian::with('item','transaksi')->get();

        $pdf = PDF::loadView('cetak.pengembalian', compact('return'))->setPaper('a4','landscape');
    
        return $pdf->stream('laporan.semua.data.pengembalian.pdf');
    }
}
