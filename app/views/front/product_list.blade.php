@extends('layouts.main')

@section('content')
<ul class="list-pro">
@foreach($allProducts as $aProduct)
<li class="item-01 item-0 first">
    <a href="#orderModal_{{$aProduct->id}}" data-toggle="modal"><img src="{{$aProduct->path}}" alt="" width="234" height="250"></a>
    <h2><a href="#orderModal_{{$aProduct->id}}" data-toggle="modal">{{$aProduct->name}}</a></h2>
    <p class="price"><span>{{number_format($aProduct->price)}} đ</span></p>
    <a href="#orderModal_{{$aProduct->id}}" class="order OrderCart" data-toggle="modal">Chọn</a>
    <!-- Modal -->
    <div class="modal fade" id="orderModal_{{$aProduct->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="orderName">Đặt hàng {{$aProduct->name}}</h4>
          </div>
          <div class="modal-body">
            <div class="order-label">
                <span>Sản phẩm</span>
                <span>Giá</span>
                <span>Số lượng</span>
            </div>
            <div class="order-info">
                <div class="order-thumb">
                    <img src="{{$aProduct->path}}" alt="" width="140" height="140"/>
                </div>
                <div class="order-name">
                    {{$aProduct->name}}
                </div>
                <div class="order-price" id="price_{{$aProduct->id}}">
                    <span class="price">{{number_format($aProduct->price)}}</span> VNĐ
                </div>
                <div class="order-number">
                   <input type="text" class="number form-control" id="number_{{$aProduct->id}}" value="1"/>
                </div>

            </div>
          </div>
          <div class="modal-footer">
            <div class="order-msg">
                <textarea class="form-control" name="description" id="description_{{$aProduct->id}}" placeholder="Gửi kèm lời nhắn..."></textarea>
            </div>
            <div class="order-confirm">
                <div class="order-total">
                    <label for="">Thanh toán:</label> <span class="total">{{number_format($aProduct->price)}}</span> VNĐ
                </div>
                <button type="button" class="btn btn-primary" onclick="order({{$aProduct->id}})">Đặt hàng</button>
            </div>

          </div>
        </div>
      </div>
    </div>
</li>
@endforeach

</ul>
@endsection