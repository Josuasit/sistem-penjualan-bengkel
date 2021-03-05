<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
   public function Order_Detail()
    {
       return $this->hasMany('App\Order_Detail','Produk_id','id');
    }
}
