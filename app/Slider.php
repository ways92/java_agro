<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
      protected $table = 'sliders';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'name', 'gambar'
    ];
}
