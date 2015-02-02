<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/



Route::get('/test', function() {
	return Auth::user()->UserName;
});

Route::get('/testip', function(){
    return Request::getClientIp();
});

//admin
Route::get('/admin', 'AdminBaseController@index');
Route::controller('/admin/products', 'ProductsController');
Route::controller('/admin/categories', 'CategoriesController');
Route::controller('/admin/reports', 'ReportsController');
Route::controller('/admin/users', 'UsersController');

Route::controller('/txns', 'TxnsController');
//front
Route::get('/', 'FrontsController@getIndex');
Route::get('tim-kiem', 'FrontsController@getSearchResult');
Route::get('/{catSlug}', 'FrontsController@getProductList');