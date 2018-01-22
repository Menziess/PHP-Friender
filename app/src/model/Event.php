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
		echo '<br>';
		print_r($user2->answers);

		// if (strcmp($var1, $var2) !== 0) {
		// 	echo '$var1 is not equal to $var2 in a case sensitive string comparison';
		// }

		echo self::HammingDistance($user1, $user2);

		if ($dh < 7){
			return ' it is a match';
		}
	}

	public static function HammingDistance(User $user1, User $user2) {
		$a1 = str_split($user1->answers);
		$a2 = str_split($user2->answers);
		$dh = 0;
		for ($i = 0; $i < count($a1); $i++)
			if($a1[$i] != $a2[$i]) $dh++;
		echo '<br>';
		return $dh;
	}







	/**
	 * Get all unmatched users and find best matches.
	 */
	public static function matchUsers($user, $users) {
		foreach ($users as $candidate) {
			// echo '<pre>';
			// print_r($candidate);
			print_r(HammingDistance($user, $candidate));

		}
	}
		# Users ophalen uit db
		# Alleen diegene die een vragen
		# Alleen diegene die niet in een event zitten
		// $unmatched = User::unmatched();

		// self::matchUsers
}

