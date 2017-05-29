<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theloai;
class TheloaiController extends Controller
{
    //
    public function getDanhsach(){
        $theloai=Theloai::paginate(2);
    	return view('admin.theloai.danhsach',['theloai'=>$theloai]);
    }
    public function getThem(){
        /*die();*/
    	return view('admin.theloai.them');
    }
    public function postThem(Request $request){
        $this->validate($request,
                [
                    'ten'=>'required|min:3|max:100'
                ],
                [
                    'ten.required'=>'Bạn chưa nhập tên thể loại',
                    'ten.min'=>'Tên thể loại phải có ít nhât 2 ký tự',
                    'ten.max'=>'Tên thể loại phải có nhiêu nhât 100 ký tự',
                ]);
        $theloai=new Theloai;
        $theloai->ten=$request->ten;
        $theloai->alias=changeTitle($request->ten);
        //echo $theloai->alias;
        $theloai->save();
        return redirect('admin/theloai/them')->with('thongbao','Thêm thành công !');
    }

    public function getSua($id){
        $theloai=Theloai::find($id);
        return view('admin.theloai.sua',['theloai'=>$theloai]);
    }
    public function postSua(Request $request,$id){
        $theloai=Theloai::find($id);
        $this->validate($request,
            ['ten'=>'required|unique:Theloai,ten|min:3|max:100'],
            [
            'ten.required'=>'Tên thể loại không được bỏ trống!',
            'ten.unique'=>'Tên thể loại không được trùng!',
            'ten.min'=>'Tên thể loại có ký tự lớn hơn 3!',
            'ten.max'=>'Tên thể loại có ký tự nhỏ hơn 100 ký tự!',
            ]);
        $theloai->ten=$request->ten;
        $theloai->alias=changeTitle($request->ten);
        $theloai->save();
        return redirect('admin/theloai/sua/'.$id)->with('thongbao','Bạn đã sửa thể loại thành công!');
    }

    public function getXoa($id){
        $theloai=Theloai::find($id);
        $theloai->delete();
        return redirect('admin/theloai/danhsach');
    }
}
