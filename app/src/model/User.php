<?php

namespace app\src\model;

use app\src\Model;
use app\src\Router;
use app\src\Request;

class User extends Model {

	/**
	 * The attributes as columns in the database.
	 */
	public static $attributes = [
		"first_name",
		"last_name",
		"date_of_birth",
		"email",
		"password",
		"picture_id",
		"answers",
	];

	public static $required = [
		"first_name",
		"last_name",
		"date_of_birth",
		"email",
		"password",
	];

	/**
	 * Checks if user is authenticated.
	 */
	public function auth()
	{
		if (isset(Request::$cookie['email']))
			return  User::select()
						->where("email", "=", Request::$cookie['email'])
						->get();

		Router::error(401);
		exit;
	}

	/**
	 * Hash password.
	 */
	public static function hashPassword($credentials)
	{
		if (isset($credentials["password"]))
			$credentials["password"] =
				password_hash($credentials["password"], PASSWORD_DEFAULT);
		return $credentials;
	}

	/**
	 * User creation with password hashing.
	 */
	public static function create(array $variables) {

		if (!isset($variables['email']))
			throw new \Exception("Email not provided to create new user. ");

		$user = User::select()
					->where("email", "=", $variables['email'])
					->get();

		if ($user instanceof User)
			return $user;

		# If no user is returned, create a new one
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
		$user = User::select()
					->where("email", "=", $credentials['email'])
					->get();

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
