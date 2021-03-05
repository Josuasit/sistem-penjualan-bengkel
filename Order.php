<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function User()
    {
    	return $this->belongsTo('App\User','User_id','id');
    }
    
     public function Order_Detail()
    {
        return $this->hasMany('App\Order_Detail','Order_id','id');
    }
}
