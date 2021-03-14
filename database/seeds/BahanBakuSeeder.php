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
            ['nama_bahan' => 'Frame 10 KG'],
            ['nama_bahan' => 'Onderdil TM 10 kg'],
            ['nama_bahan' => 'Stoplat 10 kg'],
            ['nama_bahan' => 'Cucuk 10 kg'],
            ['nama_bahan' => 'Frame 25Kg'],
            ['nama_bahan' => 'Onderdil TM 25kg'],
            ['nama_bahan' => 'Stoplat 25kg'],
            ['nama_bahan' => 'Cucuk 25KG'],
            ['nama_bahan' => 'Cepuk 25Kg'],
            ['nama_bahan' => 'ROM 150kg Besi'],
            ['nama_bahan' => 'Palang kecil besi'],
            ['nama_bahan' => 'Cagak Kayu 150kg'],
            ['nama_bahan' => 'Stang 150kg'],
            ['nama_bahan' => 'Nayan Kecil'],
            ['nama_bahan' => 'Andang Kecil Besi'],
            ['nama_bahan' => 'Andang kecil Full Border'],
            ['nama_bahan' => 'Logo Kecil'],
            ['nama_bahan' => 'ROM 300kg Besi'],
            ['nama_bahan' => 'Palang besar kayu'],
            ['nama_bahan' => 'Palang kecil kayu'],
            ['nama_bahan' => 'Palang besar besi'],
            ['nama_bahan' => 'Stang 300kg'],
            ['nama_bahan' => 'Nayan Besar'],
            ['nama_bahan' => 'Andang Besar Besi'],
            ['nama_bahan' => 'Andang Besar Full Bordes'],
            ['nama_bahan' => 'Logo Besar'],
            ['nama_bahan' => 'ROM 500 kg besi'],
            ['nama_bahan' => 'ROM 150kg kayu'],
            ['nama_bahan' => 'ROM 300kg Kayu'],
            ['nama_bahan' => 'ROM 500 kg kayu'],
            ['nama_bahan' => 'Cagak kayu besar'],
            ['nama_bahan' => 'Stang 500kg'],
            ['nama_bahan' => 'kardus 10kg'],
            ['nama_bahan' => 'besek 25 kg ']
        ];
    
        BahanBaku::insert($value);
    }
}
