<?php

namespace App\Http\Controllers\admin;
use Session;
use App\Product_category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
class product_categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_cat=Product_category::paginate(2);
        return view('admin.products.list_category',['list_cat'=>$list_cat]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.products.add_category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,
            ['name'=>'required|max:100'],
            [
            'name.required'=>'Bạn chưa nhập tên danh mục',
            'name.max'=>'Tên danh mục dài tối đa 50 ký tự',
            ]
            );
        $cate = new Product_category;
        $cate->name=$request->name;
        $cate->alias=changeTitle($request->name);
        /*$cate->parent_id=$request->parent_id;*/
        /*$cate->noibat=$request->noibat;*/
        if ($request->has('noibat')) {
            $cate->noibat=$request->noibat;
        }else{   
            $cate->noibat=0;
        }
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $destination_path = 'upload/sanpham/';
            $filename = str_random(6) . '_' . $file->getClientOriginalName();
            $link_image=$destination_path.$filename;
            $file->move($destination_path, $filename);
            
            $cate->image = $link_image;
        }
        $cate->save();
        return redirect('admin/productCategory/create')->with('thongbao','Bạn đã thêm thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product_category  $product_category
     * @return \Illuminate\Http\Response
     */
    public function show(Product_category $product_category)
    {
        $list_cat=Product_category::paginate(2);
        return view('admin.products.list_category',['list_cat'=>$list_cat]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product_category  $product_category
     * @return \Illuminate\Http\Response
     */
    public function edit($proid)
    {
        $cate=Product_category::find($proid);
        //echo "<pre>";print_r($cate);die();
        return view('admin.products.edit_category',['cate'=>$cate]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product_category  $product_category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $proid)
    {
        $cate=Product_category::find($proid);
        $cate->name=$request->name;
        $cate->alias=changeTitle($request->name);
        /*$cate->parent_id=$request->parent_id;*/
        $cate->noibat=$request->noibat;
        if ($request->has('noibat')) {
            $cate->noibat=$request->noibat;
        }else{   
            $cate->noibat=0;
        }
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $destination_path = 'upload/sanpham/';
            $filename = str_random(6) . '_' . $file->getClientOriginalName();
            $link_image=$destination_path.$filename;
            $file->move($destination_path, $filename);
            
            $cate->image = $link_image;
        }
        $cate->save();
        return redirect('admin/productCategory');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product_category  $product_category
     * @return \Illuminate\Http\Response
     */
    public function destroy($proid)
    {
        //die('destroy');
        $cate=Product_category::find($proid);
        if($cate->image){unlink($cate->image);}
        Session::flash('message', 'Bạn đã xóa thành công bài viết!');
        $cate->delete();
        return redirect('admin/productCategory');
    }
}
