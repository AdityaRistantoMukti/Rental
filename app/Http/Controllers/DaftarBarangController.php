<?php

namespace App\Http\Controllers;

use Intervention\Image\Facades\Image;
use App\Item;
use App\Transaction;
use Illuminate\Http\Request;

class DaftarBarangController extends Controller
{
    public function index()
    {
        $items = Item::all();

        return view('daftarbarang.index', compact('items'));
    }

    public function create()
    {
        return view('daftarbarang.create');
    }

    public function edit($id)
    {
        $items = Item::findOrFail($id); 

        return view('daftarbarang.edit', compact('items'));
    }

    public function store()
    {
        $items = Item::create($this->validateRequest());

        $this->storeImage($items);

        return redirect()->back();
    }

    private function validateRequest()
    {
        return tap(request()->validate([
            'nama_barang' => 'required',
            'jumlah_barang' => 'required',
            'idr' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg|max:5000',
        ]), function(){
            if(request()->hasFile('image')) {
                request()->validate([
                    'image' => 'required|mimes:jpeg,png,jpg|max:5000',
                ]);
            }
        });
    }

    private function storeImage($item){
        if (request()->has('image')) {
            $item->update([
                'image' => request()->image->store('uploads', 'public'),
            ]);

            $image = Image::make(public_path('storage/' . $item->image))->fit(300, 300, null, 'top-left');
            $image->save(); 
        }
    }

    public function update(Request $request, Item $items)
    {

        $items->update($request->all());

        $this->storeImage($items);

        return redirect()->back();
        
    }

    public function destroy(Request $request, $id)
    {
        $items = Item::findOrFail($id);
        

        if (\File::exists(public_path('storage/' . $items->image))) {
            \File::delete(public_path('storage/' . $items->image));
        }
        if ($items->delete()) {
            $get = Transaction::where('kodebarang_id','=', $id)->firstOrFail();

            $get->delete();
        }
        return redirect()->back();
    }
}
