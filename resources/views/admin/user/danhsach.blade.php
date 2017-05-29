@extends('admin.layout.index')
@section('content')
<div class="">
  <h1 class="page-header">Danh sách Slide</h1>
  <a href="admin/user/them" class="btn btn-primary">Thêm</a>                                                                           
  <div class="table-responsive bd_table">          
  <table class="table">
    <thead>
      <tr>
        <th width="1%">ID</th>
        <th width="12%">User</th>
        <th width="8%">Email</th>
        <th width="8%">Level</th>
        <th width="8%">Hiển thị</th>
        <th width="15%">active</th>
      </tr>
    </thead>
    <tbody>
    <?php $dem=0; ?>
    @foreach($user as $us)
    <?php $dem++;?>
      <tr>
        <td>{{$dem}}</td>
        <td>{{$us->name}}</td>
        <td>{{$us->email}}</td>
        <td>
        	<!-- {{$us->level}} -->
        	@if($us->level == 1)
        	{{"Admin"}}
        	@else
        	{{"Quản trị viên"}}
        	@endif
        </td>
        <td><input type="checkbox" name="noibat"></td>
        <td class="active_ac">
        	<a href="admin/user/sua/{{$us->id}}" title=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Sửa</a>
        	<a href="admin/user/xoa/{{$us->id}}" title="" style="color:#ff0000;"><i class="fa fa-times" aria-hidden="true"></i>Xóa</a>
        </td>
      </tr>
    @endforeach

    </tbody>
  </table>
  {!!$user->links()!!}
  </div>
</div>
@endsection