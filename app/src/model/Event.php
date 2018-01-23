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
		"activity_id",
	];

	/**
	 * Determines distance between two strings of binary numbers.
	 *
	 * @param string $user1
	 * @param string $user2
	 * @return void
	 */
	private static function HammingDistance(string $s1, string $s2)
	{
		if (strlen($s1) !== strlen($s2))
			echo 'not same length';

		$array1 = str_split($s1);
		$array2 = str_split($s2);

		$dh = 0;
		for ($i = 0; $i < count($array1); $i++)
			if ($array1[$i] == $array2[$i]) $dh++;
		return $dh;
	}

	/**
	 * Get all unmatched users and find best matches.
	 *
	 * @param User $user
	 * @param array $potentialMatches
	 * @return array
	 */
	public static function matchAllUsers(User $user, array $potentialMatches)
	{
		if (!$user->answers)
			return;

		# Stores the scores in array
		$scores = [];

		# Calculate score for each potential match
		foreach ($potentialMatches as $match) {

			// echo $match->answers . '<br>' ?? 'nope';
			// echo strlen($match->answers) . '<br>';
			if (!$match->answers)
				continue;
			if (strlen($match->answers) != 23)
				continue;

			# De match id's zijn de keys van de array
			$score = self::HammingDistance($user->answers, $match->answers);
			$scores[$match->id] = $score;
		}

		return $scores;
	}
}
