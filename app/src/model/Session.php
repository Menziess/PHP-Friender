<?php

namespace app\src\model;

use app\src\Model;

class Session extends Model {

	/**
	 * The attributes as columns in the database.
	 */
	public $id;
	public static $attributes = [
		"user_id",
		"token",
		"created_at",
		"expired_at",
	];
}
