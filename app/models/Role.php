<?php

class Role extends \Eloquent {
	protected $connection = 'mysql';
	protected $fillable = [];

	protected $table = 'roles';

	public function permissions() {
		return $this->hasMany('Permission');
	}

	public function inherited_role(){
		return $this->belongsTo('Role','inherited_roleid');
	}

	public function user(){
		return $this->belongsToMany('User');
	}

	public static function boot()
	{
		parent::boot();

		Role::saving(function($model)
		{
			$details='CHANGED DETAILS: <br/>';
			foreach($model->getDirty() as $attribute => $value){
				$original= $model->getOriginal($attribute);
				$details.="$attribute: '$original' => '$value'<br/>";
			}
			Activity::log(array(
				'contentId'   => $model->id,
				'contentType' => __CLASS__,
				'description' => 'Thêm/Cập nhật  một '.__CLASS__,
				'details'     => $details,
				'updated'     => true,
			));
		});
	}
}