<?php

namespace app\src\model;

use app\src\Model;

class Conversation extends Model {

	/**
	 * The attributes as columns in the database.
	 */
	public $id;
	public static $attributes = [
		//
	];

	/**
	 * Find conversation messages and user information.
	 *
	 * @param integer $id
	 * @return void
	 */
	public static function find(int $id)
	{
		$statement = Model::db()->query(
			"SELECT message, first_name
			FROM message
			JOIN user ON user_id = user.id
			WHERE message.conversation_id = $id;
		");

		$statement->execute();

		return $statement->fetchAll();
	}
}