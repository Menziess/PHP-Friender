<?php

namespace app\src\controller;

use app\src\Request;
use app\src\Router;
use app\src\Controller;
use app\src\Model;
use app\src\model\User;
use app\src\model\Picture;

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
		$user = User::create(Request::$post);

		if (!$user) {
			return self::view('signup', [
				"error" => "User couldn't be created. "
			]);
		}

		$id = $user->id;

		return self::view('user', compact('id', 'user'));
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
		$user = User::find($id);

		$user->update(Request::$put);

		if ($user)
			return $user;
	}
}
