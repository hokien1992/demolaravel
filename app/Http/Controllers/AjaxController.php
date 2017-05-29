<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Loaitin;
use App\Theloai;
class AjaxController extends Controller
{
    //
    public function getLoaitin($idTheloai){
    	$loaitin=Loaitin::where('idTheloai',$idTheloai)->get();
    	// echo "<pre>";print_r($loaitin);die();
    	foreach ($loaitin as $lt) {
    		echo "<option value='".$lt->id."'>".$lt->ten."</option>";
    	}
    }
}
