<?php

namespace app\src\model;

use app\src\Model;

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
		parent::create(self::hashPassword($variables));
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

		/* valid username en password */
		if (isset($credentials['rememberme'])) {
			/* cookie bestaat 1 jaar bruikbaar op hele site*/
			setcookie('email', $user["email"], time()+60*60*24*365, '/');
			setcookie('password', $user["password"], time()+60*60*24*365, '/');
		} else {
			/* Cookie verloopt wanneer browser sluit */
			setcookie('email', $user["email"], false, '/');
			setcookie('password', $user["password"], false, '/');
		}
		return true;
	}

	public function logout()
	{
		setcookie('username', '', time()-60*60*24*365, '/');
		setcookie('password', '', time()-60*60*24*365, '/');
		/*header('Location: ../view/login.php');*/
	}

}
