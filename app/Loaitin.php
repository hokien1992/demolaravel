<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loaitin extends Model
{
    //
    protected $table="Loaitin";
    public function theloai(){
    	return $this->belongsTo('App\Theloai','idTheloai','id');
    }
    public function tintuc(){
    	return $this->hasMany('App/Tintuc','idLoaitin','id');
    }
}
