<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/jquery-ui/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/bootstrap-select/bootstrap-select.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/bootstrap-tag-input/bootstrap-tagsinput.css') }}">

    <script src="{{ asset('/jquery/jquery-2.1.0.min.js') }}"></script>
    <script src="{{ asset('/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('lib/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('lib/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('lib/bootstrap-tag-input/bootstrap-tagsinput.min.js') }}"></script>
</head>
<body>
<header>
    <nav class="navbar navbar-default navbar-fixed-top">
        <section class="container">
            <section class="navbar-header">
                <a href="/admin" class="navbar-brand">ADMIN</a>
            </section>
            <section class="collapse navbar-left navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="/admin/users/list" class="dropdown-toggle">User</a>
                    </li>
                    <li>
                        <a href="/admin/products/list" class="dropdown-toggle" data-toggle="dropdown">Sản phẩm <b class="caret"></b></a>
                        <ul class="dropdown-menu multi-level">
                            <li>
                                <a href="/admin/products/list">Danh sách Sản phẩm</a>
                            </li>
                            <li>
                                <a href="/admin/products/new">Sản phẩm mới</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="/admin/categories/list" class="dropdown-toggle">Danh Mục</a>
                    </li>
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Báo cáo <b class="caret"></b></a>
                        <ul class="dropdown-menu multi-level">
                            <li>
                                <a href="/admin/reports/txn-list">Tra cứu giao dịch</a>
                            </li>
                            <li>
                                <a href="/admin/reports/summarize-by-user">Sản lượng theo User</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </section>
            <section class="navbar-right">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">Xin chào <b>congchinh619</b></a>
                    </li>
                </ul>
            </section>
        </section>
    </nav>
</header>
<main style="padding-top: 70px">
    <section class="container">
        <section class="row">
            <section class="col-sm-12">
                @yield('content')
            </section>
        </section>
    </section>
</main>
<script>
    $(function() {
        $("#start_date" ).datepicker({ dateFormat: 'dd-mm-yy' }).val();
        $("#end_date").datepicker({ dateFormat: 'dd-mm-yy' }).val();
        $('.selectpicker').selectpicker();
    });
</script>
<script src="{{ asset('js/jquery.tagsinput.min.js') }}"></script>
<script src="{{ asset('js/redactor.min.js') }}"></script>
<script src="{{ asset('js/bootbox.js') }}"></script>
<script src="{{ asset('js/toastr.min.js') }}"></script>
<script src="{{ asset('js/blockUI.js') }}"></script>
<script src="{{ asset('lib/bootstrap-select/bootstrap-select.min.js') }}"></script>

<script src="{{ asset('lib/ckfinder/ckfinder.js') }}"></script>
</body>
</html>