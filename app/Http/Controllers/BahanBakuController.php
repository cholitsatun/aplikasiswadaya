<?php

namespace App\Http\Controllers;

use App\BahanBaku;
use Illuminate\Http\Request;

class BahanBakuController extends Controller
{
    public function index() {
        $bahan = BahanBaku::all();
        return view('admin.bahan.bahanbaku', compact('bahan'));
    }

    public function create() {
        return view ('admin.bahan.tambahbahan');
    }


    public function store(Request $request){
        $tambahbahan = BahanBaku::create([
            'nama_bahan' => request('bahan'),
            'stok_bahan' => request('stok'),
            'kategori' => request('kategori'),

        ]);
        return redirect('/bahanbaku');
    }

    public function edit($id) {
        $bahan = BahanBaku::find($id);

        return view('admin.bahan.edit', compact('bahan'));
    }

    public function update(Request $request, $id){
        BahanBaku::find($id)->update([
            'nama_bahan' => request('bahan'),
            'kategori' => request('kategori'),
        ]);
        return redirect('/bahanbaku');
    }

    public function destroy($id){
        $bahan = BahanBaku::find($id);
        $bahan->delete();
        return redirect('/bahanbaku');
    }
}
