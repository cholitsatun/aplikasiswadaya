<?php

use App\BahanBaku;
use Illuminate\Database\Seeder;

class BahanBakuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $value = [
            ['nama_bahan' => 'Frame 10 KG', 'stok_bahan' => 100],
            ['nama_bahan' => 'Onderdil TM 10 kg', 'stok_bahan' => 100],
            ['nama_bahan' => 'Stoplat 10 kg', 'stok_bahan' => 100],
            ['nama_bahan' => 'Cucuk 10 kg', 'stok_bahan' => 100],
            ['nama_bahan' => 'Frame 25Kg', 'stok_bahan' => 100],
            ['nama_bahan' => 'Onderdil TM 25kg', 'stok_bahan' => 100],
            ['nama_bahan' => 'Stoplat 25kg', 'stok_bahan' => 100],
            ['nama_bahan' => 'Cucuk 25KG', 'stok_bahan' => 100],
            ['nama_bahan' => 'Cepuk 25Kg', 'stok_bahan' => 100],
            ['nama_bahan' => 'ROM 150kg Besi', 'stok_bahan' => 100],
            ['nama_bahan' => 'Palang kecil besi', 'stok_bahan' => 100],
            ['nama_bahan' => 'Cagak Kayu 150kg', 'stok_bahan' => 100],
            ['nama_bahan' => 'Stang 150kg', 'stok_bahan' => 100],
            ['nama_bahan' => 'Nayan Kecil', 'stok_bahan' => 100],
            ['nama_bahan' => 'Andang Kecil Besi', 'stok_bahan' => 100],
            ['nama_bahan' => 'Andang kecil Full Border', 'stok_bahan' => 100],
            ['nama_bahan' => 'Logo Kecil', 'stok_bahan' => 100],
            ['nama_bahan' => 'ROM 300kg Besi', 'stok_bahan' => 100],
            ['nama_bahan' => 'Palang besar kayu', 'stok_bahan' => 100],
            ['nama_bahan' => 'Palang kecil kayu', 'stok_bahan' => 100],
            ['nama_bahan' => 'Palang besar besi', 'stok_bahan' => 100],
            ['nama_bahan' => 'Stang 300kg', 'stok_bahan' => 100],
            ['nama_bahan' => 'Nayan Besar', 'stok_bahan' => 100],
            ['nama_bahan' => 'Andang Besar Besi', 'stok_bahan' => 100],
            ['nama_bahan' => 'Andang Besar Full Bordes', 'stok_bahan' => 100],
            ['nama_bahan' => 'Logo Besar', 'stok_bahan' => 100],
            ['nama_bahan' => 'ROM 500 kg besi', 'stok_bahan' => 100],
            ['nama_bahan' => 'ROM 150kg kayu', 'stok_bahan' => 100],
            ['nama_bahan' => 'ROM 300kg Kayu', 'stok_bahan' => 100],
            ['nama_bahan' => 'ROM 500 kg kayu', 'stok_bahan' => 100],
            ['nama_bahan' => 'Cagak kayu besar', 'stok_bahan' => 100],
            ['nama_bahan' => 'Stang 500kg', 'stok_bahan' => 100],
            ['nama_bahan' => 'kardus 10kg', 'stok_bahan' => 100],
            ['nama_bahan' => 'besek 25 kg ', 'stok_bahan' => 100]
        ];
    
        BahanBaku::insert($value);
    }
}
