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
}
