<?php

namespace App\Http\Controllers;

use App\InputProduk;
use App\Produk;
use App\Http\Requests\InputProdukRequest;
use Illuminate\Http\Request;

class InputProdukController extends Controller
{
    
    public function index()
    {
        $input_produks = InputProduk::all();        
        return view('admin.input_produk.index', compact('input_produks'));
    }

    public function create()
    {
        $produks = Produk::all();        
        return view('admin.input_produk.tambah', compact('produks'));
    }


    public function store(InputProdukRequest $request)
    {
        // tambah bahan baku dan stok otomatis
        $this->add_bahanbaku_and_stock($request);

        // catat pada tabel input produk
        InputProduk::create([
            'product_id' => $request->product_id,            
            'jumlah_inp' => $request->jumlah_inp,            
            'tanggal_inp' => $request->tanggal_inp,            
        ]);

        return redirect()->route('admin.input_produk.index');
    }

    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $produks = Produk::all();        
        $input_produk = InputProduk::findOrFail($id);   
        return view('admin.input_produk.edit', compact('produks', 'input_produk'));
    }

    public function update(InputProdukRequest $request, $id)
    {
        $input_produk = InputProduk::find($id);      
        $this->undo_bahanbaku_and_stock($input_produk);          
        $this->add_bahanbaku_and_stock($request);    
        
        $input_produk->update([
            'product_id' => $request->product_id,            
            'jumlah_inp' => $request->jumlah_inp,            
            'tanggal_inp' => $request->tanggal_inp,            
        ]);

        return redirect()->route('admin.input_produk.index');

    }


    public function destroy($id)
    {   
        // cari input produk
        $input_produk = InputProduk::find($id);                
        // undo bahan baku dan stok otomatis
        $this->undo_bahanbaku_and_stock($input_produk);
        // hapus input produk
        $input_produk->delete();
        return redirect()->route('admin.input_produk.index');
    }


    // ============================================== Helper ==========================================================================
    
    private function add_bahanbaku_and_stock($request){

        // untuk mengurangi bahan baku tiap 1 produksi
        // untuk setiap jumlah produk
        for ($i=0; $i < $request->jumlah_inp ; $i++) { 
            // produknya apa
            $produk = Produk::find($request->product_id);   
            //bahan bakunya apa aja
            $bahans = $produk->BahanBaku()->get();
            // untuk setiap bahan baku, kurangi stock dengan kebutuhan jumlah bahan
            foreach ($bahans as $bahan){                
                $hasil = $bahan->stok_bahan - $bahan->pivot->jumlah_bahan;
                // update
                $bahan->update([                    
                    'stok_bahan' => $hasil
                ]);
            }            
        }

        // update stok
        $produk->update([                    
            'stok_produk' => $produk->stok_produk + $request->jumlah_inp
        ]);
    }


    private function undo_bahanbaku_and_stock($input_produk){

        // balikin bahan baku
        for ($i=0; $i < $input_produk->jumlah_inp ; $i++) {             
            $produk = Produk::find($input_produk->product_id);               
            $bahans = $produk->BahanBaku()->get();                        
            foreach ($bahans as $bahan){                
                $hasil = $bahan->stok_bahan + $bahan->pivot->jumlah_bahan;                
                $bahan->update([                    
                    'stok_bahan' => $hasil
                ]);
            }            
        }    
        
        // balikin stok produk
        $produk->update([                    
            'stok_produk' => $produk->stok_produk - $input_produk->jumlah_inp
        ]);
    }
}
