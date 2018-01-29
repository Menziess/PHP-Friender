<?php

namespace app\src\model;

use app\src\Model;

class Answer extends Model {

	/**
	 * The attributes as columns in the database.
	 */
	public $id;
	public static $attributes = [
		"question_id",
		"ans",
	];

	const ANSWER_COUNT = 23;
	const MATCH_TRESHOLD = self::ANSWER_COUNT / 2;

	/**
	 * Convert form answers to string of ones and zeros.
	 *
	 * @param array $answers
	 * @return string
	 */
	public static function toString(array $answers)
	{
		$answerString = "";
		foreach ($answers as $answer) {
			$answerString .= $answer;
		}
		return $answerString;
	}

	/**
	 * Determines distance between two strings of binary numbers.
	 *
	 * @param string $user1
	 * @param string $user2
	 * @return void
	 */
	public static function HammingDistance(string $s1, string $s2)
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
}
