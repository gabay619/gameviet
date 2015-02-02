<?php

class FrontsController extends \BaseController {

	public function getIndex(){
		$allCates = Category::leftJoin('uploads','category.id', '=', 'uploads.uploadable_id')
			->select(array('category.*', 'uploads.path'))
			->where('uploads.uploadable_type', '=', UPLOADABLE_TYPE_CATE)
			->get();
		$allProducts = Product::leftJoin('uploads','products.id', '=', 'uploads.uploadable_id')
			->select(array('products.*', 'uploads.path'))
			->where('uploads.uploadable_type', '=', UPLOADABLE_TYPE_PRODUCT)
			->where('products.active',1)
			->groupBy('products.id')
			->orderBy('products.id','desc')
			->paginate(15);
		return View::make('front.index', array(
			'allCates'=>$allCates,
			'allProducts'=>$allProducts
		));
	}

	public function getProductList($cateSlug){
		$category = Category::where('alias',$cateSlug)->first();
		$allProducts = Product::leftJoin('uploads','products.id', '=', 'uploads.uploadable_id')
			->join('product_category','products.id','=','product_category.product_id')
			->select(array('products.*', 'uploads.path'))
			->where('product_category.category_id', $category->id)
			->where('uploads.uploadable_type', '=', UPLOADABLE_TYPE_PRODUCT)
			->where('products.active',1)
			->groupBy('products.id')
			->orderBy('products.id','desc')
			->paginate(15);
		return View::make('front.index')->with('allProducts', $allProducts)->with('category', $category);
	}

    public function getSearchResult(){
        $string = explode(Input::get('q'),' ');
        $allProducts = Product::leftJoin('uploads','products.id', '=', 'uploads.uploadable_id')
            ->select(array('products.*', 'uploads.path'))
            ->where('uploads.uploadable_type', '=', UPLOADABLE_TYPE_PRODUCT)
            ->where('name','LIKE','%'.$string.'%')
            ->where('products.active',1)
            ->groupBy('products.id')
            ->orderBy('products.id','desc')
            ->paginate(15);
        return View::make('front.index')->with('allProducts', $allProducts);
    }
}