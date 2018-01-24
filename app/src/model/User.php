<?php

namespace app\src\model;

use app\src\Model;
use app\src\Router;
use app\src\Request;
use app\src\model\Session;

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
		"bio",
		"is_admin",
		"is_active",
		"is_banned",
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
		if (!empty(Request::$auth))
			return Request::$auth;

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
	 *
	 */
	public function updatePassword($credentials)
	{
		$old_pass = $credentials['password_old'];
		$new_pass = $credentials['password'];
		$re_pass  = $credentials['password_confirm'];

		if (!password_verify($old_pass, $this->password))
			return ['Your old password is wrong. '];
		if ($new_pass != $re_pass)
			return ['Passwords do not match! '];

		$this->update([
			"password" => $new_pass,
		]);
	}

	/**
	 * User creation with password hashing.
	 */
	public static function create(array $variables)
	{
		if (!isset($variables['email']))
			throw new \Exception("Email not provided to create new user. ");

		$user = User::select()
					->where("email", "=", $variables['email'])
					->get();

		if (!empty($user))
			return $user;

		# If no user is returned, create a new one
		return parent::create(self::hashPassword($variables));
	}

	/**
	 * User updating with password hashing.
	 */
	public function update(array $variables)
	{
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
		if (empty($user))
			return false;
		if (!password_verify($credentials["password"], $user->password))
			return false;

		# Start a session
		Session::start($user, $credentials);

		return true;
	}

	/**
	 * Logout, deleting cookie.
	 */
	public static function logout()
	{
		Session::end();
	}
}
