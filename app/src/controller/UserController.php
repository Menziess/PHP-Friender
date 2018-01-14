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
			"First name" => "Stefan",
			"Last name" => "Schenk",
			"date of birth" => "2018-01-09",
			"email" => "stefan_schenk@hotmail.com",
			"password" => "test123",
			"password check" => "test123",
		]);
		$user->create();
	}
}