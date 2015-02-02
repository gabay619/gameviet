<!DOCTYPE html>
<html lang="nl" class=""><!-- InstanceBegin template="/Templates/main.dwt.php" codeOutsideHTMLIsLocked="false" --><!--<![endif]--><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>Game Việt 467 Hoàng Quốc Việt</title>
    <!-- InstanceEndEditable -->
<!--<base href="http://www.lotteria.vn/">--><base href=".">
<link rel="stylesheet" href="/lotte/css/app.css">
<link rel="stylesheet" href="/lotte/css/popup.css">
 <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
 <script src="/jquery/jquery-2.1.0.min.js"></script>
    <script src="/lotte/files/jquery.hoverIntent.minified.js"></script>
    {{--<script src="/lotte/files/jquery.bxslider.js"></script>--}}
    {{--<script type="text/javascript" src="/lotte/files/jquery.cycle2.min.js"></script>--}}
    <script src="/lotte/files/jquery-ui-1.10.3.custom.min.js"></script>
    {{--<script src="/lotte/files/plax.js"></script>--}}
    <script src="/lotte/files/jquery.jscrollpane.min.js"></script>
    <script src="/lotte/files/jquery.mmenu.min.js"></script>
    <script src="/lotte/files/scripts.js"></script>
    <script src="/bootstrap/js/bootstrap.min.js"></script>

    {{--<link rel="stylesheet" type="text/css" href="/lotte/files/jquery.fancybox.css" media="screen">--}}
    {{--<script type="text/javascript" src="/lotte/files/global.js"></script>--}}
<!-- InstanceBeginEditable name="head" -->
    {{--<script src="/lotte/files/plax.js"></script>--}}
<!-- InstanceEndEditable -->
<meta name="description" content="VIETNAM LOTTERIA CO.,LTD - Speed, Service and Smile">
<meta name="keywords" content="lotteria, lotteria vietnam, thực đơn lotteria, menu lotteria, lotteria menu, lotteria khuyen mai, lotteria tuyển dụng, ga ran lotteria, lotteria hà nội, lotteria hcm, lotteria nha trang, lotteria đà nẵng, bảng giá lotteria">

<meta name="copyright" content="Lotteria">
<style type="text/css">.fancybox-margin{margin-right:17px;}</style><style type="text/css"></style></head>

<body class="vi-lang">
<div class="mm-page">
<div id="spinner"></div>
<div id="top" class="clearfix">
    <div class="wrapper clearfix">
        <nav class="top-bar-section clearfix">
            <ul class="left clearfix">
                <li class="item02 home hide-mobile"><a href="/"><i></i></a></li>
                <li class="item02 has-sub hide-mobile">
                    <a href="javascript:;">Thực đơn<span class="arr"></span></a>
                    <div class="hidden-sub">
                        <div class="wrapper">
                            <ul class="sub-nav">
                                @foreach(CommonHelper::getCatesByGroup(GROUP_CODE_MENU) as $aCate)
                                <li>
                                    <a href="/{{$aCate->alias}}">
                                        <span class="thumb"><img src="{{$aCate->path}}" alt="ill1" style="width:136px;height:118px;"></span>
                                        <span class="shadow"><img src="/lotte/files/s01.png" alt="s01" style="width:136px;height:40px"></span>
                                        <span class="text">{{$aCate->name}}</span>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="item03 hide-mobile has-sub">
                    <a href="#">Thẻ game<span class="arr"></span></a>
                    <div class="hidden-sub">
                        <div class="wrapper">
                            <ul class="sub-nav">
                                @foreach(CommonHelper::getCatesByGroup(GROUP_CODE_GAME_CARD) as $aCate)
                                <li>
                                    <a href="/{{$aCate->alias}}">
                                        <span class="thumb"><img src="{{$aCate->path}}" alt="ill1" style="width:136px;height:118px;"></span>
                                        <span class="shadow"><img src="/lotte/files/s01.png" alt="s01" style="width:136px;height:40px"></span>
                                        <span class="text">{{$aCate->name}}</span>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="item04 hide-mobile has-sub">
                    <a href="#">Thẻ điện thoại<span class="arr"></span></a>
                    <div class="hidden-sub">
                        <div class="wrapper">
                            <ul class="sub-nav">
                                @foreach(CommonHelper::getCatesByGroup(GROUP_CODE_PHONE_CARD) as $aCate)
                                <li>
                                    <a href="/{{$aCate->alias}}">
                                        <span class="thumb"><img src="{{$aCate->path}}" alt="ill1" style="width:136px;height:118px;"></span>
                                        <span class="shadow"><img src="/lotte/files/s01.png" alt="s01" style="width:136px;height:40px"></span>
                                        <span class="text">{{$aCate->name}}</span>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="item05 logo"><a href="#"><img src="/lotte/files/logo.png" alt="logo"></a></li>
                <li class="item06 hide-mobile"><a href="#">Xin chào, {{Auth::user()->UserName}}</a></li>
                <li class="item07 hide-mobile"><a href="#">{{Auth::user()->RemainMoney}}</a></li>
                <li class="item08 search"><a href="javascript:void(0);" class="pop-search"><i></i></a></li>
                <li class="item09 cart"><a href="#showOrder" data-toggle="modal"><i></i><span class="cartNumber" id="cart">0</span></a></li>
                {{--<li class="item10 lang"><a href="#">EN</a></li>--}}
            </ul>
        </nav>
        <a href="http://www.lotteria.vn/#sidebar" class="icon i-mobile-menu alt"> </a>
    </div>



