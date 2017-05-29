@extends('admin.layout.index')
@section('content')
<div class="">
  <h1 class="page-header">Danh sach the loai</h1>
                                                                  
  <div class="table-responsive bd_table">
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
  		<form action="admin/theloai/them" method="post">
  			<input type="hidden" name="_token" value="{{csrf_token()}}">
		    <div class="form-group">
		      	<label for="ten">Tên:</label>
		      	<input type="text" name="ten" class="form-control" id="ten" placeholder="Tên">
		    </div>
		    <!-- <div class="form-group">
		      	<label for="alias">alias:</label>
		      	<input type="text" name="alias" class="form-control" id="alias" placeholder="alias">
		    </div> -->
		    <div class="form-group">
		      	<label for="noibat">Nổi bật:</label>
		      	<input type="checkbox">
		    </div>
		    <button type="submit" class="btn btn-primary">Thêm</button>
		 </form>
  </div>
</div>
@endsection


