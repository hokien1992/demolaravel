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
  		<!-- <form action="{{route('products.update',$product->id)}}" method="PATCH"  enctype="multipart/form-data"> -->
      {!! Form::model($product,array('route'=>array('products.update',$product->id),'method'=>'PUT','enctype'=>'multipart/form-data')) !!}
  			<div class="form-group">
            <label for="ten">Tên:</label>
            <input type="text" name="name" class="form-control" id="name" value="{{$product->name}}" placeholder="Tên">
        </div>
        
        <div class="form-group">
            <label for="ten">Danh mục cha:</label>
            <select name="id_category" class="form-control" id="id_category">
              <option value="0" selected>Lựa chọn</option>
              @foreach($cate as $cat)
              @if($product->id_category==$cat->id)
              <option value="{{$cat->id}}" selected><?=$cat->name?></option>
              @else
              <option value="{{$cat->id}}"><?=$cat->name?></option>
              @endif
              @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="alias">alias:</label>
            <input type="text" name="alias" value="{{$product->alias}}" class="form-control" id="alias" placeholder="alias">
        </div>
        <div class="form-group">
            <label for="soluong">Số lượng:</label>
            <input type="text" name="soluong" value="{{$product->soluong}}" class="form-control" id="soluong" placeholder="Số lượng">
        </div>
        <div class="form-group">
            <label for="noibat">Ảnh:</label>
            <input type="file" name="image" id="image">
            <div class="col-md-2 col-lg-2 col-sm-3">
              <img src="{{$product->image}}" alt="" style="width: 100%;">
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="form-group">
            <label for="noibat">Nổi bật:</label>
            <input type="checkbox" value="1" <?=$product->noibat==1?'checked':'';?>>
        </div>
        <div class="clearfix">`</div>
          <div class="form-group">
              <label for="tomtat">Tóm tắt:</label>
              <textarea class="form-control ckeditor" id="tomtat" row="3" name="tomtat">
              {{$product->tomtat}}</textarea>
              <script>
               CKEDITOR.replace( 'tomtat',
                {
                  filebrowserBrowseUrl : 'admin_assets/ckfinder/ckfinder.html',
                  filebrowserImageBrowseUrl : 'admin_assets/ckfinder/ckfinder.html?type=Images',
                  filebrowserFlashBrowseUrl : 'admin_assets/ckfinder/ckfinder.html?type=Flash',
                  filebrowserUploadUrl : 'admin_assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                  filebrowserImageUploadUrl : 'admin_assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                  filebrowserFlashUploadUrl : 'admin_assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
                });
                </script>
          </div>
          <div class="form-group">
              <label for="noidung">Nội dung:</label>
              <textarea class="form-control ckeditor" id="chitiet" row="3" name="chitiet">{{$product->chitiet}}</textarea>
              <script>
               CKEDITOR.replace( 'chitiet',
                {
                  filebrowserBrowseUrl : 'admin_assets/ckfinder/ckfinder.html',
                  filebrowserImageBrowseUrl : 'admin_assets/ckfinder/ckfinder.html?type=Images',
                  filebrowserFlashBrowseUrl : 'admin_assets/ckfinder/ckfinder.html?type=Flash',
                  filebrowserUploadUrl : 'admin_assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                  filebrowserImageUploadUrl : 'admin_assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                  filebrowserFlashUploadUrl : 'admin_assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
                });
                </script>
       
          </div>
		    <button type="submit" class="btn btn-primary">Thêm</button>
        <!-- {!! Form::submit('Them', array('class'=>'btn btn-primary')) !!}
		 {!! Form::close() !!} -->
     <!-- </form> -->
     {!!Form::close() !!}
  </div>
</div>
@endsection


