<?php

namespace app\src\model;

use app\src\Model;

class User extends Model {

	/**
	 * The attributes as columns in the database.
	 */
	private static $attributes = [
		"First name",
		"Last name",
		"date of birth",
		"email",
		"password",
		"password check",
	];

	public function __construct($attributes)
	{
		parent::__construct();
		if (array_keys($attributes) !== self::$attributes)
			throw new \Exception("Attributes missing.");
		$this->variables = $attributes;
	}

	/**
	 * Create new user if not exists.
	 */
	public function create()
	{
		$keys = array_keys($this->variables);
		$values = array_values($this->variables);

		$result = self::query(
			"INSERT INTO user (" . implode(", ", $keys) . ")"
			. "(" . implode(", ", $values) . ")"
		);

		echo json_encode($result);
	}
	public function select($id)
	{
		//
	}
	public function update($id)
	{
		//
	}
	public function delete($id)
	{
		//
	}

}