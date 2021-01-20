<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ProdukBahanSeeder extends Seeder
{
    public function run()
    {
        $value = [
            ['product_id' => 1, 'bahan_id' => 1, 'jumlah_bahan' => 1],
            ['product_id' => 1, 'bahan_id' => 2, 'jumlah_bahan' => 1],
            ['product_id' => 1, 'bahan_id' => 3, 'jumlah_bahan' => 1],
            ['product_id' => 1, 'bahan_id' => 4, 'jumlah_bahan' => 2],
            ['product_id' => 1, 'bahan_id' => 33, 'jumlah_bahan' => 1],

            ['product_id' => 2, 'bahan_id' => 1, 'jumlah_bahan' => 1],
            ['product_id' => 2, 'bahan_id' => 2, 'jumlah_bahan' => 1],
            ['product_id' => 2, 'bahan_id' => 3, 'jumlah_bahan' => 1],
            ['product_id' => 2, 'bahan_id' => 4, 'jumlah_bahan' => 2],

            ['product_id' => 3, 'bahan_id' => 5, 'jumlah_bahan' => 1],
            ['product_id' => 3, 'bahan_id' => 6, 'jumlah_bahan' => 1],
            ['product_id' => 3, 'bahan_id' => 7, 'jumlah_bahan' => 1],
            ['product_id' => 3, 'bahan_id' => 8, 'jumlah_bahan' => 2],
            ['product_id' => 3, 'bahan_id' => 9, 'jumlah_bahan' => 1],
            ['product_id' => 3, 'bahan_id' => 34, 'jumlah_bahan' => 1],

            ['product_id' => 4, 'bahan_id' => 28, 'jumlah_bahan' => 1],
            ['product_id' => 4, 'bahan_id' => 20, 'jumlah_bahan' => 1],
            ['product_id' => 4, 'bahan_id' => 12, 'jumlah_bahan' => 1],
            ['product_id' => 4, 'bahan_id' => 13, 'jumlah_bahan' => 1],
            ['product_id' => 4, 'bahan_id' => 14, 'jumlah_bahan' => 1],
            ['product_id' => 4, 'bahan_id' => 15, 'jumlah_bahan' => 1],
            ['product_id' => 4, 'bahan_id' => 17, 'jumlah_bahan' => 1],

            ['product_id' => 5, 'bahan_id' => 10, 'jumlah_bahan' => 1],
            ['product_id' => 5, 'bahan_id' => 11, 'jumlah_bahan' => 1],
            ['product_id' => 5, 'bahan_id' => 13, 'jumlah_bahan' => 1],
            ['product_id' => 5, 'bahan_id' => 14, 'jumlah_bahan' => 1],
            ['product_id' => 5, 'bahan_id' => 15, 'jumlah_bahan' => 1],
            ['product_id' => 5, 'bahan_id' => 17, 'jumlah_bahan' => 1],            

            ['product_id' => 6, 'bahan_id' => 10, 'jumlah_bahan' => 1],
            ['product_id' => 6, 'bahan_id' => 11, 'jumlah_bahan' => 1],
            ['product_id' => 6, 'bahan_id' => 13, 'jumlah_bahan' => 1],
            ['product_id' => 6, 'bahan_id' => 14, 'jumlah_bahan' => 1],
            ['product_id' => 6, 'bahan_id' => 16, 'jumlah_bahan' => 1],
            ['product_id' => 6, 'bahan_id' => 17, 'jumlah_bahan' => 1],            

            ['product_id' => 7, 'bahan_id' => 29, 'jumlah_bahan' => 1],
            ['product_id' => 7, 'bahan_id' => 19, 'jumlah_bahan' => 1],
            ['product_id' => 7, 'bahan_id' => 22, 'jumlah_bahan' => 1],
            ['product_id' => 7, 'bahan_id' => 23, 'jumlah_bahan' => 1],
            ['product_id' => 7, 'bahan_id' => 24, 'jumlah_bahan' => 1],
            ['product_id' => 7, 'bahan_id' => 26, 'jumlah_bahan' => 1],            
            ['product_id' => 7, 'bahan_id' => 31, 'jumlah_bahan' => 1],            

            ['product_id' => 8, 'bahan_id' => 18, 'jumlah_bahan' => 1],
            ['product_id' => 8, 'bahan_id' => 21, 'jumlah_bahan' => 1],
            ['product_id' => 8, 'bahan_id' => 22, 'jumlah_bahan' => 1],
            ['product_id' => 8, 'bahan_id' => 23, 'jumlah_bahan' => 1],
            ['product_id' => 8, 'bahan_id' => 24, 'jumlah_bahan' => 1],
            ['product_id' => 8, 'bahan_id' => 26, 'jumlah_bahan' => 1],            

            ['product_id' => 9, 'bahan_id' => 18, 'jumlah_bahan' => 1],
            ['product_id' => 9, 'bahan_id' => 21, 'jumlah_bahan' => 1],
            ['product_id' => 9, 'bahan_id' => 22, 'jumlah_bahan' => 1],
            ['product_id' => 9, 'bahan_id' => 23, 'jumlah_bahan' => 1],
            ['product_id' => 9, 'bahan_id' => 25, 'jumlah_bahan' => 1],
            ['product_id' => 9, 'bahan_id' => 26, 'jumlah_bahan' => 1],            

            ['product_id' => 10, 'bahan_id' => 30, 'jumlah_bahan' => 1],
            ['product_id' => 10, 'bahan_id' => 19, 'jumlah_bahan' => 1],
            ['product_id' => 10, 'bahan_id' => 31, 'jumlah_bahan' => 1],
            ['product_id' => 10, 'bahan_id' => 32, 'jumlah_bahan' => 1],
            ['product_id' => 10, 'bahan_id' => 23, 'jumlah_bahan' => 1],
            ['product_id' => 10, 'bahan_id' => 26, 'jumlah_bahan' => 1],            
            ['product_id' => 10, 'bahan_id' => 24, 'jumlah_bahan' => 1],            

            ['product_id' => 11, 'bahan_id' => 27, 'jumlah_bahan' => 1],
            ['product_id' => 11, 'bahan_id' => 21, 'jumlah_bahan' => 1],
            ['product_id' => 11, 'bahan_id' => 32, 'jumlah_bahan' => 1],
            ['product_id' => 11, 'bahan_id' => 23, 'jumlah_bahan' => 1],
            ['product_id' => 11, 'bahan_id' => 26, 'jumlah_bahan' => 1],
            ['product_id' => 11, 'bahan_id' => 24, 'jumlah_bahan' => 1],                        

            ['product_id' => 12, 'bahan_id' => 27, 'jumlah_bahan' => 1],
            ['product_id' => 12, 'bahan_id' => 21, 'jumlah_bahan' => 1],
            ['product_id' => 12, 'bahan_id' => 32, 'jumlah_bahan' => 1],
            ['product_id' => 12, 'bahan_id' => 23, 'jumlah_bahan' => 1],
            ['product_id' => 12, 'bahan_id' => 26, 'jumlah_bahan' => 1],            
            ['product_id' => 12, 'bahan_id' => 25, 'jumlah_bahan' => 1]   
            
        ];
        DB::table('produk_bahan')->insert($value);
    }
}
