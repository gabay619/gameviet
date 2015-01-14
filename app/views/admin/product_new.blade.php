@extends('layouts.admin')

@section('title')
    Thêm mới Sản phẩm
@endsection

@section('content')
    <h3><a href="/admin/products/list">Quản lý Sản phẩm </a> &raquo; Thêm mới Sản phẩm</h3>
    <div class="ajaxMsg"></div>

    {{Form::open(array('url'=>'#', 'class'=>'form-horizontal form-top-margin' , 'role'=>'form'))}}
    {{-- Title --}}
    <div class="form-group">
        {{ Form::label( "txtName" , 'Tên (*)' , array( 'class'=>'col-lg-2 control-label' ) ) }}
        <div class="col-lg-10">
            {{ Form::text( "txtName" , Input::old( "name" ) , array( 'class'=>'form-control' , 'placeholder'=>'Nhập tên Sản phẩm' ) ) }}
        </div>
    </div>

    {{-- Description --}}
    <div class="form-group">
        {{ Form::label( "txtDescription" , 'Mô tả' , array( 'class'=>'col-lg-2 control-label' ) ) }}
        <div class="col-lg-10">
            {{ Form::textarea( "txtDescription" , Input::old( "description" ) , array( 'class'=>'form-control' , 'placeholder'=>'Nhập mô tả', 'style'=>'height:60px' ) ) }}
        </div>
    </div>

    {{-- Prize --}}
    <div class="form-group">
        {{Form::label("txtPrice" , 'Giá (VNĐ)' , array('class'=>'col-lg-2 control-label'))}}
        <div class="col-lg-6">
            {{Form::text('txtPrice',null,array('class'=>'form-control', 'placeholder'=>'Nhập giá'))}}
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

    {{-- category--}}
    <div class="form-group">
        {{ Form::label( "cboCate" , 'Danh mục' , array( 'class'=>'col-lg-2 control-label' ) ) }}
        <div class="col-lg-10">
            {{Form::select('cboCate', $allCates, null, array('class'=>'selectpicker show-tick', 'multiple', 'title'=>'Chọn 1 hoặc nhiều'))}}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label( "chkActive" , 'Active' , array( 'class'=>'col-lg-2 control-label' ) ) }}
        <div class="col-lg-10" >
            <input type="checkbox" id="chkActive" checked style="margin: 10px 0 0 0px" />
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
            //alert('222');

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
            active = $('#chkActive').is(':checked')?1:0;
            imageFile = $('#imgTopic').attr('src');
            category = $("#cboCate").val();
            price = $("#txtPrice").val();

            $.post('/admin/products/new',{
                        name:name, active:active,description:description,
                        imageFile:imageFile, category: category, price:price
                    }
                    ,function(result){
                        $.unblockUI();
                        console.log(result);
                        if(result.success){
                            alert(result.msg);
                            window.location.href = '/admin/products/list';
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

