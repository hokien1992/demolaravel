<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tintuc;
use App\Loaitin;
use App\Theloai;
use App\Comment;
class TintucController extends Controller
{
    //
    public function getDanhsach(){
        $tintuc=tintuc::paginate(20);
    	return view('admin.tintuc.danhsach',['tintuc'=>$tintuc]);
    }
    public function getThem(){
        $loaitin=loaitin::all();
        $theloai=Theloai::all();
    	return view('admin.tintuc.them',['loaitin'=>$loaitin,'theloai'=>$theloai]);
    }
    public function postThem(Request $request){
        $this->validate($request,
        [
            'ten'=>'required|min:3|max:100',
            'loaitin'=>'required',
        ],
        [
            'ten.required'=>'Bạn chưa nhập tên tintuc',
            'ten.min'=>'Tên tintuc phải có ít nhât 2 ký tự',
            'ten.max'=>'Tên tin tức phải có nhiêu nhât 100 ký tự',
            'loaitin.required'=>'bạn cần phải lựa chọn tintuc',
        ]);
        $tintuc = new tintuc;
        $tintuc->tieude = $request->ten;
        $tintuc->alias = changeTitle($request->ten);
        $tintuc->idLoaitin = $request->loaitin;
        /*$tintuc->hinhanh = $request->hinhanh;*/
        $tintuc->noibat = $request->noibat;
        $tintuc->tomtat = $request->tomtat;
        $tintuc->noidung = $request->noidung;

        
        if ($request->hasFile('hinhanh')) {
            $file = $request->file('hinhanh');
            $destination_path = 'upload/tintuc/';
            $filename = str_random(6) . '_' . $file->getClientOriginalName();
            $file->move($destination_path, $filename);
            
            $tintuc->hinhanh = $filename;
        }
        $tintuc->save();
        return redirect('admin/tintuc/them')->with('thongbao','Thêm thành công !');
    }

    public function getSua($id){

        $loaitin=Loaitin::all();
        $theloai=Theloai::all();
        $comment=Comment::all();
        $tintuc=tintuc::find($id);

        return view('admin.tintuc.sua',['tintuc'=>$tintuc,'loaitin'=>$loaitin,'theloai'=>$theloai,'comment'=>$comment]);
    }
    public function postSua(Request $request,$id){
        //echo $request->edit_hinhanh;die();
        $tintuc=tintuc::find($id);
        $this->validate($request,
            ['ten'=>'required|min:3|max:100'],

            [
            'ten.required'=>'Tên thể loại không được bỏ trống!',
            'ten.min'=>'Tên thể loại có ký tự lớn hơn 3!',
            'ten.max'=>'Tên thể loại có ký tự nhỏ hơn 100 ký tự!',
            ]);
        $tintuc->tieude = $request->ten;
        $tintuc->alias = changeTitle($request->ten);
        $tintuc->idLoaitin = $request->loaitin;
        /*$tintuc->hinhanh = $request->hinhanh;*/
        if ($request->noibat) {
            $tintuc->noibat = $request->noibat;
        }else{
            $tintuc->noibat = 0;
        }
        
        $tintuc->tomtat = $request->tomtat;
        $tintuc->noidung = $request->noidung;

        
        if ($request->hasFile('hinhanh')) {
            $file = $request->file('hinhanh');
            $destination_path = 'upload/tintuc/';
            $filename = str_random(6) . '_' . $file->getClientOriginalName();
            $file->move($destination_path, $filename);
            unlink("upload/tintuc/".$tintuc->hinhanh);
            $tintuc->hinhanh = $filename;
        }else{
            $tintuc->hinhanh=$request->edit_hinhanh;
        }

        $tintuc->save();
        return redirect('admin/tintuc/sua/'.$id)->with('thongbao','Bạn đã sửa thể loại thành công!');
    }

    public function getXoa($id){
        $tintuc=tintuc::find($id);
        unlink("upload/tintuc/".$tintuc->hinhanh);
        $tintuc->delete();
        return redirect('admin/tintuc/danhsach');
    }
}
