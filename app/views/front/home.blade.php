@extends('layouts.main')

@section('content')
@foreach($allProducts as $aProduct)
    <span id="product_name_{{$aProduct->id}}">{{$aProduct->name}}</span>
    <span id="product_price_{{$aProduct->id}}">{{$aProduct->price}}</span>
    <a href="#orderModal_{{$aProduct->id}}" data-toggle="modal">Đặt hàng</a>
    <!-- Modal -->
    <div class="modal fade" id="orderModal_{{$aProduct->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="orderName">Đặt hàng {{$aProduct->name}}</h4>
          </div>
          <div class="modal-body">
            <p id="ajaxMsg_{{$aProduct->id}}"></p>
            <span class="price" id="price_{{$aProduct->id}}">{{number_format($aProduct->price)}}</span>
            Số lượng: <input type="text" class="number" id="number_{{$aProduct->id}}" placeholder="Số lượng" value="1"/>
            <span class="totalPrice">{{number_format($aProduct->price)}}</span>
            <textarea name="description" id="description_{{$aProduct->id}}" height="50px" placeholder="Ghi chú"></textarea>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="javascript:order({{$aProduct->id}})">Đặt hàng</button>
          </div>
        </div>
      </div>
    </div>
    <br/>
@endforeach

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
        $(".number").change(function(){
           var price = unformatNumber($(this).parent('.modal-body').find('.price').html());
           console.log(price);
           var number = $(this).val();
           console.log(number);

           var totalprice = price*number;
            console.log(totalprice);
            $(this).parent('.modal-body').find(".totalPrice").html(formatNumber(totalprice,0));
        })
    });

    function order(id){
        var number = $("#number_"+id).val();
        var description = $("#description_"+id).val();
        $.post('/txns/new',
        {
            number: number, id: id, description: description
        }, function(result){
            console.log(result);
            if(result.success){
                $("#ajaxMsg_"+id).html('<b class="text-success">'+result.msg+'</b>');
            }else{
                $("#ajaxMsg_"+id).html('<b class="text-danger">'+result.msg+'</b>');
            }
        });
    }
</script>
@endsection

