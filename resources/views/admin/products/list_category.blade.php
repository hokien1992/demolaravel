@extends('admin.layout.index')
@section('content')
<div class="">
  <h1 class="page-header">Danh sách Loại tin</h1>
  <a href="admin/productCategory/create" class="btn btn-primary">Thêm</a>                                                                           
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
    @foreach($list_cat as $list)
      <tr>
        <td>{{$list->id}}</td>
        <td>{{$list->name}}</td>
        <td>{{$list->alias}}</td>
        <td width="8%">
        @if($list->image!=null)
        <img src="{{$list->image}}" alt="" width="100%">
        @endif
        </td>
        <td><input type="checkbox" name=""></td>
        <td class="active_ac">
        	<!-- <a href="admin/productCategory/edit/{{$list->id}}" title=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Sửa</a> -->
          <a href="{{ route('productCategory.edit', $list->id) }}" title=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Sửa</a>
          <!-- <a href="{{ route('productCategory.destroy', $list->id) }}" title="" style="color: #ff0000;"><i class="fa fa-times" aria-hidden="true" ></i>Xóa</a>
          <a class="trashButton" href="{{ URL::route('productCategory.destroy',$list->id) }}" style="cursor: pointer;" data-method="delete" rel="nofollow" data-confirm="Bạn có muốn xóa danh mục này không?">
            <i class="fa fa-trash-o"></i>
          </a> -->
          {{ Form::open(array('method' => 'Delete', 'route' => array('productCategory.destroy', $list->id), 'class' => 'delete-form')) }}
              <button class="btn btn-danger"><i class="fa fa-pencil"></i> Delete</button>
          {{ Form::close() }}
        	<!-- <a href="admin/productCategory/delete/{{$list->id}}" title="" style="color:#ff0000;"><i class="fa fa-times" aria-hidden="true"></i>Xóa</a> -->
        </td>
      </tr>
    @endforeach

    </tbody>
  </table>
  {!!$list_cat->links()!!}
  </div>
</div>
@endsection