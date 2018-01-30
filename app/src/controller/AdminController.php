<?php

namespace app\src\controller;

use app\src\Request;
use app\src\Controller;
use app\src\App;
use app\src\model\User;

class AdminController extends Controller {

	/**
	 * Admin page.
	 */
	public function getAdmin()
	{
		User::admin();

		$users = User::all();

		return self::view('admin', compact('users'));
	}

}

public function getSettings()
{
	User::admin();

	$user = User::find($id)

	if ($user->picture_id)
		$picture = Picture::find($user->picture_id);

	return self::view("settings", compact("picture", "user"));
}
