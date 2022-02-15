<?php

namespace App\Http\Controllers\Laporan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Item;
use App\Transaction;
use App\Pengembalian;
use PDF;

class DaftarBarangController extends Controller
{
    public function rekap(){
        $items = Item::all();

        $pdf = PDF::loadview('cetak.daftarbarang', compact('items'))->setPaper('a4','landscape');
    
        return $pdf->stream('laporan.semua.data.daftarbarang.pdf');
    }
}
