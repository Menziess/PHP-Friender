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
		$id = $user->id;

		return self::view('user', compact("user", "id"));
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
	 * Updates user. @todo chaining functions returns null
	 */
	public function update(int $id)
	{
		$user = User::find($id);

		$user->update(Request::$put);

		if ($user)
			return $user;
	}

	/**
	 * Get user settings page.
	 */
	public function getSettings()
	{
		return self::view("settings");
	}
}
