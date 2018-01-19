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
				"error" => "ERROR!"
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
	 * Updates user. @todo Stefan
	 */
	public function update(int $id)
	{
		$user = User::find($id);

		$user->update(Request::$put);

		if ($user)
			return $user;
	}

	public function getEvents()
	{
		User::auth();
		return self::view('events');
		// Moet misschien /user/events worden? weet niet waar dat moet
	}

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
	 *
	 * @todo Roos (Samen even naar kijken)
	 */
	public function postSettings()
	{
		$user = User::auth();
		$dir = __DIR__ . "/../../uploads/";

		# Als folder niet bestaat, maak aan
		if (!file_exists($dir)) {
			mkdir($dir, 0777, true);
		}

		if (isset($_FILES['image'])) {
			$errors = [];
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_tmp  = $_FILES['image']['tmp_name'];
			$file_type = $_FILES['image']['type'];

			$segments = explode('.', $_FILES['image']['name']);
			$file_ext = strtolower(end($segments));

			$expensions = ["jpeg", "jpg", "png"];

			if (!in_array($file_ext, $expensions)) {
			   $errors[] = "extension not allowed, choose a JPEG or PNG file.";
			}

			if ($file_size > 500000) {
			   $errors[] = 'Max file size is 5MB';
			}

			if (empty($errors)) {
				$file_name = uniqid("IMG_", true) . "." . $file_ext;
				move_uploaded_file($file_tmp, $dir . $file_name);
				echo "Success";
			} else {
			   print_r($errors);
			}

			$picture = Picture::create([
				"user_id" => $user->id,
				"model" => "user",
				"filename" => $file_name,
			]);

			$user->update([
				"picture_id" => $picture->id,
			]);
		}

		return self::redirect('/user/settings');
	}
}
