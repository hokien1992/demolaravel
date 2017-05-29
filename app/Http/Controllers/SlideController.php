<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
class SlideController extends Controller
{
    //
    public function getDanhsach(){

    	$slide=Slide::paginate(2);
    	return view('admin.slide.danhsach',['slide'=>$slide]);
    }
    public function getThem(){
    	return view('admin.slide.them');
    }
    public function postThem(Request $request){
    	$this->validate($request,
        [
            'ten'=>'required',
            'noidung'=>'required',
        ],
        [
            'ten.required'=>'Bạn chưa nhập tên',
            'noidung.required'=>'Bạn chưa nhập nội dung',
        ]);
        $slide = new slide;
        $slide->ten = $request->ten;
        $slide->noidung = $request->noidung;
        if($request->has('link')){
        	$slide->link=$request->link;
        }
        if ($request->hasFile('hinhanh')) {
            $file = $request->file('hinhanh');
            $destination_path = 'upload/slide/';
            $filename = str_random(6) . '_' . $file->getClientOriginalName();
            $file->move($destination_path, $filename);
            
            $slide->hinhanh = $filename;
        }
        $slide->save();
        return redirect('admin/slide/them')->with('thongbao','Thêm thành công !');
    }
   	/*=========================================Sửa*/
   	public function getSua($id){
   		$slide=Slide::find($id);
    	return view('admin.slide.sua',['slide'=>$slide]);
    }
    public function postSua(Request $request,$id){
    	$slide=Slide::find($id);
    	$this->validate($request,
        [
            'ten'=>'required',
            'noidung'=>'required',
        ],
        [
            'ten.required'=>'Bạn chưa nhập tên',
            'noidung.required'=>'Bạn chưa nhập nội dung',
        ]);
        $slide->ten=$request->ten;
        $slide->noidung = $request->noidung;
        if($request->has('link')){
        	$slide->link=$request->link;
        }
        if ($request->hasFile('hinhanh')) {
            $file = $request->file('hinhanh');
            $destination_path = 'upload/slide/';
            $filename = str_random(6) . '_' . $file->getClientOriginalName();
            unlink("upload/img/".$slide->hinhanh);
            $file->move($destination_path, $filename);
            $slide->hinhanh = $filename;
        }
        $slide->save();
        return redirect('admin/slide/sua/'.$id)->with('thongbao','Bạn đã sửa thành công!');
    }

    public function getXoa($id){
        $slide=Slide::find($id);
        unlink("upload/slide/".$slide->hinhanh);
        $slide->delete();
        return redirect('admin/slide/danhsach');
    }
}
