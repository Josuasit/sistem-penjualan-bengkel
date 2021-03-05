<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    //
    protected $fillable = ['name', 'slug', 'parent_id'];

    public function childs(){
    	return $this->hasMany('App\kategori', 'parent_id');
    }

    public function parent(){
    	return $this->belongsTo ('App\kategori', 'parent_id');
    }
}
