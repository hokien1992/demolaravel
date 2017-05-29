<?php

namespace App\Http\Controllers\admin;
use App\Products;
use App\Product_category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $list_pro=Products::paginate(2);
        /*echo "<pre>";print_r($list_pro);die();*/
        return view('admin.products.list_product',['list_pro'=>$list_pro]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        /*$cate=Product_category::all();*/
        $cate=DB::table('product_category')->where('parent_id', 0)->get();
        return view('admin.products.add_product',['cate'=>$cate]);
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
        $product=new Products;
        //print_r($product);die();
        $this->validate($request,
            [
                'name'=>'required|max:100',
                'id_category'=>'required',
            ],
            [
                'name.required'=>'Bạn phải chưa ghi tên sản phẩm',
                'name.max'=>'Tên sản phẩm có lớn nhất 100 ký tự',
                'id_category.required'=>'Sản phẩm của bạn chưa thuộc danh mục nào'
            ]
            );
        $product->name=$request->name;
        $product->alias=changeTitle($request->name);
        $product->id_category=$request->id_category;
        $product->soluong=$request->soluong;
        $product->tomtat=$request->tomtat;
        $product->chitiet=$request->chitiet;
        if ($request->has('noibat')) {
            $product->noibat=$request->noibat;
        }else{   
            $product->noibat=0;
        }
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $destination_path = 'upload/sanpham/';
            $filename = str_random(6) . '_' . $file->getClientOriginalName();
            $link_image=$destination_path.$filename;
            $file->move($destination_path, $filename);
            
            $product->image = $link_image;
        }
        $product->save();
        return redirect('admin/products/create')->with('thongbao','Bạn đã thêm thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        /*echo $id;die();*/
        $product=Products::find($id);
        //echo "<pre>";print_r($product);die();
        $cate=DB::table('product_category')->where('parent_id', 0)->get();
        
        return view('admin.products.edit_product',['product'=>$product,'cate'=>$cate]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,
            [
                'name'=>'required|max:100',
                'id_category'=>'required',
            ],
            [
                'name.required'=>'Bạn phải chưa ghi tên sản phẩm',
                'name.max'=>'Tên sản phẩm có lớn nhất 100 ký tự',
                'id_category.required'=>'Sản phẩm của bạn chưa thuộc danh mục nào'
            ]
            );
        $product->name=$request->name;
        $product->alias=changeTitle($request->name);
        $product->id_category=$request->id_category;
        $product->soluong=$request->soluong;
        $product->tomtat=$request->tomtat;
        $product->chitiet=$request->chitiet;
        if ($request->has('noibat')) {
            $product->noibat=$request->noibat;
        }else{   
            $product->noibat=0;
        }
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $destination_path = 'upload/sanpham/';
            $filename = str_random(6) . '_' . $file->getClientOriginalName();
            $link_image=$destination_path.$filename;
            $file->move($destination_path, $filename);
            
            $product->image = $link_image;
        }else{
            $product->image = $product->image;
        }
        $product->save();
        return redirect('admin/products/edit_product')->with('mess','Bạn đã sửa bài viết thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
