<?php

/**
 * Actors model config
 */

return array(

	'title' => 'Users',

	'single' => 'user',

	'model' => 'User',

	/**
	 * The display columns
	 */
	'columns' => array(
		'UserId',
        'UserName' => array(
            'title'=>'Username',
            'select'=>'UserName'
        ),
		'RemainMoney' =>array(
			'title'=>'Tài khoản',
			'select'=>'RemainMoney'
		)
	),

	/**
	 * The filter set
	 */
	'filters' => array(
		'UserId',
        'UserName'=>array(
            'title'=>'UserName'
        ),
//		'created_at' => array(
//			'title' => 'Thời gian đăng ký',
//			'type' => 'date',
//		),
	),

	/**
	 * The editable fields
	 */
	'edit_fields' => array(
        'UserName'=>array(
            'title'=>'UserName',
            'type'=>'text'
        ),
//		'roles' => array(
//			'title' => 'Role',
//			'type' => 'relationship',
//			'relationship' => 'roles',
//			'name_field' => 'role_name' // The column name which holds the name of the role
//		),
	),

	/**
	 * This is where you can define the model's custom actions
	 */
	'actions' => array(
//		//Ordering an item up
//		'hash_password' => array(
//			'title' => 'Mã hóa password',
//			'messages' => array(
//				'active' => 'Hashing password...',
//				'success' => 'Mã hóa mật khẩu thành công',
//				'error' => 'Mã hóa mật khẩu lỗi',
//			),
//			//the model is passed to the closure
//			'action' => function(&$model)
//			{
//				$model->password=Hash::make($model->password);
//				return $model->save();
//			}
//		),
	),
);