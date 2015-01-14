<?php

class Product extends \Eloquent {
	protected $connection = 'mysql';
	protected $fillable = [];

	protected $table = 'products';

	public function categories()
	{
		return $this->belongsToMany('Category', 'product_category', 'product_id');
	}

}