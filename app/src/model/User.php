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

<<<<<<< HEAD
	public static function create(array $variables) {

			# code...

		if ($variables["password"]) {
			$variables["password"] = password_hash($variables["password"], PASSWORD_DEFAULT);
		}

		parent::create($variables);
	}
=======
	public function login()
	{
		/* valid username en password */
		$user = 'user';
		$pass = 'pass';

		if (isset($_POST['uname']) && isset($_POST['psw'])) {
			if (($_POST['uname'] == $user) && ($_POST['psw'] == $pass)) {
				if (isset($_POST['rememberme'])) {
					/* cookie bestaat 1 jaar bruikbaar op hele site*/
					setcookie('username', $_POST['uname'], time()+60*60*24*365, '/');
					setcookie('password', $_POST['psw'], time()+60*60*24*365, '/');
				} else {
					/* Cookie verloopt wanneer browser sluit */
					setcookie('username', $_POST['uname'], false, '/');
					setcookie('password', $_POST['psw'], false, '/');
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

>>>>>>> baf6b03f4033e8ceee60c19abdd29d44f67ff784
}
