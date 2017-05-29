@extends('admin.layout.index')
@section('content')
<div class="">
  <h1 class="page-header">Danh sách Slide</h1>
  <a href="admin/slide/them" class="btn btn-primary">Thêm</a>                                                                           
  <div class="table-responsive bd_table">          
  <table class="table">
    <thead>
      <tr>
        <th width="1%">ID</th>
        <th width="12%">Tên</th>
        <th width="2%">Hình ảnh</th>
        <th width="8%">link</th>
        <th width="8%">Hiển thị</th>
        <th width="15%">active</th>
      </tr>
    </thead>
    <tbody>
    <?php $dem=0; ?>
    @foreach($slide as $sl)
    <?php $dem++;?>
      <tr>
        <td>{{$dem}}</td>
        <td>{{$sl->ten}}</td>
        <td width="6%" class="img_news"><img src="upload/slide/{{$sl->hinhanh}}" alt=""></td>
        <td>{{$sl->link}}</td>
        <td><input type="checkbox" name="noibat"></td>
        <td class="active_ac">
        	<a href="admin/slide/sua/{{$sl->id}}" title=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Sửa</a>
        	<a href="admin/slide/xoa/{{$sl->id}}" title="" style="color:#ff0000;"><i class="fa fa-times" aria-hidden="true"></i>Xóa</a>
        </td>
      </tr>
    @endforeach

    </tbody>
  </table>
  {!!$slide->links()!!}
  </div>
</div>
@endsection