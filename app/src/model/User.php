<?php

namespace app\src\model;

use app\src\Model;
use app\src\Router;

class User extends Model {

	/**
	 * The attributes as columns in the database.
	 */
	public $id;
	public static $attributes = [
		"first_name",
		"last_name",
		"date_of_birth",
		"email",
		"password",
		"answers",
		"picture_id",
	];

	/**
	 * Checks if user is authenticated.
	 *
	 * @todo Jochem (line 27 alleen aanpassen)
	 */
	public function auth()
	{

		if (isset($_COOKIE['email'])) {
			$user = Self::findByEmail($_COOKIE['email']);

			if($user)
				return $user;
		}

		Router::error(401);
		exit;
	}

	/**
	 * Hash password.
	 */
	public static function hashPassword($credentials)
	{
		if ($credentials["password"])
			$credentials["password"] = password_hash($credentials["password"],
			PASSWORD_DEFAULT);
			return $credentials;
	}

	/**
	 * User creation with password hashing.
	 */
	public static function create(array $variables) {

		$user = User::findByEmail($variables['email']);

		if ($user)
			return $user;

		return parent::create(self::hashPassword($variables));
	}

	/**
	 * User updating with password hashing.
	 */
	public function update(array $variables) {
		return parent::update(self::hashPassword($variables));
	}

	/**
	 * Login, setting cookie.
	 */
	public static function login(array $credentials)
	{
		# User exists
		$user = self::findByEmail($credentials['email']);

		# Check password correct
		if (!$user)
			return false;
		if (!password_verify($credentials["password"], $user->password))
			return false;

		# valid username en password
		if (isset($credentials['rememberme'])) {
			$time = time() + 60 * 60 * 24 * 365;
			setcookie('first_name', $user->first_name, $time, '/');
			setcookie('email', $user->email, $time, '/');
			setcookie('password', $user->password, $time, '/');
		} else {
			setcookie('first_name', $user->first_name, 0, '/');
			setcookie('email', $user->email, 0, '/');
			setcookie('password', $user->password, 0, '/');
		}

		return true;
	}

	/**
	 * Logout, deleting cookie.
	 */
	public function logout()
	{
		setcookie('first_name', '', time() - 1, '/');
		setcookie('email', '', time() - 1, '/');
		setcookie('password', '', time() - 1, '/');
	}
}
