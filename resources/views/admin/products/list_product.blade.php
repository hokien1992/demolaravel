@extends('admin.layout.index')
@section('content')
<div class="">
  <h1 class="page-header">Danh sách Loại tin</h1>
  <a href="admin/products/create" class="btn btn-primary">Thêm</a>                                                                           
  <div class="table-responsive bd_table">
  <table class="table">
    <thead>
      <tr>
        <th width="1%">ID</th>
        <th width="12%">Tên</th>
        <th width="8%">image</th>
        <th width="10%">Danh mục</th>
        <th width="8%">Lượt xem</th>
        <th width="8%">Hiển thị</th>
        <th width="15%">active</th>
      </tr>
    </thead>
    <tbody>
    <?php $dem=0; ?>

    @foreach($list_pro as $pro)

    <?php $dem++;?>
      <tr>
        <td>{{$dem}}</td>
        <td>{{$pro->name}}</td>

        <td class="img_news"><img src="{{$pro->image}}" alt="{{$pro->name}}"></td>

        <td>{{$pro->product_cat->name}}</td>
        <td>{{$pro->soluong}}</td>
        <td><input type="checkbox" name="noibat"></td>
        <td class="active_ac">
        	<a href="{{ route('products.edit', $pro->id) }}" title=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Sửa</a>
        	<a href="admin/products/xoa/{{$pro->id}}" title="" style="color:#ff0000;"><i class="fa fa-times" aria-hidden="true"></i>Xóa</a>
        </td>
      </tr>
    @endforeach

    </tbody>
  </table>
  {!!$list_pro->links()!!}
  </div>
</div>
@endsection