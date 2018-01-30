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

	/**
	 * Bans user with the banhammer.
	 *
	 * @return json
	 */
	public function postBanUser()
	{
		$banned_user_id = Request::$post['banned_user_id'];

		$user = User::find($banned_user_id);

		$user->update([
			'is_banned' => !$user->is_banned,
		]);

		return self::json($user);
	}
}
