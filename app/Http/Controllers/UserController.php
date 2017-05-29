<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
/*use Illuminate\Foundation\Auth\ThrottlesLogins;*/
use App\Http\Requests;
/*use App\Http\Controllers\Auth;*/
use App\User;
class UserController extends Controller
{
    //
	public function getDanhsach(){

		$user = User::paginate(2);

    	return view('admin.user.danhsach',['user'=>$user]);
    }
    public function getThem(){
    	return view('admin.user.them');
    }
    public function postThem(Request $request){
    	$this->validate($request,
        [
            'name'=>'required',
            'email'=>'required|unique:users,email',
            'pass'=>'required|min:6|max:50',
            'repass'=>'required|same:pass',
        ],
        [
            'name.required'=>'Bạn chưa nhập tên',
            'email.required'=>'Bạn chưa nhập email',
            'email.unique'=>'Email đã tồn tại',
            'pass.required'=>'Bạn chưa nhập mật khẩu',
            'pass.min'=>'Bạn nhập ít nhất 6 ký tự',
            'pass.max'=>'Bạn nhập nhiều nhất 50 ký tự',
            'repass.required'=>'Bạn chưa nhập lại mật khẩu',
            'repass.same'=>"Nhập lại mật khẩu chưa đúng",
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->level = $request->level;
        $user->password = bcrypt($request->pass);
        $user->save();
        return redirect('admin/user/them')->with('thongbao','Thêm thành công !');

    }
   	public function getSua($id){
   		$user = User::find($id);

   		return view('admin.user.sua',['user'=>$user]);
    }
    public function postSua(Request $request,$id){
    	$this->validate($request,
        [
            'name'=>'required',
        ],
        [
            'name.required'=>'Bạn chưa nhập tên',
        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->level = $request->level;
        if ($request->changepass=="on") {
        	$this->validate($request,
        [
            'pass'=>'required|min:6|max:50',
            'repass'=>'required|same:pass',
        ],
        [
            'pass.required'=>'Bạn chưa nhập mật khẩu',
            'pass.min'=>'Bạn nhập ít nhất 6 ký tự',
            'pass.max'=>'Bạn nhập nhiều nhất 50 ký tự',
            'repass.required'=>'Bạn chưa nhập lại mật khẩu',
            'repass.same'=>"Nhập lại mật khẩu chưa đúng",
        ]);
        	$user->password = bcrypt($request->pass);
        }
        $user->save();
        return redirect('admin/user/sua/'.$id)->with('thongbao','Bạn đã sửa thành công!');
    }
    public function getXoa($id){
        $user=tintuc::find($id);
        $user->delete();
        return redirect('admin/user/danhsach');
    }
    /*=======================================================================*/

    public function getDangnhapAdmin(){
        return view('admin.login');
    }
    public function postDangnhapAdmin(Request $request){
        $this->validate($request,
        	[
        		'email'=>'required',
        		'password'=>'required'
        	],
        	[
        		'email.required'=>'Bạn chưa nhập Email',
        		'password.required'=>'Bạn chưa nhập Password',
        	]);

		if (Auth::attempt(['email'=>$request->email,'password'=>$request->password])) {
        	return redirect('admin/kadmin');
        }else{
        	return redirect('k_login')->with('thongbao','Đăng nhập không thành công!');
        }
        
        
    }
    public function getDangxuatAdmin(){
        Auth::logout();
        return redirect('k_login');
    }
}
