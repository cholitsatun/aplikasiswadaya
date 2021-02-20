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

    public function cetak_pdf()
    {
        //INISIASI 30 HARI RANGE SAAT INI JIKA HALAMAN PERTAMA KALI DI-LOAD
        //KITA GUNAKAN STARTOFMONTH UNTUK MENGAMBIL TANGGAL 1
        $start = Carbon::now()->startOfMonth()->format('Y-m-d H:i:s');
        //DAN ENDOFMONTH UNTUK MENGAMBIL TANGGAL TERAKHIR DIBULAN YANG BERLAKU SAAT INI
        $end = Carbon::now()->endOfMonth()->format('Y-m-d H:i:s');

        //JIKA USER MELAKUKAN FILTER MANUAL, MAKA PARAMETER DATE AKAN TERISI
        if (request()->date != '') {
            //MAKA FORMATTING TANGGALNYA BERDASARKAN FILTER USER
            $date = explode(' - ' ,request()->date);
            $start = Carbon::parse($date[0])->format('Y-m-d') . ' 00:00:01';
            $end = Carbon::parse($date[1])->format('Y-m-d') . ' 23:59:59';
        }

        //BUAT QUERY KE DB MENGGUNAKAN WHEREBETWEEN DARI TANGGAL FILTER
        $produk = InputProduk::whereBetween('created_at', [$start, $end])->get();
        //KEMUDIAN LOAD VIEW
        return view('admin.laporan.laporan', compact('produk'));
    }

        public function ReportPdf($daterange)
    {
        $date = explode('+', $daterange); //EXPLODE TANGGALNYA UNTUK MEMISAHKAN START & END
        //DEFINISIKAN VARIABLENYA DENGAN FORMAT TIMESTAMPS
        $start = Carbon::parse($date[0])->format('Y-m-d') . ' 00:00:01';
        $end = Carbon::parse($date[1])->format('Y-m-d') . ' 23:59:59';

        //KEMUDIAN BUAT QUERY BERDASARKAN RANGE CREATED_AT YANG TELAH DITETAPKAN RANGENYA DARI $START KE $END
        $produk = InputProduk::whereBetween('created_at', [$start, $end])->get();
        //LOAD VIEW UNTUK PDFNYA DENGAN MENGIRIMKAN DATA DARI HASIL QUERY
        $pdf = PDF::loadView('admin.laporan.laporan_pdf', compact('produk', 'date'));
        //GENERATE PDF-NYA
        return $pdf->stream();
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
