<?php

namespace App;

use App\Produk;
use Illuminate\Database\Eloquent\Model;

class BahanBaku extends Model
{
    protected $fillable = ['nama_bahan', 'supplier', 'stok_bahan', 'tanggal_masuk'];

    public function Produk() {
        return $this->belongsTo('App\Produk', 'id_produk', 'id_bahan');
    }
}
