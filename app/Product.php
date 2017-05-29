<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table="product";
    public function product_category(){
    	return $this->belongsto('App\Product_category','id_category','id');
    }
}
