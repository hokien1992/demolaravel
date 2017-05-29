@extends('admin.layout.index')
@section('content')
<div class="">
  <h1 class="page-header">Thêm danh mục sản phẩm</h1>
                                                                  
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
  		<!-- <form action="{{route('productCategory.update',$cate->id)}}" method="PATCH"  enctype="multipart/form-data"> -->
      {!! Form::model($cate,array('route'=>array('productCategory.update',$cate->id),'method'=>'PUT')) !!}
  			<input type="hidden" name="_token" value="{{csrf_token()}}">
		    <div class="form-group">
		      	<label for="ten">Tên:</label>
		      	<input type="text" name="name" class="form-control" id="name" placeholder="Tên" value="{{$cate->name}}">
		    </div>
		    <div class="form-group">
		      	<label for="alias">alias:</label>
		      	<input type="text" name="alias" value="{{$cate->alias}}" class="form-control" id="alias" placeholder="alias">
		    </div>
		    <div class="form-group">
		      	<label for="noibat">Nổi bật:</label>
		      	<input type="checkbox" <?=$cate->noibat==1?'checked':'';?> value="1">
		    </div>
		    <button type="submit" class="btn btn-primary">Thêm</button>
        <!-- {!! Form::submit('Them', array('class'=>'btn btn-primary')) !!}
		 {!! Form::close() !!} -->
     <!-- </form> -->
     {!!Form::close() !!}
  </div>
</div>
@endsection


