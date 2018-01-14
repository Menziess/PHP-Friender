<?php

namespace app\src\controller;

use app\src\Controller;
use app\src\model\User;
use app\src\Model;

class UserController extends Controller {

	/**
	 * Index page.
	 */
	public function index()
	{
		$model = new Model();
		$users = $model->query("SELECT * FROM user ORDER BY id");

		return self::view('user', compact("users"));
	}

	/**
	 * Get all users.
	 */
	public function users()
	{
		$model = new Model();
		$users = $model->query("SELECT * FROM user ORDER BY id");

		echo json_encode($users);
	}

	/**
	 * Create user.
	 */
	public function create()
	{
		$user = new User([
			"first_name" => "Stefan",
			"last_name" => "Schenk",
			"date_of_birth" => "2018-01-09",
			"email" => "stefan_schenk@hotmail.com",
			"password" => "test123",
			"password_check" => "test123",
		]);
		$success = $user->create();

		echo "User $user->first_name was created: ";
		echo ($success) ? 'True' : 'False';
	}

	public function find()
	{
		echo 'User::find()<br>';
		$user = User::find(29);
		echo json_encode($user);
	}
}