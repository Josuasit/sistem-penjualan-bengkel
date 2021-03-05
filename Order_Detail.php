<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_Detail extends Model
{
     public function Produk()
    {
    	return $this->belongsTo('App\Produk','Produk_id','id');
    }
     public function Order()
    {
    	return $this->belongsTo('App\Order','Order_id','id');
    }
}
