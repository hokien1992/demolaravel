@extends('admin.layout.index')
@section('content')
<div class="">
  <h1 class="page-header">Danh sach the loai</h1>
  <a href="admin/theloai/them" class="btn btn-primary">Thêm</a>                                                                           
  <div class="table-responsive bd_table">          
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Tên</th>
        <th>alias</th>
        <th>image</th>
        <th>Hiển thị</th>
        <th>active</th>
      </tr>
    </thead>
    <tbody>
    @foreach($theloai as $tl)
      <tr>
        <td>{{$tl->id}}</td>
        <td>{{$tl->ten}}</td>
        <td>{{$tl->alias}}</td>
        <td>image</td>
        <td><input type="checkbox" name=""></td>
        <td class="active_ac">
        	<a href="admin/theloai/sua/{{$tl->id}}" title=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Sửa</a>
        	<a href="admin/theloai/xoa/{{$tl->id}}" title="" style="color:#ff0000;"><i class="fa fa-times" aria-hidden="true"></i>Xóa</a>
        </td>
      </tr>
    @endforeach

    </tbody>
  </table>
  {!!$theloai->links()!!}
  </div>
</div>
@endsection