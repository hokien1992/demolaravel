<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Theloai;
use App\Slide;
use App\loaitin;
use App\Tintuc;

class PageController extends Controller
{
    //
    function __construct()
    {
    	$theloai=Theloai::all();
        $loaitin=Loaitin::all();
    	$slide=slide::all();
    	view()->share('theloai',$theloai);
    	view()->share('slide',$slide);
        view()->share('loaitin',$loaitin);
    }
    function trangchu(){
    	$slide=Slide::all();
        $tintuc=tintuc::all();
    	return view('pages.home',['tintuc'=>$tintuc]);
    }
    function lienhe(){
    	return view('pages.lienhe');
    }
    function newsCategory($defa='tin-tuc',$alias_theloai,$id_alias_loaitin,$id_loaitin)
    {
    	$tintuc=DB::table('tintuc')->where('idLoaitin', $id_loaitin)->paginate(1);
    	return view('pages.news_category',['tintuc'=>$tintuc]);
    }
}
