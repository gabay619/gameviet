@extends('layouts.admin')

@section('title')
    Quản lý danh mục
@endsection

@section('content')

    <div class="form-group">
        <div class="col-lg-10">
            <h3>Quản lý danh mục</h3>
        </div>
        <div class="col-lg-2">
            <a style="margin-top: 15px" href="/admin/categories/new" class="btn btn-primary pull-right">Thêm mới</a>
        </div>
    </div>
    <div style="clear: both"></div>

    <table class="table table-condensed">
        <thead>
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Mô tả</th>
            <th>&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $item)
            <tr>
                <td><a href="/admin/categories/edit/{{$item->id }}">{{ $item->id }}</a></td>
                <td><a href="/admin/categories/edit/{{$item->id }}">{{ $item->name }}</a></td>
                <td><a href="/admin/categories/edit/{{$item->id }}">{{ $item->description }}</a></td>
                <td>
                    <div class="pull-right">
                        <a href="/admin/categories/edit/{{$item->id }}" class="btn btn-sm btn-primary">Sửa</a>
                        <a href="javascript:deleteCategory({{$item->id}})" class="btn btn-sm btn-danger">Xóa</a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <section class="text-center">
        {{$items->links()}}
    </section>

    <script type="text/javascript">
        function deleteCategory(id){
            bootbox.confirm("Bạn chắc chắn muốn xóa?", function(result) {
                if(result){
                    window.location.href = '/admin/categories/delete/' + id;
                }
            });
            $(function(){
                $('.selectpicker').selectpicker();
            });
        }
    </script>
@endsection