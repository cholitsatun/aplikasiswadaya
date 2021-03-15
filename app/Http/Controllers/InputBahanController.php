<?php

namespace App\Http\Controllers;

use App\BahanBaku;
use Carbon\Carbon;
use App\InputBahan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

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
        $this->validate($request, [
            'bahanbaku_id' => 'required',
            'supplier' => 'required',
            'jumlah_inb' => 'required|numeric',
            'tanggal_inb' => 'required'
        ]);

        $bahanbaku = BahanBaku::find($request->bahanbaku_id);
        $bahanbaku->update([
            'stok_bahan' => $bahanbaku->stok_bahan + $request->jumlah_inb
        ]);

        InputBahan::create([
            'bahanbaku_id' => request('bahanbaku_id'),
            'supplier' => request('supplier'),
            'jumlah_inb' => request('jumlah_inb'),
            'tanggal_inb' => request('tanggal_inb'),
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
        $this->validate($request, [
            'bahanbaku_id' => 'required',
            'supplier' => 'required',
            'jumlah_inb' => 'required|numeric',
            'tanggal_inb' => 'required'
        ]);
        
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

//     public function pdf(){
//         $inputbahan = InputBahan::all();
//         return view('admin.laporan.laporan', compact('inputbahan'));
//     }

//     public function cetak_pdf()
//     {
//         //INISIASI 30 HARI RANGE SAAT INI JIKA HALAMAN PERTAMA KALI DI-LOAD
//         //KITA GUNAKAN STARTOFMONTH UNTUK MENGAMBIL TANGGAL 1
//         $start = Carbon::now()->startOfMonth()->format('Y-m-d H:i:s');
//         //DAN ENDOFMONTH UNTUK MENGAMBIL TANGGAL TERAKHIR DIBULAN YANG BERLAKU SAAT INI
//         $end = Carbon::now()->endOfMonth()->format('Y-m-d H:i:s');

//         //JIKA USER MELAKUKAN FILTER MANUAL, MAKA PARAMETER DATE AKAN TERISI
//         if (request()->date != '') {
//             //MAKA FORMATTING TANGGALNYA BERDASARKAN FILTER USER
//             $date = explode(' - ' ,request()->date);
//             $start = Carbon::parse($date[0])->format('Y-m-d') . ' 00:00:01';
//             $end = Carbon::parse($date[1])->format('Y-m-d') . ' 23:59:59';
//         }

//         //BUAT QUERY KE DB MENGGUNAKAN WHEREBETWEEN DARI TANGGAL FILTER
//         $bahan = InputBahan::whereBetween('created_at', [$start, $end])->get();
//         //KEMUDIAN LOAD VIEW
//         return view('admin.laporan.laporan', compact('bahan'));
//     }

//     public function ReportPdf($daterange)
// {
//     $date = explode('+', $daterange); //EXPLODE TANGGALNYA UNTUK MEMISAHKAN START & END
//     //DEFINISIKAN VARIABLENYA DENGAN FORMAT TIMESTAMPS
//     $start = Carbon::parse($date[0])->format('Y-m-d') . ' 00:00:01';
//     $end = Carbon::parse($date[1])->format('Y-m-d') . ' 23:59:59';

//     //KEMUDIAN BUAT QUERY BERDASARKAN RANGE CREATED_AT YANG TELAH DITETAPKAN RANGENYA DARI $START KE $END
//     $bahan = InputBahan::whereBetween('created_at', [$start, $end])->get();
//     //LOAD VIEW UNTUK PDFNYA DENGAN MENGIRIMKAN DATA DARI HASIL QUERY
//     $pdf = PDF::loadView('admin.laporan.laporan_pdf', compact('bahan', 'date'));
//     //GENERATE PDF-NYA
//     return $pdf->stream();
// }


    
}
