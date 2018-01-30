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
	public function getIndex()
	{
		User::admin();

		$users = User::all();

		return self::view('admin', compact('users'));
	}

	/**
	 * Ban user by id.
	 *
	 * @return json
	 */
	public function postBanuser()
	{
		if (isset(Request::$post['banned_user_id']))
			$banned_user_id = Request::$post['banned_user_id'];

		if (isset($banned_user_id))
			$user = User::find($banned_user_id);

		if ($user instanceof User)
			$user->update([
				'is_banned' => (string)(int) !$user->is_banned,
			]);

		return self::redirect();
	}
}
