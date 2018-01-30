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
	 * User settings page.
	 */
	public function getEdituser(int $id)
	{
		User::permit($id);

		$user = User::find($id);
		$action = "/admin/edituser/$id";

		if ($user->picture_id)
			$picture = Picture::find($user->picture_id);

		return self::view("settings", compact("picture", "user", "action"));
	}

	/**
	 * Updates susers settings.
	 */
	public function postEdituser($id)
	{
		User::permit($id);
		$user = User::find($id);
		$post = Request::$post;

		if(isset(Request::$files['image'])) {
			$file = Request::$files['image'];
			$upload = Picture::upload($file, $user);

			if (!$upload instanceof Picture)
				return self::redirect("/admin/edituser/$id", [
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
			isset($post['notifications'])
				? $post['notifications'] = 1
				: $post['notifications'] = 0;
			$user->update($post);
		}

		return self::redirect("/admin/edituser/$id",
			compact("user", "errors", "message"));
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
