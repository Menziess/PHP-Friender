<?php

namespace app\src\model;

use app\src\Model;
use app\src\Router;
use app\src\Request;

class Message extends Model {

	/**
	 * The attributes as columns in the database.
	 */
	public static $attributes = [
		"user_id",
		"message",
		"conversation_id",
		"time",
	];
}
