<?php

namespace app\src\model;

use app\src\Model;
use app\src\model\User;

class Event extends Model {

	/**
	 * The attributes as columns in the database.
	 */
	public $id;
	public static $attributes = [
		//
	];

	/**
	 * Compare two answers of two users.
	 */
	public static function matchUsers(User $user1, User $user2)
	{
		echo '<pre>';
		print_r($user1->answers);

		if (strcmp($var1, $var2) !== 0) {
			echo '$var1 is not equal to $var2 in a case sensitive string comparison';
		}

		return $resultaat;

	}

	/**
	 * Get all unmatched users and find best matches.
	 */
	public static function match()
	{
		# Users ophalen uit db
		# Alleen diegene die een vragen
		# Alleen diegene die niet in een event zitten
		$unmatched = User::unmatched();

		// self::matchUsers

	}
}
