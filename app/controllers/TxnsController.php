<?php

class TxnsController extends \BaseController {

	public function __construct(){
        $this->beforeFilter('auth', array('except'=>array(

        )));

        $this->beforeFilter('permission', array('except'=> array(
            'postNew',
            'postComplete'
        ) ));
    }

    public function postNew(){
        $product_id = Input::get('id');
        $number = Input::get('number');
        $description = Input::get('description');
        $product = Product::find($product_id);
        if(!$product)
            return Response::json(array('success'=>false, 'msg'=>'Không tìm thấy sản phẩm này!'));

        $user = Auth::user();
        $amount = $product->price*$number;
        if($amount > Auth::user()->RemainMoney)
            return Response::json(array('success'=>false, 'msg'=>'Số tiền trong tài khoản không đủ!'));

        $newRecord = new Txn();
        $newRecord->product_id = $product_id;
        $newRecord->user_id = $user->UserId;
        $newRecord->number = $number;
        $newRecord->amount = $amount;
        $newRecord->description = $description;
        $newRecord->status = TXN_STATUS_NEW;
        if(!$newRecord->save())
            return Response::json(array('success'=>false, 'msg'=>'Đặt hàng thất bại!'));

        return Response::json(array('success'=>true, 'msg'=>'Đặt hàng thành công!'));
    }

    public function postComplete(){
        $txn_id = Input::get('id');
        $txn = Txn::find($txn_id);
        if(!$txn)
            return Response::json(array('success'=>false, 'msg'=>'Không tìm thấy giao dịch!'));

        if($txn->status != TXN_STATUS_NEW)
            return Response::json(array('success'=>false, 'msg'=>'Thao tác không hợp lệ!'));

        $user = Auth::user();

        DB::beginTransaction();
        try{
            $txn->status = TXN_STATUS_COMPLETED;
            $txn->save();

            $user->RemainMoney = $user->RemainMoney - $txn->amount;
            $user->save();

        }catch (Exception $e){
            DB::rollBack();
            return Response::json(array('success'=>false, 'msg'=>'Xác nhận thất bại!'));
        }
        DB::commit();
        return Response::json(array('success'=>true, 'msg'=>'Xác nhận thành công!'));
    }

    public function postCancel(){
        $txn_id = Input::get('id');
        $txn = Txn::find($txn_id);
        if(!$txn)
            return Response::json(array('success'=>false, 'msg'=>'Không tìm thấy giao dịch!'));

        if($txn->status != TXN_STATUS_NEW)
            return Response::json(array('success'=>false, 'msg'=>'Thao tác không hợp lệ!'));

        $txn->status = TXN_STATUS_CANCELED;
        if(!$txn->save())
            return Response::json(array('success'=>false, 'msg'=>'Hủy thất bại!'));

        return Response::json(array('success'=>true, 'msg'=>'Hủy thành công!'));
    }

    public function getAdminIndex(){

    }

}