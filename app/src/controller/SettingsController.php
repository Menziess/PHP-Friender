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

		if ($user->picture_id)
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

		$upload = Picture::upload($file, $user);

		if (!$upload instanceof Picture)
			return self::redirect('/settings', [
				'errors' => $upload,
			]);

		$user->update([
			"picture_id" => $upload->id,
		]);

		return self::redirect('/settings');
	}
}