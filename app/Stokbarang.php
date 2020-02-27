<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stokbarang extends Model
{
    protected $fillable = ['kode', 'user_id', 'kategori_id', 'foto', 'barang_nama', 'barang_jumlah'];
    
    public function kategori()
    {
        return $this->belongsTo('App\Kategori', 'kategori_id');
    }
    public function transaksi()
    {
        return $this->hasMany('App\Transaksi', 'stokbarang_id');
    }
}
