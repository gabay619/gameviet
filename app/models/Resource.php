<?php

class Resource extends \Eloquent {
	protected $fillable = [];

	public static function boot()
	{
		parent::boot();

		Resource::saving(function($model)
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