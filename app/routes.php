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

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('/test', function() {
	DB::connection('mysql2')->update('update usertb set UserName = "gabay1" where UserId = ?', array(574));
	$user1 = User::where('UserId', 574)->first();
	echo $user1->UserName;
});

//admin
Route::get('/admin', 'AdminBaseController@index');
Route::controller('/admin/products', 'ProductsController');
Route::controller('/admin/categories', 'CategoriesController');
Route::controller('/admin/reports', 'ReportsController');

Route::get('/test2', function() {
	return $_SERVER['HHTP_CLIENT_IP'];
}