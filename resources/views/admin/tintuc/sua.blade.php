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

  @if(session('xoacomment'))
    <div class="alert alert-success">
      {{session('xoacomment')}}
    </div>
  @endif
  @if(session('thongbao'))
    <div class="alert alert-success">
      {{session('thongbao')}}
    </div>
  @endif
      <form action="admin/tintuc/sua/{{$tintuc->id}}" method="post" enctype="multipart/form-data">
      <div class="col-sm-9 col-md-9 them" style="margin-bottom: 15px;">
        <button type="submit" class="btn btn-primary pull-right">Thêm</button>
        <div class="clearfix"></div>
      </div>
      
      <div class="col-lg-9 col-md-9 col-sm-9 clearfix">
        <div class="border_">
          <input type="hidden" name="_token" value="{{csrf_token()}}">
          <div class="form-group">
              <label for="ten">Tên:</label>
              <input type="text" name="ten" class="form-control" id="ten" placeholder="Tên" value="{{$tintuc->tieude}}">
          </div>
          
          
          <div class="form-group">
              <label for="noibat">Nổi bật:</label>
              <input type="checkbox" name="noibat" value="{{$tintuc->noibat}}">
          </div>
          <div class="form-group">
              <label for="hinhanh">Hình ảnh:</label>
              <input type="file" name="hinhanh">
              <input type="text" hidden name="edit_hinhanh" value="{{$tintuc->hinhanh}}">
              <div class="col-lg-2 col-md-2 col-sm-2 img_news row">
                <img src="upload/tintuc/{{$tintuc->hinhanh}}" alt="">
              </div>
          </div>
          <div class="clearfix">`</div>
          <div class="form-group">
              <label for="tomtat">Tóm tắt:</label>
              <textarea class="form-control ckeditor" id="tomtat" row="3" name="tomtat">{{$tintuc->tomtat}}</textarea>
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
              <textarea class="form-control ckeditor" id="noidung" row="3" name="noidung">{{$tintuc->noidung}}</textarea>
              <script>
               CKEDITOR.replace( 'noidung',
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
          <div class="clearfix"></div>
      <div class="table-responsive bd_table">          
        <table class="table">
          <thead>
            <tr>
              <th width="1%">ID</th>
              <th width="12%">Tên tin</th>
              <th width="8%">Người dùng</th>
              <th width="10%">noidung</th>
              <th width="15%">active</th>
            </tr>
          </thead>
          <tbody>
          <?php $dem1=0; ?>
          @foreach($comment as $cm)
          <?php $dem1++;?>
            <tr>
              <td>{{$dem1}}</td>
              <td>{{$tintuc->tieude}}</td>
              <td>{{$cm->nameUser}}</td>
              <td>{{$cm->noidung}}</td>

              <td class="active_ac">
                <a href="admin/comment/xoa/{{$cm->id}}/{{$tintuc->id}}" title="" style="color:#ff0000;"><i class="fa fa-times" aria-hidden="true"></i>Xóa</a>
              </td>
            </tr>
          @endforeach

          </tbody>
        </table>
        </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-3 clearfix border_">
        <div class="form-group">
            <label for="ten">Thể loại:</label>
            <select name="theloai" class="form-control" id="theloai">
            <option value="" selected>Lựa chọn</option>
            @foreach($theloai as $tl)
              <option
                @if($tintuc->loaitin->theloai->id==$tl->id)
                  {{"selected"}}
                @endif
               value="{{$tl->id}}">{{$tl->ten}}</option>
            @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="ten">Loạitin:</label>
            <select name="loaitin" class="form-control" id="loaitin">
            <option value="" selected>Lựa chọn</option>
            @foreach($loaitin as $lt)
              <option
                @if($tintuc->idLoaitin==$lt->id)
                  {{"selected"}}
                @endif
               value="{{$lt->id}}">{{$lt->ten}}</option>
            @endforeach

            </select>
        </div>
      </div>
      
     </form>
<!-- ===================================================================list comment -->
     
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


