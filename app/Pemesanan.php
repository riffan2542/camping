<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    public function transaksi()
    {
        return $this->hasMany('App\Transaksi', 'pemesanan_id');
    }
    public function kategori()
    {
        return $this->belongsTo('App\Kategori', 'kategori_id');
    }
}
