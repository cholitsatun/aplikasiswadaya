<?php

namespace App;

use App\Produk;
use App\InputBahan;
use Illuminate\Database\Eloquent\Model;

class BahanBaku extends Model
{
    protected $table = 'bahanbakus';
    protected $fillable = ['nama_bahan', 'stok_bahan', 'kategori'];

    public function InputBahan() {
        return $this->hasMany('App\InputBahan', 'id', 'id');
    }
    public function Produk() {
        return $this->belongsToMany('App\Produk', 'produk_bahan', 'bahan_id','product_id')->withPivot('jumlah_bahan');
    }
}
