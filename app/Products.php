<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    //
    protected $table="product";
    //
    protected $fillable = ['name'];

    public $timestamps = false;
    public function product_cat(){
    	return $this->belongsto('App\Product_category','id_category','id');
    }
}
