<?php

namespace app\src\model;

use app\src\Model;

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
	];

	/**
	 * Hash password.
	 */
	public static function hashPassword($credentials)
	{
		if ($credentials["password"])
			$credentials["password"] = password_hash($credentials["password"], PASSWORD_DEFAULT);

		return $credentials;
	}

	/**
	 * User creation with password hashing.
	 */
	public static function create(array $variables) {
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
			throw new \Exception("User not found.");

		if (!password_verify($credentials["password"], $user["password"]))
			return false;

		# valid username en password
		if (isset($credentials['rememberme'])) {
			setcookie('email', $user["email"], time()+60*60*24*365, '/');
			setcookie('password', $user["password"], time()+60*60*24*365, '/');
		} else {
			setcookie('email', $user["email"], 0, '/');
			setcookie('password', $user["password"], 0, '/');
		}
		return true;
	}

	/**
	 * Logout, deleting cookie.
	 */
	public function logout()
	{
		setcookie('email', '', time()-60*60*24*365, '/');
		setcookie('password', '', time()-60*60*24*365, '/');
	}
}
