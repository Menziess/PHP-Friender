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
		"message"
	];


	public static function allWithUsers()
	{
		$statement = Model::db()->query(
			"SELECT message, first_name
			FROM message
			JOIN user ON user_id = user.id;
		");

		$statement->execute();

		return $statement->fetchAll();
	}
}
