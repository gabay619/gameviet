<?php

class CategoriesController extends AdminBaseController {

	public function __construct(){
		parent::__construct();
	}

	public function getList(){
		$allCates = Category::paginate(10);
		return View::make('admin.category_list')->with('items', $allCates);
	}

	public function getNew(){
		return View::make('admin.category_new');
	}

	public function postNew(){
		$checkCate = Category::where('name',Input::get('name'))->first();
		if($checkCate)
			return Redirect::back()->with('error','Tên danh mục đã tồn tại')->withInput();

		$newRecord = new Category();
		$newRecord->name = Input::get('name');
		$newRecord->description = Input::get('description');
		$newRecord->alias = CommonHelper::vietnameseToASCII(Input::get('name'));
		if(!$newRecord->save()){
			return Response::json(array('success'=>false, 'msg'=>'Lỗi DB. Lưu thất bại'));
		}

		//Lưu ảnh
		if(Input::has('imageFile')){
			$newTopicImg = new Upload();
			$newTopicImg->path = Input::get('imageFile');
			$newTopicImg->uploadable_type = UPLOADABLE_TYPE_CATE;
			$newTopicImg->uploadable_id = $newRecord->id;
			$newTopicImg->save();
		}

		return Response::json(array('success'=>true, 'msg'=> 'Thêm mới danh mục thành công'));
	}

	public function getEdit($id){
		$record = Category::find($id);
		$topicImg = Upload::where('uploadable_type', UPLOADABLE_TYPE_CATE)->where('uploadable_id', $id)->first();
		return View::make('admin.category_edit')->with('item', $record)->with('topicImg', $topicImg);
	}

	public function postEdit($id){
		$record = Category::find($id);
		$record->name = Input::get('name');
		$record->description = Input::get('description');
		if(!$record->save()){
			return Response::json(array('success'=>false, 'msg'=>'Lỗi DB. Lưu thất bại'));
		}

		//Lưu ảnh
		$topicImg = Upload::where('uploadable_type', UPLOADABLE_TYPE_CATE)->where('uploadable_id', $id);
		$topicImg->delete();
		if(Input::has('imageFile')){
			$newTopicImg = new Upload();
			$newTopicImg->path = Input::get('imageFile');
			$newTopicImg->uploadable_type = UPLOADABLE_TYPE_PRODUCT;
			$newTopicImg->uploadable_id = $record->id;
			$newTopicImg->save();
		}

		return Response::json(array('success'=>true, 'msg'=> 'Sửa Danh mục thành công'));
	}

	public function getDelete($id){
		$record = Category::find($id);
		$record->delete();
		return Redirect::to('/admin/categories/list');
	}

}