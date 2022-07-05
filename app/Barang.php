<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barangs';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'name', 'harga', 'stok', 'gambar', 'description'
    ];

     public function pesanan_detail()
    {
        return $this->hasMany('App\PesananDetail', 'barang_id','id');
    }
}
