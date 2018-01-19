<?php

namespace app\src\model;

use app\src\Model;

class Picture extends Model {

	/**
	 * The attributes as columns in the database.
	 */
	public $id;
	public static $attributes = [
		"user_id",
		"model",
		"filename"
	];

}
