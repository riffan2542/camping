<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    public function stokbarang()
    {
        return $this->hasMany('App\Stokbarang', 'kategori_id');
    }
}
