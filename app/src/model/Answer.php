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

}
