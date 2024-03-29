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
	 * Find message in conversation.
	 *
	 * @param integer $id
	 * @return array
	 */
	public static function message(int $id)
	{
		$statement = Model::db()->query(
			"SELECT message.id, message, first_name, time
			FROM message
			JOIN user ON user_id = user.id
			WHERE message.id = $id;
		");

		$statement->execute();

		return $statement->fetchAll()[0];
	}

	/**
	 * Find conversation messages and user information.
	 *
	 * @param integer $id
	 * @return array
	 */
	public static function messages(int $id)
	{
		$statement = Model::db()->query(
			"SELECT message.id, message, first_name, message.conversation_id, time
			FROM message
			JOIN user ON user_id = user.id
			WHERE message.conversation_id = $id
			ORDER BY message.id ASC;
		");

		$statement->execute();

		return $statement->fetchAll();
	}
}