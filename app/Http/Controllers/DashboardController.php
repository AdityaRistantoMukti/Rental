<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\Item;
use App\Pengembalian;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'items' => Item::count(),
            'transaksi' => Transaction::count(),
            'telat' => Transaction::where(''),
        ];
        return view('dashboard.index', $data);
    }
}
