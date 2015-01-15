@extends('layouts.admin')

@section('title')
    Thêm mới Danh mục
@endsection

@section('content')
    <h3><a href="/admin/categories/list">Quản lý Danh mục </a> &raquo; Thêm mới danh mục</h3>
    <div class="ajaxMsg"></div>

    {{Form::open(array('url'=>'#', 'class'=>'form-horizontal form-top-margin' , 'role'=>'form'))}}
    {{-- Title --}}
    <div class="form-group">
        {{ Form::label( "txtName" , 'Tên (*)' , array( 'class'=>'col-lg-2 control-label' ) ) }}
        <div class="col-lg-10">
            {{ Form::text( "txtName" , Input::old( "name" ) , array( 'class'=>'form-control' , 'placeholder'=>'Nhập tên Danh mục' ) ) }}
        </div>
    </div>

    {{-- Description --}}
    <div class="form-group">
        {{ Form::label( "txtDescription" , 'Mô tả' , array( 'class'=>'col-lg-2 control-label' ) ) }}
        <div class="col-lg-10">
            {{ Form::textarea( "txtDescription" , Input::old( "description" ) , array( 'class'=>'form-control' , 'placeholder'=>'Nhập mô tả', 'style'=>'height:60px' ) ) }}
        </div>
    </div>

    <div class="form-group">
        <div class="col-lg-2">
        </div>
        <div class="col-lg-5">
            <a href="javascript:getTopicImg();" class="btn btn-info btn-sm" >Chọn ảnh đại diện</a>
            &nbsp;
            <a id="btnRemoveTopicImg" href="javascript:removeTopicImg();" class="btn btn-danger btn-sm" >Xóa ảnh</a>
            <div style="background: #F8F8F8; margin: 0 auto; padding: 5px">
                <img id = "imgTopic" style="max-width: 180px; max-height: 180px">
            </div>
            <div>
                <span id="spnFileName" class="bg-info"></span>
            </div>
        </div>
    </div>

    {{Form::button('Lưu', array('class'=> 'btn btn-large btn-primary pull-right', 'onclick'=>'javascript:save()'))}}
    {{Form::close()}}

    <script language="javascript" type="text/javascript">
        $(function() {
            $('#txtName').focus();
            $('.selectpicker').selectpicker();
            $('#btnRemoveTopicImg').hide();
        });

        function getTopicImg(){
            try{
                var finder = new CKFinder();
                finder.basePath = '/lib/ckfinder/';	// The path for the installation of CKFinder (default = "/ckfinder/").
                finder.selectActionFunction = setTopicFile;
                finder.popup();
            }catch(err){
                alert(err);
            }
        }

        function setTopicFile(fileUrl){
            $("#imgTopic").attr("src",  fileUrl );
            $("#btnRemoveTopicImg").show();
            $('#spnFileName').html(fileUrl);
        }

        function removeTopicImg(){
            $("#imgTopic").removeAttr("src");
            $("#btnRemoveTopicImg").hide();
            $('#spnFileName').html('');
        }

        function save(){
            $.blockUI({ message: 'Vui lòng chờ' });
            name = $('#txtName').val();
            description = $('#txtDescription').val();
            imageFile = $('#imgTopic').attr('src');

            $.post('/admin/categories/new',{
                        name:name, description:description,imageFile:imageFile
                    }
                    ,function(result){
                        $.unblockUI();
                        console.log(result);
                        if(result.success){
                            alert(result.msg);
                            window.location.href = '/admin/categories/list';
//                    window.location.assign('/admin/articles/new')
                            //refresh();
                        }else{
                            $('#ajaxMsg').html('<p class="text-danger">'+result.msg+'</p>');
                        }

                    },'json');
        }

        var editor;
        tougleEditor();

        function tougleEditor(){
            if ( editor )
                editor.destroy();
            editor = CKEDITOR.replace( "contentContainer" ,{
                filebrowserBrowseUrl : '/lib/ckfinder/ckfinder.html',
                filebrowserImageBrowseUrl : '/lib/ckfinder/ckfinder.html?Type=Images',
                filebrowserFlashBrowseUrl : '/lib/ckfinder/ckfinder.html?Type=Flash',
                filebrowserUploadUrl : '/lib/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                filebrowserImageUploadUrl : '/lib/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                filebrowserFlashUploadUrl : '/lib/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                customConfig : '/lib/ckeditor/config.js',
                language: 'vi'
            });
        }

    </script>
@endsection

