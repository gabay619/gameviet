<?php

/**
 * Actors model config
 */

return array(

	'title' => 'Log hành vi',

	'single' => 'log hành vi',

	'model' => 'ActivityLog',

	/**
	 * The display columns
	 */
	'columns' => array(
		'id',
		'content_type',
		'content_id',
		'action',
		'description',
		'details',
		'ip_address',
		'created_at',
		'user_agent',
		'updated_at',
	),

	/**
	 * The filter set
	 */
	'filters' => array(
		'content_type' => array(
			'title' => 'Loại dữ liệu',
		),
		'content_id' => array(
			'title' => 'ID bản ghi',
		),
		'ip_address',
	),

	/**
	 * The editable fields
	 */
	'edit_fields' => array(
		'id'
	),
);