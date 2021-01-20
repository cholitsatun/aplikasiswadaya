<?php

use App\Produk;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    public function run()
    {
        $value = [
            ['nama_produk' => 'TM 10 Kg Blok', 'stok_produk' => 0, 'harga' => 200000 ],
            ['nama_produk' => 'TM 10 Kg Ruji', 'stok_produk' => 0, 'harga' => 200000 ],
            ['nama_produk' => 'TM 25 Kg', 'stok_produk' => 0, 'harga' => 200000 ],
            ['nama_produk' => 'CB 150 Kg Kayu', 'stok_produk' => 0, 'harga' => 200000 ],
            ['nama_produk' => 'CB 150 Kg Besi', 'stok_produk' => 0, 'harga' => 200000 ],
            ['nama_produk' => 'CB 150 Kg Full Bordes', 'stok_produk' => 0, 'harga' => 200000 ],
            ['nama_produk' => 'CB 300 Kg Kayu', 'stok_produk' => 0, 'harga' => 200000 ],
            ['nama_produk' => 'CB 300 Kg Besi', 'stok_produk' => 0, 'harga' => 200000 ],
            ['nama_produk' => 'CB 300 Kg Full Bordes', 'stok_produk' => 0, 'harga' => 200000 ],
            ['nama_produk' => 'CB 500 Kg Kayu', 'stok_produk' => 0, 'harga' => 200000 ],
            ['nama_produk' => 'CB 500 Kg Besi', 'stok_produk' => 0, 'harga' => 200000 ],
            ['nama_produk' => 'CB 500 Kg Full Bordes', 'stok_produk' => 0, 'harga' => 200000 ]
        ];
    
        Produk::insert($value);
    }
}