</div>
<!-- <div id="wrap-pop-search">
  <div id="search">
    <div class="frame-middle">
      <div class="frame-middle-inner">
        <form action="http://www.lotteria.vn/" class="search-form clearfix radio">
          <label>SEARCH.</label>
          <input type="text" value="" class="text" name="str">
          <input type="submit" class="icon i-submit">
          <a href="http://www.lotteria.vn/#" class="icon i-close close-pop-search" id="close">Close</a>
          <div class="option-search radio">
            <label for="sp">
              <span class="radio-container"><span class="radio-container"><input id="sp" type="radio" name="search_option" value="1" checked=""><span class="radio selected"></span></span><span class="radio selected"></span><span class="radio"></span></span>Sản phẩm</label>
            <label for="tt">
              <span class="radio-container"><span class="radio-container"><input id="tt" type="radio" name="search_option" value="2"><span class="radio"></span></span><span class="radio"></span><span class="radio"></span></span>Tin tức</label>
          </div>
        </form>
      </div>
    </div>
  </div>
</div> -->
<div id="middle" class="clearfix"><!-- InstanceBeginEditable name="template_content" -->
    <!-- <div class="banner-product banner-cat-07">
        <div class="wrapper">
            <div class="layer-flax layer-01" style="top: 49.6px; left: -10.8636026686434px;"></div>
            <div class="layer-flax layer-02" style="top: 61.7333333333333px; left: 354.757598220904px;"></div>
            <div class="layer-flax layer-03" style="top: 70.3333333333333px; left: 1134.89399555226px;"></div>
            <div class="layer-flax layer-04" style="top: 5.73333333333333px; left: -7.24240177909563px;"></div>
            <div class="layer-flax layer-05" style="top: 5.73333333333333px; left: -7.24240177909563px;"></div>
        </div>
    </div> -->
    <div class="wrapper wrap-content">

        <div class="wrap-pro">
            @yield('content')
        </div>

<div style="margin-top:10px;">
</div>

