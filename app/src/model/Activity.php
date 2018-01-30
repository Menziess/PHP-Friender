<?php

namespace app\src\model;

use app\src\Model;

class Activity extends Model {

	/**
	 * The attributes as columns in the database.
	 */
	public $id;
	public static $attributes = [
		"activity_id",
		"name",
		"description",
	];

}