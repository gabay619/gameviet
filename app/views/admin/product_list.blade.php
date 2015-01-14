@extends('layouts.admin')

@section('title')
    Danh sách sản phẩm
@endsection

@section('content')

    <div class="form-group">
        <div class="col-lg-10">
            <h3>Quản lý Sản phẩm</h3>
        </div>
        <div class="col-lg-2">
            <a style="margin-top: 15px" href="/admin/products/new" class="btn btn-primary pull-right">Thêm mới</a>
        </div>
    </div>
    <div style="clear: both"></div>
    {{Form::open(array('url'=>'/admin/products/list','role'=>'form','class'=>'form','method'=>'get'))}}
    <div class="form-group">
        <div class="row">
            <div class="col-xs-2">
                {{Form::select('category_id', array(''=>'--Tìm theo nhóm--')+$allCates, Input::get('category_id'), array('class'=>'form-control input-sm'))}}
            </div>
            <div class="col-xs-2">
                {{Form::text('name',Input::get('name'),array('class'=>'form-control input-sm','placeholder'=>'Tên:'))}}
            </div>
            <div class="col-xs-2">
                {{Form::select('active',array(''=>'-- Active --','0'=>'Không','1'=>'Có'),Input::get('active'),array('class'=>'form-control input-sm'))}}
            </div>
            <div class="col-xs-1">
                {{Form::button('Tìm', array('class'=>'btn btn-success btn-sm', 'type'=>'submit'))}}
            </div>
        </div>
    </div>
    {{Form::close()}}
    <div style="clear: both"></div>

    <table class="table table-condensed">
        <thead>
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Giá</th>
            <th>Active</th>
            <th>&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $item)
            <tr>
                <td><a href="/admin/products/edit/{{$item->id }}">{{ $item->id }}</a></td>
                <td><a href="/admin/products/edit/{{$item->id }}">{{ $item->name }}</a></td>
                <td><a href="/admin/products/edit/{{$item->id }}">{{ number_format($item->price) }} Đ</a></td>
                <td><a href="/admin/products/edit/{{$item->id }}">{{ $item->active }}</a></td>
                <td>
                    <div class="pull-right">
                        <a href="/admin/products/edit/{{$item->id }}" class="btn btn-sm btn-primary">Sửa</a>
                        <a href="javascript:deleteProduct({{$item->id}})" class="btn btn-sm btn-danger">Xóa</a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <section class="text-center">
        {{$items->appends(array(
        'name'=>Input::get('title'),
        'active'=>Input::get('active'),
        'category_id'=>Input::get('category_id')
        ))->links()}}
    </section>

    <script type="text/javascript">
        function deleteProduct(id){
            bootbox.confirm("Bạn chắc chắn muốn xóa?", function(result) {
                if(result){
                    window.location.href = '/admin/articles/delete/' + id;
                }
            });
            $(function(){
                $('.selectpicker').selectpicker();
            });
        }
    </script>
@endsection