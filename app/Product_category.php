<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_category extends Model
{
	protected $table="product_category";
    //
    /*protected $fillable = ['name'];*/

    public $timestamps = false;
    public function product(){
    	return $this->hasMany('App\Product','id_category','id');
    }
}
