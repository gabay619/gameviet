<?php

class ProductsController extends AdminBaseController {

	public function __construct(){
		parent::__construct();
	}

	public function getList(){
		$query = Product::leftJoin('product_category', 'products.id', '=', 'product_category.product_id');

		$query = $query->groupBy('products.id')->orderBy('products.created_at','desc')->select('products.id as id', 'products.name as name', 'products.created_at as created_at', 'active', 'price')->paginate(10);
		$allCates = CommonHelper::getCategoryForCombo(Category::all());
		$categories = array();
		foreach($allCates as $aCate){
			$categories[$aCate->id] = $aCate->name;
		}

		return View::make('admin.product_list')->with('items',$query)->with('allCates', $categories);
	}

	public function getNew(){
		$allCates = CommonHelper::getCategoryForCombo(Category::all());
		$items= array();
		foreach($allCates as $aCate){
			$items[$aCate->id] = $aCate->name;
		}
		return View::make('admin.product_new')->with('allCates', $items);
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
			$newTopicImg->type = UPLOAD_TYPE_PRODUCT_TOPIC_IMAGE;
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
		$topicImg = Upload::where('uploadable_type', UPLOADABLE_TYPE_PRODUCT)->where('type', UPLOAD_TYPE_PRODUCT_TOPIC_IMAGE)->where('uploadable_id', $id)->first();
		return View::make('admin.product_edit')->with(array(
			'item' => $item,
			'topicImg' => $topicImg,
			'allCates' => $allCates,
			'productCategory' => $productCategory
		));
	}

	public function postEdit(){

	}

	public function getDelete(){

	}
}