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
		"password_check",
	];

}