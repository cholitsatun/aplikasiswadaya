<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InputBahan extends Model
{
    protected $fillable = ['supplier', 'jumlah_inb', 'tanggal_inb', 'tanggal_out'];

    public function BahanBaku() {
        return $this->belongsTo('App\BahanBaku', 'id_bahan', 'id_inb');
    }

}