<!-- Modal -->
<div class="modal fade" id="showOrder" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="orderName">Giỏ hàng</h4>
      </div>
      <div class="modal-body">
        <table class="table table-bordered" id="order-table">
            <thead style="background: #3276b1;color: #fff;">
                <tr>
                    <td style="text-align: center">Tên</td>
                    <td style="text-align: center">Số lượng</td>
                    <td style="text-align: center">Tổng</td>
                    <td style="text-align: center">Hành động</td>
                </tr>
            </thead>
            <tbody>
            @foreach(CommonHelper::getAllNewOrderByUser(Auth::user()->UserId) as $anOrder)
            <tr>
                <td>{{$anOrder->product_name}}</td>
                <td style="text-align: center">{{$anOrder->number}}</td>
                <td>{{number_format($anOrder->amount)}}</td>
                <td style="text-align: center; width: 200px">
                    <button class="btn btn-danger" onclick="javascript:deleteOrder({{$anOrder->id}})">Hủy</button>
                    <button class="btn btn-success" onclick="javascript:completeOrder({{$anOrder->id}})">Đã nhận</button>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>
<!-- InstanceEndEditable --></div>
<div id="footer">
  <div class="copy-footer">
        <div class="wrapper clearfix">
            <div class="copyright">
                ©2014 Game Việt 467 Hoàng Quốc Việt  &nbsp;&nbsp;&nbsp;
                <a href="http://facebook.com/gabay619" target="_blank">Site by GaBay </a>
            </div>

            <div class="right-footer fright">
                <a href="https://www.facebook.com/game18cong" target="_blank" class="icon fb">Facebook</a>
                <a href="#" target="_blank" class="icon gp">Google</a>
                <a href="#" class="icon yt">Youtube</a>
            </div>
            <ul class="insset-footer fright">
                <li><a href="#">Giới thiệu</a></li>
                <li><a href="#">Liên hệ</a></li>
            </ul>
        </div>
    </div>
</div></div>


<script>
    function formatNumber(number,decimal)
    {
        var number = number.toFixed(decimal) + '';
        var x = number.split('.');
        var x1 = x[0];
        var x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + ',' + '$2');
        }
        return x1 + x2;
    }
    function unformatNumber(number)
    {
        return parseFloat(number.replace(/[^0-9-.]/g, ''));
    }
    $(function(){
        $(".number").keyup(function(){
           var price = unformatNumber($(this).parents('.order-info').find('.price').html());
           console.log(price);
           var number = $(this).val();
//           if (number !== parseInt(number, 10)){
//                  alert("Số lượng phải là số tự nhiên!");
//                  return;
//           }
//           console.log(number);

           var totalprice = price*number;
            console.log(totalprice);
            $(this).parents('.modal-content').find('.total').html(formatNumber(totalprice,0));
        });

        $("#cart").html($("#order-table tbody tr").size());
    });

    function isNumberKey(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }

    function order(id){
        $.blockUI({ message: 'Vui lòng chờ' });
        var number = $("#number_"+id).val();
        var description = $("#description_"+id).val();
        $.post('/txns/new',
        {
            number: number, id: id, description: description
        }, function(result){
            $.unblockUI();
//            console.log(result);
            if(result.success){
                alert(result.msg);
                location.reload();
//                $("#ajaxMsg_"+id).html('<b class="text-success">'+result.msg+'</b>');
            }else{
                alert(result.msg);
//                $("#ajaxMsg_"+id).html('<b class="text-danger">'+result.msg+'</b>');
            }
        });
    }

    function deleteOrder(id){
        $.blockUI({ message: 'Vui lòng chờ' });
        $.post('/txns/cancel',
        {
            id:id
        }, function(result){
            $.unblockUI();
            if(result.success){
                alert(result.msg);
                location.reload();
            }else{
                alert(result.msg);
            }
        });
    }

    function completeOrder(id){
        $.blockUI({ message: 'Vui lòng chờ' });
        $.post('/txns/complete',
        {
            id:id
        }, function(result){
            $.unblockUI();
            if(result.success){
                alert(result.msg);
                location.reload();
            }else{
                alert(result.msg);
            }
        });
    }
</script>



<div id="mm-blocker">

</div>
<script src="{{ asset('js/blockUI.js') }}"></script>
</body>
</html>