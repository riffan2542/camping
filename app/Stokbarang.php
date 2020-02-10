<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stokbarang extends Model
{
    protected $fillable = ['kode', 'user_id', 'kategori_id', 'foto', 'barang_nama', 'barang_jumlah'];
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    
    public function kategori()
    {
        return $this->belongsTo('App\Kategori', 'kategori_id');
    }
}
