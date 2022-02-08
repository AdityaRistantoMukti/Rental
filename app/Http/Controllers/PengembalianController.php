<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\Item;
use App\Pengembalian;
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

        return redirect()->back();
    }
}
