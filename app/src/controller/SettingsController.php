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

		return self::view("settings", compact("picture", "user"));
	}

	/**
	 * Updates settings.
	 */
	public function postSettings()
	{

		$user = User::auth();
		$post = Request::$post;

		if(isset(Request::$files['image'])) {
			$file = Request::$files['image'];
			$upload = Picture::upload($file, $user);

			if (!$upload instanceof Picture)
				return self::redirect('/settings', [
					'errors' => $upload,
				]);

			$user->update([
				"picture_id" => $upload->id,
			]);

		} else if (isset($post['password_confirm'])) {

			$errors = $user->updatePassword($post);
			if (!$errors)
				$message = 'Password has been updated! ';

		} else {
			isset($post['is_active'])
				? $post['is_active'] = 1
				: $post['is_active'] = 0;
			$user->update($post);
		}

		return self::redirect('/settings',
			compact("user", "errors", "message"));
	}
}
