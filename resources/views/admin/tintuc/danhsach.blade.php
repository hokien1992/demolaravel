@extends('admin.layout.index')
@section('content')
<div class="">
  <h1 class="page-header">Danh sách Loại tin</h1>
  <a href="admin/tintuc/them" class="btn btn-primary">Thêm</a>                                                                           
  <div class="table-responsive bd_table">          
  <table class="table">
    <thead>
      <tr>
        <th width="1%">ID</th>
        <th width="12%">Tên</th>
        <!-- <th width="8%">alias</th> -->
        <th width="8%">image</th>
        <!-- <th>Tóm tắt</th> -->
        <th width="10%">Thể loại</th>
        <th width="8%">tintuc</th>
        <th width="3%">Lượt xem</th>
        <th width="8%">Hiển thị</th>
        <th width="15%">active</th>
      </tr>
    </thead>
    <tbody>
    <?php $dem=0; ?>
    @foreach($tintuc as $tt)
    <?php $dem++;?>
      <tr>
        <td>{{$dem}}</td>
        <td>{{$tt->tieude}}</td>
        <!-- <td>{{$tt->alias}}</td> -->
        <td class="img_news"><img src="upload/tintuc/{{$tt->hinhanh}}" alt="{{$tt->tieude}}"></td>
        <!-- <td>{{$tt->tomtat}}</td> -->
        <td>{{$tt->loaitin->theloai->ten}}</td>
        <td>{{$tt->loaitin->ten}}</td>
        <td>{{$tt->soluotxem}}</td>
        <!-- <td><{{$tt->noibat}}</td> -->
        <td><input type="checkbox" name="noibat"></td>
        <td class="active_ac">
        	<a href="admin/tintuc/sua/{{$tt->id}}" title=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Sửa</a>
        	<a href="admin/tintuc/xoa/{{$tt->id}}" title="" style="color:#ff0000;"><i class="fa fa-times" aria-hidden="true"></i>Xóa</a>
        </td>
      </tr>
    @endforeach

    </tbody>
  </table>
  {!!$tintuc->links()!!}
  </div>
</div>
@endsection