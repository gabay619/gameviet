<?php


class RoleUser extends \Eloquent {
	protected $connection = 'mysql';
	public $timestamps = false;

	protected $fillable = array('role_id', 'user_id');

	protected $table = 'role_user';

	public function user(){
		return $this->belongsToMany('User');
	}

	public function role(){
		return $this->hasOne('Role');
	}

	public static function boot()
	{
		parent::boot();

		RoleUser::saving(function($model)
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