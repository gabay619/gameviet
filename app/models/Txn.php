<?php

class Txn extends \Eloquent {

	protected $connection = 'mysql';
	protected $fillable = [];

	protected $table = 'txns';
}