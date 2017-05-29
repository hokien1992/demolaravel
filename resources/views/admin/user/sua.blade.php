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
  		<form action="admin/user/sua/{{$user->id}}" method="post" enctype="multipart/form-data">
	      <div class="col-sm-9 col-md-9 them" style="margin-bottom: 15px;">
	        <button type="submit" class="btn btn-primary pull-right">Thêm</button>
	        <div class="clearfix"></div>
	      </div>
	      
	      <div class="col-lg-9 col-md-9 col-sm-9 clearfix">
	        <div class="border_">
	          <input type="hidden" name="_token" value="{{csrf_token()}}">
	          <div class="form-group">
	              <label for="ten">Tên:</label>
	              <input type="text" name="name" class="form-control" id="ten" placeholder="name" value="{{$user->name}}">
	          </div>
	          <div class="form-group">
	              <label for="ten">Email:</label>
	              <input type="email" name="email" class="form-control" id="email" placeholder="Email" readonly="" value="{{$user->email}}">
	          </div>
	          <div class="form-group">
	          	 <input type="checkbox" name="changepass" id="changpass"><strong>Đổi mật khẩu</strong>
	          	 <div class="clearfix"></div>
	              <label for="ten">Mật khẩu:</label>
	              <input type="password" name="pass" class="form-control password" id="pass" placeholder="Mật khẩu" disabled="">
	          </div>
	          <div class="form-group">
	              <label for="ten">Nhập lại mật khẩu:</label>
	              <input type="password" name="repass" class="form-control password" id="repass" placeholder="Nhập lại mật khẩu" disabled="">
	          </div>
	          <div class="form-group">
	              <label for="noibat">Phân quyền:</label>
	              <input type="checkbox"
	              	@if($user->level==1)
	              		{{"checked"}}
	              	@endif
	               name="level" value="1">Admin
	              <input type="checkbox"
	              	@if($user->level==0)
	              		{{"checked"}}
	              	@endif
	               name="level" value="0">Quản trị viên
	          </div>
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
	$('#changpass').change(function(){
		if($(this).is(":checked")){
			$('.password').removeAttr('disabled');
		}else
		{
			$('.password').attr('disabled','');
		}
	});
});

</script>
@endsection



