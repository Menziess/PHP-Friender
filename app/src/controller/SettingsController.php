<?php

namespace app\src\controller;

use app\src\Request;
use app\src\Controller;
use app\src\model\User;
use app\src\model\Picture;

class SettingsController extends Controller {

	/**
	 * User settings page.
	 */
	public function getSettings()
	{
		$user = User::auth();

		if (isset($user->picture_id))
			$picture = Picture::find($user->picture_id);

		return self::view("settings", compact("picture"));
	}

	/**
	 * Updates settings.
	 */
	public function postSettings()
	{
		$user = User::auth();

		$file = Request::$files['image'];

		Picture::upload($file, $user);

		return self::redirect('/settings');
	}
}