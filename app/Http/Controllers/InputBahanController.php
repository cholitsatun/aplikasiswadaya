<?php

namespace App\Http\Controllers;

use App\BahanBaku;
use App\InputBahan;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;

class InputBahanController extends Controller
{
    public function index(){
        $inputbahan = InputBahan::all();
        return view('admin.inputbahan.inputbahan', compact('inputbahan'));
    }

    public function create(){
        $bahanbaku = BahanBaku::all();
        return view('admin.inputbahan.tambahinput', compact('bahanbaku'));
    }

    public function store(Request $request){
        $bahanbaku = BahanBaku::find($request->bahanbaku_id);
        $bahanbaku->update([
            'stok_bahan' => $bahanbaku->stok_bahan + $request->jumlah_inb
        ]);

        InputBahan::create([
            'bahanbaku_id' => request('bahanbaku_id'),
            'supplier' => request('supplier'),
            'jumlah_inb' => request('jumlah'),
            'tanggal_inb' => request('tanggal'),
        ]);
        return redirect()->route('admin.inputbahan.index');

    }

    public function edit($id)
    {
        $bahanbaku = BahanBaku::all();        
        $inputbahan = InputBahan::findOrFail($id);   
        return view('admin.inputbahan.edit', compact('bahanbaku', 'inputbahan'));
    }

    public function update(Request $request, $id)
    {
        $bahanbaku = BahanBaku::find($request->bahanbaku_id);

        $inputbahan = InputBahan::find($id);  
        $this->undo_stock($input_produk);              
        $this->add_stock($request);    
        
        $bahanbaku->update([
            'stok_bahan' => $bahanbaku->stok_bahan - $inputbahan->jumlah_inb + $request->jumlah_inb           
        ]);

        $inputbahan::update([
            'bahanbaku_id' => $request->bahanbaku_id,            
            'jumlah_inb' => $request->jumlah_inb,            
            'tanggal_inb' => $request->tanggal_inb, 
        ]);

        return redirect()->route('admin.inputbahan.inputbahan');

    }

    public function destroy($id)
    {   
        // cari input produk
        $inputbahan = InputBahan::find($id);                
        // undo bahan baku dan stok otomatis
        // $this->undo_stock($inputbahan);
        // hapus input produk
        $inputbahan->delete();
        return redirect()->route('admin.inputbahan.index');
    }

    public function cetak_pdf()
    {
    	$input_produk = InputBahan::all();
 
    	$pdf = PDF::loadview('inputbahan_pdf',['inputbahan'=>$inputbahan]);
    	return $pdf->download('laporan-pegawai-pdf');
    }


    // private function add_stock($request){
    //     for ($i=0; $i < $request->jumlah_inb ; $i++) { 
            
    //         $bahanbaku = BahanBaku::find($request->bahan_id);   
            
    //     }
    //     $bahanbaku->update([                    
    //         'stok_bahan' => $bahanbaku->stok_bahan + $request->jumlah_inb
    //     ]);
    // }

    // private function undo_stock($inputbahan){

    //     // balikin bahan baku
    //     for ($i=0; $i < $inputbahan->jumlah_inb ; $i++) {             
    //         $produk = Produk::find($input_produk->product_id);               
    //         $bahans = $produk->BahanBaku()->get();                        
    //         foreach ($bahans as $bahan){                
    //             $hasil = $bahan->stok_bahan + $bahan->pivot->jumlah_bahan;                
    //             $bahan->update([                    
    //                 'stok_bahan' => $hasil
    //             ]);
    //         }            
    //     }    
        
    //     // balikin stok produk
    //     $produk->update([                    
    //         'stok_produk' => $produk->stok_produk - $input_produk->jumlah_inp
    //     ]);
    // }
}
