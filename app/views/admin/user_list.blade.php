@extends('layouts.admin')

@section('title')
    Danh sách User
@endsection

@section('content')

    <div class="form-group">
        <div class="col-lg-10">
            <h3>Quản lý User</h3>
        </div>
    </div>
    <div style="clear: both"></div>
    {{Form::open(array('url'=>'/admin/users/list','role'=>'form','class'=>'form','method'=>'get'))}}
    <div class="form-group">
        <div class="row">
            <div class="col-xs-2">
                {{Form::select('role', array(''=>'--Vai trò--')+$allRoles, Input::get('role'), array('class'=>'form-control input-sm'))}}
            </div>
            <div class="col-xs-2">
                {{Form::text('username',Input::get('username'),array('class'=>'form-control input-sm','placeholder'=>'Username:'))}}
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
            <th>Username</th>
            <th>Tài khoản</th>
            <th>Quyền</th>
        </tr>
        </thead>
        <tbody>
        @foreach($allUsers as $item)
            <tr>
                <td>{{ $item->UserId }}</td>
                <td>{{ $item->UserName }}</td>
                <td>{{ number_format($item->RemainMoney) }} Đ</td>
                <td>
                    {{Form::select('role', array(''=>'--Vai trò--')+$allRoles, $item->roles()->lists('role_id'), array('class'=>'selectpicker show-tick edit-role', 'multiple', 'title'=>'Chọn 1 hoặc nhiều', 'onchange'=>'javascript:editRole('.$item->UserId.')', 'id'=>'cboRole_'.$item->UserId))}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>


    <section class="text-center">
        {{$allUsers->appends(array(
        'username'=>Input::get('title'),
        'role'=>Input::get('role')
        ))->links()}}
    </section>

    <script type="text/javascript">
        $(function(){

        });
        function editRole(id){
            var roles = $("#cboRole_"+id).val();
            $.post('/admin/users/edit-role',{
                user_id: id, roles:roles
            }, function(result){
                console.log(result);
            });
        }
    </script>
@endsection