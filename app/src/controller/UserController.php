<?php

namespace app\src\controller;

use app\src\Request;
use app\src\Controller;
use app\src\model\User;
use app\src\Model;

class UserController extends Controller {

	/**
	 * Index page.
	 */
	public function getIndex()
	{
		$users = User::all();

		return self::view('user', compact("users"));
	}

	/**
	 * Show user.
	 */
	public function show(int $id)
	{
		if ($id)
			$user = User::find($id);

		return self::view('user', compact("user", "id"));
	}

	/**
	 * Saves new user.
	 */
	public function store()
	{
		# User maken
		$user = User::create(Request::$post);

		if ($user)
			return self::json($user);
		else
			print "User not created.";
	}

	/**
	 * Deletes user.
	 */
	public function delete(int $id)
	{
		$deleted = User::delete($id);

		echo "User deleted: ";
		echo $deleted ? "True" : "False";
	}

	/**
	 * Updates user.
	 */
	public function update(int $id)
	{
		$user = User::update($id, Request::$put);

		if ($user)
			self::json($user);
	}

	/**
	 * @todo Stefan
	 */
	public function getDemo2()
	{
		# Raw SQL query
		$model = new Model();
		$users = $model->query("SELECT * FROM user ORDER BY id");

		# Api-achtige output
		echo json_encode($users);
	}
}
