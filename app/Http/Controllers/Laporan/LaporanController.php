<?php

namespace App\Http\Controllers\Laporan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Item;
use App\Transaction;
use App\Pengembalian;
use PDF;

class LaporanController extends Controller
{
    public function cetak()
    {
        $data = Pengembalian::with('item','transaksi')->get();

        return view('laporan.index', compact('data'));
    }
}
