<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/','PageController@trangchu');

Use App\Theloai;
Use App\Loaitin;
Use App\Tintuc;
Use App\Slide;
Use App\User;


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('k_login','UserController@getDangnhapAdmin');

Route::post('k_login','UserController@postDangnhapAdmin');



Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){

	Route::get('k_logout','UserController@getDangxuatAdmin');

	Route::get('kadmin','K_AdminController@getK_Admin');

	Route::group(['prefix'=>'ajax'],function(){
		Route::get('loaitin/{idTheloai}','AjaxController@getLoaitin');
	});

	Route::group(['prefix'=>'theloai'],function(){
		Route::get('danhsach','TheloaiController@getDanhsach');
		Route::get('them','TheloaiController@getThem');
		Route::post('them','TheloaiController@postThem');

		Route::get('sua/{id}','TheloaiController@getSua');
		Route::post('sua/{id}','TheloaiController@postSua');

		Route::get('xoa/{id}','TheloaiController@getXoa');
	});
	Route::group(['prefix'=>'loaitin'],function(){
		Route::get('danhsach','LoaitinController@getDanhsach');
		Route::get('them','LoaitinController@getThem');
		Route::post('them','LoaitinController@postThem');

		Route::get('sua/{id}','LoaitinController@getSua');
		Route::post('sua/{id}','LoaitinController@postSua');

		Route::get('xoa/{id}','LoaitinController@getXoa');
	});
	Route::group(['prefix'=>'tintuc'],function(){
		Route::get('danhsach','TintucController@getDanhsach');
		Route::get('them','TintucController@getThem');
		Route::post('them','TintucController@postThem');

		Route::get('sua/{id}','TintucController@getSua');
		Route::post('sua/{id}','TintucController@postSua');

		Route::get('xoa/{id}','TintucController@getXoa');
	});
	Route::group(['prefix'=>'comment'],function(){
		Route::get('xoa/{id}/{idTintuc}','CommentController@getXoa');
	});

	Route::group(['prefix'=>'slide'],function(){
		Route::get('danhsach','SlideController@getDanhsach');
		Route::get('them','SlideController@getThem');
		Route::post('them','SlideController@postThem');

		Route::get('sua/{id}','SlideController@getSua');
		Route::post('sua/{id}','SlideController@postSua');

		Route::get('xoa/{id}','SlideController@getXoa');
	});
	Route::group(['prefix'=>'slide'],function(){
		Route::get('danhsach','SlideController@getDanhsach');
		Route::get('them','SlideController@getThem');
		Route::post('them','SlideController@postThem');

		Route::get('sua/{id}','SlideController@getSua');
		Route::post('sua/{id}','SlideController@postSua');

		Route::get('xoa/{id}','SlideController@getXoa');
	});
	/*=====================================================================User*/
	Route::group(['prefix'=>'user'],function(){
		Route::get('danhsach','UserController@getDanhsach');

		Route::get('them','UserController@getThem');
		Route::post('them','UserController@postThem');

		Route::get('sua/{id}','UserController@getSua');
		Route::post('sua/{id}','UserController@postSua');

		Route::get('xoa/{id}','UserController@getXoa');
	});

	Route::resource('photo', 'PhotoController');
	Route::resource('productCategory', 'admin\product_categoryController');
	Route::resource('products', 'admin\ProductsController');
	
});

/*Route::get('trangchu','PageController@trangchu');*/
Route::get('lien-he','PageController@lienhe');
Route::get('contact.html','PageController@lienhe');
Route::get('{defa}/{alias_theloai}/{alias_loaitin}{id_loaitin}','PageController@newsCategory');
/*==============================================================================================resource*/


