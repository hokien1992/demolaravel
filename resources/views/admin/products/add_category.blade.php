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
  		<form action="{{route('productCategory.store')}}" method="post" enctype="multipart/form-data">
  			{{ csrf_field() }}
        <!-- {{ method_field('PUT') }} -->
		    <div class="form-group">
		      	<label for="ten">Tên:</label>
		      	<input type="text" name="name" class="form-control" id="name" placeholder="Tên">
		    </div>
        <!-- <div class="form-group">
                        <label for="name">Tên:</label>
                        
                        {!! 
                            Form::text(
                                'name', 
                                null, 
                                array(
                                    'class'=>'form-control',
                                    'placeholder' => 'Ingresa el nombre...',
                                    'autofocus' => 'autofocus'
                                )
                            ) 
                        !!}
                    </div> -->
        <!-- <div class="form-group">
            <label for="ten">Danh mục cha:</label>
            <select name="parent_id" class="form-control" id="sel1">
              <option value="0" selected>Lựa chọn</option>
              <option value="">Danh mục 1</option>
              <option value="">Danh mục 1</option>
              <option value="">Danh mục 1</option>
              <option value="">Danh mục 1</option>
              <option value="">Danh mục 1</option>
            </select>
        </div> -->
		    <div class="form-group">
		      	<label for="alias">alias:</label>
		      	<input type="text" name="alias" class="form-control" id="alias" placeholder="alias">
		    </div>
        <div class="form-group">
            <label for="noibat">Ảnh:</label>
            <input type="file" name="image" id="image">
        </div>
		    <div class="form-group">
		      	<label for="noibat">Nổi bật:</label>
		      	<input type="checkbox" value="1">
		    </div>
		    <button type="submit" class="btn btn-primary">Thêm</button>
        <!-- {!! Form::submit('Them', array('class'=>'btn btn-primary')) !!}
		 {!! Form::close() !!} -->
     </form>
  </div>
</div>
@endsection


