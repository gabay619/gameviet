<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	protected $connection = 'mysql2';
	protected $table = 'usertb';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public function roles() {
		return $this->belongsToMany('Role', 'user_id', 'UserId');
	}

	public function hasRole($key)
	{
		foreach ($this->roles as $role) {
			if ($role->role_name === $key) {
				return true;
			}
		}
		return false;
	}

	public function txns(){
		return $this->hasMany('Txn', 'user_id', 'UserId');
	}
}
