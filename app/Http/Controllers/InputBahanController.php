<?php

namespace App\Http\Controllers;

use App\BahanBaku;
use App\InputBahan;
use Barryvdh\DomPDF\Facade as PDF;
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
            'stok_bahan' => $bahanbaku->stok_bahan + $request->jumlah
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
        $bahanbaku->update([
            'stok_bahan' => $bahanbaku->stok_bahan - $inputbahan->jumlah_inb + $request->jumlah_inb           
        ]);

        $inputbahan->update([
            'bahanbaku_id' => $request->bahanbaku_id,
            'supplier' => $request->supplier,            
            'jumlah_inb' => $request->jumlah_inb,            
            'tanggal_inb' => $request->tanggal_inb, 
        ]);

        return redirect()->route('admin.inputbahan.index');

    }

    public function destroy($id)
    {   
        // cari input bahan
        
        $inputbahan = InputBahan::find($id);                
        // undo bahan baku dan stok otomatis
        $bahanbaku = BahanBaku::find($inputbahan->bahanbaku_id);
        $bahanbaku->update([                    
            'stok_bahan' => $bahanbaku->stok_bahan - $inputbahan->jumlah_inb
        ]);
        // hapus input produk
        $inputbahan->delete();
        return redirect()->route('admin.inputbahan.index');
    }

    public function pdf(){
        $inputbahan = InputBahan::all();
        return view('admin.laporan.laporan', compact('inputbahan'));
    }

    public function cetak_pdf()
    {
        $inputbahan = InputBahan::all();
        // $bahanbaku = 
 
    	$pdf = PDF::loadview('admin.laporan.laporan_pdf',['inputbahan'=>$inputbahan]);
    	return $pdf->stream('laporan-bahanbaku-pdf');
    }


    
}
