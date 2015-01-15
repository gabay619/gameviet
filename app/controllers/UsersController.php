<?php

class UsersController extends AdminBaseController {

	public function __construct(){
		parent::__construct();
	}

	public function getList(){
		$query = User::whereNotNull('UserId');
		if(Input::has('username')){
			$query->where('UserName','like' ,'%'.Input::get('username').'%');
		}
		if(Input::has('role')){
			$user_ids = RoleUser::where('role_id',Input::get('role'))->lists('user_id');
			$query->whereIn('UserId', $user_ids);
		}

		$query = $query->paginate(10);

		$allRoles = Role::lists('role_name','id');
		return View::make('admin.user_list', array(
			'allUsers' => $query,
			'allRoles' => $allRoles
		));
	}

	public function postEditRole(){
		$user_id = Input::get('user_id');

		if(Input::has('roles')) {
			foreach (Input::get('roles') as $aRole) {
				$newRoleUser = new RoleUser();
				$newRoleUser->user_id = $user_id;
				$newRoleUser->role_id = $aRole;
				$newRoleUser->save();
			}
		}

		return Response::json(array('success'=>true, 'msg'=> 'Sửa thành công'));
	}

}