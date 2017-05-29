@extends('admin.layout.index')
@section('content')
<div class="">
  <h1 class="page-header">Danh sách Tin tin</h1>
                                                                  
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
  		<form action="admin/slide/them" method="post" enctype="multipart/form-data">
      <div class="col-sm-9 col-md-9 them" style="margin-bottom: 15px;">
        <button type="submit" class="btn btn-primary pull-right">Thêm</button>
        <div class="clearfix"></div>
      </div>
      
      <div class="col-lg-9 col-md-9 col-sm-9 clearfix">
        <div class="border_">
          <input type="hidden" name="_token" value="{{csrf_token()}}">
          <div class="form-group">
              <label for="ten">Tên:</label>
              <input type="text" name="ten" class="form-control" id="ten" placeholder="Tên">
          </div>
          <div class="form-group">
              <label for="ten">Link:</label>
              <input type="text" name="link" class="form-control" id="ten" placeholder="Tên">
          </div>
          
          <div class="form-group">
              <label for="noibat">Nổi bật:</label>
              <input type="checkbox" name="noibat" value="0">
          </div>
          <div class="form-group">
              <label for="hinhanh">Hình ảnh:</label>
              <input type="file" name="hinhanh">
          </div>
          <div class="form-group">
              <label for="tomtat">Nội dung:</label>
              <textarea class="form-control ckeditor" id="demo" row="3" name="noidung"></textarea>
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
  $('#theloai').change(function(){
    var idTheloai=$(this).val();
    $.get('admin/ajax/loaitin/'+idTheloai,function(data){
      $('#loaitin').html(data);
    });
  });
});

</script>
@endsection


