<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Loaitin;
Use App\Theloai;
class LoaitinController extends Controller
{
    //
    public function getDanhsach(){
        $loaitin=loaitin::paginate(2);
    	return view('admin.loaitin.danhsach',['loaitin'=>$loaitin]);
    }
    public function getThem(){
        $theloai=Theloai::all();
    	return view('admin.loaitin.them',['theloai'=>$theloai]);
    }
    public function postThem(Request $request){
        $this->validate($request,
                [
                    'ten'=>'required|min:3|max:100',
                    'theloai'=>'required',
                ],
                [
                    'ten.required'=>'Bạn chưa nhập tên thể loại',
                    'ten.min'=>'Tên thể loại phải có ít nhât 2 ký tự',
                    'ten.max'=>'Tên thể loại phải có nhiêu nhât 100 ký tự',
                    'theloai.required'=>'bạn cần phải lua chọn thể loại'
                ]);
        $loaitin=new loaitin;
        $loaitin->ten=$request->ten;
        $loaitin->alias=changeTitle($request->ten);
        $loaitin->idTheloai=$request->theloai;
        $loaitin->theloai_id=0;
        //echo $loaitin->alias;
        $loaitin->save();
        return redirect('admin/loaitin/them')->with('thongbao','Thêm thành công !');
    }

    public function getSua($id){
        $theloai=Theloai::all();
        $loaitin=loaitin::find($id);
        return view('admin.loaitin.sua',['loaitin'=>$loaitin,'theloai'=>$theloai]);
    }
    public function postSua(Request $request,$id){
        $loaitin=loaitin::find($id);
        $this->validate($request,
            ['ten'=>'required|unique:loaitin,ten|min:3|max:100','theloai'=>'required'],
            [
            'ten.required'=>'Tên thể loại không được bỏ trống!',
            'ten.unique'=>'Tên thể loại không được trùng!',
            'ten.min'=>'Tên thể loại có ký tự lớn hơn 3!',
            'ten.max'=>'Tên thể loại có ký tự nhỏ hơn 100 ký tự!',
            'theloai.required'=>'Bạn hãy chọn thể loại'
            ]);
        $loaitin->ten=$request->ten;
        $loaitin->alias=changeTitle($request->ten);
        $loaitin->idTheloai=$request->theloai;
        $loaitin->save();
        return redirect('admin/loaitin/sua/'.$id)->with('thongbao','Bạn đã sửa thể loại thành công!');
    }

    public function getXoa($id){
        $loaitin=loaitin::find($id);
        $loaitin->delete();
        return redirect('admin/loaitin/danhsach');
    }
}
