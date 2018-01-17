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
<<<<<<< HEAD
		$user = 'user'; /*user uit database */
		$pass = 'password';/*password uit database */

		if (isset($_POST['email']) && isset($_POST['password'])) {
			if (($_POST['email'] == $user) && ($_POST['password'] == $pass)) {
				if (isset($_POST['rememberme'])) {
					/* cookie bestaat 1 jaar bruikbaar op hele site*/
					setcookie('username', $_POST['email'], time()+60*60*24*365, '/');
					setcookie('password', $_POST['password'], time()+60*60*24*365, '/');
				} else {
					/* Cookie verloopt wanneer browser sluit */
					setcookie('username', $_POST['email'], false, '/');
					setcookie('password', $_POST['password'], false, '/');
				}
				/*header('Location: index.php'); */
			} else {
				echo 'Username/Password Invalid';
			}
=======
		if (isset($credentials['rememberme'])) {
			/* cookie bestaat 1 jaar bruikbaar op hele site*/
			setcookie('email', $user["email"], time()+60*60*24*365, '/');
			setcookie('password', $user["password"], time()+60*60*24*365, '/');
		} else {
			/* Cookie verloopt wanneer browser sluit */
			setcookie('email', $user["email"], 0, '/');
			setcookie('password', $user["password"], 0, '/');
>>>>>>> dcbed9eaa37fcb33649599033c41a10070b1ff67
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
