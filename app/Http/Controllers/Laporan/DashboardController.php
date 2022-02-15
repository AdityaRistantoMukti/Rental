<?php

namespace App\Http\Controllers\Laporan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Item;
use App\Transaction;
use App\Pengembalian;
use PDF;

class DashboardController extends Controller
{
    public function rekap(){
        $data = [
            'items' => Item::count(),
            'transaksi' => Transaction::count(),
            'omset' => Transaction::sum('idr'),
            'late'  => Transaction::where('durasi','Terlambat')->count(),
        ];

        $pdf = PDF::loadView('cetak.dashboard', $data)->setPaper('a5','landscape');
    
        return $pdf->stream('laporan.data.dashboard.pdf');
    }
   
}
