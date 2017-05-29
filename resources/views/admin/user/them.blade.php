@extends('admin.layout.index')
@section('content')
<div class="">
  <h1 class="page-header">Thêm thành viên</h1>
                                                                  
  <div class="table-responsive bd_table_them">
  @if(count($errors)>0)
  		<div class="alert alert-danger">
  			@foreach($errors->all() as $err)
  			    {{$err}}<br>
  			@endforeach
  		</div>
  @endif

  @if(session('thongbao'))
  	<div class="alert alert-success">
  		{{session('thongbao')}}
  	</div>
  @endif
  		<form action="admin/user/them" method="post" enctype="multipart/form-data">
	      <div class="col-sm-9 col-md-9 them" style="margin-bottom: 15px;">
	        <button type="submit" class="btn btn-primary pull-right">Thêm</button>
	        <div class="clearfix"></div>
	      </div>
	      
	      <div class="col-lg-9 col-md-9 col-sm-9 clearfix">
	        <div class="border_">
	          <input type="hidden" name="_token" value="{{csrf_token()}}">
	          <div class="form-group">
	              <label for="ten">Tên:</label>
	              <input type="text" name="name" class="form-control" id="ten" placeholder="name">
	          </div>
	          <div class="form-group">
	              <label for="ten">Email:</label>
	              <input type="email" name="email" class="form-control" id="email" placeholder="Email">
	          </div>
	          <div class="form-group">
	              <label for="ten">Mật khẩu:</label>
	              <input type="password" name="pass" class="form-control" id="pass" placeholder="Mật khẩu">
	          </div>
	          <div class="form-group">
	              <label for="ten">Nhập lại mật khẩu:</label>
	              <input type="password" name="repass" class="form-control" id="repass" placeholder="Nhập lại mật khẩu">
	          </div>
	          <div class="form-group">
	              <label for="noibat">Phân quyền:</label>
	              <input type="checkbox" name="level" value="1">Admin
	              <input type="checkbox" name="level" value="0">Quản trị viên
	          </div>
	          <!-- <div class="form-group">
	              <label for="hinhanh">Hình ảnh:</label>
	              <input type="file" name="hinhanh">
	          </div> -->
	          <!-- <div class="form-group">
	              <label for="tomtat">Tóm tắt:</label>
	              <textarea class="form-control ckeditor" id="demo" row="3" name="tomtat"></textarea>
	          </div>
	          <div class="form-group">
	              <label for="noidung">Nội dung:</label>
	              <textarea class="form-control ckeditor" id="demo" row="3" name="noidung"></textarea>
	          </div> -->
	          <button type="submit" class="btn btn-primary">Thêm</button>
	        </div>
	      </div>
		 </form>
  </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
$(document).ready(function(){
  $('#theloai').change(function(){
    var idTheloai=$(this).val();
    $.get('admin/ajax/loaitin/'+idTheloai,function(data){
      $('#loaitin').html(data);
    });
  });
});

</script>
@endsection


