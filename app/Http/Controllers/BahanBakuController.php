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

    public function index_bahan_dasar(){
        $keterangan = "Dasar";
        $bahan = BahanBaku::where('kategori', 0)->get();
        return view('admin.bahan.bahanbaku', compact('bahan', 'keterangan'));
    }

    public function index_bahan_lain(){
        $keterangan = "Lain";
        $bahan = BahanBaku::where('kategori', 1)->get();
        return view('admin.bahan.bahanbaku', compact('bahan', 'keterangan'));
    }

}
