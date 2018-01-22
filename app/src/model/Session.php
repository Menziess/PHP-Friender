<?php

namespace app\src\model;

use app\src\Model;

class Session extends Model {

	/**
	 * The attributes as columns in the database.
	 */
	public $id;
	public static $attributes = [
		"user_id",
		"token",
		"created_at",
		"expired_at",
	];

	/**
	 * Start a session by storing a token in the browser and database.
	 *
	 * @param User $user
	 * @param bool $rememberme
	 * @return void
	 */
	public static function start($user, $credentials)
	{
		# Create session token
		$token = password_hash($user->password, PASSWORD_BCRYPT);

		# Determine session age
		isset($credentials['rememberme'])
			? $time = time() + 60 * 60 * 24 * 365
			: $time = time();
		$_SESSION['token'] = $token;
		setcookie('friender', $token, $time, '/');
		Session::create([
			"user_id" => $user->id,
			"token" => $token,
			"expired_at" => gmdate("Y-m-d", $time),
			"created_at" => gmdate("Y-m-d", time()),
		]);
	}

	/**
	 * End session by destroying cookie.
	 *
	 * @return void
	 */
	public static function end()
	{
		Session::where("token", "=", $_SESSION['token'])->delete()->get();
		setcookie('friender', '', time(), '/');
		session_destroy();
	}
}
