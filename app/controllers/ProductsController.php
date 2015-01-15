<?php

class ProductsController extends AdminBaseController {

	public function __construct(){
		parent::__construct();
	}

	public function getList(){
		$query = Product::leftJoin('product_category', 'products.id', '=', 'product_category.product_id');

		$query = $query->groupBy('products.id')->orderBy('products.created_at','desc')->select('products.id as id', 'products.name as name', 'products.created_at as created_at', 'active', 'price')->paginate(10);
		$allCates = Category::lists('name','id');

		return View::make('admin.product_list')->with('items',$query)->with('allCates', $allCates);
	}

	public function getNew(){
		$allCates = Category::lists('name','id');
		return View::make('admin.product_new')->with('allCates', $allCates);
	}

	public function postNew(){
		$newRecord = new Product();
		$newRecord->name = Input::get('name');
		$newRecord->description = Input::get('description');
		$newRecord->price = Input::get('price');
		$newRecord->active = Input::get('active');
		if(!$newRecord->save()){
			return Response::json(array('success'=>false, 'msg'=>'Lỗi DB. Lưu thất bại'));
		}

		//Lưu ảnh
		if(Input::has('imageFile')){
			$newTopicImg = new Upload();
			$newTopicImg->path = Input::get('imageFile');
			$newTopicImg->uploadable_type = UPLOADABLE_TYPE_PRODUCT;
			$newTopicImg->uploadable_id = $newRecord->id;
			$newTopicImg->save();
		}

		//Lưu category
		if(Input::has('category')){
			foreach(Input::get('category') as $aCate){
				$newProductCategory = new ProductCategory();
				$newProductCategory->product_id = $newRecord->id;
				$newProductCategory->category_id = $aCate;
				$newProductCategory->save();
			}
		}

		return Response::json(array('success'=>true, 'msg'=> 'Thêm mới sản phẩm thành công'));
	}

	public function getEdit($id){
		$item = Product::find($id);
		$allCates = Category::lists('name','id');
		$productCategory = $item->categories()->lists('category_id');
		$topicImg = Upload::where('uploadable_type', UPLOADABLE_TYPE_PRODUCT)->where('uploadable_id', $id)->first();
		return View::make('admin.product_edit')->with(array(
			'item' => $item,
			'topicImg' => $topicImg,
			'allCates' => $allCates,
			'productCategory' => $productCategory
		));
	}

	public function postEdit($id){
		$record = Product::find($id);
		$record->name = Input::get('name');
		$record->description = Input::get('description');
		$record->price = Input::get('price');
		$record->active = Input::get('active');
		if(!$record->save()){
			return Response::json(array('success'=>false, 'msg'=>'Lỗi DB. Lưu thất bại'));
		}

		//Lưu ảnh
		$topicImg = Upload::where('uploadable_type', UPLOADABLE_TYPE_PRODUCT)->where('uploadable_id', $id);
		$topicImg->delete();
		if(Input::has('imageFile')){
			$newTopicImg = new Upload();
			$newTopicImg->path = Input::get('imageFile');
			$newTopicImg->uploadable_type = UPLOADABLE_TYPE_PRODUCT;
			$newTopicImg->uploadable_id = $record->id;
			$newTopicImg->save();
		}

		//Lưu category
		ProductCategory::where('product_id', $id)->delete();
		if(Input::has('category')) {
			foreach (Input::get('category') as $aCate) {
				$newProductCategory = new ProductCategory();
				$newProductCategory->product_id = $record->id;
				$newProductCategory->category_id = $aCate;
				$newProductCategory->save();
			}
		}

		return Response::json(array('success'=>true, 'msg'=> 'Sửa sản phẩm thành công'));
	}

	public function getDelete($id){
		$record = Product::find($id);
		$record->delete();
		return Redirect::to('/admin/products/list');
	}
}