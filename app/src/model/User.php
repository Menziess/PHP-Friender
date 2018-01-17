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

	public static function create(array $variables) {

			# code...

		if ($variables["password"]) {
			$variables["password"] = password_hash($variables["password"], PASSWORD_DEFAULT);
		}

		parent::create($variables);
	}
	public function login()
	{
		/* valid username en password */
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
		}
	}

	public function logout()
	{
		setcookie('username', '', time()-60*60*24*365, '/');
		setcookie('password', '', time()-60*60*24*365, '/');
		/*header('Location: ../view/login.php');*/
	}

}
