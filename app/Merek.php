<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Merek extends Model
{
    protected $table = 'merek';
    protected $guarded = ['id'];
    public function produk ()
    {
        //return $this->belongsTo('App\Produk');
        return $this->hasMany('App\Produk');
    }


       public function getRouteKeyName()
		{
    return 'merek';
		}
}

