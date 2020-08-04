<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
   protected $table = 'produk';
    protected $guarded = ['id'];

    public function kategori() 
    {
        return $this->belongsTo('App\Kategori');
        
        // return $this->hasOne('App\Kategori');
    }

     public function merek() 
    {
        return $this->belongsTo('App\Merek');
        
        // return $this->hasOne('App\BRAND');
    }

   

}